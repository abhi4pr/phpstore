<?php
session_start();
if(!isset($_SESSION['email'])){
  header("location: login.php");
} else {
?>

<?php 
 error_reporting(0);
 include("header.php");
?>

<?php
    include('connect.php');

    $query = "SELECT * from customers WHERE email = '".$_SESSION['email']."'";
    $run = mysqli_query($connect,$query);
     while($row = mysqli_fetch_assoc($run)){
        $id = $row['id'];
        $username = $row['username'];
        $email = $row['email'];
        $number = $row['number'];
        $address = $row['address'];
    }
    
    $grand_total = 0;

?>

<nav class="breadcrumb-section theme1 bg-lighten2 pt-110 pb-110">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title text-center mb-15">
                    <h2 class="title text-dark text-capitalize">check out</h2>
                </div>
            </div>
            <div class="col-12">
                <ol class="breadcrumb bg-transparent m-0 p-0 align-items-center justify-content-center">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">check out</li>
                </ol>
            </div>
        </div>
    </div>
</nav>
<!-- breadcrumb-section end -->
<!-- product tab start -->

<?php
 include_once 'connect.php'; 
?>

<section class="check-out-section pt-80 pb-50">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6" id="order">
                <h4 class="text-center text-info" style="margin-bottom:30px;">Complete Your Order !</h4>
                <div class="jumbotron text-center" style="background-color:#1be1ea; padding:20px;">
                    <?php 
                        $x=0;
                        $sql = "SELECT * from cart WHERE email='".$_SESSION['email']."'";
                        $run = mysqli_query($connect,$sql);
                         while($row = mysqli_fetch_array($run)){
                            $x++;
                          echo '<input type="text" name="item_name_'.$x.'" value="'.$row["name"].'">
                                <input type="text" name="amount_'.$x.'" value="'.$row["price"].'">
                                <input type="text" name="quantity_'.$x.'" value="'.$row["qty"].'">';  
                            $grand_total += $row['total_price'];    
                         }
                    ?>
                </div>
                <form action="" method="POST" id="placeOrder">
                    <!-- <input type="hidden" name="products" value="<?php echo $allItems; ?>"> -->
                    <input type="hidden" name="grand_total" value="<?php echo $grand_total; ?>">
                    <div class="form-group topup" style="margin-top:20px;">
                        <input type="text" name="username" placeholder="Username" value="<?php echo $username; ?>" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <input type="text" name="email" placeholder="Email" value="<?php echo $email; ?>" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <input type="text" name="number" placeholder="Number" value="<?php echo $number; ?>" class="form-control" required="">
                    </div>    
                    <div class="form-group">
                        <input type="text" name="address" placeholder="Address" value="<?php echo $address; ?>" class="form-control" required="">
                    </div>
                    <h6 class="text-center">Select Paymode method</h6>
                    <div class="form-group bottomup" style="margin-top:20px;">
                        <select name="pmode" class="form-control">
                            <option value="" selected="" disabled="">Select payment mode</option>
                            <option value="cod">Cash on delivery</option>
                            <option value="netbanking">netbanking</option>
                            <option value="paypal">Paypal</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submitcod" value="Place order" class="btn btn-danger btn-block">
                    </div>
                </form>

                <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
                    <input type="hidden" name="business" value="abhibusiness@gmail.com">
                    <input type="hidden" name="cmd" value="_cart">   
                    <input type="hidden" name="upload" value="1">
                    <?php 
                        $x=0;
                        $sql = "SELECT * from cart WHERE email='".$_SESSION['email']."'";
                        $run = mysqli_query($connect,$sql);
                         while($row = mysqli_fetch_array($run)){
                            $x++;
                          echo '<input type="hidden" name="item_name_'.$x.'" value="'.$row["name"].'">
                                <input type="hidden" name="item_number_'.$x.'" value="'.$x.'">
                                <input type="hidden" name="amount_'.$x.'" value="'.$row["price"].'">
                                <input type="hidden" name="quantity_'.$x.'" value="'.$row["qty"].'">';  
                         }
                    ?>
                    <input type="hidden" name="currency_code" value="USD">
                    <input type="hidden" name="return" value="http://localhost/phpstore/success.php">
                    <input type="hidden" name="cancel_return" value="http://localhost/phpstore/cancel.php">
                    <input type="image" name="submit" border="0" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif">
                </form>
            
            </div>
        </div>
    </div>
</section>
<!-- product tab end -->
<?php include("footer.php"); ?>

<?php
  include('connect.php');

  if(isset($_POST['submitcod'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $address = $_POST['address'];
    $pmode = $_POST['pmode'];
    $grand_total = $_POST['grand_total'];

    $query = "INSERT into orders (username,email,number,address,pmode,grand_total) VALUES ('$username','$email','$number','$address','$pmode','$grand_total')";
    $run = mysqli_query($connect,$query);

    $order_id = mysqli_insert_id($connect);

    $sql = "SELECT * from cart WHERE email='".$_SESSION['email']."'";
    $run = mysqli_query($connect,$sql);
     while($row = mysqli_fetch_array($run)){
      $pid = $row["pid"];  
      $qty = $row["qty"];
      $price = $row["price"];

      $query3 = "INSERT into order_items (order_id,product_id,qty,price,email) values ('$order_id','$pid','$qty','$price','$email')";
      $run3 = mysqli_query($connect,$query3);
    }

    $query2 = "DELETE from cart WHERE email = '".$_SESSION['email']."'";
    $run2 = mysqli_query($connect,$query2);

    echo "<script>alert('Ordered successfully')</script>";
    echo "<script>window.open('myaccount.php','_self')</script>";    
  }
?>

<?php } ?>