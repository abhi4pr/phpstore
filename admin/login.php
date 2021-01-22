<?php 
session_start();

if(isset($_SESSION['username'])){

header("location: index.php");
}

else {
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Admin Login</h2>
  <form class="form-horizontal" action="" method="POST">
    <div class="form-group">
      <label class="control-label col-sm-2" for="username">Username:</label>
      <div class="col-sm-10">
        <input type="username" class="form-control" id="username" placeholder="Enter username" name="username">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Password:</label>
      <div class="col-sm-10">          
        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <div class="checkbox">
          <label><input type="checkbox" name="remember"> Remember me</label>
        </div>
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <input type="submit" name="login" value="Submit" class="btn btn-default">
      </div>
    </div>
  </form>
</div>

</body>
</html>


<?php

include('../connect.php');

if(isset($_POST['login'])){
    
    $username = mysqli_real_escape_string($connect,$_POST['username']);
    $password = mysqli_real_escape_string($connect,$_POST['password']);

    $sql = "SELECT * from admins where username='$username' AND password='$password'";

    $run = mysqli_query($connect,$sql); 
    
    if(mysqli_num_rows($run)>0){
    
    $_SESSION['username'] = $username;

    echo "<script>alert('Successfully You Logged in!')</script>";
    echo "<script>window.open('index.php','_self')</script>";
    }
    else {
    
    echo "<script>alert('Check your username or admin_pass again !')</script>";
    
    }
}
?>

<?php } ?>