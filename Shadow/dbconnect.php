<?php
  $db_link=mysqli_connect("localhost",  //MYSQL服务器地址
                          "root",       //MYSQL登录用户名
                          "",           //MYSQL登录密码（此处可根据实际情况修改）
                          "lease_handbags");   //需要连接数据库
  
  if(!$db_link)
  {
    printf("Can't connect to MySQL Server.Errorcode:%s ", mysqli_connect_error());
    exit;
  }
  
  //设置数据库编码
  mysqli_query($db_link,"SET NAMES 'utf8'"); 
 
?>

