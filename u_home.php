<?php
    session_start();
?>
<?php
    if($_SESSION['islogged']){
?>
<?php

    $conn = mysqli_connect("localhost", "root", "", "cravory");

    $s_key=$_SESSION['key'];
    
    $fetch_query="SELECT * FROM `user_credential_reg` WHERE `u_name`='$s_key'";
    $fetch_result=mysqli_query($conn,$fetch_query);
    $fetch_user_data=mysqli_fetch_array($fetch_result);

    if(isset($_POST['change'])){
        $ch_email=$_POST['email_ch'];
       
        $ch_addr=$_POST['address_ch']; 
        $ch_Phone=$_POST['Phone_ch']; 
        
        $upd_reg="UPDATE `user_credential_reg` SET `u_mail`='$ch_email',`u_adrs`='$ch_addr',`u_phone`='$ch_Phone' WHERE `u_name`='$s_key'";
        $up_reg=mysqli_query($conn,$upd_reg);

        if($upd_reg ){
            ?><div class="alert alert-success" role="alert">
                   User details updated successfully !
            </div> 
            <?php
        }
    }
?>
<!--  feedback -->
<?php
    if(isset($_POST['add_feedb'])){ 
        $feed_sub = $_POST['f_sub'];
        $feed_desc= $_POST['f_desc'];

        $add_feed_query="INSERT INTO `feedback`( `fd_sub`, `fd_desc`,`fd_status`) VALUES ('$feed_sub','$feed_desc','1')";
        $add_feed_result=mysqli_query($conn,$add_feed_query);
        if($add_feed_result){
            ?> <div class="alert alert-success" role="alert">success!!</div> 
     <?php 
        }
    }

?>
<!-- feedback ends -->

    <?php
        if(isset($_POST['categ_btn'])){
             $_SESSION['categ_id']=$_POST['categ_select'];
           ?><script> window.location.href="product_listings.php"</script>
       <?php }
    ?>
    <?php
    if(isset($_POST['logout'])){
        $_SESSION['islogged']=false;
      session_destroy();
      ?>
        <script>
          window.location.href='index1.php';
        </script>
      <?php
    }
    ?>


<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Cakeshop</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Free HTML Templates" name="keywords">
        <meta content="Free HTML Templates" name="description">

        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Oswald:wght@500;600;700&family=Pacifico&display=swap" rel="stylesheet"> 

        <!-- Icon Font Stylesheet -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

        <!-- Customized Bootstrap Stylesheet -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
        <script>
            if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.href);
            }
        </script>
    </head>

    <body>
        <!-- Topbar Start -->
        <div class="container-fluid px-0 d-none d-lg-block">
            <div class="row gx-0">
                <div class="col-lg-4 text-center bg-secondary py-3">
                    <div class="d-inline-flex align-items-center justify-content-center">
                        <i class="bi bi-envelope fs-1 text-primary me-3"></i>
                        <div class="text-start">
                           
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 text-center bg-primary border-inner py-3">
                    <div class="d-inline-flex align-items-center justify-content-center">
                        <a href="index.html" class="navbar-brand">
                            <h1 class="m-0 text-uppercase text-white"><p style="font-family:Monotype corsiva; margin-top: -5px;"><i class="fa fa-birthday-cake fs-1 text-dark me-3"></i>The cravory</h1></p>
                        </a>
                    </div>
                </div>
<!----------------UPDATE--------------------->

<div class="modal fade" id="user_details_update" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="user_details_updateLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="user_details_updateLabel">UPDATE USER PROFILE</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body">
           <form method="POST">
              <table>  
                  <thead>
                    <tr>
                    <div id="uname_response" ></div>
                    <td><h6>Name :</td>
                      <td> <?php echo $fetch_user_data['u_name'] ?></td>
                    </tr>
                    </thead>
 
                  <tbody> 
                    <tr>
                      <td> Email : </td>
                      <td> <input type="email" class="form-control" name="email_ch" placeholder="<?php echo $fetch_user_data['u_mail'] ?>" value="<?php echo $fetch_user_data['u_mail'] ?>"></td>
                    </tr>
                    <tr>
                      <td> Address : </td>
                      <td> <input type="text" class="form-control" name="address_ch" placeholder="<?php echo $fetch_user_data['u_adrs'] ?>" value="<?php echo $fetch_user_data['u_adrs'] ?>"></td>
                    </tr>
                    <tr>
                      <td> Phone : </td>
                      <td> <input type="text" class="form-control" name="Phone_ch" placeholder="<?php echo $fetch_user_data['u_phone'] ?>" value="<?php echo $fetch_user_data['u_phone'] ?>"></td>
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
            </form>
             </div>
         </div>
       </div>
    </div>

