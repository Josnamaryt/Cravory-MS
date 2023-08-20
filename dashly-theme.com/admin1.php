<?php
session_start();
?>
<?php
    if($_SESSION['log']){
?>
<?php
    $skey = $_SESSION['key'];
    $conn = mysqli_connect("localhost", "root", "", "cravory");
?>
<!-- Add product -->
<?php
    if (isset($_POST['add-prd_btn'])){
        $d_id   = $_POST['pro_dealer'];
        $p_name = $_POST['prod_name'];
        $p_quant= $_POST['add_quantity'];
        $p_size = $_POST['pro_size'];
        $p_price= $_POST['pro_price'];
        $Mfg_date= $_POST['mfg_date'];
        $Exp_date= $_POST['exp_date'];
        $duration= $_POST['pro_dur'];
        $p_cat_id=$_POST['pro_cat'];
             //-----------product image upload to database----------
       $filename=$_FILES["proimg"]["name"];
       $tempname=$_FILES["proimg"]["tmp_name"];
       $dir="./product_images/".$filename;

       if(move_uploaded_file($tempname,$dir)){
                //  echo "file successfully uploaded";
        }
        else echo"error uploading file";

        //

        $add_pro_query="INSERT INTO `product`(`d_id`, `p_name`, `p_cat_id`, `p_quant`, `p_size`, `p_price`, `p_img`, `p_status`, `Mfg_date`, `Exp_date`, `duration`)
        VALUES('$d_id','$p_name','$p_cat_id','$p_quant','$p_size','$p_price','$filename','1','$Mfg_date','$Exp_date','$duration')";
        $add_pro_result=mysqli_query($conn,$add_pro_query);
        if($add_pro_result){
            ?> <script>alert("Product registered successfully"); </script><?php 
        }

//chamge file location
        if($add_pro_result)
        {
               if(move_uploaded_file($tempname,$dir)){
                    //  echo "file successfully uploaded";
               }
               else echo"error uploading file";
        }
        else{
              // echo"retry";
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
        $sub_categ= $_POST['add_subcateg'];

         //-----------product image upload to database----------
       $filename=$_FILES["catimg"]["name"];
       $tempname=$_FILES["catimg"]["tmp_name"];
       $dir="./product_images/".$filename;

       if(move_uploaded_file($tempname,$dir)){
                //  echo "file successfully uploaded";
        }
        else echo"error uploading file";

        //


        $add_cat_query="INSERT INTO `product_categ`( `p_categ_name`, `sub_categ`,`categ_img`) VALUES ('$cat_name','$sub_categ','$filename')";
        $add_cat_result=mysqli_query($conn,$add_cat_query);
        if($add_cat_result){
            ?> <script>alert("successfully registered category"); </script><?php 
        }
        if($add_cat_result)
        {
               if(move_uploaded_file($tempname,$dir)){
                    //  echo "file successfully uploaded";
               }
               else echo"error uploading file";
        }
        else{
              // echo"retry";
        }
    }

?>
<!-- Add subcategory -->
<?php
    if (isset($_POST['add_sub_cat_btn'])){ 
        $sub_name = $_POST['add_sub_cat_name'];

        $add_sub_cat_query="INSERT INTO `sub_categ`(`sub_name`) VALUES ('$sub_name')";
        $add_sub_result=mysqli_query($conn,$add_sub_cat_query);
        if($add_sub_result){
            ?> <script>alert("successfully added"); </script><?php 
        }
    }

?>


<!DOCTYPE html>
<html lang="en" data-theme="light"  data-sidebar-behaviour="fixed" data-navigation-color="inverted" data-is-fluid="true">
    
<!-- Mirrored from dashly-theme.com/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Feb 2023 07:27:28 GMT -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<script>
            if ( window.history.replaceState ) {
                window.history.replaceState( null, null, window.location.href );
            }
        </script>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta content="Webinning" name="author">
        
            <!-- Theme CSS -->
            <link rel="stylesheet" href="https://dashly-theme.com/assets/css/theme.bundle.css" id="stylesheetLTR">
            <link rel="stylesheet" href="https://dashly-theme.com/assets/css/theme.rtl.bundle.css" id="stylesheetRTL">
        
        <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
        <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&amp;display=swap">
        <link rel="stylesheet" media="print" onload="this.onload=null;this.removeAttribute('media');" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&amp;display=swap">
        
        <!-- no-JS fallback -->
        <noscript>
            <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&amp;display=swap">
        </noscript>
        
        <script>
         // Theme switcher
        
            let themeSwitcher = document.getElementById('themeSwitcher');
        
            const getPreferredTheme = () => {
                if (localStorage.getItem('theme') != null) {
                    return localStorage.getItem('theme');
                }
        
                return document.documentElement.dataset.theme;
            };
        
            const setTheme = function (theme) {
                if (theme === 'auto' && window.matchMedia('(prefers-color-scheme: dark)').matches) {
                    document.documentElement.dataset.theme = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
                } else {
                    document.documentElement.dataset.theme = theme;
                }
        
                localStorage.setItem('theme', theme);
            };
        
            const showActiveTheme = theme => {
                const activeBtn = document.querySelector(`[data-theme-value="${theme}"]`);
        
                document.querySelectorAll('[data-theme-value]').forEach(element => {
                    element.classList.remove('active');
                });
        
                activeBtn && activeBtn.classList.add('active');
        
             // Set button if demo mode is enabled
                document.querySelectorAll('[data-theme-control="theme"]').forEach(element => {
                    if (element.value == theme) {
                        element.checked = true;
                    }
                });
            };
        
            function reloadPage() {
                window.location = window.location.pathname;
            }
        
        
            setTheme(getPreferredTheme());
        
            if(typeof themeSwitcher != 'undefined') {
                window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', e => {
                    if(localStorage.getItem('theme') != null) {
                        if (localStorage.getItem('theme') == 'auto') {
                            reloadPage();
                        }
                    }
                });
        
                window.addEventListener('load', () => {
                    showActiveTheme(getPreferredTheme());
                    
                    document.querySelectorAll('[data-theme-value]').forEach(element => {
                        element.addEventListener('click', () => {
                            const theme = element.getAttribute('data-theme-value');
        
                            localStorage.setItem('theme', theme);
                            reloadPage();
                        })
                    })
                });
            }
        </script>
        <!-- Favicon -->
        <link rel="icon" href="https://dashly-theme.com/assets/favicon/favicon.ico" sizes="any">
        
            <!-- Demo script -->
            <script>
                var themeConfig = {
                    theme: JSON.parse('"light"'),
                    isRTL: JSON.parse('false'),
                    isFluid: JSON.parse('true'),
                    sidebarBehaviour: JSON.parse('"fixed"'),
                    navigationColor: JSON.parse('"inverted"')
                };
                
                var isRTL = localStorage.getItem('isRTL') === 'true',
                    isFluid = localStorage.getItem('isFluid') === 'true',
                    theme = localStorage.getItem('theme'),
                    sidebarSizing = localStorage.getItem('sidebarSizing'),
                    linkLTR = document.getElementById('stylesheetLTR'),
                    linkRTL = document.getElementById('stylesheetRTL'),
                    html = document.documentElement;
        
                if (isRTL) {
                    linkLTR.setAttribute('disabled', '');
                    linkRTL.removeAttribute('disabled');
                    html.setAttribute('dir', 'rtl');
                } else {
                    linkRTL.setAttribute('disabled', '');
                    linkLTR.removeAttribute('disabled');
                    html.removeAttribute('dir');
                }
            </script>
        
        <!-- Page Title -->
        <title>Dashboard | Cravory</title>
    </head>
    
    <body>

            <!-- THEME CONFIGURATION -->
            <script>
                let themeAttrs = document.documentElement.dataset;
            
                for(let attr in themeAttrs) {
                    if(localStorage.getItem(attr) != null) {
                        document.documentElement.dataset[attr] = localStorage.getItem(attr);
            
                        if (theme === 'auto') {
                            document.documentElement.dataset.theme = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
            
                            window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', e => {
                                e.matches ? document.documentElement.dataset.theme = 'dark' : document.documentElement.dataset.theme = 'light';
                            });
                        }
                    }
                }
            </script>

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
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="pro">Available Products</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <table border=2 cellpadding="10"> 
                        <tr>
                                <th> Product Name </th>
                                <th> Product Quantity </th>
                                <th> Product Size(Kg) </th>
                                <th> Product Price </th>
                                <th> Registered Date </th>
                                <th> Manufacturing Date </th>
                                <th> Expiry Date </th>
                                <th> Image </th>
                                <th> Action </th>
                                <th> Status </th>
                        </tr>
                                <?php
                                $list_prod_query = "SELECT * FROM `product`";
                                $res_pro = mysqli_query($conn, $list_prod_query);
                            
                                while ($pro_list = mysqli_fetch_array($res_pro)) {
                                ?>
                           <tr>
                                <td><?php echo $pro_list['p_name']; ?></td>
                                <td><?php echo $pro_list['p_quant']; ?></td>
                                <td><?php echo $pro_list['p_size']; ?></td>
                                <td><?php echo $pro_list['p_price']; ?></td>
                                <td><?php echo $pro_list['p_reg_date']; ?></td>
                                <td><?php echo $pro_list['Mfg_date']; ?></td>
                                <td><?php echo $pro_list['Exp_date']; ?></td>
                                <td><img src="\The Cravory\dashly-theme.com\product_images\<?php echo $pro_list['p_img'];?>"width="40"height="40"></td>
                                <input type="hidden" name="prod_id" value="<?php echo $pro_list['p_id'];?>">
                                <td><button type="submit" name="delete_prod" class="btn btn-outline-danger">Delete</button>
                                
                            <td><center>
                                
                        <p class="text-muted mb-0"><?php 
                          if($pro_list['p_status']==1){
                            echo "<div class='badge rounded-pill text-bg-success' role='alert' style='transform: scale(1.0)'>
                            Active
                          </div>";
                          }
                          elseif($pro_list['p_status']==2){
                            echo "<div class='badge rounded-pill text-bg-warning' role='alert' style='transform: scale(0.7)'>
                            suspended
                          </div>";
                          } 
                          elseif($pro_list['p_status']==3){
                            echo "<div class='badge rounded-pill text-bg-danger' role='alert' style='transform: scale(0.7)'>
                            Removed
                          </div>";
                          }
                          else{ 
                            echo "<div class='spinner-border spinner-border-sm'>
                          </div>";  
                          }
                        ?></p></center>
                      </td>
                            </tr>
                            <?php
                                }
                            ?>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-outline-success">Success</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
            <?php
             $conn = mysqli_connect("localhost", "root", "", "cravory");
                    if(isset($_POST['delete_prod'])){
                    $del_pr_id=$_POST['prod_id'];
                    $del_query="DELETE FROM `product` WHERE `p_id`= $del_pr_id ";
                    $del=mysqli_query($conn,$del_query);
                    if($del){
                        ?> <script>alert("Deleted successfully"); </script><?php 
                    }
                }     
            ?>
      
        <form method="POST" enctype="multipart/form-data">
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
                                    <span class="input-group-text" id="inputGroup-sizing-default">Product name</span>
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
                                    <span class="input-group-text">Size</span>
                                </div>
                                <input type="numerical" class="form-control" name="pro_size"
                                    aria-label="Amount (to the nearest rupees)">

                                <div class="input-group-append">
                                    <span class="input-group-text">kg</span>
                                </div>
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
                                    <option value="<?php echo $cat_list['p_cat_id']; ?>">
                                        <?php echo $cat_list['p_categ_name']; ?>
                                    </option>

                                    <?php
                                }
                                ?>
                                </select>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="add_subcateg">Sub Category</label>
                                </div>

                                <select class="custom-select" id="add_subcateg" name="add_subcateg">
                                <?php
                                $list_sub_cat_query = "SELECT * FROM `sub_categ`";
                                $res_subcat = mysqli_query($conn, $list_sub_cat_query);
                                while ($subcat_list = mysqli_fetch_array($res_subcat)) {
                                ?>
                                    <option value="<?php echo $subcat_list['sub_id']; ?>">
                                        <?php echo $subcat_list['sub_name']; ?>
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
                                <input type="numeric" class="form-control" name="pro_price"
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
                                    <option value="<?php echo $deal_list['d_id']; ?>"> <?php echo $deal_list['d_name']; ?>
                                    </option>

                                    <?php
                                }
                                ?>

                                </select>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Mfg. Date</span>
                                </div>
                                <input type="text" class="form-control" name="mfg_date"
                                    aria-label="Amount (to the nearest rupees)">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Expiry Date</span>
                                </div>
                                <input type="text" class="form-control" name="exp_date"
                                    aria-label="Amount (to the nearest rupees)">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Duration</span>
                                </div>
                                <input type="text" class="form-control" name="pro_dur"
                                    aria-label="Amount (to the nearest rupees)">
                            </div>
                            <div class="input-group mb-3">
	                            <input name="proimg" type="file" id="proimg"
                                    aria-label="Upload Photo">
                            </div>
                        <div class="modal-footer">
                            <button type="submit" name="add-prd_btn" class="btn btn-outline-success">Success</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>

            <!-- Profile view -->
            <div class="modal fade" id="1user_profile_modal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="1user_profile_modal">User profile</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <table border=2 cellpadding="10"> 
                                <tr>
                                        <th> User Name </th>
                                        <th> User Email </th>
                                        
                                        <th> User address </th>
                                        <th> User Phone </th>
                                        <th> Action </th>
                                        <th> Status </th>
                                    
                                </tr>
                                    <?php
                                    $User_view_query = "SELECT * FROM `user_credential_reg`";
                                    $res_user = mysqli_query($conn, $User_view_query);
                                
                                    while ($user_list = mysqli_fetch_array($res_user)) {
                                    ?>
                                <tr>
                                    <td><?php echo $user_list['u_name']; ?></td>
                                    <td><?php echo $user_list['u_mail']; ?></td>
                                
                                    <td><?php echo $user_list['u_adrs']; ?></td>
                                    <td><?php echo $user_list['u_phone']; ?></td>
                                    <input type="hidden" name="u_id" value="<?php echo $user_list['u_id'];?>">
                                    <td><button type="submit" name="userview_delete" class="btn btn-outline-danger">Delete</button>
                                
                                    <td><center>
                                    
                                    <p class="text-muted mb-0"><?php 
                                    if($user_list['u_status']==1){
                                        echo "<div class='badge rounded-pill text-bg-success' role='alert' style='transform: scale(1.0)'>
                                        Active
                                    </div>";
                                    }
                                    elseif($user_list['u_status']==2){
                                        echo "<div class='badge rounded-pill text-bg-warning' role='alert' style='transform: scale(0.7)'>
                                        suspended
                                    </div>";
                                    } 
                                    elseif($user_list['u_status']==3){
                                        echo "<div class='badge rounded-pill text-bg-danger' role='alert' style='transform: scale(0.7)'>
                                        Removed
                                    </div>";
                                    }
                                    else{ 
                                        echo "<div class='spinner-border spinner-border-sm'>
                                    </div>";  
                                    }
                                    ?></p></center>
                                    </td> 
                                </tr>
                                <?php
                                    }
                                ?>
                                </table>
                                </div>


                            <div class="modal-footer">
                                <button type="submit" name="userprofile" class="btn btn-outline-success">Success</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                                <?php
                                    $conn = mysqli_connect("localhost", "root", "", "cravory");
                                    if(isset($_POST['userview_delete'])){
                                    $del_user_id=$_POST['u_id'];
                                    $del_query="DELETE FROM `user_credential_reg` WHERE `u_id`= $del_user_id ";
                                    $del_user=mysqli_query($conn,$del_query);
                                    if($del_user){
                                        ?> <script>alert("Deleted successfully"); </script><?php 
                                    }
                                    }     
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <!-- ----------------------------------------------------------users list ----------------------------------- -->
            <?php
                $conn = mysqli_connect("localhost", "root", "", "cravory");
                if(isset($_POST['userview_delete'])){
                $del_user_id=$_POST['u_id'];
                $del_query="DELETE FROM `user_credential_reg` WHERE `u_id`= $del_user_id ";
                $del_user=mysqli_query($conn,$del_query);
                if($del_user){
                    ?> <script>alert("Deleted successfully"); </script><?php 
                }
                }     
            ?>

            <div class="modal fade" id="user_profile_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog  modal-lg">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Users</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                   
                <div class="modal-body">
                            <table border=2 cellpadding="10"> 
                                <tr>
                                        <th> User Name </th>
                                        <th> User Email </th>
                                        
                                        <th> User address </th>
                                        <th> User Phone </th>
                                        <th> Action </th>
                                        <th> Status </th>
                                    
                                </tr>
                                    <?php
                                    $User_view_query = "SELECT * FROM `user_credential_reg`";
                                    $res_user = mysqli_query($conn, $User_view_query);
                                
                                    while ($user_list = mysqli_fetch_array($res_user)) {
                                    ?>
                                <tr>
                                    <td><?php echo $user_list['u_name']; ?></td>
                                    <td><?php echo $user_list['u_mail']; ?></td>
                                
                                    <td><?php echo $user_list['u_adrs']; ?></td>
                                    <td><?php echo $user_list['u_phone']; ?></td>
                                    <input type="hidden" name="u_id" value="<?php echo $user_list['u_id'];?>">
                                    <td><button type="submit" name="userview_delete" class="btn btn-outline-danger">Delete</button>
                                
                                    <td><center>
                                    
                                    <p class="text-muted mb-0"><?php 
                                    if($user_list['u_status']==1){
                                        echo "<div class='badge rounded-pill text-bg-success' role='alert' style='transform: scale(1.0)'>
                                        Active
                                    </div>";
                                    }
                                    elseif($user_list['u_status']==2){
                                        echo "<div class='badge rounded-pill text-bg-warning' role='alert' style='transform: scale(0.7)'>
                                        suspended
                                    </div>";
                                    } 
                                    elseif($user_list['u_status']==3){
                                        echo "<div class='badge rounded-pill text-bg-danger' role='alert' style='transform: scale(0.7)'>
                                        Removed
                                    </div>";
                                    }
                                    else{ 
                                        echo "<div class='spinner-border spinner-border-sm'>
                                    </div>";  
                                    }
                                    ?></p></center>
                                    </td> 
                                </tr>
                                <?php
                                    }
                                ?>
                                </table>
                                </div>
                </div>
                <div class="modal-footer">
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
                                    <label class="input-group-text" for="add_subcateg">SubCategory</label>
                                </div>

                                <select class="custom-select" id="add_subcateg" name="add_subcateg">
                                <?php
                                $list_sub_cat_query = "SELECT * FROM `sub_categ`";
                                $res_sub = mysqli_query($conn, $list_sub_cat_query);
                                while ($sub_list = mysqli_fetch_array($res_sub)) {
                                ?>
                                    <option value="<?php echo $sub_list['sub_id']; ?>">
                                        <?php echo $sub_list['sub_name']; ?>
                                    </option>

                                    <?php
                                }
                                ?>
                                </select>
                        </div>
                        <div class="input-group mb-3">
	                            <input name="catimg" type="file" id="catimg"
                                    aria-label="Upload Photo">
                            </div>
                            <div class="modal-footer">
                                <button type="submit" name="add_cat_btn" class="btn btn-outline-success">Add</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- add subcategory -->
            <div class="modal fade" id="addsubcatModalLabel" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="addsubcatModalLabel">Add Subcategory</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Subcategory
                                        name</span>
                                </div>
                                <input type="text" name="add_sub_cat_name" class="form-control" aria-label="Default"
                                    aria-describedby="inputGroup-sizing-default">
                            </div>
                            <div class="modal-footer">
                                <button type="submit" name="add_sub_cat_btn" class="btn btn-outline-success">Add</button>
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
                                    <option value="<?php echo $cat_list['p_cat_id']; ?>">
                                        <?php echo $cat_list['p_categ_name']; ?>
                                    </option>

                                    <?php
                                }
                                ?>
                                </select>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="add_subcateg">SubCategory</label>
                                </div>

                                <select class="custom-select" id="add_subcateg" name="add_subcateg">
                                <?php
                                $list_sub_cat_query = "SELECT * FROM `sub_categ`";
                                $res_sub = mysqli_query($conn, $list_sub_cat_query);
                                while ($sub_list = mysqli_fetch_array($res_sub)) {
                                ?>
                                    <option value="<?php echo $sub_list['sub_id']; ?>">
                                        <?php echo $sub_list['sub_name']; ?>
                                    </option>

                                    <?php
                                }
                                ?>
                                </select>
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
        
        <!-- feedback -->
        <div class="modal fade" id="addfeedModalLabel" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="addfeedModalLabel">Feedback</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                        <table border=2 cellpadding="10"> 
                                <tr>
                                        <th> Subject </th>
                                        <th> Description </th>
                                </tr>
                                <?php
                                    $User_feed_query = "SELECT * FROM `feedback`";
                                    $feed_user = mysqli_query($conn, $User_feed_query);
                                ?>
                               
                                <?php
                                while ($feed_list = mysqli_fetch_array($feed_user)) {
                                ?>
                                    <tr>
                                    <td><?php echo $feed_list['fd_sub']; ?></td>
                                    <td><?php echo $feed_list['fd_desc']; ?></td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                            </table>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- feedback End -->

        <!-- NAVIGATION -->
        <nav id="mainNavbar" class="navbar navbar-vertical navbar-expand-lg scrollbar bg-dark navbar-dark">
            
            <!-- Theme configuration (navbar) -->
                <script>
                    let navigationColor = localStorage.getItem('navigationColor'),
                        navbar = document.getElementById('mainNavbar');
                
                    if(navigationColor != null && navbar != null) {
                        if(navigationColor == 'inverted') {
                            navbar.classList.add('bg-dark', 'navbar-dark');
                            navbar.classList.remove('bg-white', 'navbar-light');
                        } else {
                            navbar.classList.add('bg-white', 'navbar-light');
                            navbar.classList.remove('bg-dark', 'navbar-dark');
                        }
                    }
                </script>    
            <div class="container-fluid">
                
                <!-- Brand -->
                <a class="navbar-brand" href="#">
                 
                </a>
        
                <!-- Navbar toggler -->
                <a href="javascript: void(0);" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#sidenavCollapse" aria-controls="sidenavCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </a>
        
                <!-- Collapse -->
                <div class="collapse navbar-collapse" id="sidenavCollapse">
        
                    <!-- Navigation -->
                    <ul class="navbar-nav mb-lg-7">        
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="collapse" href="#form-elements1" aria-expanded="false"
                                aria-controls="form-elements1">
                                <i class="menu-icon mdi mdi-card-text-outline"></i>
                                <span class="menu-title">Account</span>
                                <i class="menu-arrow"></i>
                            </a>
                        </li>
                    <div class="collapse" id="form-elements1">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> </li>
                                <button type="button"class="nav-link" data-bs-toggle="modal" data-bs-target="#user_profile_modal">
                                    User profile
                                </button>
                                </li>
                            </ul>
                    </div>


    <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
                <li class="nav-item">
                </li>
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
                <a class="nav-link" data-bs-toggle="collapse" href="#form-elements2" aria-expanded="false"
                    aria-controls="form-elements1">
                    <i class="menu-icon mdi mdi-card-text-outline"></i>
                    <span class="menu-title">Category</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="form-elements2">
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
            </li>
            <li class="nav-item">
                <div class="collapse" id="form-elements2">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> </li>
                        <button type="button" class="nav-link" data-bs-toggle="modal"
                            data-bs-target="#addsubcatModalLabel">
                            Add subcategory
                        </button>
            </li>
            </ul>
            </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#form-elements3" aria-expanded="false"
                    aria-controls="form-elements2">
                    <i class="menu-icon mdi mdi-card-text-outline"></i>
                    <span class="menu-title">Dealer</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="form-elements3">
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
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#form-elements4" aria-expanded="false"
                    aria-controls="form-elements2">
                    <i class="menu-icon mdi mdi-card-text-outline"></i>
                    <span class="menu-title">Feedback</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="form-elements4">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> </li>
                        <button type="button" class="nav-link" data-bs-toggle="modal"
                            data-bs-target="#addfeedModalLabel">
                            User feedbacks
                        </button>
            </li>
            </ul> 
            </div>
            </li>
                    </ul>
                    <!-- End of Navigation -->
                </div>
                <!-- End of Collapse -->
            </div>
        </nav>
        <!-- MAIN CONTENT -->
        <main>

            <!-- HEADER -->
            <header class="container-fluid d-flex py-6 mb-4">
            
                <!-- Search -->
                <form class="d-none d-md-inline-block me-auto">
                    <div class="input-group input-group-merge">
            
                       
                        
                      </div>
                </form>
            
                <!-- Top buttons -->
                <div class="d-flex align-items-center ms-auto me-n1 me-lg-n2">
                    <!-- Dropdown -->
                    <div class="dropdown" id="themeSwitcher">
                        <a href="javascript: void(0);" class="dropdown-toggle no-arrow d-flex align-items-center justify-content-center bg-white rounded-circle shadow-sm mx-1 mx-lg-2 w-40px h-40px link-secondary" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-bs-offset="0,0">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" height="18" width="18"><g><path d="M12,4.64A7.36,7.36,0,1,0,19.36,12,7.37,7.37,0,0,0,12,4.64Zm0,12.72A5.36,5.36,0,1,1,17.36,12,5.37,5.37,0,0,1,12,17.36Z" style="fill: currentColor"/><path d="M12,3.47a1,1,0,0,0,1-1V1a1,1,0,0,0-2,0V2.47A1,1,0,0,0,12,3.47Z" style="fill: currentColor"/><path d="M4.55,6a1,1,0,0,0,.71.29A1,1,0,0,0,6,6,1,1,0,0,0,6,4.55l-1-1A1,1,0,0,0,3.51,4.93Z" style="fill: currentColor"/><path d="M2.47,11H1a1,1,0,0,0,0,2H2.47a1,1,0,1,0,0-2Z" style="fill: currentColor"/><path d="M4.55,18l-1,1a1,1,0,0,0,0,1.42,1,1,0,0,0,.71.29,1,1,0,0,0,.71-.29l1-1A1,1,0,0,0,4.55,18Z" style="fill: currentColor"/><path d="M12,20.53a1,1,0,0,0-1,1V23a1,1,0,0,0,2,0V21.53A1,1,0,0,0,12,20.53Z" style="fill: currentColor"/><path d="M19.45,18A1,1,0,0,0,18,19.45l1,1a1,1,0,0,0,.71.29,1,1,0,0,0,.71-.29,1,1,0,0,0,0-1.42Z" style="fill: currentColor"/><path d="M23,11H21.53a1,1,0,0,0,0,2H23a1,1,0,0,0,0-2Z" style="fill: currentColor"/><path d="M18.74,6.26A1,1,0,0,0,19.45,6l1-1a1,1,0,1,0-1.42-1.42l-1,1A1,1,0,0,0,18,6,1,1,0,0,0,18.74,6.26Z" style="fill: currentColor"/></g></svg>
                        </a>
            
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <button type="button" class="dropdown-item active" data-theme-value="light">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="me-2" height="18" width="18"><g><path d="M12,4.64A7.36,7.36,0,1,0,19.36,12,7.37,7.37,0,0,0,12,4.64Zm0,12.72A5.36,5.36,0,1,1,17.36,12,5.37,5.37,0,0,1,12,17.36Z" style="fill: currentColor"/><path d="M12,3.47a1,1,0,0,0,1-1V1a1,1,0,0,0-2,0V2.47A1,1,0,0,0,12,3.47Z" style="fill: currentColor"/><path d="M4.55,6a1,1,0,0,0,.71.29A1,1,0,0,0,6,6,1,1,0,0,0,6,4.55l-1-1A1,1,0,0,0,3.51,4.93Z" style="fill: currentColor"/><path d="M2.47,11H1a1,1,0,0,0,0,2H2.47a1,1,0,1,0,0-2Z" style="fill: currentColor"/><path d="M4.55,18l-1,1a1,1,0,0,0,0,1.42,1,1,0,0,0,.71.29,1,1,0,0,0,.71-.29l1-1A1,1,0,0,0,4.55,18Z" style="fill: currentColor"/><path d="M12,20.53a1,1,0,0,0-1,1V23a1,1,0,0,0,2,0V21.53A1,1,0,0,0,12,20.53Z" style="fill: currentColor"/><path d="M19.45,18A1,1,0,0,0,18,19.45l1,1a1,1,0,0,0,.71.29,1,1,0,0,0,.71-.29,1,1,0,0,0,0-1.42Z" style="fill: currentColor"/><path d="M23,11H21.53a1,1,0,0,0,0,2H23a1,1,0,0,0,0-2Z" style="fill: currentColor"/><path d="M18.74,6.26A1,1,0,0,0,19.45,6l1-1a1,1,0,1,0-1.42-1.42l-1,1A1,1,0,0,0,18,6,1,1,0,0,0,18.74,6.26Z" style="fill: currentColor"/></g></svg>
                                    Light mode
                                </button>
                            </li>
                            <li>
                                <button type="button" class="dropdown-item" data-theme-value="dark">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="me-2" height="18" width="18"><path d="M19.57,23.34a1,1,0,0,0,0-1.9,9.94,9.94,0,0,1,0-18.88,1,1,0,0,0,.68-.94,1,1,0,0,0-.68-.95A11.58,11.58,0,0,0,8.88,2.18,12.33,12.33,0,0,0,3.75,12a12.31,12.31,0,0,0,5.11,9.79A11.49,11.49,0,0,0,15.61,24,12.55,12.55,0,0,0,19.57,23.34ZM10,20.17A10.29,10.29,0,0,1,5.75,12a10.32,10.32,0,0,1,4.3-8.19A9.34,9.34,0,0,1,15.59,2a.17.17,0,0,1,.17.13.18.18,0,0,1-.07.2,11.94,11.94,0,0,0-.18,19.21.25.25,0,0,1-.16.45A9.5,9.5,0,0,1,10,20.17Z" style="fill: currentColor"/></svg>
                                    Dark mode
                                </button>
                            </li>
                            <li>
                                <button type="button" class="dropdown-item" data-theme-value="auto">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="me-2" height="18" width="18"><path d="M24,12a1,1,0,0,0-1-1H19.09a.51.51,0,0,1-.49-.4,6.83,6.83,0,0,0-.94-2.28.5.5,0,0,1,.06-.63l2.77-2.76a1,1,0,1,0-1.42-1.42L16.31,6.28a.5.5,0,0,1-.63.06A6.83,6.83,0,0,0,13.4,5.4a.5.5,0,0,1-.4-.49V1a1,1,0,0,0-2,0V4.91a.51.51,0,0,1-.4.49,6.83,6.83,0,0,0-2.28.94.5.5,0,0,1-.63-.06L4.93,3.51A1,1,0,0,0,3.51,4.93L6.28,7.69a.5.5,0,0,1,.06.63A6.83,6.83,0,0,0,5.4,10.6a.5.5,0,0,1-.49.4H1a1,1,0,0,0,0,2H4.91a.51.51,0,0,1,.49.4,6.83,6.83,0,0,0,.94,2.28.5.5,0,0,1-.06.63L3.51,19.07a1,1,0,1,0,1.42,1.42l2.76-2.77a.5.5,0,0,1,.63-.06,6.83,6.83,0,0,0,2.28.94.5.5,0,0,1,.4.49V23a1,1,0,0,0,2,0V19.09a.51.51,0,0,1,.4-.49,6.83,6.83,0,0,0,2.28-.94.5.5,0,0,1,.63.06l2.76,2.77a1,1,0,1,0,1.42-1.42l-2.77-2.76a.5.5,0,0,1-.06-.63,6.83,6.83,0,0,0,.94-2.28.5.5,0,0,1,.49-.4H23A1,1,0,0,0,24,12Zm-8.74,2.5A5.76,5.76,0,0,1,9.5,8.74a5.66,5.66,0,0,1,.16-1.31A.49.49,0,0,1,10,7.07a5.36,5.36,0,0,1,1.8-.31,5.47,5.47,0,0,1,5.46,5.46,5.36,5.36,0,0,1-.31,1.8.49.49,0,0,1-.35.32A5.53,5.53,0,0,1,15.26,14.5Z" style="fill: currentColor"/></svg>
                                    Auto
                                </button>
                            </li>
                        </ul>
                    </div>


            
                    <!-- Dropdown -->
                    <li class="nav-item dropdown d-none d-lg-block user-dropdown">
                        <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                            
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                           
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-bs-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>

                    <form method="POST">
                    <div class="dropdown">
                        <a href="javascript: void(0);" class="dropdown-toggle no-arrow d-flex align-items-center justify-content-center bg-white rounded-circle shadow-sm mx-1 mx-lg-2 w-40px h-40px" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false" data-bs-offset="0,0">
                            <div class="avatar avatar-circle avatar-sm avatar-online">
                                <img src="https://d33wubrfki0l68.cloudfront.net/053f2dfd0df2f52c41e903a21d177b0b44abc9b1/1282c/assets/images/profiles/profile-06.jpeg" alt="..." class="avatar-img" width="40" height="40">
                            </div>
                        </a>
                        
                        <li class="nav-item dropdown d-none d-lg-block user-dropdown">
                        <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                            
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                            <div class="dropdown-header text-center" style="font-size:large;">
                                <?php
                                $query = "SELECT * FROM `user_credential_reg` WHERE `u_name`='$skey'";
                                $res = mysqli_query($conn, $query);
                                while ($row = mysqli_fetch_array($res)) {
                                ?>
                                
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
                                <p>
                                <form method="POST"> 
                                  <a href="\The Cravory\admin_log.php"  class="btn btn-outline-danger">Signout</a>
                                </form>
                                </p>
                            </div>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-bs-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </form>
        </nav>
                        </div>
                    </div>
                </div>
            </header>
            <div class="container-fluid">

                <!-- Title -->
                <h1 class="h2">
                   Admin Dashboard
                </h1>
                
                
                <div class="row">
                    <div class="col-xxl-5 d-flex">

                        <!-- Card -->
                        <div class="card border-0 flex-fill w-100">
                            <div class="card-header border-0 card-header-space-between">
                                
                                <!-- Title -->
                                <!-- <h2 class="card-header-title h4 text-uppercase">
                                    Orders
                                </h2>
                                
                               
                            </div> -->

                            <!-- Table -->
                            <!-- <div class="table-responsive">
                                <table id="projectsTable" class="table align-middle table-edge table-nowrap mb-0">
                                    <thead class="thead-light">
                                        <tr>
                                            <th class="w-60px">#</th>
                                            <th>Name</th>
                                            <th>Project manager</th>
                                            <th class="text-end">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>
                                                <span class="avatar avatar-xs me-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="avatar-img" viewBox="-381.005 -57.828 64 64"><path d="M-373.848-13.722c-.26-.03-.665-.26-.953-.5-2.74-2.685.778-5.77 4.848-7.56v-5.105c.952.607 1.472.635 1.5.72l3.116-3.086-1.04-2.655c9.12-3.145 12.782-4.357 20.198-5.598l-1.33-1.242 2.165-1.24c5 1.646 9.696 2.078 8.887 6.26.203-2.828-3.318-3.925-8.685-5.425l-1.038.634 2 1.645c-8.886 1.53-14.34 3.26-20.832 5.5l.893 2.3-3.26 3.202c.55.144 6.232 2.05 12.146-2.077 0 0 .117-.087.117-.116-.172-.288-.578-.607-1.067-1.038 1.73.116 2.854 1.645 2.653 3.232h-.807a2.9 2.9 0 0 0-.231-1.443c-4.588 3.348-9.897 3.838-14.428 2.25v3.952c-2.192.78-6.118 3.2-6.1 5.54.144 1.124.722 1.528 1.24 1.818"/><path d="M-355.293-14.733c-4.908 2.482-9.6 4.473-16.852 4.76-9.435-.203-10.906-6.464-6.435-13.014 4.213-6.607 10.907-12.58 21.555-16.304 3.086-1.094 7.62-2.336 12.002-2.394 6.3-.058 12.4 1.905 12.003 7.936-.23 4.617-6.895 11.138-10.417 15.813-1.5 2.046-1.76 3.375.807 3.26 9.322-.607 17.775-3.838 25.624-7.185-5.308 3.607-32.75 17.196-32.864 7.936.028-1.185.576-2.424 1.47-3.752.867-1.327 2.08-2.714 3.32-4.127 1.875-2.135 6.518-7.242 8.078-10.302 2.626-5.8-3.26-6.1-8.34-7.877l-2.165 1.24 1.33 1.242c-7.416 1.24-11.08 2.452-20.198 5.598l1.04 2.655-3.116 3.086c-.087-.086-.55-.114-1.5-.72v5.107c-4.07 1.8-7.6 4.875-4.848 7.56.288.23.694.462.954.5 5 2.828 18.58-1 18.554-1" fill="#f60"/></svg>
                                                </span>
                                                Alibaba
                                            </td>
                                            <td class="text-muted">Jon Richardson</td>
                                            <td class="text-end"><span class="badge text-bg-success rounded-pill">Completed</span></td>
                                        </tr>

                                    </tbody>
                                </table> -->
                            </div> <!-- / .table-responsive -->
                        </div>
                    </div>
                </div> <!-- / .row -->

                <div class="row">
                    <div class="col">

                        <!-- Card -->
                        <div class="card border-0 flex-fill w-100" data-list='{"valueNames": ["name", "email", "id", {"name": "date", "attr": "data-signed"}, "status"], "page": 8}' id="users">
                            <div class="card-header border-0 card-header-space-between">

                                <!-- Title -->
                                <h2 class="card-header-title h4 text-uppercase">
                                    Dealers
                                </h2>

                                
                            </div>

                            <!-- Table -->
                            <div class="table-responsive">
                                <table class="table align-middle table-edge table-hover table-nowrap mb-0">
                                    <thead class="thead-light">
                                        <tr>
                                            <th class="w-60px">
                                                <div class="form-check mb-0">
                                                    <input class="form-check-input" type="checkbox" value="" id="checkAllCheckboxes">
                                                </div>
                                            </th>
                                            <th>
                                                <a href="javascript: void(0);" class="text-muted list-sort" data-sort="name">
                                                    Full name
                                                </a>
                                            </th>
                                            <th>
                                                <a href="javascript: void(0);" class="text-muted list-sort" data-sort="email">
                                                    Registred date
                                                </a>
                                            </th>
                                            <th>
                                                <a href="javascript: void(0);" class="text-muted list-sort" data-sort="id">
                                                    User ID
                                                </a>
                                            </th>
                                            <th class="w-150px min-w-150px">
                                                <a href="javascript: void(0);" class="text-muted list-sort" data-sort="status">
                                                    Status
                                                </a>
                                            </th>
                                        </tr>
                                    </thead>
<!-- First Dealer -->
                                    <tbody class="list">
                                        <tr>
                                            <td>
                                                <div class="form-check mb-0">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="avatar avatar-circle avatar-xs me-2">
                                                    
                                                </div>
                                                <span class="name fw-bold">ARHAM ORGANIC INC</span>
                                            </td>
                                            <td class="email">2023-02-24</td>
                                            <td class="id">#9265</td>
                                           
                                            <td class="status"><span class="legend-circle bg-success"></span>Successful</td>
                                        </tr>
                                    </tbody>
<!-- Second Dealer -->
                                    <tbody class="list">
                                        <tr>
                                            <td>
                                                <div class="form-check mb-0">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="avatar avatar-circle avatar-xs me-2">
                                                    
                                                </div>
                                                <span class="name fw-bold">SPRIGHTLITE FOODS PRIVATE LIMITED</span>
                                            </td>
                                            <td class="email">2023-02-24</td>
                                            <td class="id">#9266</td>
                                           
                                            <td class="status"><span class="legend-circle bg-success"></span>Successful</td>
                                        </tr>
                                    </tbody>
                     <!-- Third Dealer -->
                                    <tbody class="list">
                                        <tr>
                                            <td>
                                                <div class="form-check mb-0">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="avatar avatar-circle avatar-xs me-2">
                                                    
                                                </div>
                                                <span class="name fw-bold">PETALSCART</span>
                                            </td>
                                            <td class="email">2023-02-24</td>
                                            <td class="id">#9267</td>
                                           
                                            <td class="status"><span class="legend-circle bg-success"></span>Successful</td>
                                        </tr>
                                    </tbody>
                        <!-- Fourth Dealer -->
                                     <tbody class="list">
                                        <tr>
                                            <td>
                                                <div class="form-check mb-0">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="avatar avatar-circle avatar-xs me-2">
                                                    
                                                </div>
                                                <span class="name fw-bold">Meriboy</span>
                                            </td>
                                            <td class="email">2023-02-26</td>
                                            <td class="id">#9268</td>
                                           
                                            <td class="status"><span class="legend-circle bg-success"></span>Successful</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div> <!-- / .table-responsive -->
                            
                        </div>
                    </div>
                </div> <!-- / .row -->
            </div> <!-- / .container-fluid -->

            <!-- Footer-->
            <!-- Footer -->
            <footer class="mt-auto">
                <div class="container-fluid mt-4 mb-6 text-muted">
                    <div class="row justify-content-between">
                        <div class="col">
                            © The cravory. 2023.
                        </div>
            
                        <div class="col-auto">
                            v1.3.1
                        </div>
                    </div>
                </div>
            </footer>
            

            
        </main> 
        <script src="https://dashly-theme.com/assets/js/theme.bundle.js"></script>    </body>

</html>
<?php
        if(isset($_POST['signout'])){
            session_destroy();
            ?>
                <script>
                    window.location.href='admin_log.php';
                </script>
            <?php
        }
?>
<?php
    }
    else header("location:admin_log.php")
?>