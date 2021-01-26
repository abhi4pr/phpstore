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
    $allItems = '';
    $items = array();

    $sql = "SELECT CONCAT(name,'(',qty,')') AS ItemQty,total_price from cart WHERE email='".$_SESSION['email']."'";
    $run = mysqli_query($connect,$sql);
     while($row = mysqli_fetch_assoc($run)){
        $grand_total += $row['total_price'];
        $items[] = $row['ItemQty'];
     }
     $allItems = implode(", ", $items);
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
<section class="check-out-section pt-80 pb-50">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6" id="order">
                <h4 class="text-center text-info" style="margin-bottom:30px;">Complete Your Order !</h4>
                <div class="jumbotron text-center" style="background-color:#1be1ea; padding:20px;">
                    <h6 class="lead"><b>Products : </b><?php echo $allItems; ?></h6>
                    <h6 class="lead"><b>Delivery charge : </b>Free !</h6>
                    <h6 class="lead"><b>Amount Payable : </b><?php echo $grand_total; ?></h6>
                </div>
                <form action="" method="POST" id="placeOrder">
                    <input type="hidden" name="products" value="<?php echo $allItems; ?>">
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
                        <input type="submit" name="submit" value="Place order" class="btn btn-danger btn-block">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- product tab end -->
<?php include("footer.php"); ?>

<script type="text/javascript">
  $(document).ready(function() {

    $("#placeOrder").submit(function(e){
        e.preventDefault();
        $.ajax({
            url: 'manage_cart.php',
            method: 'POST',
            data: $("form").serialize() + "&action=order",
            success: function(response){
               alert('Ordered Successfully !');
               window.location.replace("http://localhost/phpstore/myaccount.php");
            }
        });
    });

  });
</script>

<?php } ?>