<!-- end update -->

<!-- user view -->

                <div class="col-lg-4 text-center bg-secondary py-3">
                    <div class="d-inline-flex align-items-center justify-content-center">
                     <div class="text-start">
                        <h6 class="text-uppercase mb-1"></h6>
                            <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample" aria-expanded="false" aria-controls="collapseWidthExample">
                            <?php echo($s_key);?></button>
                            <a href="cravory_cart.php" class="btn btn-primary" type="button" >
                            <i class="bi bi-cart"></i></a>

        <!-- feedback starts -->
                            
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#addsubcatModalLabel">
                            Feedback
                    </button>
                    <form method="POST">
                    <div class="modal fade" id="addsubcatModalLabel" tabindex="-1" aria-labelledby="exampleModalLabel"aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="addsubcatModalLabel">Feedback</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                    <div class="modal-body">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-default">Subject</span>
                                            </div>
                                            <input type="text" name="f_sub" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
                                            
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">Description</span>
                                                </div>
                                                <input type="text" name="f_desc" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required>
                                             </div>
                                            <div class="modal-footer">
                                                <button type="submit" name="add_feedb" class="btn btn-outline-success">Submit</button>
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                            </div>
                         </div>
                     </div>
                </div>
        </form>
         <!-- feedback ends  -->

                            <div class="collapse collapse-horizontal" id="collapseWidthExample" style="z-index: 12; position: fixed;">
                                <div class="card card-body" style="width: 300px;">
                                <div class="card-body">
                                <table border=2> 
                                        <tr>
                                            <td> Name:   </td>
                                            <td> <?php echo $fetch_user_data['u_name'] ?> </td>
                                        </tr>
                                        <tr>
                                            <td> Email:  </td>
                                            <td> <?php echo $fetch_user_data['u_mail'] ?> </td>
                                        </tr>
                                        <tr>
                                            <td> Address:  </td>
                                            <td> <?php echo $fetch_user_data['u_adrs'] ?> </td>
                                        </tr>
                                        <tr>
                                            <td> Phone:  </td>
                                            <td> <?php echo $fetch_user_data['u_phone'] ?> </td>
                                        </tr>
                                    </table>
                                    
                                    <table>
                                        <tr>
                                            <td>
                                            <form method="POST"><br><button type="submit" name="logout" class="btn btn-outline-danger">logout</button></form></br></td>
                                            <td> 
                                                <br><button type="button" class="btn btn-outline-success"data-bs-toggle="modal" data-bs-target="#user_details_update" style="margin-top: -28px;">Edit</button> </br>
                                            </td> 
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            </div>
  
                      
                    </div>
                </div>
            </div>
        </div>
        <!-- user view End -->

        <!-- Hero Start -->
        <div class="container-fluid bg-primary py-5 mb-5 hero-header">
            <div class="container py-5">
                <div class="row justify-content-start">
                    <div class="col-lg-8 text-center text-lg-start">
                        <h1 class="font-secondary text-primary mb-4">Super Creamy</h1>
                        <h1 class="display-1 text-uppercase text-white mb-4">Cravory</h1>
                        <h1 class="text-uppercase text-white">The Best Cakes @ cravory</h1>
                        <div class="d-flex align-items-center justify-content-center justify-content-lg-start pt-5">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero End -->
        <!-- About Start -->
        <div class="container-fluid pt-5">
            <div class="container">
                <div class="section-title position-relative text-center mx-auto mb-5 pb-3" style="max-width: 600px;">
                    <h2 class="text-primary font-secondary">About Us</h2>
                    <h1 class="display-4 text-uppercase">Welcome To Cravory</h1>
                </div>
               
            </div>
        </div>
        <!-- About End -->

<!-- cake categoryview -->

