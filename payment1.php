<?php 
include("message-box.php");
session_start();

$a=$_SESSION["amount"];


$a=$a*100;

?>
<html>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
  var options = {
    "key": "rzp_test_HZyOt9NbSylbRY", // Enter the Key ID generated from the Dashboard
    "amount": "<?php echo $a?>",
    "currency": "INR",
    "description": "Bakers Delight",
    "image": "images/cute.jpg",
    "handler":function(response){
      console.log(response);
      jQuery.ajax({
        type:"POST",
        url:"transaction.php",
        data:"pay_id="+response.razorpay_payment_id,
        success:function(result){
          window.location.href="success.php";
        }
      })
 
   
  }
  };
  var rzp1 = new Razorpay(options);
  $(document).ready(function(e)
   {
    
    rzp1.open();
    e.preventDefault();
  })
</script>
</html>