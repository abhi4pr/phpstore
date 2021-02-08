<?php include("header.php"); ?>
  
<!-- Datatable CSS -->
<link href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css" rel='stylesheet' type='text/css'>

<!-- jQuery Library -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

<!-- Datatable JS -->
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>

  <div class="content-wrapper"> 
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>All orders</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li class="active"><i class="fa fa-dashboard"></i>All orders</li>
      </ol>
    </section>


    <section class="content container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="chart-box">
            <h4>All Orders</h4>
            <div id="example_filter" class="dataTables_filter pull-right">
              
            </div>
            
            <table id="orders-listing" class="table table-bordered display">
             <thead>
              <tr>
               <th>Order ID</th>
               <th>Customer email</th>
               <th>Customer number</th> 
               <th>Customer address</th> 
               <th>Payment mode</th> 
               <th>Products</th> 
               <th>Quantity</th>
               <th>Price </th> 
               <th>Date</th>
             </tr> 
               </thead> 
               <tbody> 

                <?php 
                    include('../connect.php');
                    $query = "SELECT * from order_items";
                    $result = mysqli_query($connect,$query);

                    while($row=mysqli_fetch_array($result)){

                      $orderid = $row['order_id'];
                      $customer_email = $row['email'];
                      $payment_mode = $row['pmode'];
                      $productid = $row['product_id'];
                      $qty = $row['qty'];
                      $price = $row['price']*$qty;
                      $date = $row['order_on'];
                  ?> 
                <?php 
                    $eee = "SELECT * from customers WHERE email='".$customer_email."'";
                       $fff = mysqli_query($connect,$eee);
                         while($row = mysqli_fetch_assoc($fff)){
                            $customer_number = $row["number"];  
                            $customer_address = $row["address"];  
                       }
                ?>  

                <?php 
                    $ccc = "SELECT name from products WHERE id='".$productid."'";
                       $ddd = mysqli_query($connect,$ccc);
                         while($row = mysqli_fetch_assoc($ddd)){
                            $proname = $row["name"];  
                       }
                ?>  
                <tr> 
                  <td><?php echo $orderid; ?></td> 
                  <td><?php echo $customer_email; ?></td> 
                  <td><?php echo $customer_number; ?></td> 
                  <td><?php echo $customer_address; ?></td> 
                  <td><?php echo $payment_mode; ?></td> 
                  <td><?php echo $proname; ?></td> 
                  <td><?php echo $qty; ?></td> 
                  <td><?php echo $price; ?></td>  
                  <td><?php echo $date; ?></td>
                </tr> 

                <?php } ?> 
              
              </tbody> 
             </table> 

          </div>
        </div>
      </div>
    </section>

  </div>

  <script type="text/javascript">
  $(document).ready(function(){
    $('#orders-listing').DataTable();
  });
  </script>  


<footer class="main-footer">
    <div class="pull-right hidden-xs"> Version 1.0</div>
    Copyright &copy; 2017 Yourdomian. All rights reserved. </footer>
</div>

<script src="bootstrap/js/bootstrap.min.js"></script> 

</body>
</html>