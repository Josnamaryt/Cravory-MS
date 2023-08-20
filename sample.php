<?php
    session_start();
?>
 <?php 
    $conn = mysqli_connect("localhost", "root", "", "cravory");
    $pkey=$_SESSION['userid'];
    $return_reg_details="SELECT * FROM `registration` WHERE pkey='$pkey'" ;
    $re=mysqli_query($conn,$return_reg_details);
    if($re){
        $row = mysqli_fetch_array($re);
        //profile image
        $userimage=$row['userimg'];
    }
    else{
        echo"error finding details";
    } 
    if(isset($_POST['logout'])){
        session_destroy();
        header("location:c_login.php");
    }
    if(isset($_POST['change'])){
        $ch_user=$_POST['user_ch'];
        $ch_email=$_POST['email_ch'];
        $ch_adm=$_POST['adm_ch'];
        $ch_addr=$_POST['address_ch']; 
        $ch_Phone=$_POST['Phone_ch']; 
         
        $upd_reg="UPDATE `registration` SET `Username`='$ch_user',`Email`='$ch_email',`address`='$ch_addr',`Phone`='$ch_Phone', WHERE pkey='$pkey'";
        $up_reg=mysqli_query($conn,$upd_reg);
        $upd_log= "UPDATE `logincred` SET `username`='$ch_user' WHERE fkey='$pkey'";
        $up_log=mysqli_query($conn,$upd_log);

        if($upd_reg || $upd_log){
            ?><div class="alert alert-success" role="alert">
                   User details updated successfully !
            </div> <?php
        }
    }
    ?>

 
 <!-- //html page---------------------------------------------------------------->

<html>
    <head> 
        <title> cake shop </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


        <script>
            $(document).ready(function(){

            $("#username").keyup(function(){

            var username = $(this).val().trim();

            if(username != ''){

                    $.ajax({
                    url: 'userexist.php',
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
        <style>
            .navbar{
                background-color: #D8BFD8;
            }
        </style>
    </head>
    <body background="ac2.jpg" style="background-size: cover;">
        <form action="" method="POST">
            <nav class="navbar navbar-expand-lg navbar-custom">
                <div class="container-fluid">
                   
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="userorder.php"><b>Products</a></b>
                                </li>
                    



                            </ul>
                        </div>
                        <img class="prfile_image" src="./uploads/<?php echo $userimage;?>" alt="Logo" style="width: 51;  border-radius: 50%;transition: transform .5s;transform: scale(1);margin-right: 4px;"> 
                        <button type="button" class="btn btn-outline-secondary" data-bs-toggle="collapse" data-bs-target="#collapseWidth" aria-expanded="false" aria-controls="collapseWidth"><b><?php echo $row['Username'] ?></b></button>
                </div>
            </nav>
            <center> <P style="color:#FF69B4;font-family: Lucida calligraphy; font-size: 28px;">  Let us bake your dream cake! 
                        <br></br> 20% OFF on all customized cakes </p></center>
    
<!----------------UPDATE--------------------->

        <div class="modal fade" id="user_details_update" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="user_details_updateLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="user_details_updateLabel">UPDATE USER PROFILE</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body">
           
              <table>  
                  <thead>
                    <tr>
                    <div id="uname_response" ></div>
                    <td><h6>UserName :</td>
                      <td> <input type="text" class="form-control" name="user_ch" id="username"  placeholder="<?php echo $row['Username'] ?>" value="<?php echo $row['Username'] ?>"></td>
                    </tr>
                    </thead>
 
                  <tbody> 
                    <tr>
                      <td> Email : </td>
                      <td> <input type="email" class="form-control" name="email_ch" placeholder="<?php echo $row['Email'] ?>" value="<?php echo $row['Email'] ?>"></td>
                    </tr>
                    <tr>
                      <td> user adm no : </td>
                      <td> <input type="text" class="form-control" name="adm_ch" placeholder="<?php echo $row['pkey'] ?>" value="<?php echo $row['pkey'] ?>"></td>
                    </tr>
                    <tr>
                      <td> Address : </td>
                      <td> <input type="text" class="form-control" name="address_ch" placeholder="<?php echo $row['address'] ?>" value="<?php echo $row['address'] ?>"></td>
                    </tr>
                    <tr>
                      <td> Phone : </td>
                      <td> <input type="text" class="form-control" name="Phone_ch" placeholder="<?php echo $row['Phone'] ?>" value="<?php echo $row['Phone'] ?>"></td>
                    </tr>
                 </tbody>
                  <tfoot>
                    <tr>
                        <td>
                        <br><button type="submit" class="btn btn-outline-success" name="change">Save & change</button> </br>
                            </td> 
                        <td>
                        <br> <button type="button"  class="btn btn-outline-danger" data-bs-dismiss="modal">Cancel</button></br></td>
                        </tr></tfoot>  
               </table>
             </div>
         </div>
       </div>
    </div>
<!-- card -->
            <div style="min-height: 120px;">
                <div class="collapse collapse-horizontal" id="collapseWidth" style="padding-left: 1053px;">
                    <div class="card card-body" style="width: 300px;  margin-top: -129px;">
                        <h6> PROFILE : <?php echo $row['Username'] ?> </h6>
                        <table border=2> 
                            <tr>
                                <td> Username </td>
                                <td> <?php echo $row['Username'] ?> </td>
                            </tr>
                            <tr>
                                <td> Email </td>
                                <td> <?php echo $row['Email'] ?> </td>
                            </tr>
                            <tr>
                                <td> user adm no </td>
                                <td> <?php echo $row['pkey'] ?> </td>
                            </tr>
                            <tr>
                                <td> Address </td>
                                <td> <?php echo $row['address'] ?> </td>
                            </tr> 
                            <tr>
                                <td> Phone </td>
                                <td> <?php echo $row['Phone'] ?> </td>
                            </tr> 
                        </table>
                        <footer> 
                            <table>
                          <tr>
                            <td>
                             <br> <button type="submit" name="logout" class="btn btn-outline-danger">logout</button></br></td>
                            <td> 
                        <br><button type="button" class="btn btn-outline-success"data-bs-toggle="modal" data-bs-target="#user_details_update" >Edit</button> </br>
                            </td> 
                        </tr>
                           </table>
                        </footer>
                    </div>
                </div>
            </div>
        </form>
    </body>
</html>