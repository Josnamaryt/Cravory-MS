<?php
    session_start();
    $_SESSION['islogged']=1;
?>
<!doctype html>
    <head>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
      <script type="text/javascript" src="ajax-script.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<title>user login</title>
    </head>

    <style>
  .signup-form form {
    color: #000000;
    border-radius: 3px;
    margin-bottom: 15px;
    width: 500px;
    background: #FFDAB9;
    font-weight: bold;
    box-shadow: 0px 2px 2px rgb(0 0 0 / 30%);
    padding: 20px;
  }
  </style>
    <body background="img/hero.jpg">
        <center><br></br>
        <h2><p style="font-family:Monotype corsiva; margin-top: -5px; font-size: 3rem; color: #FFDAB9;">  Login </h2><br></br></p>
        <div class="signup-form">
        <form method='POST'> 
            
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Username</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="username"aria-describedby="emailHelp" style="width: 205px;">
            
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="userpass" style="width: 205px;">
        </div>
                <tr>
                    <td><input type='submit' name='log_submit'></td>
                  <td><input type='reset' name ='reset'></td></tr>
          </div>
        </form></center>
		<center><a href="c_reg.php">Register Here</a>
    </body>
</html>
<?php
        
 $conn = mysqli_connect("localhost", "root", "", "cravory");

    if(isset($_POST['log_submit'])) {
        $username=$_POST['username'];
        $password=$_POST['userpass'];
        
        $log_query="SELECT * FROM `user_login` WHERE `u_name`='$username' AND `u_pass`='$password' AND `r_id`=2";
        $re=mysqli_query($conn,$log_query);
        $num = mysqli_num_rows($re);

        if($num > 0) {
            $row = mysqli_fetch_array($re);
            $_SESSION['key']=$row['u_name'];
            $_SESSION['log']=TRUE;
            header("location:dashly-theme.com/admin1.php");
            exit();
        }
        else {
    ?>
    <hr>
    <font color="red"><b>
            <h3> <script> alert("Sorry Invalid Username and Password")</script><br></br></h3>
        </b>
    </font>
    <hr>

    <?php
        }
    }
?>



