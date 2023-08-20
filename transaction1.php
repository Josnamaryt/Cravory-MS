<?php 
session_start();
$userid = $_SESSION['uid'];
$order_id = $_SESSION['order'];
$a = $_SESSION["amount"];
require('connection.php');

if(isset($_POST['pay_id']))
{
  $pay_id = $_POST['pay_id'];
  $query = "insert into tbl_payment (transaction_id,uid,orderid,amount,date)values('$pay_id','$userid','$order_id','$a',NOW())";
  $re = mysqli_query($con, $query);
  
  if($re)
  {
    $query = "DELETE FROM tbl_cart WHERE uid='$userid'";
    $re = mysqli_query($con, $query);
    
    if($re)
    {
      header("location:mycart.php");
      exit();
    }
  }
}
?>
