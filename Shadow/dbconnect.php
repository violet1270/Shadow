<?php
  $db_link=mysqli_connect("localhost",  //MYSQL��������ַ
                          "root",       //MYSQL��¼�û���
                          "",           //MYSQL��¼���루�˴��ɸ���ʵ������޸ģ�
                          "lease_handbags");   //��Ҫ�������ݿ�
  
  if(!$db_link)
  {
    printf("Can't connect to MySQL Server.Errorcode:%s ", mysqli_connect_error());
    exit;
  }
  
  //�������ݿ����
  mysqli_query($db_link,"SET NAMES 'utf8'"); 
 
?>

