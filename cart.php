<?php
session_start();
if(!isset($_SESSION['email'])){
  header("location: login.php");
} else {
?>

<?php 
error_reporting(0);
include("header.php"); ?>
<!-- breadcrumb-section start -->
<nav class="breadcrumb-section theme1 bg-lighten2 pt-110 pb-110">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title text-center mb-15">
                    <h2 class="title text-dark text-capitalize">cart</h2>
                </div>
            </div>
            <div class="col-12">
                <ol class="breadcrumb bg-transparent m-0 p-0 align-items-center justify-content-center">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">cart</li>
                </ol>
            </div>
        </div>
    </div>
</nav>
<!-- breadcrumb-section end -->
<!-- product tab start -->
<section class="whish-list-section theme1 pt-80 pb-80">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="title mb-30 pb-25 text-capitalize">Your cart items</h3>
                <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center" scope="col">ID</th>
                                <th class="text-center" scope="col">Image</th>
                                <th class="text-center" scope="col">Name</th>
                                <th class="text-center" scope="col">Price</th>
                                <th class="text-center" scope="col">Quantity</th>
                                <th class="text-center" scope="col">Total price</th>
                                <th class="text-center" scope="col"><a href="manage_cart.php?clear=all" class="badge-danger badge" onclick="return confirm('Are you want to clear ?');"><i class="fas fa-trash-alt"></i></a></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                require 'connect.php';
                                $query = "SELECT * from cart WHERE email = '".$_SESSION['email']."'";
                                $run = mysqli_query($connect,$query);
                                $grand_total = 0;
                            
                                while($row=mysqli_fetch_array($run)){

                                $id = $row['id'];
                                $product_name = $row['name'];
                                $pro_image = $row['picture'];
                                $pro_price = $row['price'];
                                $pro_qty = $row['qty'];
                                $pro_total = $row['total_price'];
                            ?>     
                            <tr> 
                              <td class="text-center"><?php echo $id; ?></td> 
                              <td class="text-center"><?php echo $product_name; ?></td> 
                              <td class="text-center"><img src="admin/productimgs/<?php echo $pro_image; ?>" style="height:100px; width:100px;"></td> 
                              <td class="text-center"><?php echo $pro_price; ?></td> 
                              <td class="text-center"><input type="number" class="form-control itemQty" value="<?php echo $pro_qty; ?>" style="width:100px;"></td>                               
                              <td class="text-center"><?php echo $pro_total; ?></td>                               
                              <td class="text-center"><a href="manage_cart.php?remove=<?php echo $id; ?>" onclick="return confirm('Are you want to clear ?');"><i class="fas  fa-trash-alt"></i></a></td>

                              <input type="hidden" class="pid" value="<?php echo $id; ?>">
                              <input type="hidden" class="pprice" value="<?php echo $pro_price; ?>">
                              <?php $grand_total += $pro_total; ?>
                            </tr>  
                            <?php } ?>                                                           
                        </tbody>
                    </table>                    
                </div>
                <div class="row final" style="margin-top:35px; margin-left:15px;">
                     <div class="col-md-3">
                         <a href="shop.php" class="btn btn-success"><i class="fas fa-cart-plus"></i> Continue shopping</a>
                     </div>
                     <div class="col-md-3">
                         <b>Grand Total</b>
                     </div>
                     <div class="col-md-3">
                         <b> <?php echo $grand_total; ?> </b>
                     </div>
                     <div class="col-md-3">
                        <a href="checkout.php" class="btn btn-info <?php ($grand_total > 1)?"":"disabled";?>"><i class=" far fa-credit-card"> Checkout</i></a> 
                     </div>
                 </div>
            </div>
        </div>
    </div>
</section>
<!-- product tab end -->
<?php include("footer.php"); ?>

<script type="text/javascript">
  $(document).ready(function() {
    $(".itemQty").on("change", function() {
      var hide = $(this).closest("tr");

      var id = hide.find(".pid").val();
      var price = hide.find(".pprice").val();
      var qty = hide.find(".itemQty").val();
      location.reload(true);
      $.ajax({
        url: 'manage_cart.php',
        method: 'post',
        cache: false,
        data: { pqty:qty, pid:id, pprice:price },
        success: function(response) {
          console.log(response);
        }
      });
    });
  });
</script>

<?php } ?>