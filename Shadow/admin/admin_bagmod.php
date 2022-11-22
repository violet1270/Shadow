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
    <?php
      require("../dbconnect.php");
      $sql="select * from handbags where bagid='".$_GET["mid"]."'";
      $arr=mysqli_query($db_link,$sql);
      $rows=mysqli_fetch_row($arr);
    ?>
    <div class="main-wrap">
      <div class="crumb-wrap">
        <div class="crumb-list"><i class="icon-font"></i><a href="admin_index.php">后台管理</a><span class="crumb-step">&gt;</span><span class="crumb-name">库存管理</span></div>
      </div>
      <div class="result-wrap">
        <form id="myform" name="myform" method="post" action="update.php?mrid=<?php echo $rows[0] ?>">
          <table width="100%" height="173" border="0" align="center" cellpadding="2" cellspacing="1" class="result-tab">
            <tr>
              <td width="%15" align="right" class="td_bg">手袋编码：</td>
              <td width="%85" class="td_bg"> <input name="bagid" type="text" id="bagid" value="<?php echo $rows[0] ?>" size="30" maxlength="50" /></td>
            </tr>
            <tr>
              <td align="right" class="td_bg">设计师：</td>
              <td class="td_bg"><input name="designer" type="text" id="designer" value="<?php echo $rows[1] ?>" size="10" maxlength="15" /></td>
            </tr>
            <tr>
              <td align="right" class="td_bg">类型：</td>
              <td class="td_bg">
                <select name="type">
	<option value="<?php echo $rows[2] ?>" selected><?php echo $rows[2] ?></option>
                	<option value="多功能包">多功能包</option>
                 <option value="斜挎包">斜跨包</option>
                 <option value="手提包">手提包</option>
                  <option value="单肩包">单肩包</option>
                  <option value="双肩包">双肩包</option>
                  <option value="箱包">箱包</option>
                  <option value="晚装包">晚装包</option>
                  <option value="钱包">钱包</option>
                </select>
              </td>
            </tr>
            <tr>
              <td align="right" class="td_bg">颜色：</td>
              <td class="td_bg">
                <select name="color">
                  <option value="<?php echo $rows[3] ?>" selected><?php echo $rows[3] ?></option>
                  <option value="红色" selected>红&emsp;色</option>
                  <option value="橙色">橙&emsp;色</option>
                  <option value="黄色">黄&emsp;色</option>
                  <option value="绿色">绿&emsp;色</option>
                  <option value="蓝色">蓝&emsp;色</option>
                  <option value="紫色">紫&emsp;色</option>
                  <option value="白色">白&emsp;色</option>
                  <option value="黑色">黑&emsp;色</option>
                  <option value="棕色">棕&emsp;色</option>
                  <option value="卡其色">卡其色</option>
                  <option value="灰色">灰&emsp;色</option>
                  <option value="彩色">彩&emsp;色</option>
                </select>
              </td>
            </tr>
            <tr>
              <td align="right" class="td_bg">上市日期：</td>
              <td class="td_bg"><input name="birth" type="text" id="birth" value="<?php echo $rows[4] ?>" size="10" maxlength="15" /></td>
            </tr>
            <tr>
              <td align="right" class="td_bg">租赁状态：</td>
              <td class="td_bg">
                <select name="status">
                  <option value="<?php echo $rows[5] ?>" selected><?php if ($rows[5]='否') { echo "未出租";} else {echo "已出租";}  ?></option>
                  <option value="否" selected>未出租</option>
                  <option value="是">已出租</option>
                </select>
              </td>
            </tr>
            <tr>
              <td align="right" class="td_bg">租赁价格（元/天）：</td>
              <td class="td_bg"><input name="price" type="text" id="price" value="<?php echo $rows[6] ?>" size="10" maxlength="15" /></td>
            </tr>
            <tr>
              <td align="right" class="td_bg">特点描述：</td>
              <td class="td_bg"><input name="remarks" type="text" id="remarks" value="<?php echo $rows[7] ?>" size="10" maxlength="15" /></td>
            </tr>
            <tr>
              <td align="right" class="td_bg"><input type="reset" name="submit2" id="button2" value="重置" /></td>
              <td class="td_bg">
                <input type="hidden" name="action" value="bagchg">
                <input type="submit" name="submit" id="button" value="提交" />
              </td>
            </tr>
          </table>
        </form>
      </div>
    </div>
    <!--/main-->
  </div>
</body>
</html>