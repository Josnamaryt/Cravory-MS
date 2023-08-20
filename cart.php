<?php
session_start();
if (!isset($_SESSION['id'])) {
	header('location:./');
}
$id=$_SESSION['id'];
$con = mysqli_connect("localhost", "root", "", "flower_shop");
$query = "select * from tbl_cart where user_id='$id'";
$re = mysqli_query($con, $query);
$count = mysqli_num_rows($re);
?>
<!doctype html>
<html class="no-js" lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>E-FloraAura - Flower Shop HTML5 Template</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico">

    <!-- CSS
	============================================ -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="assets/css/vendor/font.awesome.min.css">
    <!-- Linear Icons CSS -->
    <link rel="stylesheet" href="assets/css/vendor/linearicons.min.css">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="assets/css/plugins/swiper-bundle.min.css">
    <!-- Animation CSS -->
    <link rel="stylesheet" href="assets/css/plugins/animate.min.css">
    <!-- Jquery ui CSS -->
    <link rel="stylesheet" href="assets/css/plugins/jquery-ui.min.css">
    <!-- Nice Select CSS -->
    <link rel="stylesheet" href="assets/css/plugins/nice-select.min.css">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="assets/css/plugins/magnific-popup.css">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>

 <!--Header area starts here-->
 <?php
    require('header.php');
    ?>
    <!--Header area ends here-->
    <!-- Breadcrumb Area Start Here -->
    <div class="breadcrumbs-area position-relative">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="breadcrumb-content position-relative section-content">
                        <h3 class="title-3">Shopping Cart</h3>
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li>Shopping Cart</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End Here -->
    <?php
	if ($count > 0) {
	?>
    <!-- cart main wrapper start -->
    <div class="cart-main-wrapper mt-no-text">
        <div class="container custom-area">
            <div class="row">
                <div class="col-lg-12 col-custom">
                    <!-- Cart Table Area -->
                    <div class="cart-table table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="pro-thumbnail">Image</th>
                                    <th class="pro-title">Product</th>
                                    <th class="pro-price">Price</th>
                                    <th class="pro-quantity">Quantity</th>
                                    <th class="pro-subtotal">Total</th>
                                    <th class="pro-remove">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $total=0;
                                while($cart=mysqli_fetch_array($re))
                                {
                                    $total=$total+($cart['cart_price']*$cart['cart_qnt']);
                                    $pid=$cart['flower_id'];
                                    $pq="select * from tbl_flowers where flower_id='$pid'";
                                    $pre=mysqli_query($con,$pq);
                                    $prod=mysqli_fetch_array($pre);
                                ?>
                                <tr>
                                    <td class="pro-thumbnail"><a href="product-details.php?fid=<?php echo $cart['flower_id']; ?>"><img class="img-fluid" src="assets/images/product/<?php echo $prod['images']; ?>" alt="Product" /></a></td>
                                    <td class="pro-title"><a href="#"><?php echo $prod['flower_name']; ?></a></td>
                                    <td class="pro-price"><span>₹<?php echo $cart['cart_price'];?></span></td>
                                    <td class="pro-quantity1">
                                                <a href="editcartminus.php?pid=<?php echo $cart['flower_id']; ?>"><i class="fa fa-minus"></i></a>
                                                &nbsp;&nbsp;<?php echo $cart['cart_qnt']; ?>&nbsp;&nbsp;
                                                <a href="editcartplus.php?pid=<?php echo $cart['flower_id']; ?>"><i class="fa fa-plus"></i></a>
                                    </td>
                                    <td class="pro-subtotal"><span><?php echo($cart['cart_price']*$cart['cart_qnt']); ?></span></td>
                                    <td class="pro-remove"><a href="deletefromcart.php?cid=<?php echo $cart['cart_id']; ?>"><i class="lnr lnr-trash"></i></a></td>
                                </tr>
                                <?php
    
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- Cart Update Option -->
                    <div class="cart-update-option d-block d-md-flex justify-content-between">
                        <div class="apply-coupon-wrapper">
                            <form action="#" method="post" class=" d-block d-md-flex">
                                <input type="text" placeholder="Enter Your Coupon Code" required />
                                <button class="btn E-FloraAura-button primary-btn rounded-0 black-btn">Apply Coupon</button>
                            </form>
                        </div>
                        <div class="cart-update mt-sm-16">
                            <a href="#" class="btn E-FloraAura-button primary-btn rounded-0 black-btn">Update Cart</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5 ml-auto col-custom">
                    <!-- Cart Calculation Area -->
                    <div class="cart-calculator-wrapper">
                        <div class="cart-calculate-items">
                            <h3>Cart Totals</h3>
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <td>Sub Total</td>
                                        <td>₹<?php echo $total; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Shipping</td>
                                        <td>₹70</td>
                                    </tr>
                                    <tr class="total">
                                        <td>Total</td>
                                        <td class="total-amount">₹<?php echo $total+70; ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <a href="checkout.php" class="btn E-FloraAura-button primary-btn rounded-0 black-btn w-100">Proceed To Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
   <br>
   <br>
   <?php
	} else {
	?>
   <!-- Error 404 Area Start Here -->
   
   <div class="container">
            <div class="row">
                  <div class="col-12">
                    <div class="error_form">
                    <img align="center"src="assets/images/icon/cartempty.gif" style =" height:200px;width:200px; " />
                        <h2>Your Cart is empty</h2>
                        <h3>Add some products first</h3>
                        
                        <a href="shop.php" class="boxed-btn">Back To Product Page</a>
                        
                    </div>
                </div>
            </div>
        </div>
    
    <!-- Error 404 Area End Here -->
	<?php
	}
	?>
    <br><br>
    <!-- cart main wrapper end -->
     <!--Footer Area Start-->
     <?php
       require('footer.php');
    ?>
    <!--Footer Area End-->
 
    <!-- JS
============================================ -->


    <!-- jQuery JS -->
    <script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
    <!-- jQuery Migrate JS -->
    <script src="assets/js/vendor/jquery-migrate-3.3.2.min.js"></script>
    <!-- Modernizer JS -->
    <script src="assets/js/vendor/modernizr-3.7.1.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="assets/js/vendor/bootstrap.bundle.min.js"></script>


    <!-- Swiper Slider JS -->
    <script src="assets/js/plugins/swiper-bundle.min.js"></script>
    <!-- nice select JS -->
    <script src="assets/js/plugins/nice-select.min.js"></script>
    <!-- Ajaxchimpt js -->
    <script src="assets/js/plugins/jquery.ajaxchimp.min.js"></script>
    <!-- Jquery Ui js -->
    <script src="assets/js/plugins/jquery-ui.min.js"></script>
    <!-- Jquery Countdown js -->
    <script src="assets/js/plugins/jquery.countdown.min.js"></script>
    <!-- jquery magnific popup js -->
    <script src="assets/js/plugins/jquery.magnific-popup.min.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>


</body>



</html>