<?php
    $list_prod_cat_query = "SELECT * FROM `product_categ`";
    $res_cat = mysqli_query($conn, $list_prod_cat_query);
 ?>
<div class="row">
        <?php
       while ($cat_list = mysqli_fetch_array($res_cat))
        {
            

        ?>
            <div class="col-md-3  mt-2">
                <div class="card">
                <h5 class="card-title">
                         <p class="card-text"><p style="font-family:Times New Roman;"><td><img src="\The Cravory\dashly-theme.com\product_images\<?php echo $cat_list['categ_img'];?>"width="300"height="270"></td></p></p> 
                        </h5>
                         <h5 class="card-title"><p style="font-family:Monotype corsiva;"><?php echo $cat_list['p_categ_name']; ?></p></h5>
                         <form method ="POST"><input type="hidden" name="categ_select" value="<?php echo $cat_list['p_cat_id']; ?>">
                    <div class="card-body">
                        
                        
                        <p class="card-t">
                            <button type="submit" name="categ_btn" class="card-link">Explore more</button></form>
                        </p>
                    </div>
                </div>
            </div>
        <?php 
        }
        ?>
    </div>
        

<!-- Cake view End -->
        <!-- Service Start -->
        <div class="container-fluid service position-relative px-5 mt-5" style="margin-bottom: 135px;">
            <div class="container">
                <div class="row g-5">
                    <div class="col-lg-4 col-md-6">
                        <div class="bg-primary border-inner text-center text-white p-5">
                            <h4 class="text-uppercase mb-3">Fruit Cake</h4>
                            <p>Fruit cake is a type of cake that is made with chopped or dried fruits, nuts, and spices. It is a dense, moist cake that is typically served during the holiday seasons</p>
                            
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="bg-primary border-inner text-center text-white p-5">
                            <h4 class="text-uppercase mb-3">Cream Cake</h4>
                            <p>Cream cakes are a type of pastry that consists of a light, fluffy sponge cake filled with whipped cream and often topped with fresh fruit or other toppings. They are popular dessert items</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="bg-primary border-inner text-center text-white p-5">
                            <h4 class="text-uppercase mb-3">Custom Cake</h4>
                            <p>Custom cakes are cakes that are designed and created to meet specific requirements of the customer. They are often made for special occasions such as celebrations</p>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-6 text-center">
                        <h1 class="text-uppercase text-light mb-4">30% Discount For This Summer</h1>
                    </div>
                </div>
            </div>
        </div>
        <!-- Service Start -->

        <!-- Footer Start -->
        <div class="container-fluid bg-img text-secondary" style="margin-top: 90px">
            <div class="container">
                <div class="row gx-5">
                    <div class="col-lg-4 col-md-6 mb-lg-n5">
                        <div class="d-flex flex-column align-items-center justify-content-center text-center h-100 bg-primary border-inner p-4">
                            <a href="index.html" class="navbar-brand">
                                <h1 class="m-0 text-uppercase text-white"><i class="fa fa-birthday-cake fs-1 text-dark me-3"></i>Cravory</h1>
                            </a>
                            <p class="mt-3">Cravory specializes in crafting unique and delicious cakes that are perfect for any occasion. This is known for its wide variety of cake flavors, ranging from classic vanilla and chocolate to more exotic options like lavender honey and chai latte.</p>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-6">
                        <div class="row gx-5">
                            <div class="col-lg-4 col-md-12 pt-5 mb-5">
                                <h4 class="text-primary text-uppercase mb-4">Get In Touch</h4>
                                
                                <div class="d-flex mb-2">
                                    <i class="bi bi-envelope-open text-primary me-2"></i>
                                    <p class="mb-0">cake@cravory.com</p>
                                </div>
                                <div class="d-flex mb-2">
                                    <i class="bi bi-telephone text-primary me-2"></i>
                                    <p class="mb-0">+9632580147</p>
                                </div>
                                
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-primary border-inner py-3 fs-4 back-to-top"><i class="bi bi-arrow-up"></i></a>


        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>
        <script src="lib/counterup/counterup.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>

        <!-- Template Javascript -->
        <script src="js/main.js"></script>
    </body>

</html>
<?php
   }
   else {
    ?>
    <script>
      window.location.href='index1.php';
    </script>
  <?php
   }
?>