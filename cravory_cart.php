<?php
    session_start();
    $cat_id= $_SESSION['categ_id'];
    $conn = mysqli_connect("localhost", "root", "", "cravory");
    $s_key=$_SESSION['key'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <script>
     if ( window.history.replaceState ) {
                window.history.replaceState( null, null, window.location.href );
       }
  </script>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
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
          <style>
              @media (min-width: 1025px) {
              .h-custom {
              height: 100vh !important;
              }
              }

              .number-input input[type="number"] {
              -webkit-appearance: textfield;
              -moz-appearance: textfield;
              appearance: textfield;
              }

              .number-input input[type=number]::-webkit-inner-spin-button,
              .number-input input[type=number]::-webkit-outer-spin-button {
              -webkit-appearance: none;
              }

              .number-input button {
              -webkit-appearance: none;
              background-color: transparent;
              border: none;
              align-items: center;
              justify-content: center;
              cursor: pointer;
              margin: 0;
              position: relative;
              }

              .number-input button:before,
              .number-input button:after {
              display: inline-block;
              position: absolute;
              content: '';
              height: 2px;
              transform: translate(-50%, -50%);
              }

              .number-input button.plus:after {
              transform: translate(-50%, -50%) rotate(90deg);
              }

              .number-input input[type=number] {
              text-align: center;
              }

              .number-input.number-input {
              border: 1px solid #ced4da;
              width: 10rem;
              border-radius: .25rem;
              }

              .number-input.number-input button {
              width: 2.6rem;
              height: .7rem;
              }

              .number-input.number-input button.minus {
              padding-left: 10px;
              }

              .number-input.number-input button:before,
              .number-input.number-input button:after {
              width: .7rem;
              background-color: #495057;
              }

              .number-input.number-input input[type=number] {
              max-width: 4rem;
              padding: .5rem;
              border: 1px solid #ced4da;
              border-width: 0 1px;
              font-size: 1rem;
              height: 2rem;
              color: #495057;
              }

              @media not all and (min-resolution:.001dpcm) {
              @supports (-webkit-appearance: none) and (stroke-color:transparent) {

              .number-input.def-number-input.safari_only button:before,
              .number-input.def-number-input.safari_only button:after {
              margin-top: -.3rem;
              }
              }
              }

              .shopping-cart .def-number-input.number-input {
              border: none;
              }

              .shopping-cart .def-number-input.number-input input[type=number] {
              max-width: 2rem;
              border: none;
              }

              .shopping-cart .def-number-input.number-input input[type=number].black-text,
              .shopping-cart .def-number-input.number-input input.btn.btn-link[type=number],
              .shopping-cart .def-number-input.number-input input.md-toast-close-button[type=number]:hover,
              .shopping-cart .def-number-input.number-input input.md-toast-close-button[type=number]:focus {
              color: #212529 !important;
              }

              .shopping-cart .def-number-input.number-input button {
              width: 1rem;
              }

              .shopping-cart .def-number-input.number-input button:before,
              .shopping-cart .def-number-input.number-input button:after {
              width: .5rem;
              }

              .shopping-cart .def-number-input.number-input button.minus:before,
              .shopping-cart .def-number-input.number-input button.minus:after {
              background-color: #9e9e9e;
              }

              .shopping-cart .def-number-input.number-input button.plus:before,
              .shopping-cart .def-number-input.number-input button.plus:after {
              background-color: #4285f4;
              }
          </style>
</head>
<body>
    
<section class="h-100 h-custom" style="background-color: #eee;">
  <div class="container h-100 py-5">
    <div class="row d-flex justify-content-center align-items-center h-100">
    <div class="col">
      <div class="card shopping-cart" style="border-radius: 15px;">
          <div class="card-body text-black">

            <div class="row">
              <div class="col-lg-6 px-5 py-4">

                <h3 class="mb-5 pt-2 text-center fw-bold text-uppercase">Your products</h3>
              <?php
                $tot_price=0;
                $cart_list_query="SELECT * FROM `cart` WHERE `u_id` = '$s_key' AND `cart_status`='1'";
                $cart_list_res=mysqli_query($conn,$cart_list_query);
                while ($cart_list = mysqli_fetch_array($cart_list_res))
                {
              ?>
                <div class="d-flex align-items-center mb-5">
                  <div class="flex-shrink-0">
                  <?php
                      $pr_name=  $cart_list['p_id'];
                      $fetch_products= "SELECT * FROM `product` WHERE `p_name` = '$pr_name' ";
                      $res_pro = mysqli_query($conn,  $fetch_products);
                      while ($img_list = mysqli_fetch_array($res_pro))
                      {
                  ?>
                    <img src="\The Cravory\dashly-theme.com\product_images\<?php echo $img_list['p_img'];?>"width="100"height="70">
                  </div>
                  <?php }?>
                  <div class="flex-grow-1 ms-3">
                   <form method="POST" >
                      <button type="submit" id="btn_del_pr" name="btn_del_pr" class="float-end text-black"><i class="fas fa-times"></i></button>
                      <input type="hidden" name="p_id" value="<?php echo $cart_list['p_id'];?>"/>
                   </form>
                   <h5 class="text-primary"><?php echo $cart_list['p_id'];?></h5>
                    <h6 style="color: #9e9e9e;"></h6> 
                    <div class="d-flex align-items-center">
                      <p class="fw-bold mb-0 me-5 pe-3"><?php echo $cart_list['cart_price'];?>₹</p>
                      <div class="def-number-input number-input safari_only">
                        <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                          class="minus"></button>
                        <input class="quantity fw-bold text-black" min="0" name="quantity" value="<?php echo $cart_list['cart_quant'];
                          $tot_price=$tot_price+($cart_list['cart_price']*$cart_list['cart_quant']);?>"
                          type="number">
                        <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                          class="plus"></button>
                      </div>
                    </div> 
                  </div>
                </div>
                  <?php }?>
                
                <hr class="mb-4" style="height: 2px; background-color: #1266f1; opacity: 1;">

                <div class="d-flex justify-content-between px-x">
                  <p class="fw-bold">Discount:</p>
                  <p class="fw-bold">40₹ off on delivery</p>
                </div>
                <div class="d-flex justify-content-between p-2 mb-2" style="background-color: #e1f5fe;">
                  <h5 class="fw-bold mb-0">Total: <?php echo $tot_price ?></h5>
                  <h5 class="fw-bold mb-0"><?php ?></h5>
                </div>

              </div>
              <!-- <div class="col-lg-6 px-5 py-4">

                <h3 class="mb-5 pt-2 text-center fw-bold text-uppercase">Payment</h3>

                <form class="mb-5">

                  <div class="form-outline mb-5">
                    <input type="text" id="typeText" class="form-control form-control-lg" siez="17"
                      value="1234 5678 9012 3457" minlength="19" maxlength="19" />
                    <label class="form-label" for="typeText">Card Number</label>
                  </div>

                  <div class="form-outline mb-5">
                    <input type="text" id="typeName" class="form-control form-control-lg" siez="17"
                      value="John Smith" />
                    <label class="form-label" for="typeName">Name on card</label>
                  </div>

                  <div class="row">
                    <div class="col-md-6 mb-5">
                      <div class="form-outline">
                        <input type="text" id="typeExp" class="form-control form-control-lg" value="01/22"
                          size="7" id="exp" minlength="7" maxlength="7" />
                        <label class="form-label" for="typeExp">Expiration</label>
                      </div>
                    </div>
                    <div class="col-md-6 mb-5">
                      <div class="form-outline">
                        <input type="password" id="typeText" class="form-control form-control-lg"
                          value="&#9679;&#9679;&#9679;" size="1" minlength="3" maxlength="3" />
                        <label class="form-label" for="typeText">Cvv</label>
                      </div>
                    </div>
                  </div>

                  <p class="mb-5">Fill the Card details  <a
                      href="#!"><?php echo $s_key?></a></p>

                  <button type="button" class="btn btn-primary btn-block btn-lg">Buy now</button>

                  <h5 class="fw-bold mb-5" style="position: absolute; bottom: 0;">
                    <a href="u_home.php"><i class="fas fa-angle-left me-2"></i>Back to shopping</a>
                  </h5>

                </form>

              </div>
            </div> -->
            <?php
              if(isset($_POST['btn_del_pr'])){
                $d_pid=$_POST['p_id'];
                $dl_cart="DELETE FROM `cart` WHERE `u_id` = '$s_key' AND `p_id` ='$d_pid'";
                $dl_r=mysqli_query($conn,$dl_cart);
                if($dl_r){
                ?>
                  <script>
                    alert("<?php echo $d_pid?> removed from cart")
                    window.location.href="cravory_cart.php"
                  </script>
                <?php
                }
              }
            ?>
            <form method="POST">
              <button type="submit" name="checkout" class="btn btn-primary btn-block btn-lg">Proceed to checkout</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
  <?php
    if(isset($_POST['checkout'])){
        $_SESSION['ordertotal']=$tot_price;
        ?>
        <script>
          window.location.href="payment.php"
        </script>

        <?php
          $p_id=$cart_list['cart_id'];

          $od_q="INSERT INTO `order`( `u_id`, `p_id`, `or_price`, `or_staus`) 
          VALUES ('$s_key','$p_id','$tot_price','1')";
          $od_r=mysqli_query($conn,$od_q);
          if($od_r){
            $rm_cart= "UPDATE `cart` SET `cart_status`='0' WHERE `u_id`='$s_key'";
            $rm_r=mysqli_query($conn,$rm_cart);
          }
           } 
        ?>  
</body>
</html>

