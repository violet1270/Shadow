<?php
  require("../dbconnect.php");
  
  //echo $_GET["mrid"];
  //库存管理修改
  if(@$_POST["action"]=="bagchg")
  {
    $sqlstr = "update handbags set bagid='".$_POST["bagid"]."',designer='".$_POST["designer"]."',type='".$_POST["type"]."',color='".$_POST["color"]."',birth='".$_POST["birth"]."',status='".$_POST["status"]."',price='".$_POST["price"]."',remarks='".$_POST["remarks"]."' where bagid = '".$_GET["mrid"]."'";
    
    $arry=mysqli_query($db_link,$sqlstr);
    if ($arry)
    {
      echo "<script> alert('修改成功');location='admin_bagmgr.php';</script>";
    }
    else
    {
      echo "<script>alert('修改失败');history.go(-1);</script>";
    }
  }
  
  //echo $_GET["crid"];
  //退租释放资源
  if(@$_GET["crid"])
  {
    //将订单信息移到record表
    $sql1 = "insert into record(orderid,bagid,cardid,cardtype,cname,csex,starttime,endtime,linkman,phone,ostatus,oremarks) select * from (select a.orderid,a.bagid,a.cardid,b.cardtype,b.cname,b.csex,a.starttime,a.endtime,a.linkman,a.phone,a.ostatus,a.oremarks from orders a,customer b where a.cardid=b.cardid and a.orderid=".$_GET["orderid"].") tmp";
    echo $sql1;
    mysqli_query($db_link,$sql1) or die ("将订单信息移到record表失败：".mysqli_error());
    
    //更新record表中monetary字段
    $sql2 = "update record set monetary=".$_GET["money"]." where bagid = '".$_GET["crid"]."' and orderid=".$_GET["orderid"];
    //echo $sql2;
    mysqli_query($db_link,$sql2) or die ("更新record表中monetary字段失败：".mysqli_error());
    
    //删除orders中相应的记录
    $sql4 = "delete from orders where bagid = '".$_GET["crid"]."' and orderid=".$_GET["orderid"];
    //echo $sql4;
    mysqli_query($db_link,$sql4) or die ("删除orders中相应的记录失败：".mysqli_error());
    
    //删除customer表中的客户记录
    $sql3 = "delete from customer where cardid in (select cardid from record where bagid = '".$_GET["crid"]."' and orderid=".$_GET["orderid"].")";
    //echo $sql3;
    mysqli_query($db_link,$sql3) or die ("删除customer表中的客户记录失败：".mysqli_error());
    
    //更新handbags表中status字段
    $sql6 = "update handbags set status='否' where bagid='".$_GET["crid"]."'";
    //echo $sql6;
    mysqli_query($db_link,$sql6) or die ("更新handbags表中status字段失败：".mysqli_error());
  
    echo "<script language=javascript>alert('租赁状态更新成功');window.location='admin_checkout.php'</script>"; 
  }
  
  //echo $_GET["olrid"];
  //订单更新状态
  if(@$_GET["olrid"])
  {
    //更新handbags表中status字段
    $sql = "update handbags set status='是' where bagid='".$_GET["olrid"]."'";
    mysqli_query($db_link,$sql) or die ("更新handbags表中status字段失败：".mysqli_error());
    
    //更新orders表中oremarks字段
    $sql2 = "update orders set oremarks='是' where bagid='".$_GET["olrid"]."'";
    mysqli_query($db_link,$sql2) or die ("更新orders表中oremarks字段失败：".mysqli_error());
  
    echo "<script language=javascript>alert('订单状态更新成功');window.location='admin_addo.php'</script>"; 
  }
?>
