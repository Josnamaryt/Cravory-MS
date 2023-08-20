<?php
session_start();
$id = $_SESSION['key'];
$con = mysqli_connect("localhost", "root", "", "cravory");
$query2 = "SELECT * FROM `user_credential_reg` WHERE `u_name`='$id'";
$re2 = mysqli_query($con,$query2);
$row2 = mysqli_fetch_array($re2);
$email = $row2['u_mail'];

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function send_order_mail($total,$date,$email)
{
    require("PHPMailer/PHPMailer.php");
    require("PHPMailer/SMTP.php");
    require("PHPMailer/Exception.php");
    $mail = new PHPMailer(true);
    try {
        //Server settings
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                   //Enable verbose debug output
        $mail->isSMTP(); //Send using SMTP
        $mail->Host = 'smtp.gmail.com'; //Set the SMTP server to send through
        $mail->SMTPAuth = true; //Enable SMTP authentication
        $mail->Username = 'efloraaura@gmail.com'; //SMTP username
        $mail->Password = 'ahpargsqcokqjhpo'; //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Enable implicit TLS encryption
        $mail->Port = 465; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        $mail->setFrom('efloraaura@gmail.com', 'E-FloraAura');
        $mail->addAddress($email);

        //Content
        $mail->isHTML(true); //Set email format to HTML
        $mail->Subject = 'Order Placed Succussfully';
        $mail->Body = "<h2>Thanks for shopping with E-FloraAura</h2><br><p style='font-size:20px;'>Your Order has been placed successfully on $date<br>Order total : $total<br></p>";
        $mail->send();
        return true;
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        return false;
    }
}

$total = $_SESSION['ordertotal'];
// $ad =$_SESSION['address'];
// $pm = $_SESSION['paymethod'];
// $pac = $_SESSION['pack'];
date_default_timezone_set("Asia/Kolkata");
$odate=date("h:i:a d/m/Y");
$query = "select * from tbl_cart where user_id ='$id' and status='available'";
$re = mysqli_query($con, $query);
$qpayment = "insert into tbl_payment(user_id,amount,pay_status) values('$id','$total','completed')";
$payre = mysqli_query($con, $qpayment);
if ($payre) {
    $payid = mysqli_insert_id($con);
    $qorder = "insert into tbl_orders(user_id,order_total,order_status,shipping_status,address_id,package_type,pay_id) values('$id','$total','placed','not dispatched','$ad','$pac','$payid')";
    $orderre = mysqli_query($con, $qorder);
    if ($orderre) {
        $oid = mysqli_insert_id($con);
        while ($cr = mysqli_fetch_array($re)) {
            $product_id = $cr['flower_id'];
            $oqty = $cr['cart_qnt'];
            $order_price = $cr['cart_qnt'] * $cr['cart_price'];
            $qorderdetail = "insert into tbl_orderdt(order_id,user_id,flower_id,order_qnt,order_price) values('$oid','$id','$product_id','$oqty','$order_price')";
            $oddre = mysqli_query($con, $qorderdetail);
            $qstockchange = "update tbl_flowers set stock=stock-'$oqty' where flower_id='$product_id'";
            $stockre = mysqli_query($con, $qstockchange);
        }
        $qcartdlt = "delete from tbl_cart where user_id='$id'";
        $dltre = mysqli_query($con, $qcartdlt);
        $_SESSION['orderstatus'] = "Order placed successfully";
       
    }
}
send_order_mail($total,$odate,$email);
unset($_SESSION['address']);
unset($_SESSION['pack']);
unset($_SESSION['ordertotal']);
header('location:my-orders.php');
?>