<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <title>名牌手袋租赁后台管理</title>
  <link rel="stylesheet" type="text/css" href="css/common.css"/>
  <link rel="stylesheet" type="text/css" href="css/main.css"/>
  <script type="text/javascript" src="js/libs/modernizr.min.js"></script>
</head>
<body>
  <div class="topbar-wrap white">
    <div class="topbar-inner clearfix">
      <div class="topbar-logo-wrap clearfix">
        <ul class="navbar-list clearfix">
          <li><a class="on" href="admin_index.php">网站后台</a></li>
          <li><a href="../index.php">网站首页</a></li>
        </ul>
      </div>
      <div class="top-info-wrap">
        <ul class="top-info-list clearfix">
          <li>登录用户：<?php session_start(); echo $_SESSION["aname"]; ?></li>
          <li><a href="admin_logout.php"><i class="icon-font">&#xe9b6;</i>退出</a></li>
        </ul>
      </div>
    </div>
  </div>
 <div class="container clearfix">
    <div class="sidebar-wrap">
      <div class="sidebar-title">
        <h1>管理菜单</h1>
      </div>
      <div class="sidebar-content">
        <ul class="sidebar-list">
          <li>
            <a href="#">租赁管理</a>
            <ul class="sub-menu">
              <li><a href="admin_addn.php"><i class="icon-font">&#xe960;</i>租赁登记</a></li>
              <li><a href="admin_addo.php"><i class="icon-font">&#xe960;</i>订单状态更新</a></li>
              <li><a href="admin_queryo.php"><i class="icon-font">&#xe986;</i>租赁查询</a></li>
              <li><a href="admin_counto.php"><i class="icon-font">&#xe99a;</i>租赁统计</a></li>
            </ul>
          </li>
          <li>
            <a href="#">退租管理</a>
            <ul class="sub-menu">
              <li><a href="admin_checkout.php"><i class="icon-font">&#xe994;</i>退租清算</a></li>
            </ul>
          </li>
          <li>
            <a href="#">库存管理</a>
            <ul class="sub-menu">
              <li><a href="admin_addh.php"><i class="icon-font">&#xe995;</i>新增库存</a></li>
              <li><a href="admin_bagmgr.php"><i class="icon-font">&#xe994;</i>库存管理</a></li>
            </ul>
          </li>      
          <li>
            <a href="#">系统管理</a>
            <ul class="sub-menu">
              <li><a href="admin_chpwd.php"><i class="icon-font">&#xe991;</i>密码修改</a></li>
              <li><a href="admin_logout.php"><i class="icon-font">&#xe9b6;</i>退出系统</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
    <!--/sidebar-->
    <div class="main-wrap">
      <div class="crumb-wrap">
        <div class="crumb-list"><i class="icon-font"></i><a href="admin_index.php">后台管理</a><span class="crumb-step">&gt;</span><span class="crumb-name">退租清算</span></div>
      </div>
      <div class="search-wrap">
        <div class="search-content">
          <form action="admin_checkout.php" method="post">
            <table class="search-tab">
              <tr>
                <th width="200"></th>
                <th width="120">请输入手袋编码</th>
                <td><input class="common-text" placeholder="手袋编码" name="bagid" value="" id="" type="text"></td>
                <td><input class="btn btn-primary btn2" name="sub" value="查询" type="submit"></td>
              </tr>
            </table>
          </form>
        </div>
      </div>
      <div class="result-wrap">
        <div class="result-content">
          <table class="result-tab" width="100%">
            <?php
              require("../dbconnect.php");
              echo "";
              echo "<tr>顾客信息如下，请确认：</tr>";
              echo "<tr>";
              echo "<th class='tc'>证件类型</th>";
              echo "<th class='tc'>证件号码</th>";
              echo "<th class='tc'>客户姓名</th>";
              echo "<th class='tc'>客户性别</th>";
              echo "</tr>";
              //echo "<br/>";
              $sql = "select a.* from customer a,orders b where a.cardid=b.cardid and b.bagid = '".@$_POST["bagid"]."'";
              $rs=mysqli_query($db_link,$sql);
              if(!$rs)
              {
                  echo "<tr><th>无满足条件的记录！</th><th></th><th></th><th></th></tr>";
                  exit;
              }

              while($rows=mysqli_fetch_assoc($rs))
              {
                echo "<tr>";
                echo "<th class='tc'>".$rows["cardtype"]."</th>";
                echo "<th class='tc'>".$rows["cardid"]."</th>";
                echo "<th class='tc'>".$rows["cname"]."</th>";
                echo "<th class='tc'>".$rows["csex"]."</th>";
                echo "</tr>";
              }
            ?>
          </table>
          <table class="result-tab" width="100%">
            <?php
              //require("../dbconnect.php");
              echo "<br/>";
              echo "<tr>租赁信息如下，请确认：</tr>";
              echo "<tr>";
              echo "<th class='tc'>订单流水</th>";
              echo "<th class='tc'>手袋编码</th>";
              echo "<th class='tc'>租赁时间</th>";
              echo "<th class='tc'>归还时间</th>";
              echo "<th class='tc'>租赁天数（天）</th>";
              echo "<th class='tc'>租赁价格（元/天）</th>";
              echo "<th class='tc'>消费金额（元）</th>";
              echo "<th class='tc'>网上预订</th>";
              echo "<th class='tc'>交易完成</th>";
              echo "</tr>";
              echo "<br/>";
              $sql = "select a.orderid,a.bagid,a.starttime,a.endtime,b.type,b.price,a.ostatus,a.oremarks from orders a,handbags b where a.bagid=b.bagid and a.bagid = '".@$_POST["bagid"]."'";
              //echo $sql;
              $rs=mysqli_query($db_link,$sql);
              if(!$rs)
              {
                  echo "<tr><th>无满足条件的记录！</th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th></tr>";
                  exit;
              }

              while($rows=mysqli_fetch_assoc($rs))
              {
                //$datenum=$rows["endtime"]-$rows["starttime"];
                $datenum=((strtotime($rows["endtime"])-strtotime($rows["starttime"]))/3600/24)+1;
                $monetary=$rows["price"] * $datenum;
                echo "<tr>";
                echo "<th class='tc'>".$rows["orderid"]."</th>";
                echo "<th class='tc'>".$rows["bagid"]."</th>";
                echo "<th class='tc'>".$rows["starttime"]."</th>";
                echo "<th class='tc'>".$rows["endtime"]."</th>";
                echo "<th class='tc'>".$datenum."</th>";
                echo "<th class='tc'>".$rows["price"]."</th>";
                echo "<th class='tc'>".$monetary."</th>";
                echo "<th class='tc'>".$rows["ostatus"]."</th>";
                echo "<th class='tc'>".$rows["oremarks"]."</th>";
                echo "</tr>";
                              echo "<tr>";
              echo "<th class='tc'></th><th class='tc'></th><th class='tc'></th><th class='tc'></th>";
              echo "<th class='tc'></th><th class='tc'><a href='update.php?crid=".$rows["bagid"]."&money=".$monetary."&orderid=".$rows["orderid"]."'  class='link-update'>确认退租</a></th>";
              echo "<th class='tc'></th><th class='tc'></th><th class='tc'></th><th class='tc'></th>";
              echo "</tr>";
              }
            ?>
          </table>
        </div>
      </div>
    </div>
    <!--/main-->
</div>
</body>
</html>