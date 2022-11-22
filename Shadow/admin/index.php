<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <title>名牌手袋租赁后台管理</title>
  <link href="css/admin_login.css" rel="stylesheet" type="text/css" />
</head>
<script language="javascript">
function chkuserinput(form){
if(form.username.value==""){
 alert("请输入用户名!");
 form.username.select();
 return(false);
}
if(form.pwd.value==""){
 alert("请输入用户密码!");
 form.pwd.select();
 return(false);
}
if(form.yz.value==""){
 alert("请输入验证码!");
 form.yz.select();
 return(false);
}
return(true); 
}
</script>
<body>
<div class="admin_login_wrap">
  <h1>后台管理</h1>
  <div class="adming_login_border">
    <div class="admin_input">
      <form action="admin_login.php" method="post" onSubmit="return chkuserinput(this)">
        <ul class="admin_items">
          <li>
            <label for="user">用户名：</label>
            <input type="text" name="username" value="admin" id="user" size="40" class="admin_input_style" />
          </li>
          <li>
            <label for="pwd">密码：</label>
            <input type="password" name="pwd" value="88888888" id="pwd" size="40" class="admin_input_style" />
          </li>
          <li>
            <label for="yanzheng">验证码：</label>
            <input type="text" name="yz"  id="yz" size="8" maxlength="4" class="admin_input_style"/>
            <?php
              $random =rand(1000,9999); 
              echo "<span class=\"STYLE99\">".$random."</span>"; 
            ?> 
            <input name="hiddenField" type="hidden" id="hiddenField" value="<?php echo $random ?>" />
          </li>
          <li>
              <input type="submit" name="submit" value="提交" class="btn btn-primary" />
          </li>
        </ul>
      </form>
    </div>
  </div>
    <p class="admin_copyright">&copy; 2022 Powered by 名牌手袋租赁系统</a></p>
</div>
</body>
</html>