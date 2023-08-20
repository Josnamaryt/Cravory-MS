<?php

    $conn = mysqli_connect("localhost", "root", "", "cravory");
    ?>
<?php
        if(isset($_POST['categ_btn'])){
             $_SESSION['categ_id']=$_POST['categ_select'];
           ?><script> window.location.href="c_login.php"</script>
       <?php }
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
    </head>

    <body>
        <!-- Topbar Start -->
        <div class="container-fluid px-0 d-none d-lg-block">
            <div class="row gx-0">
                <div class="col-lg-4 text-center bg-secondary py-3">
                    <div class="d-inline-flex align-items-center justify-content-center">
                        <i class="bi bi-envelope fs-1 text-primary me-3"></i>
                        <div class="text-start">
                            <h6 class="text-uppercase mb-1">Email Us</h6>
                            <span>cake@cravory.com</span>
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
                <div class="col-lg-4 text-center bg-secondary py-3">
                    <div class="d-inline-flex align-items-center justify-content-center">
                        <i class="bi bi-phone-vibrate fs-1 text-primary me-3"></i>
                        <div class="text-start">
                            <h6 class="text-uppercase mb-1">Call Us</h6>
                            <span>+ 9632580147</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Topbar End -->


        <!-- Navbar Start -->
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark shadow-sm py-3 py-lg-0 px-3 px-lg-0">
            <a href="index.html" class="navbar-brand d-block d-lg-none">
                <h1 class="m-0 text-uppercase text-white"><i class="fa fa-birthday-cake fs-1 text-primary me-3"></i>Cravory</h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                
            </div>
        </nav>
        <!-- Navbar End -->


        <!-- Hero Start -->
        <div class="container-fluid bg-primary py-5 mb-5 hero-header">
            <div class="container py-5">
                <div class="row justify-content-start">
                    <div class="col-lg-8 text-center text-lg-start">
                        <h1 class="font-secondary text-primary mb-4">Super Creamy</h1>
                        <h1 class="display-1 text-uppercase text-white mb-4">Cakes</h1>
                        <h1 class="text-uppercase text-white">The Best Cakes @ cravory</h1>
                        <div class="d-flex align-items-center justify-content-center justify-content-lg-start pt-5">
                            <a href="c_login.php" class="btn btn-primary border-inner py-3 px-5 me-5">Login</a>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero End -->


        <!-- Video Modal Start -->
        <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Youtube Video</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- 16:9 aspect ratio -->
                        <div class="ratio ratio-16x9">
                            <iframe class="embed-responsive-item" src="" id="video" allowfullscreen allowscriptaccess="always"
                                allow="autoplay"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Video Modal End -->


        <!-- About Start -->
        <div class="container-fluid pt-5">
            <div class="container">
                <div class="section-title position-relative text-center mx-auto mb-5 pb-3" style="max-width: 600px;">
                    <h2 class="text-primary font-secondary">About Us</h2>
                    <h1 class="display-4 text-uppercase">Welcome To Cravory</h1>
                </div>
                <div class="row gx-5">
                    <div class="col-lg-5 mb-5 mb-lg-0" style="min-height: 400px;">
                        <div class="position-relative h-100">
                            <img class="position-absolute w-100 h-100" src="img/about.jpg" style="object-fit: cover;">
                        </div>
                    </div>
                    <div class="col-lg-6 pb-5">
                        <p class="mb-4">Cravory offers customized cakes for special occasions such as birthdays, weddings, and other events. Customers can choose the flavor, design, and size of their cake, and the shop's skilled bakers will create a unique and personalized cake for them.</p>
                        
                        <div class="row g-5">
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center justify-content-center bg-primary border-inner mb-4" style="width: 90px; height: 90px;">
                                    <i class="fa fa-heartbeat fa-2x text-white"></i>
                                </div>
                                <h4 class="text-uppercase">100% Healthy</h4>
                               
                            </div>
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center justify-content-center bg-primary border-inner mb-4" style="width: 90px; height: 90px;">
                                    <i class="fa fa-award fa-2x text-white"></i>
                                </div>
                                <h4 class="text-uppercase">Award Winning</h4>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->
      

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
                            <p>Cream cakes are a type of pastry that consists of a light, fluffy sponge cake filled with whipped cream and often topped with fresh fruit or other toppings. They are popular dessert items  </p>
                           
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="bg-primary border-inner text-center text-white p-5">
                            <h4 class="text-uppercase mb-3">Custom Cake</h4>
                            <p>Custom cakes are cakes that are designed and created to meet specific requirements of the customer. They are often made for special occasions such as celebrations </p>
                            
                        </div>
                    </div>
                
                </div>
            </div>
        </div>
        <!-- Service Start -->



        <!-- Offer Start -->
        <div class="container-fluid bg-offer my-5 py-5">
            <div class="container py-5">
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-7 text-center">
                        <div class="section-title position-relative text-center mx-auto mb-4 pb-3" style="max-width: 600px;">
                            <h2 class="text-primary font-secondary">Special Kombo Pack</h2>
                            <h1 class="display-4 text-uppercase text-white">Super Crispy Cakes</h1>
                        </div>
                        
                      
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- Offer End -->
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
                                    <p class="mb-0">+ 9632580147</p>
                                </div>
                                
                            </div>
                           
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid text-secondary py-4" style="background: #111111;">
            <div class="container text-center">
                <p class="mb-0">&copy; <a class="text-white border-bottom" href="#"></a>. The cravory <a class="text-white border-bottom" href="https://htmlcodex.com"></a></p>
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
