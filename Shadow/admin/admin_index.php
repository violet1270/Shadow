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
        <div class="crumb-list"><i class="icon-font">&#xea26;</i><span>欢迎使用名牌手袋租赁后台管理系统</span></div>
      </div>
      <div class="result-wrap">
        <div class="result-title">
          <h1>系统基本信息</h1>
        </div>
        <div class="result-content">
          <ul class="sys-info-list">
            <?php require("../dbconnect.php"); ?>
            <li>
              <label class="res-lab">物理路径</label><span class="res-info"><?php echo $_SERVER["DOCUMENT_ROOT"]; ?></span>
            </li>
            <li>
              <label class="res-lab">PHP版本</label><span class="res-info"><?php echo PHP_VERSION; ?></span>
            </li>
            <li>
              <label class="res-lab">MYSQL版本</label><span class="res-info"><?php echo mysqli_get_server_info($db_link); ?></span>
            </li>
            <li>
              <label class="res-lab">服务器名</label><span class="res-info"><?php echo $_SERVER['SERVER_NAME']; ?></span>
            </li>
            <li>
              <label class="res-lab">服务器IP</label><span class="res-info"><?php echo $_SERVER["HTTP_HOST"]; ?></span>
            </li>
            <li>
              <label class="res-lab">服务器端口</label><span class="res-info"><?php echo $_SERVER["SERVER_PORT"]; ?></span>
            </li>
            <li>
              <label class="res-lab">服务器时间</label><span class="res-info"><?php echo $showtime=date("Y-m-d H:i:s");?></span>
            </li>
            <li>
              <label class="res-lab">服务器操作系统</label><span class="res-info"><?php echo PHP_OS; ?></span>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <!--/main-->
  </div>
</body>
</html>