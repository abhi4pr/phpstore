<?php include("header.php"); ?>
<!-- breadcrumb-section start -->
<nav class="breadcrumb-section theme1 bg-lighten2 pt-110 pb-110">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title text-center mb-15">
                    <h2 class="title text-dark text-capitalize">Verify Email</h2>
                </div>
            </div>
            <div class="col-12">
                <ol class="breadcrumb bg-transparent m-0 p-0 align-items-center justify-content-center">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Verify Email </li>
                </ol>
            </div>
        </div>
    </div>
</nav>
<!-- breadcrumb-section end -->
<!-- product tab start -->
<div class="my-account pt-80 pb-80">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="title text-capitalize mb-30 pb-25"> Verify your email</h3>
                <form class="log-in-form" method="POST" action="">
                    <div class="form-group row">
                        <label for="staticEmail" class="col-md-3 col-form-label">OTP sent on your email</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="otp" id="staticop">
                        </div>
                    </div>
                    
                    <div class="form-group row pb-3 text-center">
                        <div class="col-md-6 offset-md-3">
                            <div class="login-form-links">
                                
                                <div class="sign-btn">
                                    <input type="submit" name="ver_otp" value="Verify" class="btn theme-btn--dark1 btn--md">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row text-center mb-0">
                        <div class="col-12">
                            <div class="border-top">
                                <a href="register.php" class="no-account">No account? Create one here</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- product tab end -->
<!-- footer strat -->
<?php include("footer.php"); ?>

<?php

include('connect.php');

if(isset($_POST['ver_otp'])){
    
    $id = $_GET['id'];
    $dency = hex2bin($id);

    $otp = $_POST['otp'];

    $admin_query = "SELECT * from customers where email='$dency' AND otp='$otp'";
    $run = mysqli_query($connect,$admin_query); 

    if(mysqli_num_rows($run)>0){

        $update_query="UPDATE customers set otp='',verified='1' where email='".$dency."'";
        $rane = mysqli_query($connect,$update_query);

        echo "<script>alert('Congo, verified succesfully')</script>";
        echo "<script>window.open('myaccount.php','_self')</script>";    
    } else {
        echo "<script>alert('wrong email / OTP !')</script>";
    }
}

?>