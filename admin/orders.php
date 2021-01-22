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
               <th>ID</th>
               <th>Customer email</th>
               <th>Customer number</th> 
               <th>Customer address</th> 
               <th>Payment mode</th> 
               <th>Products</th> 
               <th>Total amount </th> 
             </tr> 
               </thead> 
               <tbody> 

                <?php 
                    include('../connect.php');
                    $query = "SELECT * from orders";
                    $result = mysqli_query($connect,$query);

                    while($row=mysqli_fetch_array($result)){

                      $id = $row['id'];
                      $customer_email = $row['email'];
                      $customer_number = $row['number'];
                      $customer_address = $row['address'];
                      $payment_mode = $row['pmode'];
                      $products = $row['products'];
                      $total_amount = $row['grand_total'];
                  ?>  

                <tr> 
                  <td><?php echo $id; ?></td> 
                  <td><?php echo $customer_email; ?></td> 
                  <td><?php echo $customer_number; ?></td> 
                  <td><?php echo $customer_address; ?></td> 
                  <td><?php echo $payment_mode; ?></td> 
                  <td><?php echo $products; ?>"</td>  
                  <td><?php echo $total_amount; ?></td>  
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