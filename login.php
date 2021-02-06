<?php include("header.php"); ?>
<!-- breadcrumb-section start -->
<nav class="breadcrumb-section theme1 bg-lighten2 pt-110 pb-110">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title text-center mb-15">
                    <h2 class="title text-dark text-capitalize">login</h2>
                </div>
            </div>
            <div class="col-12">
                <ol class="breadcrumb bg-transparent m-0 p-0 align-items-center justify-content-center">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Log in to your account </li>
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
                <h3 class="title text-capitalize mb-30 pb-25"> Log in to your account</h3>
                <form class="log-in-form" method="POST" action="">
                    <div class="form-group row">
                        <label for="staticEmail" class="col-md-3 col-form-label">Email</label>
                        <div class="col-md-6">
                            <input type="email" class="form-control" name="email" id="staticEmail">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-md-3 col-form-label">Password</label>
                        <div class="col-md-6">
                            <div class="input-group mb-2 mr-sm-2">
                                <input type="password" class="form-control" name="password" id="myInput">
                                <div class="input-group-prepend">
                                    <button type="button" class="input-group-text theme-btn--dark1 btn--md show-password" onclick="myFunction()">show</button>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="form-group row pb-3 text-center">
                        <div class="col-md-6 offset-md-3">
                            <div class="login-form-links">
                                <a href="forgetpass.php" class="for-get">Forgot your password?</a>
                                <div class="sign-btn">
                                    <input type="submit" name="user_log" value="Login" class="btn theme-btn--dark1 btn--md">
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

<!-- hide and show password -->
<script type="text/javascript">
    function myFunction() {
      var x = document.getElementById("myInput");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }
</script>

<?php

include('connect.php');

if(isset($_POST['user_log'])){
    
    $email = mysqli_real_escape_string($connect,$_POST['email']);
    $password = mysqli_real_escape_string($connect,$_POST['password']);

    $admin_query = "SELECT * from customers where email='$email' AND password='$password' AND verified='0'";
    $run = mysqli_query($connect,$admin_query); 
    
    if(mysqli_num_rows($run)>0){

        $ency = bin2hex($email);
        
        echo "<script>alert('ur not verified, verify ur email')</script>";
        echo "<script>window.open('verify_email.php?id=".$ency."','_self')</script>";
    }

    $admin_query1 = "SELECT * from customers where email='$email' AND password='$password' AND verified='1'";
    $run1 = mysqli_query($connect,$admin_query1); 

    if(mysqli_num_rows($run1)>0){
        $_SESSION['email'] = $email;
        echo "<script>alert('Congo, you loggedin succesfully')</script>";
        echo "<script>window.open('myaccount.php','_self')</script>";    
    } else {
        echo "<script>alert('Check email / password !')</script>";
    }
}

?>