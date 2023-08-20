<?php
$conn = mysqli_connect("localhost", "root", "", "cravory");

if(isset($_POST['username'])){
   $username = mysqli_real_escape_string($conn,$_POST['username']);
   $query = "select count(*) as cntUser from user_credential_reg where u_name='".$username."'";

   $result = mysqli_query($conn,$query);
   $response = "<span style='color: green;'>Available.</span>";
   if(mysqli_num_rows($result)){
      $row = mysqli_fetch_array($result);

      $count = $row['cntUser'];
    
      if($count > 0){
          $response = "<span style='color: red;'>Not Available.</span>";
      }
   
   }

   echo $response;
   die;
}
?>