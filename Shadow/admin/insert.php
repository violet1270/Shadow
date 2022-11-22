<?php
  require("../dbconnect.php");
  //新增手袋
  if($_POST["action"]=="inserth")
  {
    
    $sql = "insert into handbags (bagid,designer,type,color,birth,status,price,remarks) values('".$_POST["bagid"]."','".$_POST["designer"]."','".$_POST["type"]."','".$_POST["color"]."','".$_POST["birth"]."','".$_POST["status"]."','".$_POST["price"]."','".$_POST["remarks"]."')";
    $arr=mysqli_query($db_link,$sql);
    if ($arr)
    {
      echo "<script language=javascript>alert('添加成功！');window.location='admin_addh.php'</script>";
    }
    else
    {
      echo "<script>alert('添加失败');history.go(-1);</script>";
    }
  }
  
  //店内租赁
  if($_POST["action"]=="inserto")
  {
    //在customer表中插入一条记录
    $sql1 = "insert into customer (cardid,cardtype,cname,csex) values('".$_POST["cardid"]."','".$_POST["cardtype"]."','".$_POST["cname"]."','".$_POST["csex"]."')";
    //echo $sql1;
    mysqli_query($db_link,$sql1) or die ("在customer表中插入记录失败：".mysqli_error());
  
    //在order表中插入一条记录
    $sql2 = "insert into orders (bagid,cardid,starttime,endtime,linkman,phone,ostatus,oremarks) values('".$_POST["bagid"]."','".$_POST["cardid"]."','".$_POST["starttime"]."','".$_POST["endtime"]."','".$_POST["cname"]."','".$_POST["phone"]."','否','是')";
    //echo $sql2;
    mysqli_query($db_link,$sql2) or die ("在orders表中插入记录失败：".mysqli_error());

    //更新handbags表中status字段
    $sql4 = "update handbags set status='是' where bagid='".$_POST["bagid"]."'";
    //echo $sql4;
    mysqli_query($db_link,$sql4) or die ("更新handbags表中status字段失败：".mysqli_error());
  
    echo "<script language=javascript>alert('店内租赁成功');window.location='admin_addn.php'</script>";
  }
?>
