<?php
session_start();
$skey = $_SESSION['key'];
$conn = mysqli_connect("localhost", "root", "", "cravory");
?>
<!-- Add product -->
<?php
    if (isset($_POST['add-prd_btn'])){ 
        $d_id   = $_POST['pro_dealer'];
        $p_name = $_POST['prod_name'];
       
        $p_quant= $_POST['add_quantity'];
        $p_price= $_POST['pro_price'];

        $add_pro_query="INSERT INTO `product`(`d_id`, `p_name`,  `p_quant`, `p_price`, `p_status`) VALUES ('$d_id','$p_name','$p_quant','$p_price','1')";
        $add_pro_result=mysqli_query($conn,$add_pro_query);
        if($add_pro_result){
            ?> <script>alert("Product registered successfully"); </script><?php 
        }
    }

?>
<!-- Add dealer -->
<?php
    if (isset($_POST['reg_deal_btn'])){ 
        $deal_name = $_POST['add_dealname'];
        $deal_co= $_POST['add_deal_co'];

        $add_deal_query="INSERT INTO `dealer`( `d_name`, `d_staus`, `d_co`) VALUES ('$deal_name','1','$deal_co')";
        $add_deal_result=mysqli_query($conn,$add_deal_query);
        if($add_deal_result){
            ?> <script>alert("successfully registered dealer"); </script><?php 
        }
    }

