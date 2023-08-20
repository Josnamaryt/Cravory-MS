<?php
$conn = mysqli_connect("localhost", "root", "", "cravory");

if(isset($_POST['submit'])){
  
    $fd_subj=$_POST['fd_sub'];
    $fd_des=$_POST['fd_desc'];
   
    $fd_query="INSERT INTO `feedback`( `fd_sub`, `fd_desc`, `fd_status`) VALUES ('fd_sub','fd_desc','1')";

    $fd_reg=mysqli_query($conn,$fd_query);
    if($fd_reg){
            ?> <script>alert("successfully registered dealer"); </script><?php 
        }
    }

    
?>



<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <style>
        #p{
                display: block;
                width: 100%;
                font-family: 'Anton', Algerian;
                text-align: center;
                background-color: #9e9e9e;
                color: Black;
                padding: 7px ;
                margin: 10px;
                border-radius: 20px;
                font-size: 25px;
                border: 2px solid #757575;
                cursor: pointer;
            }
        #cakemaker{
            background-color: rgba(255,255,255,0.5);
            border-radius: 16px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(5.4px);
            -webkit-backdrop-filter: blur(5.4px);
            border: 1px solid rgba(248, 126, 239, 0.21);
        }
        #cakeimg{
            position:fixed;
            min-height: 100%;
            min-width: 100%;
            top:0;
            left: 0;
        }
        #content{
            position: relative;
        }
    </style>
<body>
        <img id="cakeimg" src="\The Cravory\img\img9a.jpg">
        <div id="content">
        
        <form>
            <center>
              <p style="color:rgb(17, 9, 7);"><b>Feedback </p></b>
    <div class="mb-3">
            <label for="InputEmail1" class="form-label">Name</label>
            <div id="uname_response" ></div>
            <input type="text" class="form-control" id="u_name" name="u_name" aria-describedby="emailHelp" required style="width: 205px" >
            
     </div>
     <div class="mb-3">
            <label for="InputEmail1" class="form-label">Subject</label>
            <div id="uname_response" ></div>
            <input type="text" class="form-control" id="fd_sub" name="fd_sub" aria-describedby="emailHelp" required style="width: 205px" >
            
     </div>
     <div class="mb-3">
            <label for="InputEmail1" class="form-label">Message</label>
            <div id="uname_response" ></div>
            <input type="text" class="form-control" id="fd_desc" name="fd_desc" aria-describedby="emailHelp" required style="width: 205px" >
            <br></br><button type="submit" class="btn btn-success" name="submit">Submit</button>
     </div>
        </form>

</center>
<!-- <script>
  function validate(){
  var name  = document.getElementById('Name').value;
  var email  = document.getElementById('email').value;
  var phoneNumber = document.getElementById('phone-number').value;


 
  var nameRGEX=/^[a-zA-Z ]{2,30}$/;
  var emailRGEX=/^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
  var phoneRGEX = /^[(]{0,1}[0-9]{3}[)]{0,1}[-\s\.]{0,1}[0-9]{3}[-\s\.]{0,1}[0-9]{4}$/;


 
  var nameResult = nameRGEX.test(name);
  var emailResult = emailRGEX.test(email);
  var phoneResult = phoneRGEX.test(phoneNumber);

 
 
  if(nameResult == false)
  {
    alert('Please enter a alphabets');
    return false;
  }
  if(emailResult == false)
  {
    alert('Please enter a valid email address');
    return false;
  }
  if(phoneResult == false)
  {
    alert('Please enter a valid phone number');
    return false;
  }
  return true;
}
$(document).ready(function(){
        $('#btnsmt').click(function(){
            alert("form submitted");
        });
    });
</script> -->
</div>
    </body>
  </head>
</html>