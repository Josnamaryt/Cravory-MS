<?php
    session_start();
    $cat_id= $_SESSION['categ_id'];
    $conn = mysqli_connect("localhost", "root", "", "cravory");
    $s_key=$_SESSION['key'];
?>
<?php
    if(isset($_POST['add_cart'])){
        $p_id=$_POST['pr_id'];
        $cart_quant=$_POST['pr_quant'];
        $cart_price=$_POST['pr_price'];
        $pr_cart_query="INSERT INTO `cart`( `u_id`, `p_id`, `cart_quant`, `cart_price`, `cart_status`) 
        VALUES ('$s_key','$p_id','$cart_quant','$cart_price','1')";
        $cart_re=mysqli_query($conn,$pr_cart_query);
        if($cart_re){
            ?> <script>alert("product addedd to cart")</script> <?php
        }
    }
?>
<html>
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
        <style>
            body{
                background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
          background-size: 400% 400%;
          animation: gradient 15s ease infinite;
          height: 100vh;
        }

        @keyframes gradient {
          0% {
            background-position: 0% 50%;
          }
          50% {
            background-position: 100% 50%;
          }
          100% {
            background-position: 0% 50%;
          }
            }
            </style>
        <script>
            if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.href);
            }
        </script>
    </head> 
    <body>
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
        
    <div class="col-lg-4 text-center bg-secondary py-3">
                    <div class="d-inline-flex align-items-center justify-content-center">
                     <div class="text-start">
                        <h6 class="text-uppercase mb-1"></h6>
                            <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample" aria-expanded="false" aria-controls="collapseWidthExample">
                            <?php echo($s_key);?></button>
                            <a href="cravory_cart.php" class="btn btn-primary" type="button" >
                            <i class="bi bi-cart"></i></a>
        </div>
        </div>
        </div>
        <?php
            $fetch_products= "SELECT * FROM `product` WHERE `p_cat_id`='$cat_id'";
            $res_pro = mysqli_query($conn,  $fetch_products);
        ?>
        
        <div class="row">
        <?php
       while ($pro_list = mysqli_fetch_array($res_pro))
        {
            

        ?>
            <div class="col-md-3  mt-2">
                <div class="card text-white bg-secondary mb-3" >
                <h5 class="card-title"><p style="font-family:Forte;"><td><img src="\The Cravory\dashly-theme.com\product_images\<?php echo $pro_list['p_img'];?>"width="300"height="170"></td></p></h5>
                        <form method ="POST">
                            <input type="hidden" name="cart_img" value="<?php echo $pro_list['p_img']; ?>">
                            <h5 class="card-title"><p style="font-family:Monotype corsiva;"><?php echo $pro_list['p_name']; ?></p></h5>
                            <input type="hidden" name="pr_id" value="<?php echo $pro_list['p_name']; ?>">
                           
                            <h5 class="card-title"><p style="font-family:Monotype corsiva;">Size: <?php echo $pro_list['p_size']; ?> kg</p></h5>
                            <!-- <input type="hidden" name="cart_size" value="<?php echo $pro_list['p_size']; ?>"> -->
                            <h5 class="card-title"><p style="font-family:Monotype corsiva;">Price: ₹<?php echo $pro_list['p_price']; ?></p></h5>
                            <input type="hidden" name="pr_price" value="<?php echo $pro_list['p_price']; ?>">
                          
                        <div class="card-body">
                        <div class="form-outline">
                        <label class="form-label" for="form16"><p style="color:black">Type quantity:</label></p>
                            <input type="text" id="form16" class="form-control" name="pr_quant" data-mdb-showcounter="true" maxlength="2" />
                            <div class="form-helper"></div>
                        </div>
                        
                        <p class="card-t">
                            <button type="submit" name="add_cart" class="card-link">Add to cart</button></form>
                        </p>
                    </div>
                </div>
            </div>
        <?php 
        }
        ?>
    </div>

    </body>
</html>