?>
<!-- Add category -->
<?php
    if (isset($_POST['add_cat_btn'])){ 
        $cat_name = $_POST['add_catname'];
        $cat_type= $_POST['add_cattype'];

        $add_cat_query="INSERT INTO `product_categ`( `p_categ_name`, `p_categ_type`) VALUES ('$cat_name','$cat_type')";
        $add_cat_result=mysqli_query($conn,$add_cat_query);
        if($add_cat_result){
            ?> <script>alert("successfully registered category"); </script><?php 
        }
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
<script>
            if ( window.history.replaceState ) {
                window.history.replaceState( null, null, window.location.href );
            }
        </script>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin </title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/feather/feather.css">
    <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/typicons/typicons.css">
    <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>
    <form method="POST">
        <div class="container-scroller">
            <div class="row p-0 m-0 proBanner" id="proBanner">
                <div class="col-md-12 p-0 m-0"> 
                    </div>
                </div>
            </div>
            <!-- List available Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="disp_pro">Available Products</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <select class="custom-select" id="disp_pro" name="pro_cat">
                                <?php
                                $list_prod_query = "SELECT * FROM `product`";
                                $res_pro = mysqli_query($conn, $list_prod_query);
                                while ($pro_list = mysqli_fetch_array($res_pro)) {
                                ?>
                                    <option value="<?php $pro_list['p_id']; ?>">
                                        <?php echo $pro_list['p_name']; ?>
                                        <?php echo $pro_list['p_quant']; ?>
                                        <?php echo $pro_list['p_price']; ?>
                                        <?php echo $pro_list['p_reg_date']; ?>
                                    </option>

                                    <?php
                                }
                                ?>
                                </select>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- add product modal -->
            <div class="modal fade" id="addproModalLabel" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="addproModalLabel">Add Products</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default"><b>product name</b></span>
                                </div>
                                <input type="text" name="prod_name" class="form-control" aria-label="Default"
                                    aria-describedby="inputGroup-sizing-default">
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Quantity</span>
                                </div>
                                <input type="number" name="add_quantity" class="form-control" aria-label="Default"
                                    aria-describedby="inputGroup-sizing-default">
                            </div>


                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="pro_cat">Category</label>
                                </div>

                                <select class="custom-select" id="pro_cat" name="pro_cat">
                                <?php
                                $list_prod_cat_query = "SELECT * FROM `product_categ`";
                                $res_cat = mysqli_query($conn, $list_prod_cat_query);
                                while ($cat_list = mysqli_fetch_array($res_cat)) {
                                ?>
                                    <option value="<?php $cat_list['p_cat_id']; ?>">
                                        <?php echo $cat_list['p_categ_name']; ?>
                                    </option>

                                    <?php
                                }
                                ?>
                                </select>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Price</span>
                                </div>
                                <input type="number" class="form-control" name="pro_price"
                                    aria-label="Amount (to the nearest rupees)">

                                <div class="input-group-append">
                                    <span class="input-group-text">.00</span>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="pro_dealer">Dealer</label>
                                </div>
                                <select class="custom-select" id="pro_dealer" name="pro_dealer">
                                    <?php
                                $list_deal_query = "SELECT * FROM `dealer`";
                                $res_deal = mysqli_query($conn, $list_deal_query);
                                while ($deal_list = mysqli_fetch_array($res_deal)) {
                                ?>
                                    <option value="<?php $deal_list['d_id']; ?>"> <?php echo $deal_list['d_name']; ?>
                                    </option>

                                    <?php
                                }
                                ?>

                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="add-prd_btn" class="btn btn-outline-success">Success</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- add category -->
            <div class="modal fade" id="addcatModalLabel" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="addcatModalLabel">Add category</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Product category
                                        name</span>
                                </div>
                                <input type="text" name="add_catname" class="form-control" aria-label="Default"
                                    aria-describedby="inputGroup-sizing-default">
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Product category
                                        type</span>
                                </div>
                                <input type="text" name="add_cattype" class="form-control" aria-label="Default"
                                    aria-describedby="inputGroup-sizing-default">
                            </div>

                            <div class="modal-footer">
                                <button type="submit" name="add_cat_btn" class="btn btn-outline-success">Add</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- add dealer -->
            <div class="modal fade" id="adddealModalLabel" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="adddealModalLabel">Add Dealer</h1>
                        </div>

                        <div class="modal-body">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Dealer name</span>
                                </div>
                                <input type="text" name="add_dealname" class="form-control" aria-label="Default"
                                    aria-describedby="inputGroup-sizing-default">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default">company</span>
                                </div>
                                <input type="text" name="add_deal_co" class="form-control" aria-label="Default"
                                    aria-describedby="inputGroup-sizing-default">
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-outline-success" name="reg_deal_btn">Confirm and Register</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- partial:partials/_navbar.html --> 
        <nav class="navbar-custom navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
                <div class="me-3">
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button"
                        data-bs-toggle="minimize">
                        <span class="icon-menu"></span>
                    </button>
                </div>
                <div>
                    <a class="navbar-brand brand-logo" href="index.html">
                        <p><b>The Cravory</b></p>
                    </a>
                    <a class="navbar-brand brand-logo-mini" href="index.html">
                        <img src="images/logo-mini.svg" alt="logo" />
                    </a>
                </div>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-top">
                <ul class="navbar-nav">
                    <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
                        <h1 class="welcome-text">Hello admin, <span class="text-black fw-bold"></span></h1>
                        <h3 class="welcome-sub-text"> </h3>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown d-none d-lg-block">
                    </li>
                    <li class="nav-item d-none d-lg-block">
                        <div id="datepicker-popup" class="input-group date datepicker navbar-date-picker">
                            <span class="input-group-addon input-group-prepend border-right">
                                <span class="icon-calendar input-group-text calendar-icon"></span>
                            </span>
                            <input type="text" class="form-control">
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link count-indicator" id="notificationDropdown" href="#"
                            data-bs-toggle="dropdown">
                            <i class="icon-mail icon-lg"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0"
                            aria-labelledby="notificationDropdown">
                            <a class="dropdown-item py-3 border-bottom">
                                <p class="mb-0 font-weight-medium float-left">You have 4 new notifications </p>
                                <span class="badge badge-pill badge-primary float-right">View all</span>
                            </a>
                            <a class="dropdown-item preview-item py-3">
                                <div class="preview-thumbnail">
                                    <i class="mdi mdi-alert m-auto text-primary"></i>
                                </div>
                                <div class="preview-item-content">
                                    <h6 class="preview-subject fw-normal text-dark mb-1">Application Error</h6>
                                    <p class="fw-light small-text mb-0"> Just now </p>
                                </div>
                            </a>
                            <a class="dropdown-item preview-item py-3">
                                <div class="preview-thumbnail">
                                    <i class="mdi mdi-settings m-auto text-primary"></i>
                                </div>
                                <div class="preview-item-content">
                                    <h6 class="preview-subject fw-normal text-dark mb-1">Settings</h6>
                                    <p class="fw-light small-text mb-0"> Private message </p>
                                </div>
                            </a>
                            <a class="dropdown-item preview-item py-3">
                                <div class="preview-thumbnail">
                                    <i class="mdi mdi-airballoon m-auto text-primary"></i>
                                </div>
                                <div class="preview-item-content">
                                    <h6 class="preview-subject fw-normal text-dark mb-1">New user registration</h6>
                                    <p class="fw-light small-text mb-0"> 2 days ago </p>
                                </div>
                            </a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link count-indicator" id="countDropdown" href="#" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="icon-bell"></i>
                            <span class="count"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0"
                            aria-labelledby="countDropdown">
                            <a class="dropdown-item py-3">
                                <p class="mb-0 font-weight-medium float-left">You have 7 unread mails </p>
                                <span class="badge badge-pill badge-primary float-right">View all</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <img src="images/faces/face10.jpg" alt="image" class="img-sm profile-pic">
                                </div>
                                <div class="preview-item-content flex-grow py-2">
                                    <p class="preview-subject ellipsis font-weight-medium text-dark">Marian Garner </p>
                                    <p class="fw-light small-text mb-0"> The meeting is cancelled </p>
                                </div>
                            </a>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <img src="images/faces/face12.jpg" alt="image" class="img-sm profile-pic">
                                </div>
                                <div class="preview-item-content flex-grow py-2">
                                    <p class="preview-subject ellipsis font-weight-medium text-dark">David Grey </p>
                                    <p class="fw-light small-text mb-0"> The meeting is cancelled </p>
                                </div>
                            </a>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <img src="images/faces/face1.jpg" alt="image" class="img-sm profile-pic">
                                </div>
                                <div class="preview-item-content flex-grow py-2">
                                    <p class="preview-subject ellipsis font-weight-medium text-dark">Travis Jenkins </p>
                                    <p class="fw-light small-text mb-0"> The meeting is cancelled </p>
                                </div>
                            </a>
                        </div>
                    </li>
                    <li class="nav-item dropdown d-none d-lg-block user-dropdown">
                        <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                            <img class="img-xs rounded-circle" src="images/faces/face8.jpg" alt="Profile image"> </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                            <div class="dropdown-header text-center">
                                <?php
                                $query = "SELECT * FROM `user_credential_reg` WHERE `u_name`='$skey'";
                                $res = mysqli_query($conn, $query);
                                while ($row = mysqli_fetch_array($res)) {
                                ?>
                                <img class="img-md rounded-circle" src="images/faces/face8.jpg" alt="Profile image">
                                <p class="mb-1 mt-3 font-weight-semibold">
                                    <?php echo ($skey) ?>
                                </p>
                                <p class="fw-light text-muted mb-0">
                                    <?php echo $row['u_mail']; ?>
                                </p>
                                <p class="fw-light text-muted mb-0">
                                    <?php echo $row['u_phone']; ?>
                                </p>
                                <?php
                                }
                                ?>
                            </div>

                        <button type="submit" name="signout" class="btn btn-outline-danger">Signout</button>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-bs-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>

        <!-- partial -->
        
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="admin.php">
                        <i class="mdi mdi-grid-large menu-icon"></i>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item nav-category">Products</li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false"
                        aria-controls="ui-basic">
                        <i class="menu-icon mdi mdi-floor-plan"></i>
                        <span class="menu-title">Products</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-basic">
                        <ul class="nav flex-column sub-menu">

                            <li class="nav-item">
                                <!-- trigger modal -->
                                <button type="button" class="nav-link" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    Available products
                                </button>
                            </li>
                            <button type="button" class="nav-link" data-bs-toggle="modal"
                                data-bs-target="#addproModalLabel">
                                Add products
                            </button>
                </li>

            </ul>
            </div>

            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#form-elements1" aria-expanded="false"
                    aria-controls="form-elements1">
                    <i class="menu-icon mdi mdi-card-text-outline"></i>
                    <span class="menu-title">Category</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="form-elements1">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> </li>
                        <button type="button" class="nav-link" data-bs-toggle="modal"
                            data-bs-target="#addcatModalLabel">
                            Add category
                        </button>
            </li>
            </ul>
            </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#form-elements2" aria-expanded="false"
                    aria-controls="form-elements2">
                    <i class="menu-icon mdi mdi-card-text-outline"></i>
                    <span class="menu-title">Dealer</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="form-elements2">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> </li>
                        <button type="button" class="nav-link" data-bs-toggle="modal"
                            data-bs-target="#adddealModalLabel">
                            Add Dealer
                        </button>
            </li>
            </ul>
            </div>
            </li>


            
            <li class="nav-item nav-category">help</li>
            <li class="nav-item">
                <a class="nav-link" href="http://bootstrapdash.com/demo/star-admin2-free/docs/documentation.html">
                    <i class="menu-icon mdi mdi-file-document"></i>
                    <span class="menu-title">Documentation</span>
                </a>
            </li>
            </ul>
        </nav>
        <div class="table-responsive  mt-1">
            <table class="table select-table">
                <thead>
                    <tr>
                        <th>
                            <div class="form-check form-check-flat mt-0">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" aria-checked="false"><i
                                        class="input-helper"></i></label>
                            </div>
                        </th>
                        <th>Dealers</th>
                        <th>Company</th>
                        <th>Progress</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="form-check form-check-flat mt-0">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" aria-checked="false"><i
                                        class="input-helper"></i></label>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex ">
                                <img src="images/faces/face1.jpg" alt="">
                                <div>
                                    <h6>John Peter</h6>
                                    <p>Head admin</p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <h6>Fruit Bae</h6>
                            <p>Cake cafe</p>
                        </td>
                        <td>
                            <div>
                                <div
                                    class="d-flex justify-content-between align-items-center mb-1 max-width-progress-wrap">
                                    <p class="text-success">82%</p>
                                    <p>95/162</p>
                                </div>
                                <div class="progress progress-md">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 85%"
                                        aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="badge badge-opacity-warning">
                                In progress</div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-check form-check-flat mt-0">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" aria-checked="false"><i
                                        class="input-helper"></i></label>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex">
                                <img src="images/faces/face2.jpg" alt="">
                                <div>
                                    <h6>Andrea Jacob</h6>
                                    <p>Head admin</p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <h6>Cutie pie</h6>
                            <p>Cake parlour</p>
                        </td>
                        <td>
                            <div>
                                <div
                                    class="d-flex justify-content-between align-items-center mb-1 max-width-progress-wrap">
                                    <p class="text-success">75%</p>
                                    <p>85/162</p>
                                </div>
                                <div class="progress progress-md">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 65%"
                                        aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="badge badge-opacity-warning">
                                In progress</div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-check form-check-flat mt-0">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" aria-checked="false"><i
                                        class="input-helper"></i></label>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex">
                                <img src="images/faces/face3.jpg" alt="">
                                <div>
                                    <h6>Kaith Bailey</h6>
                                    <p>Head admin</p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <h6>Meriboy</h6>
                            <p>Icecreams and cakes</p>
                        </td>
                        <td>
                            <div>
                                <div
                                    class="d-flex justify-content-between align-items-center mb-1 max-width-progress-wrap">
                                    <p class="text-success">72%</p>
                                    <p>82/162</p>
                                </div>
                                <div class="progress progress-md">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 38%"
                                        aria-valuenow="38" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="badge badge-opacity-warning">
                                In progress</div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-check form-check-flat mt-0">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" aria-checked="false"><i
                                        class="input-helper"></i></label>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        </div>
        </div>
        </div>
        </div>
        <div class="row flex-grow">
            <div class="col-12 grid-margin stretch-card">
                <div class="card card-rounded">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div>
                                        <h4 class="card-title card-title-dash">Top
                                            Dealers</h4>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <div
                                        class="wrapper d-flex align-items-center justify-content-between py-2 border-bottom">
                                        <div class="d-flex">
                                            <img class="img-sm rounded-10" src="images/faces/face1.jpg" alt="profile">
                                            <div class="wrapper ms-3">
                                                <p class="ms-1 mb-1 fw-bold">John
                                                    Peter - Fruit Bae</p>
                                                <small class="text-muted mb-0">16254
                                                    sales</small>
                                            </div>
                                        </div>
                                        <div class="text-muted text-small">
                                            1h ago
                                        </div>
                                    </div>
                                    <div
                                        class="wrapper d-flex align-items-center justify-content-between py-2 border-bottom">
                                        <div class="d-flex">
                                            <img class="img-sm rounded-10" src="images/faces/face2.jpg" alt="profile">
                                            <div class="wrapper ms-3">
                                                <p class="ms-1 mb-1 fw-bold">Andrea
                                                    Jacob - Cutie pie</p>
                                                <small class="text-muted mb-0">16242
                                                    sales</small>
                                            </div>
                                        </div>
                                        <div class="text-muted text-small">
                                            1h ago
                                        </div>
                                    </div>
                                    <div class="wrapper d-flex align-items-center justify-content-between pt-2">
                                        <div class="d-flex">
                                            <img class="img-sm rounded-10" src="images/faces/face3.jpg" alt="profile">
                                            <div class="wrapper ms-3">
                                                <p class="ms-1 mb-1 fw-bold">Kaith
                                                    Bailey - Meriboy</p>
                                                <small class="text-muted mb-0">14450
                                                    sales</small>
                                            </div>
                                        </div>
                                        <div class="text-muted text-small">
                                            1h ago
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © 2023. The cravory.</span>
        </footer>
        <!-- partial -->
        </div>
        <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
        </div>
        <!-- container-scroller -->

        <!-- plugins:js -->
        <script src="vendors/js/vendor.bundle.base.js"></script>
        <!-- endinject -->
        <!-- Plugin js for this page -->
        <script src="vendors/chart.js/Chart.min.js"></script>
        <script src="vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
        <script src="vendors/progressbar.js/progressbar.min.js"></script>

        <!-- End plugin js for this page -->
        <!-- inject:js -->
        <script src="js/off-canvas.js"></script>
        <script src="js/hoverable-collapse.js"></script>
        <script src="js/template.js"></script>
        <script src="js/settings.js"></script>
        <script src="js/todolist.js"></script>
        <!-- endinject -->
        <!-- Custom js for this page-->
        <script src="js/jquery.cookie.js" type="text/javascript"></script>
        <script src="js/dashboard.js"></script>
        <script src="js/Chart.roundedBarCharts.js"></script>
        <!-- End custom js for this page-->
</form>
</body>

</html>

