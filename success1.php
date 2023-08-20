<?php
    include("header.php");
    require('connection.php');
    if(isset($_SESSION['uid']))
    {
    $userid=$_SESSION['uid'];
    $query="select * from tbl_reg where lid='$userid'";
    $re=mysqli_query($con,$query);
    $row=mysqli_fetch_array($re);
    }
    else{
        header("location:login.php");
        exit();
    }
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>checkout</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script>
    $(document).ready(function() {
  $('#new').click(function() {
    $('.newform').toggle();
  });
});
  </script>
 
      <script>  
		     $(document).ready(function() {
          // if($("#next2").prop('disabled',true)){
          //   $("#pass_err").html("Please fill the form correctly.").show()
          // }
    

                $("#add").keyup(function(){
                    check_address();
                })
                $("#district").on("change",function(){
                    check_district();
                })
                $("#city").keyup(function(){
                    check_city();
                })
                $("#pin").keyup(function(){
                    check_pin();
                })
                
                var add_error=false;
                var district_error=false;
                var city_error=false;
                var pin_error=false;

                
                function check_address()
                {
                    var pattern = /^[a-zA-Z\s]*$/;
                    var add = $("#add").val();
                    if (pattern.test(add)==true && add !="") {
                      $("#error_add").hide();
                      $("#add").css("border","1px solid green");
                      $("#next2").prop('disabled',false);
                    } else {
                      $("#error_add").html("Can contain only characters.").show();
                      $("#add").css("border","1px solid red");
                      $("#next2").prop('disabled',true);
                     add_error = true;
                    }
                }
                function check_city()
                {
                    var pattern = /^[a-zA-Z0-9\s]*$/;
                    var city = $("#city").val();
                    if (pattern.test(city)==true && city !="") {
                      $("#error_city").hide();
                      $("#city").css("border","1px solid green");
                      $("#next2").prop('disabled',false);
                    } else {
                      $("#error_city").html("Only characters,numbers and space are allowed.").show();
                      $("#city").css("border","1px solid red");
                      $("#next2").prop('disabled',true);
                      city_error = true;
                    }
                }

                function check_district()
                {
                    var pattern =  /^[a-zA-Z\s]*$/;
                    var dis = $("#district").val();
                    if (dis!="") {
                      $("#error_district").hide();
                      $("#district").css("border","1px solid green");
                      $("#next2").prop('disabled',false);
                    } else {
                      $("#error_district").html("Select an option.").show();
                      $("#district").css("border","1px solid red");
                      $("#next2").prop('disabled',true);
                      district_error = true;
                    }
                }

                function check_pin()
                {
                    var pattern = /^\s*6\d{5}\s*$/;
                    var pin = $("#pin").val();
                    if (pattern.test(pin)==true && pin !="") {
                      $("#error_pin").hide();
                      $("#pin").css("border","1px solid green");
                      $("#next2").prop('disabled',false);
                    } else {
                      $("#error_pin").html("Should start with 6 and contain only 6 digits.").show();
                      $("#pin").css("border","1px solid red");
                      $("#next2").prop('disabled',true);
                     pin_error = true;
                    }
                }

        $("#form").submit(function(event) {
            add_error=false;
            district_error=false;
            city_error=false;
            pin_error=false;

            check_address();
            check_city();
            check_district();
            check_pin();

            if (add_error===false && district_error===false && city_error===false && pin_error===false) {
                $("#pass_err").hide();
    event.preventDefault(); // Prevent default form submission behavior

    // Collect form data
    var formData = $(this).serialize();

    // Send AJAX request to server
    $.ajax({
      url: 'ajax.php', // Insertion script URL
      method: 'POST',
      data: formData, // Form data
      success: function(response) {
        
      }
    });
                return false;
            } else {
                $("#pass_err").html("Please fill the form correctly.").show()
               return false;
            }
         });
       
			  });
		   </script>
 


 <script>  
$(document).ready(function() {
  $("#placeorder").submit(function(event) {
    event.preventDefault(); // Prevent default form submission behavior
    // Collect form data
    var formData = $(this).serialize();
    // Send AJAX request to server
    $.ajax({
      url: 'process-form.php', // Insertion script URL
      method: 'POST',
      data: formData, // Form data
      success: function(response) {
        if (response === 'razorpay') {
          window.location.href = 'payment.php';
        }
      }
    });
    return false;
  });
});
		   </script>









  <script>
  $(document).ready(function() {
    $(".content1").show();
    $(".content2, .content3, .content4").hide();

    $("#next1").click(function() {
      $(".content1").hide();
      $(".content2").show();
      $(".content3, .content4").hide();
      $("#step1").addClass("active");
      $("#step2").addClass("active");
    });
   
    $("#next2").click(function() {
      $(".content1, .content2, .content4").hide();
      $("#content3").show();
      $("#step1").addClass("active");
      $("#step2").addClass("active");
      $("#step3").addClass("active");
    });

    // $("#next3").click(function() {
      // $(".content1, .content2, .content3").hide();
      // $(".content4").show();
      // $("#step1").addClass("active");
      // $("#step2").addClass("active");
      // $("#step3").addClass("active");
      // $("#step4").addClass("active");
    // });

    // $("#prev2").click(function() {
    //   $(".content1").show();
    //   $(".content2").hide();
    //   $(".content3, .content4").hide();
    //   $("#step2,#step3,#step4").removeClass("active");
      
    //   $("#step1").addClass("active");
    // });

    // $("#prev3").click(function() {
    //   $(".content1, .content3").hide();
    //   $(".content2").show();
    //   $(".content4").hide();
    //   $("#step2,#step3,#step4").removeClass("active");
    //   $("#step1,").addClass("active");
    // });

  });
