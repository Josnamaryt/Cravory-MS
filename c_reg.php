<!DOCTYPE html>
<html>
<center>
<head><b><p style="color:white;">Registration Form</b><br></p></br>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<style>
  .signup-form form {
    color: #000000;
    border-radius: 3px;
    margin-bottom: 15px;
    width: 500px;
    background: #f2f3f7;
    font-weight: bold;
    box-shadow: 0px 2px 2px rgb(0 0 0 / 30%);
    padding: 20px;
  }
  </style>


   <script>
       $(document).ready(function(){

       $("#u_name").keyup(function(){

       var username = $(this).val().trim();

       if(username != ''){

              $.ajax({
              url: 'c_userexist.php',
              type: 'post',
              data: {username: username},
              success: function(response){

                     $('#uname_response').html(response);

              }
              });
       }else{
              $("#uname_response").html("");
       }

       });
       });
</script>
<script>
            if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.href);
            }
        </script>
<script>
       
         var v1=0;
         var v2=0;
         var v3=0;
         var v4=0;
         var v5=0;
         var v6=0;
         var v7=0;


         $(document).ready(function () 
        {
            $("#error1").hide();
            $("#error2").hide();
            $("#error3").hide();
            $("#error4").hide();
            $("#error5").hide();
            $("#error6").hide();
            $("#error7").hide();
            $("#exist").hide();
            
            var u_name = /^[a-zA-Z\s]*$/;
            $("#u_name").keyup(function () {
                x = document.getElementById("u_name").value;
                if (u_name.test(x) == false) {
                     v1 = 1
                    $("#error1").show();
                    
                }
                else if (u_name.test(x) == true) {
                   v1 = 0;
                    $("#error1").hide();
                }
            });
            
            var u_mail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            $("#u_mail").keyup(function () {
                x = document.getElementById("u_mail").value;
                if (u_mail.test(x) == false) {
                     v2 = 1
                    $("#error2").show();
                    
                }
                else if (u_mail.test(x) == true) {
                   v2 = 0;
                    $("#error2").hide();
                }
            });

            var u_adrs =/^[a-zA-Z\s]*$/;
            $("#u_adrs").keyup(function () {
                x = document.getElementById("u_adrs").value;
                if (u_adrs.test(x) == false) {
                     v2 = 1
                    $("#error3").show();
                    
                }
                else if (u_adrs.test(x) == true) {
                   v2 = 0;
                    $("#error3").hide();
                }
            });
                    
            x = document.getElementById("u_pass").value;
            y = document.getElementById("u_pass").value;

         var u_phone=  /^[6-9][0-9]{9}$/;
               $("#u_phone").keyup(function () {
                x1 = document.getElementById("u_phone").value;
                if (u_phone.test(x1) == false) {
                     v4 = 1
                    $("#error4").show();
                   
                }
                else if (u_phone.test(x1) == true) {
                   v4 = 0;
                    $("#error4").hide();
                }
            });

            var u_pass= /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/;
               $("#u_pass").keyup(function () {
                x1 = document.getElementById("u_pass").value;
                if (u_pass.test(x1) == false) {
                     v4 = 1
                    $("#error5").show();
                   
                }
                else if (u_pass.test(x1) == true) {
                   v4 = 0;
                    $("#error5").hide();
                }
            });

            var c_pass= /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/;
               $("#c_pass").keyup(function () {
                x1 = document.getElementById("c_pass").value;
                if (c_pass.test(x1) == false) {
                     v5 = 1
                    $("#error6").show();
                   
                }
                else if (c_pass.test(x1) == true) {
                   v5 = 0;
                    $("#error6").hide();
                }
            });
    //    $("#c_pass" ).keyup(function () {
    //     var u_pass=document.getElementById("u_pass").value
    //     var c_pass = document.getElementById("c_pass").value;

    //       if (password != c_pass)
    //       document.getElementById("c_pass_er").innerHTML = "<span class='error'>Password doesn't match</span>";
    //       else
    //       document.getElementById("c_pass_er").innerHTML = "<span class='error' style='color:green'>Password match</span>";
                
    //   })

            $("#Register").click(function () {
                if (v1==0 && v2==0 && v3==0 && v4==0 )
                    $("#error7").hide();
                else
                {
                   alert('Please Fill The Form Correctly!');
                    return false;
                    }
            });
        });
     
       </script>
