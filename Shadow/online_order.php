<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <title>名牌手袋租赁系统</title>
  <link rel="stylesheet" type="text/css" href="admin/css/common.css"/>
  <link rel="stylesheet" type="text/css" href="admin/css/main.css"/>
  <script type="text/javascript" src="admin/js/libs/modernizr.min.js"></script>
  <script type="text/javascript" src="js/check_input.js"></script>
  <script type="text/javascript" src="js/jquery.js"></script>
</head>
<body>
  <div class="topbar-wrap white">
    <div class="topbar-inner clearfix">
      <div class="topbar-logo-wrap clearfix">
        <ul class="top-info-list clearfix">
          <li><a class="on" href="index.php">首页</a></li>
          <li><a class="on" href="online_reserve.php">在线预订</a></li>
          <li><a class="on" href="order_query.php">订单查询</a></li>
        </ul>
      </div>
      <div class="top-info-wrap">
        <ul class="top-info-list clearfix">
          <li><a class="on" href="admin/index.php">后台管理</a></li>
          <li><a class="on" href="about.php">关于我们</a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="container clearfix">
    <div class="sidebar-wrap">
      <div class='sidebar-title' style="padding-top:20px">
        <h1><?php echo date("Y/m/d"); ?></h1>
      </div>
      <div style="text-align: center">
          <div style="padding-top: 10px">
          <img alt="" style="width: 180px; height: 180px" src="./images/a1.jpg">
          </div>
          <div style="padding-top: 10px">
          <img alt="" style=" width: 180px; height: 180px" src="./images/a2.jpg">
          </div>
          <div style="padding-top: 10px">
          <img alt="" style="width: 180px; height: 180px" src="./images/a3.jpg">
          </div>
      </div> 
    </div>
    <!--/sidebar-->
    <?php
      require("dbconnect.php");
      $sql="select * from handbags where bagid='".$_GET["orid"]."'";
      $arr=mysqli_query($db_link,$sql);
      $rows=mysqli_fetch_row($arr);
    ?>
    <div class="main-wrap">
      <div class="crumb-wrap">
        <div class="crumb-list"><i class="icon-font"></i><a href="index.php">网站首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">在线预订</span></div>
      </div>
      <div class="result-wrap">
        <form id="myform" name="myform" method="post" action="insert.php">
          <table width="100%" height="173" border="0" align="center" cellpadding="2" cellspacing="1" class="result-tab">
            <tr>
              <td width="%15" align="right" class="td_bg">手袋编码：</td>
              <td width="%85" class="td_bg"> <input name="bagid" type="text" id="bagid" value="<?php echo $_GET["orid"] ?>" size="15" maxlength="20" readonly></td>
            </tr>
            <tr>
              <td align="right" class="td_bg">类型：</td>
              <td class="td_bg"> <input name="type" type="text" id="type" value="<?php echo $rows[1] ?>" size="15" maxlength="20" readonly></td>
            </tr>
            <tr>
              <td align="right" class="td_bg">租赁价格：</td>
              <td class="td_bg"> <input name="price" type="text" id="price" value="<?php echo $rows[6] ?>" size="15" maxlength="20" readonly>元/天</td>
            </tr>
            <tr>
              <td width="%15" align="right" class="td_bg">客户姓名：</td>
              <td width="%85" class="td_bg"> <input name="cname" type="text" id="cname" size="20" maxlength="30" /></td>
            </tr>
            <tr>
              <td align="right" class="td_bg">证件类型：</td>
              <td class="td_bg">
                <select name="cardtype">
                  <option value="身份证" selected>身份证</option>
                  <option value="学生证">学生证</option>
                  <option value="军官证">军官证</option>
                </select>
              </td>
            </tr>
            <tr>
              <td align="right" class="td_bg">证件号码：</td>
              <td class="td_bg"><input name="cardid" type="text" id="cardid" size="30" maxlength="50" /></td>
            </tr>
            <tr>
              <td align="right" class="td_bg">性别：</td>
              <td class="td_bg">
                <select name="csex">
                  <option value="男" selected>男</option>
                  <option value="女">女</option>
                </select>
            </tr>
            <tr>
              <td align="right" class="td_bg">租赁时间：</td>
              <td class="td_bg"><input name="starttime" type="text" id="starttime" value=<?php echo date("Ymd h:i:s"); ?> size="30" maxlength="50" /></td>
            </tr>
            <tr>
              <td align="right" class="td_bg">归还时间：</td>
              <td class="td_bg"><input name="endtime" type="text" id="endtime" size="30" maxlength="50" /></td>
            </tr>
            <tr>
              <td align="right" class="td_bg">联系电话：</td>
              <td class="td_bg"><input name="phone" type="text" id="phone" size="30" maxlength="50" /></td>
            </tr>
            <tr>
              <td align="right" class="td_bg"><input type="reset" name="submit2" id="button2" value="重置" /></td>
              <td class="td_bg">
                <input type="hidden" name="action" value="inserto">
                <input type="submit" name="submit" id="button" value="确认预订" /></td>
            </tr>
          </table>
        </form>
      </div>
    </div>
    <!--/main-->
  </div>
</body>
</html>