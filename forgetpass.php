<?php include("header.php"); ?>
<!-- breadcrumb-section start -->
<nav class="breadcrumb-section theme1 bg-lighten2 pt-110 pb-110">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title text-center mb-15">
                    <h2 class="title text-dark text-capitalize">Forget password</h2>
                </div>
            </div>
            <div class="col-12">
                <ol class="breadcrumb bg-transparent m-0 p-0 align-items-center justify-content-center">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Forget password </li>
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
                <h3 class="title text-capitalize mb-30 pb-25"> Forget password</h3>
                <form class="log-in-form" method="POST" action="">
                    <div class="form-group row">
                        <label for="staticEmail" class="col-md-3 col-form-label">Email</label>
                        <div class="col-md-6">
                            <input type="email" class="form-control" name="email" id="staticEmail">
                        </div>
                    </div>
                    
                    <div class="form-group row pb-3 text-center">
                        <div class="col-md-6 offset-md-3">
                            <div class="login-form-links">
                                
                                <div class="sign-btn">
                                    <input type="submit" name="for_pass" value="Recover" class="btn theme-btn--dark1 btn--md">
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

if(isset($_POST['for_pass'])){
    
    $email = $_POST['email'];

    $admin_query = "SELECT * from customers where email='$email'";

    $run = mysqli_query($connect,$admin_query); 
    
    if(mysqli_num_rows($run) > 0){

      while($row = mysqli_fetch_array($run)){
            $password = $row['password'];
          
        $message = " Your password is : '".$password."'<br><hr>";           
        $to = '"'.$email.'"';
        $subject='Password recovery';
        $headers .= 'From: <ascs739@gmail.com>' . "\r\n";
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        $revate = mail($to,$subject,$message,$headers);
         if(isset($revate)){           
            echo "<script>alert('mail sent')</script>";           
         }    
     } }    
    else {    
    echo "<script>alert('no such email exist')</script>";    
    }
}
?>