</script>


  <style>
   body{
    background-image:linear-gradient(rgba(0,0,0,0.35),rgba(0,0,0,0.35)),url("images/candies.jpg");
                background-size:cover;
            }

   .checkout {
  margin: 100px 200px 0 200px;
  /* border:1px solid black; */
  border-radius:50px;
  min-height:580px;
  background-color: #f8f8f8;
}

/* progress-bar styles */
.progress-bar {
  display: flex;
  justify-content: space-between;
  list-style: none;
  padding-top:25px;
  text-align: center;
}

.progress-bar li {
  flex: 1;
  position: relative;
}

.progress-bar li span {
  display: inline-block;
  width: 30px;
  height: 30px;
  line-height: 30px;
  border-radius: 50%;
  background-color: #ddd;
  color: #191919;
  font-size: 18px;
  font-weight: bold;
  margin-bottom: 10px;
}

.progress-bar li.active span {
  background: linear-gradient(to right, #FF1046 20%, #E01660 40%, #E01660 60%, #FF1046 80%);
    background-size: 200% auto;
    animation: effect 1s linear infinite;
    color: #111111;
}

@keyframes effect {
    to {
        background-position: -200% center;
    }
}

.progress-line{
  content: "";
  position: absolute;
  top: 15px;
  right: -50%;
  left: 57%;
  width: 95%;
  height: 5px;
  background-color: #ddd;
  color:#ddd;
}
.progress-bar li.active .progress-line {
  background: linear-gradient(to right, #ccc, #ccc 50%, #FF1046 50%, #FF1046);
  background-size: 200% 100%;
  animation: progress-bar-animation 1s ease-out forwards;
}

@keyframes progress-bar-animation {
  to {
    background-position: -100% 0;
  }
}

.checkout-content {
  width: 93%;
  min-height: 700px;
  height:auto;
  display: flex;
  overflow: hidden; 
  padding-bottom:40px;
  margin:50px 30px 10px 30px;
}


.content1,.content2,.content3,.content4 { 
  width: 100%;
  height: 100%;
  position: relative;

  /* background:transparent; */
 
  background-color: #f8f8f8;
}

.content1 {
  display: flex;
  flex-direction: column;
  align-items: left;
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
  margin: 20px;
}

.content1 .buttons{
  display:flex;
}
.content1 button {
  margin-left:50px;
  background-color:#fe3a66;
  color: #fff;
  border: none;
  border-radius: 5px;
  padding: 10px 20px;
  margin-top: 10px;
  cursor: pointer;
}

.content1 button:hover {
  background-color: #ff1046;
}


.content2 {
  display: flex;
  flex-direction: column;
  align-items: left;
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
  margin: 20px;
}
.content2 label {
  font-weight: bold;
  margin-right: 10px;
  margin-left:40px;
  margin-bottom:10px;
}

.content2 input[type="text"] {
  width: 450px;
  padding: 13px;
  margin-bottom: 10px;
  border-radius: 5px;
  border: 1px solid #ccc;
  margin-left:40px;
}
.name{
  display:flex;
}
.content2 .name input[type="text"] {
  width: 205px;
  padding: 13px;
  margin-bottom: 10px;
  border-radius: 5px;
  border: 1px solid #ccc;
  margin-left:40px;
}


.content2 .error {
  color: red;
  font-size: 12px;
  margin-left:40px;
}
.content2 .buttons{
  display:flex;
}
.content2 button {
  margin-left:50px;
  background-color:#fe3a66;
  color: #fff;
  border: none;
  border-radius: 5px;
  padding: 10px 20px;
  margin-top: 10px;
  cursor: pointer;
}

.content2 input[type="submit"]:hover {
  background-color: #ff1046;
}

.content2 input[type="submit"] {
  margin-left:50px;
  background-color:#fe3a66;
  color: #fff;
  border: none;
  border-radius: 5px;
  padding: 10px 20px;
  margin-top: 10px;
  cursor: pointer;
}

.content2 button:hover {
  background-color: #ff1046;
}
.image{
  padding-top:150px;
  margin-left:550px;
}
.image img{
  height:250p;
  width:250px;
}



.content3 {
  display: flex;
  flex-direction: column;
  align-items: left;
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
  margin: 20px;
}

.content3 .buttons{
  display:flex;
}
.content3 button {
  margin-left:50px;
  background-color:#fe3a66;
  color: #fff;
  border: none;
  border-radius: 5px;
  padding: 10px 20px;
  margin-top: 10px;
  cursor: pointer;
}

.content3 button:hover {
  background-color: #ff1046;
}
.content3 input[type="submit"]  {
  margin-left:50px;
  background-color:#fe3a66;
  color: #fff;
  border: none;
  border-radius: 5px;
  padding: 10px 20px;
  margin-top: 10px;
  cursor: pointer;
}

.content3 input[type="submit"] :hover {
  background-color: #ff1046;
}


.content4 {
  display: flex;
  flex-direction: column;
  align-items: left;
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
  margin: 20px;
}
.content4 button {
  margin-left:670px;
  background-color:#fe3a66;
  color: #fff;
  border: none;
  border-radius: 5px;
  padding: 10px 20px;
  margin-top: 10px;
  cursor: pointer;
}

.content4 button:hover {
  background-color: #ff1046;
}

.step {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  animation-duration: 0.5s;
  animation-name: slide-in;
}

@keyframes slide-in {
  from {
    transform: translateX(100%);
  }
  to {
    transform: translateX(0);
  }
}

td{
  padding: 20px; 
  border-bottom: 1px solid #ddd; 
  display: flex; 
  align-items: center;
}
tr{
  border: none;
}

.order{
  flex: 1; 
  display: flex; 
  align-items: center;
  
}
.p1{
  font-weight: bold; 
  font-size: 1.2rem; 
  margin: 0;
  margin-left:20px;

}
.p2{
  color: #666; 
  font-size: 1rem; 
  margin: 0;  
  padding-top:10px;
  margin-left:20px;
}
.p3{
  color: #666; 
  font-size: 0.9rem; 
  margin: 0;
  margin-left:20px;
  padding-top:10px;
}
.p4{
  color: #666; 
  font-size: 0.9rem; 
  margin: 0;
  margin-left:20px;
  padding-top:10px;
}
.prototal{
  flex: 1; 
  text-align: right;
}
.prototal p{
  color: #333; 
  font-weight: bold; 
  font-size: 1.2rem; 
  margin: 0;
}

.total {
    margin-top:5px;
    padding: 10px;
    text-align: right;
  }
  


  /* -------------------------payment---------------------------------- */

  h2 {
  font-size: 24px;
  margin-bottom: 10px;
}

input[type="radio"] {
  width: 20px;
  height: 20px;
  border-radius: 50%; 
  accent-color: #fe3a66; 
  vertical-align: middle;
}



input[type="radio"]:checked::before {
  content: "";
  display: block;
  width: 12px;
  height: 12px;
  margin: 3px auto; 
  border-radius: 50%;
  accent-color: #fe3a66; 
}

input[type="radio"]:checked + label {
  color:#fe3a66; 
  font-size:18px;
}


.label {
  display: inline-block;
  width: 200px;
  margin-left: 50px;
  margin-top:-18px;
  font-size:17px;
}


input[type="text"]{
  border: 1px solid #ccc;
  border-radius: 4px;
  padding: 10px;
  font-size: 16px;
  margin-bottom: 10px;
  width: 100%;
  box-sizing: border-box;
}
select{
  border: 1px solid #ccc;
  border-radius: 4px;
  padding: 10px;
  font-size: 16px;
  margin-bottom: 10px;
  margin-left: 40px;
  width:56%;
  box-sizing: border-box;
}
.expiry-cvv {
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  align-items: center;
}

.expiry-cvv #card-expiry label {
  margin-bottom: 0;
  margin-left: 20px;
}

.label1 {
  margin-bottom: 0;
  margin-left: 40px;
}

.expiry-cvv input[type="text"] {
  flex: 1;
  margin-bottom: 0;
  margin-left: 20px;
}

button {
  background-color: #4CAF50;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  font-size: 16px;
  cursor: pointer;
}

button:hover {
  background-color: #3e8e41;
}



  </style>
</head>
<body>
<div class="checkout">
    
    <div class="success" >
       <img src="images/placed.gif" alt="not found" style="margin-left:300px;"><br>
       <h3 style="margin-left:330px;">Order Placed Successfully!!</h3>
    </div>
    

    <br><br>
    <div class="buttons">
    <br><br>
      <a href="index.php">
      <button style="margin-left:440px;">Done</button><br><br></a>

      </div>
</div>





</body>
</html>