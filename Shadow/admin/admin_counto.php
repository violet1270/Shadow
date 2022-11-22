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
        <div class="crumb-list"><i class="icon-font"></i><a href="admin_index.php">后台管理</a><span class="crumb-step">&gt;</span><span class="crumb-name">租赁统计</span></div>
      </div>
      <div class="result-wrap">
        <div class="result-content">
        <table border="0" width="100%">
          <tr>
            <th class="tc">手袋数量统计</th>
            <th class="tc">营业统计</th>
          </tr>
          <tr>
            <th class="tc">
              <table class="result-tab" width="100%">
                <tr>
                  <td class="td_bg">库存总数</td>
                  <td class="td_bg">已租数量</td>
                  <td class="td_bg">剩余数量</td>
                </tr>
                <?php 
                  require("../dbconnect.php");
                  $sql="select count(a.bagid),count(a.status='是') from handbags a";
                  $val=mysqli_query($db_link,$sql);
                  if(!$val)
                  {
                      exit;
                  }
                  while($arr=mysqli_fetch_row($val))
                  {
                    $left = $arr[0]-$arr[1];
	  echo "<tr height='25'>";
                    echo "<td>".$arr[0]."</td>";
                    echo "<td>".$left."</td>";
                    echo "<td>".$arr[1]."</td>";

                    echo "</tr>";
                  }
                ?>
              </table>
            </th>
            <th class="tc">
              <table class="result-tab" width="100%">
                <tr>
                  <td class="td_bg">订单总数（个）</td>
                  <td class="td_bg">总营业额（元）</td>
                </tr>
                <?php 
                  require("../dbconnect.php");
                  $sql="select count(orderid),sum(monetary) from record";
                  $val=mysqli_query($db_link,$sql);
                  if(!$val)
                  {
                      exit;
                  }
                  while($arr=mysqli_fetch_row($val))
                  {
                    echo "<tr height='25'>";
                    echo "<td>".$arr[0]."</td>";
                    echo "<td>".$arr[1]."</td>";
                    echo "</tr>";
                  }
                ?>
              </table>   
            </th>
          </tr>
        </table>
        </div>
      </div>
    </div>
    <!--/main-->
  </div>
</body>
</html>