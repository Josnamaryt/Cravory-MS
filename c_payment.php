<?php
session_start();
$total = $_SESSION['ordertotal'];
?>
<html>

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
    <h2 style="padding-top:22%" align="center"><a id="checkoutlink" style="text-decoration:none;" href="checkout.php">Go back to Checkout page</a></h2>
</body>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    var options = {
        "key": "rzp_test_fDY6S1KjjzgQtL", // Enter the Key ID generated from the Dashboard
        "amount": "<?php echo $total ?>00",
        "currency": "INR",
        "description": "E-FloraAura",
        "image": "https://wallpapers.gg/wp-content/uploads/2017/08/Horizon-Of-A-Red-Poppy-Flower-Field-At-Sunset-2560x2560.jpg",
        "handler": function (response) {
            console.log(response);
            alert("Payment successful");
            window.location.href = "orderconfirm.php";
        }
    }
    var rzp1 = new Razorpay(options);
    $(document).ready(function (e) {

        rzp1.open();
        e.preventDefault();
    })
</script>

</html>