</head>
<title>Register</title>
 <body background="img/offer.jpg">
     <div class="signup-form">
	<form action="#" method="POST" enctype="multipart/form-data">
                                      
     <div class="mb-3">
            <label for="InputEmail1" class="form-label">User name</label>
            <div id="uname_response" ></div>
            <input type="text" class="form-control" id="u_name" name="u_name" aria-describedby="emailHelp" required style="width: 205px" onInput="checkUsername()"required/>
            <p id="error1"><b style='font-family:cursive; font-size:12px; color:red;'>&nbsp;&nbsp;UserName must be alphabets only</p>
     </div>
	 <div class="mb-3">
            <label for="InputEmail1" class="form-label"><b style='color:black;'>Email</label>
            <input type="email" class="form-control" id="u_mail" name="u_mail" aria-describedby="emailHelp" required style="width: 205px;" required>
            <p id="error2"><b style='font-family:cursive; font-size:12px; color:red;'>&nbsp;&nbsp;Email must be valid</p>
       </div>
     <div class="mb-3">
            <label for="InputEmail1" class="form-label"><b style='color:black;'>Address</label>
            <input type="text" class="form-control" id="u_adrs" name="u_adrs"aria-describedby="emailHelp" required style="width: 205px;" required>
            <p id="error3"><b style='font-family:cursive; font-size:12px; color:red;'>&nbsp;&nbsp;Address must be alphabets only</p>
       </div>
     <div class="mb-3">
            <label for="InputEmail1" class="form-label"><b style='color:black;'>Phone</label>
            <input type="text" class="form-control" id="u_phone" name="u_phone"aria-describedby="emailHelp" required style="width: 205px;" required>
            <p id="error4"><b style='font-family:cursive; font-size:12px; color:red;'>&nbsp;&nbsp;Phone must be numbers only</p>
       </div>
     <div class="mb-3">
            <label for="InputPassword1" class="form-label"><b style='color:black;'>Password</label>
            <input type="password" class="form-control" id="u_pass" name="u_pass" required style="width: 205px;"required>
            <p id="error5"><b style='font-family:cursive; font-size:12px; color:red;'>&nbsp;&nbsp;contain atleast one number and one uppercase and
	        lowercase letter,and atleast 8 or more characters</p>
       </div>
       <div class="mb-3">
            <label for="InputPassword1" class="form-label"><b style='color:black;'>Confirm Password</label>
            <input type="password" class="form-control" id="c_pass" name="c_pass" required style="width: 205px;"required>
            <p id="error6"><b style='font-family:cursive; font-size:12px; color:red;'>&nbsp;&nbsp;Password should match </p>
       </div>
     </tr>
	<br></br><button type="submit" class="btn btn-success" name="Register">Register<a href="project.html"></a></button>
	<tr>
	<td>
        <center><footer>Already a member? <a href="c_login.php">Login here</a></footer></td></tr>
		</center>
      </div>
    </form>

<?php
        
    $conn = mysqli_connect("localhost", "root", "", "cravory");

    if(isset($_POST['Register'])){
       $u_name=$_POST['u_name']; 
       $u_pass=$_POST['u_pass'];
       $u_email=$_POST['u_mail'];
       $u_adrs=$_POST['u_adrs'];
       $u_phone=$_POST['u_phone'];


       $re=0;
       $le=0;

       $mailcheck=preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix",$u_email);
       $reg_query="INSERT INTO `user_credential_reg`( `r_id`, `u_name`, `u_mail`, `u_adrs`, `u_phone`, `u_pass`, `u_status`)VALUES ('1', '$u_name','$u_email','$u_adrs', '$u_phone','$u_pass','1')";
      
		if($mailcheck)
		{
			$re= mysqli_query($conn,$reg_query);
			$lastid=mysqli_insert_id($conn);
			$log_query="INSERT INTO `user_login`(`u_name`, `u_pass`, `r_id`) VALUES ('$u_name','$u_pass','1')";
			$le=mysqli_query($conn,$log_query);  
		}
 
		
   if($re || $le)
   {
   echo ("<div class='alert alert-success' role='alert'> Successfully Registered </div>");
   }
   }
   
   
   ?>   
      </body>
</html>
  
