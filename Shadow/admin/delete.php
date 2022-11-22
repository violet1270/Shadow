<?php
  require("../dbconnect.php");

  if(@$_GET["mid"])
  {
    $sql="delete from handbags where bagid='".$_GET["mid"]."'";
    echo $sql;
    $arry=mysqli_query($db_link,$sql);
    if($arry)
    {
      echo "<script> alert('删除成功');location='admin_bagmgr.php';</script>";
    }
    else
      echo "删除失败";
  }

?>
