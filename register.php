<?php include("header.php"); ?>
<!-- breadcrumb-section start -->
<nav class="breadcrumb-section theme1 bg-lighten2 pt-110 pb-110">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title text-center mb-15">
                    <h2 class="title text-dark text-capitalize">Register</h2>
                </div>
            </div>
            <div class="col-12">
                <ol class="breadcrumb bg-transparent m-0 p-0 align-items-center justify-content-center">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Register</li>
                </ol>
            </div>
        </div>
    </div>
</nav>
<!-- breadcrumb-section end -->
<!-- product tab start -->
<div class="register pt-80 pb-80">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="title text-capitalize mb-30 pb-25">Create an account</h3>
                <div class="log-in-form">
                    <form action="" class="personal-information" method="POST">
                        <div class="order-asguest theme1 mb-3">
                            <span>Already have an account?</span>
                            <a class="text-muted hover-color" href="login.php">Log in instead!</a>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">
                                Social title
                            </label>
                            <div class="col-md-6">
                                <div class="d-flex flex-wrap">
                                    <div class="custom-radio">
                                        <input type="radio" id="test1" name="radio-group">
                                        <label for="test1">Mr</label>
                                    </div>
                                    <div class="custom-radio">
                                        <input type="radio" id="test2" name="radio-group">
                                        <label for="test2">Mrs</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="firstname" class="col-md-3 col-form-label">Name</label>
                            <div class="col-md-6">
                                <input type="text" name="username" class="form-control">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="email" class="col-md-3 col-form-label">Email</label>
                            <div class="col-md-6">
                                <input type="email" name="email" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Password" class="col-md-3 col-form-label">Password</label>
                            <div class="col-md-6">
                                <div class="input-group mb-2 mr-sm-2">
                                    <input type="password" class="form-control" name="password">
                                    <div class="input-group-prepend">
                                        <button type="button"
                                            class="input-group-text theme-btn--dark1 btn--md show-password">show</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="number" class="col-md-3 col-form-label">Number</label>
                            <div class="col-md-6">
                                <input type="text" name="number" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-3 col-form-label">Address</label>
                            <div class="col-md-6">
                                <input type="text" name="address" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <div class="check-box-inner pt-0">
                                    <div class="filter-check-box">
                                        <input type="checkbox" id="20820">
                                        <label for="20820">Receive offers from our partners</label>
                                    </div>
                                    <div class="filter-check-box">
                                        <input type="checkbox" id="20821">
                                        <label for="20821">Sign up for our newsletter</label>
                                        <p class="pl-25">You may unsubscribe at any moment. For that purpose, please
                                            find our contact info in the legal notice.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="sign-btn text-right">
                                    <input type="submit" name="user_reg" value="Register" class="btn theme-btn--dark1 btn--md">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- product tab end -->
<!-- footer strat -->
<?php include("footer.php"); ?>

<?php 

    include('connect.php');

    if(isset($_POST['user_reg'])){

          $username = $_POST['username'];
          $email = $_POST['email'];
          $password = $_POST['password'];
          $number = $_POST['number'];
          $address = $_POST['address'];

        $admin_query = "SELECT * from customers where email='$email'";

        $run = mysqli_query($connect,$admin_query); 
    
          if(mysqli_num_rows($run) > 0){
            echo "<script>alert('This email allready Exist')</script>";
          }  else {

        $gen_otp=rand(11111,99999);    
        
        $insert_query = "INSERT into customers (username, email, password, number, address, otp, verified) values ('$username','$email','$password','$number','$address','$gen_otp','0')";
        
        $message = " Your email verification OTP is : '".$gen_otp."'<br><hr>";           
        $to = $email;
        $subject='Email verification';
        $headers .= 'From: <ascs739@gmail.com>' . "\r\n";
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        $revate = mail($to,$subject,$message,$headers);
            $ency = bin2hex($email);
           }

        if(mysqli_query($connect,$insert_query)){
           echo "<script>alert('Congratulations, You registered !')</script>";
           echo "<script>window.open('verify_email.php?id=".$ency."','_self')</script>";
        }
    }

?>