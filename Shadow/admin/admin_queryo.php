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
        <div class="crumb-list"><i class="icon-font"></i><a href="admin_index.php">后台管理</a><span class="crumb-step">&gt;</span><span class="crumb-name">租赁查询</span></div>
      </div>
      <div class="search-wrap">
        <div class="search-content">
          <form action="admin_queryo.php" method="post">
            <table class="search-tab">
              <tr>
                <th width="120">查询条件</th>
                <td>
                  <select name="search-type" id="">
                    <option value="bagid" selected>手袋编码</option>
                    <option value="cardid">证件号码</option>
                    <option value="linkman">联系姓名</option>
                    <option value="phone">联系电话</option>
                  </select>
                </td>
                <th width="70">关键字</th>
                <td><input class="common-text" placeholder="请输入相应关键字" name="keywords" value="" id="" type="text"></td>
                <td><input class="btn btn-primary btn2" name="sub" value="查询" type="submit"></td>
              </tr>
            </table>
          </form>
        </div>
      </div>
      <div class="result-wrap">
        <div class="result-content">
          <table class="result-tab" width="100%">
            <tr>
              <th class="tc">订单流水</th>
              <th class="tc">手袋编码</th>
              <th class="tc">证件号码</th>
              <th class="tc">租赁时间</th>
              <th class="tc">归还时间</th>
              <th class="tc">联系人</th>
              <th class="tc">联系电话</th>
              <th class="tc">网上预定</th>
              <th class="tc">交易完成</th>
            </tr>
  
            <?php
              require("../dbconnect.php");
              $pagesize=20;
              $sql = "select * from orders a where ".@$_POST["search-type"]." like ('%".@$_POST["keywords"]."%')";
              //echo $sql;
              $rs=mysqli_query($db_link,$sql);
              if(!$rs)
              {
                  echo "无满足条件的记录！";
                  exit;
              }
              $recordcount=mysqli_num_rows($rs);
              $pagecount=($recordcount-1)/$pagesize+1;
              $pagecount=(int)$pagecount;
              $pageno=@$_GET["pageno"];
              if($pageno=="")
              {
                  $pageno=1;
              }
              if($pageno<1)
              {
                  $pageno=1;
              }
              if($pageno>$pagecount)
              {
                  $pageno=$pagecount;
              }
              $startno=($pageno-1)*$pagesize;
              $sql="select * from orders a where ".@$_POST["search-type"]." like ('%".@$_POST["keywords"]."%')order by orderid desc limit $startno,$pagesize";
              //echo $sql;
              $rs=mysqli_query($db_link,$sql);
              if(!$rs)
              {
                  echo "无满足条件的记录！";
                  exit;
              }
              while($rows=mysqli_fetch_assoc($rs))
              {
                echo "<tr>";
                echo "<th class='tc'>".$rows["orderid"]."</th>";
                echo "<th class='tc'>".$rows["bagid"]."</th>";
                echo "<th class='tc'>".$rows["cardid"]."</th>";
                echo "<th class='tc'>".$rows["starttime"]."</th>";
                echo "<th class='tc'>".$rows["endtime"]."</th>";
                echo "<th class='tc'>".$rows["linkman"]."</th>";
                echo "<th class='tc'>".$rows["phone"]."</th>";
                echo "<th class='tc'>".$rows["ostatus"]."</th>";
                echo "<th class='tc'>".$rows["oremarks"]."</th>";
                echo "</tr>";
              }
            ?>
          </table>
          <div class="list-page">
            <tr>
              <?php
                if($pageno==1)
                {
                  echo "首页 | 上一页 | <a href='?pageno='".($pageno+1).">下一页</a> | <a href='?pageno'=".$_POST['search-type']."'>末页</a>";
                }
                else if($pageno==$pagecount)
                {
                  echo "<a href='?pageno=1'>首页</a> | <a href='?pageno='".($pageno-1)."'>上一页</a> | 下一页 | 末页";
                }
                else
                {
                  echo "<a href='?pageno=1'>首页</a> | <a href='?pageno='".($pageno-1)."'>上一页</a> | <a href='?pageno='".($pageno+1)." class='list_page''>下一页</a> | <a href='?pageno='".$pagecount.">末页</a>";
                }
                
                echo "&nbsp;页次：".$pageno."/".$pagecount."页&nbsp;共有".$recordcount."条信息";
              ?>
            </tr>
          </div>
        </div>
      </div>
    </div>
    <!--/main-->
  </div>
</body>
</html>