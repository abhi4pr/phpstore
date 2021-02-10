<?php
session_start();
if(!isset($_SESSION['email'])){
  header("location: login.php");
} else {
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="description" content="" />
    <title>Junno – Multipurpose eCommerce HTML Template</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico" />

    <link rel="stylesheet" href="assets/css/fontawesome.min.css" />
    <link rel="stylesheet" href="assets/css/ionicons.min.css" />
    <link rel="stylesheet" href="assets/css/simple-line-icons.css" />
    <link rel="stylesheet" href="assets/css/plugins/jquery-ui.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/plugins/plugins.css" />
    <link rel="stylesheet" href="assets/css/style.min.css" />


</head>

<body>
    

<!-- offcanvas-overlay start -->
<div class="offcanvas-overlay"></div>
<!-- offcanvas-overlay end -->
<!-- offcanvas-mobile-menu start -->
<div id="offcanvas-mobile-menu" class="offcanvas theme1 offcanvas-mobile-menu">
    <div class="inner">
        <div class="border-bottom mb-4 pb-4 text-right">
            <button class="offcanvas-close">×</button>
        </div>
        <div class="offcanvas-head mb-4">
            <nav class="offcanvas-top-nav">
                <ul class="d-flex justify-content-center align-items-center">
                    <li class="mx-4"><a href="compare.html"><i class="ion-ios-loop-strong"></i> Compare <span>(0)</span>
                        </a></li>
                    <li class="mx-4">
                        <a href="wishlist.html"> <i class="ion-android-favorite-outline"></i> Wishlist
                            <span>(0)</span></a>
                    </li>
                </ul>
            </nav>
        </div>
        <nav class="offcanvas-menu">
            <ul>
                <li><a href="index.php"><span class="menu-text">Home</span></a>

                </li>
                <li><a href="shop.php"><span class="menu-text">Shop</span></a>

                </li>
                <li><a href="#"><span class="menu-text">Categories</span></a>
                    <ul class="offcanvas-submenu">
                       <?php
                          include('connect.php');                     
                          $query = "SELECT * from categories";
                          $result = mysqli_query($connect,$query);
                            while($row=mysqli_fetch_array($result)){                                
                          $pro_category = $row['cname'];                             
                       ?> 
                      <li> <a href="<?php echo $pro_category; ?>"> <?php echo $pro_category; ?> </a></li> 
                      <?php } ?>  
                    </ul>
                </li>
                <li><a href="blogs.php"><span class="menu-text">Blog</span></a>
                    
                </li>
                <li><a href="contact.php">Contact Us</a></li>

                <li><a href="about-us.php">About Us</a></li>
                <li><a href="myaccount.php">My account</a></li>
            </ul>
        </nav>
        <div class="offcanvas-social py-30">
            <ul>
                <li>
                    <a href="#"><i class="icon-social-facebook"></i></a>
                </li>
                <li>
                    <a href="#"><i class="icon-social-twitter"></i></a>
                </li>
                <li>
                    <a href="#"><i class="icon-social-instagram"></i></a>
                </li>
                <li>
                    <a href="#"><i class="icon-social-google"></i></a>
                </li>
                <li>
                    <a href="#"><i class="icon-social-instagram"></i></a>
                </li>
            </ul>
        </div>
    </div>
</div>

<header>
    <!-- header top start -->
    <div class="header-top theme1 bg-dark py-15">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-7 order-last order-md-first">
                    <div class="static-info text-center text-md-left">
                        <p class="text-white">Join our showroom and get <span class="theme-color">50 % off</span> !
                            Coupon code : <span class="theme-color">Junno50</span></p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-5">
                    <nav class="navbar-top pb-2 pb-md-0 position-relative">
                        <ul class="d-flex justify-content-center justify-content-md-end align-items-center">
                            
                            <li class="english">
                                <?php 

                                   if(isset($_SESSION['email'])){ 
                                        echo '<a href="logout.php"><span>Logout</span></a>';
                                   } else { 
                                        echo '<a href="login.php" class="pr-0" aria-expanded="false">
                                               <img src="assets/img/logo/us-flag.jpg" alt="us flag"> Login
                                              </a>'; 
                                } ?>
                                
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- header top end -->
    <!-- header-middle satrt -->
    <div class="header-middle pt-20">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-6 col-lg-2 order-first">
                    <div class="logo text-center text-sm-left mb-30 mb-sm-0">
                        <a href="index.html"><img src="assets/img/logo/logo-dark.jpg" alt="logo"></a>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-5 col-xl-4">
                    <!-- search-form end -->
                    <div class="d-flex align-items-center justify-content-center justify-content-sm-end">
                        <div class="media static-media mr-50 d-none d-lg-flex">
                            <img class="mr-3 align-self-center" src="assets/img/icon/1.png" alt="icon">
                            <div class="media-body">
                                <div class="phone">
                                    <span class="text-muted">Call us:</span>
                                </div>
                                <div class="phone">
                                    <a href="tel:(+123)4567890" class="text-dark">(+123)4567890</a>
                                </div>
                            </div>
                        </div>
                        <!-- static-media end -->
                        <div class="cart-block-links theme1">
                            <ul class="d-flex">
                                
                                <li class="mr-0 cart-block position-relative">
                                    <a class="" href="cart.php">
                                        <!-- <span class="position-relative"> -->
                                            <i class="icon-bag"></i>
                                            <span id="cart-item" class="badge badge-danger"></span>
                                        <!-- </span> -->                                        
                                    </a>
                                </li>
                                <!-- cart block end -->
                            </ul>
                        </div>
                        <div class="mobile-menu-toggle theme1 d-lg-none">
                            <a href="#offcanvas-mobile-menu" class="offcanvas-toggle">
                                <svg viewbox="0 0 800 600">
                                    <path
                                        d="M300,220 C300,220 520,220 540,220 C740,220 640,540 520,420 C440,340 300,200 300,200"
                                        id="top"></path>
                                    <path d="M300,320 L540,320" id="middle"></path>
                                    <path
                                        d="M300,210 C300,210 520,210 540,210 C740,210 640,530 520,410 C440,330 300,190 300,190"
                                        id="bottom" transform="translate(480, 320) scale(1, -1) translate(-480, -318)">
                                    </path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-xl-6 order-lg-first">
                    <div class="search-form pt-30 pt-lg-0">
                        <form class="form-inline position-relative" method="GET" action="search.php">
                            <input type="text" class="form-control theme1-border" name="pro_search"
                                placeholder="Search your products ...">
                            <button class="btn search-btn theme-bg btn-rounded" type="submit"><i
                                    class="icon-magnifier"></i></button>        
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- header-middle end -->

    <!-- header bottom start -->
    <nav id="sticky" class="header-bottom theme1 d-none d-lg-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-10 offset-lg-2 d-flex flex-wrap align-items-center position-relative">
                    <ul class="main-menu d-flex">
                        <li class="active ml-0">
                            <a href="index.php" class="pl-0">Home </a>
                            
                        </li>
                        <li class="position-static">
                            <a href="shop.php">Shop </a>
                            
                        </li>
                        <li>
                            <a href="#">Categories <i class="ion-ios-arrow-down"></i></a>
                            <ul class="sub-menu">
                                <?php
                                  include('connect.php');                     
                                  $query = "SELECT * from categories";
                                  $result = mysqli_query($connect,$query);
                                    while($row=mysqli_fetch_array($result)){                                
                                  $pro_category = $row['cname'];                             
                                ?> 
                              <li> <a href="category.php?cname=<?php echo urlencode($pro_category); ?>"> <?php echo $pro_category; ?> </a></li> 
                             <?php } ?>   
                            </ul>
                        </li>
                        <li>
                            <a href="blogs.php">Blog </a>
                            
                        </li>
                        <li><a href="contact.php">contact Us</a></li>
                        
                        <li><a href="about-us.php">About Us</a></li>
                        <li><a href="myaccount.php">My account</a></li>

                    </ul>

                </div>
            </div>
        </div>
    </nav>

</header>
<!-- header end -->


<nav class="breadcrumb-section theme1 bg-lighten2 pt-110 pb-110">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title text-center mb-15">
                    <h2 class="title text-dark text-capitalize">my account</h2>
                </div>
            </div>
            <div class="col-12">
                <ol class="breadcrumb bg-transparent m-0 p-0 align-items-center justify-content-center">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">my account</li>
                </ol>
            </div>
        </div>
    </div>
</nav>
<!-- breadcrumb-section end -->
<!-- product tab start -->

<div class="my-account pt-80 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="title text-capitalize mb-30 pb-25">my account</h3>
            </div>
            <!-- My Account Tab Menu Start -->
            <div class="col-lg-3 col-12 mb-30">
                <div class="myaccount-tab-menu nav" role="tablist">
                    <a href="#dashboad" data-toggle="tab" class="active"><i class="fas fa-tachometer-alt"></i>
                        Dashboard</a>

                    <a href="#orders" data-toggle="tab"><i class="fa fa-cart-arrow-down"></i>
                        Orders</a>

                    <a href="#account-info" data-toggle="tab"><i class="fa fa-user"></i> Account
                        Details</a>

                    <a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a>
                </div>
            </div>
            <!-- My Account Tab Menu End -->

            <!-- My Account Tab Content Start -->
            <div class="col-lg-9 col-12 mb-30">
                <div class="tab-content" id="myaccountContent">
                    <!-- Single Tab Content Start -->
                    <div class="tab-pane fade active show" id="dashboad" role="tabpanel">
                        <div class="myaccount-content">
                            <h3>Dashboard</h3>

                            <?php 
                                include('connect.php');
                                $query = "SELECT * from customers WHERE email = '".$_SESSION['email']."'";
                                $run = mysqli_query($connect,$query);
                                 while($row = mysqli_fetch_assoc($run)){
                                    $id = $row['id'];
                                    $username = $row['username'];
                                    $email = $row['email'];
                                    $password = $row['password'];
                                    $number = $row['number'];
                                    $address = $row['address'];
                                 }
                            ?>

                            <div class="welcome mb-20">
                                <p>Hello, <strong><?php echo $username; ?></strong> </strong></p>
                            </div>

                            <p class="mb-0">From your account dashboard. you can easily check &amp; view your
                                recent orders, manage your shipping and billing addresses and edit your
                                password and account details.</p>
                        </div>
                    </div>
                    <!-- Single Tab Content End -->

                    <!-- Single Tab Content Start -->
                    <div class="tab-pane fade" id="orders" role="tabpanel">
                        <div class="myaccount-content">
                            <h3>Orders</h3>

                            <div class="myaccount-table table-responsive text-center">
                                <table class="table table-bordered">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Order ID</th>
                                            <th>Product ID</th>
                                            <th>Quantity</th>                                            
                                            <th>Price</th>                                            
                                            <th>Pay mode</th>
                                            <th>Order date</th>                                            
                                            <th>Detail</th>
                                            <th>Invoice</th>                                            
                                        </tr>
                                    </thead>


                                    <?php 
                                        include('connect.php');
                                        $query = "SELECT * from order_items WHERE email = '".$_SESSION['email']."'";
                                        $result = mysqli_query($connect,$query);

                                        while($row=mysqli_fetch_array($result)){

                                          $orderid = $row['order_id'];
                                          $productid = $row['product_id'];
                                          $qty = $row['qty'];
                                          $price = $row['price']*$qty;
                                          $pmode = $row['pmode'];
                                          $date = $row['order_on'];
                                    ?>  

                                    <tbody>
                                        <?php 
                                            $ccc = "SELECT name from products WHERE id='".$productid."'";
                                               $ddd = mysqli_query($connect,$ccc);
                                                 while($row = mysqli_fetch_assoc($ddd)){
                                                    $proname = $row["name"];  
                                               }
                                        ?>
                                        <tr>
                                            <td><?php echo $orderid; ?></td>
                                            <td><?php echo $proname; ?></td>
                                            <td><?php echo $qty; ?></td>
                                            <td><?php echo $price; ?></td>
                                            <td><?php echo $pmode; ?></td>
                                            <td><?php echo $date; ?></td>
                                            <td><a href="order_detail.php?order_id=<?php echo $orderid; ?>">Details</a></td>
                                            <td><a href="invoice.php?order_id=<?php echo $orderid; ?>">Download</a></td>
                                        </tr>
                                      <?php } ?>  
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Single Tab Content End -->

                    <!-- Single Tab Content Start -->
                    <div class="tab-pane fade" id="account-info" role="tabpanel">
                        <div class="myaccount-content">
                            <h3>Account Details</h3>

                            <div class="account-details-form">
                                <form action="" method="POST">
                                    <div class="row">
                                        <div class="col-lg-6 col-12 mb-30">
                                            <input type="text" name="username" value="<?php echo $username; ?>" placeholder="User Name">
                                        </div>

                                        <div class="col-lg-6 col-12 mb-30">
                                            <input type="text" name="email" value="<?php echo $email; ?>" placeholder="Email">
                                        </div>

                                        <div class="col-12 mb-30">
                                            <input type="text" name="password" value="<?php echo $password; ?>" placeholder="Password">
                                        </div>

                                        <div class="col-12 mb-30">
                                            <input type="number" name="number" value="<?php echo $number; ?>" placeholder="Number">
                                        </div>

                                        <div class="col-12 mb-30">
                                            <input type="text" name="address" value="<?php echo $address; ?>" placeholder="Address">
                                        </div>

                                        <div class="col-12">
                                            <input type="submit" name="prof_user" value="Update" class="btn theme-btn--dark1 btn--md">
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Single Tab Content End -->
                </div>
            </div>
            <!-- My Account Tab Content End -->
        </div>
    </div>
</div>
<!-- product tab end -->
<?php include("footer.php"); ?>

<?php } ?>

 <?php 

      include('connect.php');
      if(isset($_POST['prof_user'])){
     
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $number = $_POST['number'];
        $address= $_POST['address'];
        
        $update_query = "UPDATE customers set username='".$username."',email='".$email."',password='".$password."',number='".$number."',address='".$address."' WHERE email='".$_SESSION['email']."'";

        if(mysqli_query($connect,$update_query)){
      
          echo "<script>alert('Your profile updated !')</script>";
          echo "<script>window.open('myaccount.php','_self')</script>";
          
        }        
      }
  ?>