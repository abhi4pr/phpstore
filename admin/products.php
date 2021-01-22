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
      <h1>All Product</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li class="active"><i class="fa fa-dashboard"></i>All Product</li>
      </ol>
    </section>


    <section class="content container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="chart-box">
            <h4>All Products</h4>
            <div id="example_filter" class="dataTables_filter pull-right">
              
            </div>
            
            <table id="products-listing" class="table table-bordered display">
             <thead>
              <tr>
               <th>Product ID</th>
               <th>Product name</th>
               <th>Product desc</th> 
               <th>Product category</th> 
               <th>Product price</th> 
               <th>Product photo</th> 
               <th>Actions </th> 
             </tr> 
               </thead> 
               <tbody> 

                <?php 
                    include('../connect.php');
                    $query = "SELECT * from products";
                    $result = mysqli_query($connect,$query);

                    while($row=mysqli_fetch_array($result)){

                      $id = $row['id'];
                      $product_name = $row['name'];
                      $pro_desc = $row['description'];
                      $pro_category = $row['cname'];
                      $pro_price = $row['price'];
                      $pro_image = $row['picture'];
                  ?>  

                <tr> 
                  <td><?php echo $id; ?></td> 
                  <td><?php echo $product_name; ?></td> 
                  <td><?php echo $pro_desc; ?></td> 
                  <td><?php echo $pro_category; ?></td> 
                  <td><?php echo $pro_price; ?></td> 
                  <td><img src="./productimgs/<?php echo $pro_image; ?>" style="height:100px; width:100px;"></td>  
                  <td>
                    <a href="product_view.php?id=<?php echo $row["id"]; ?>">View</a>
                    <a href="product_edit.php?id=<?php echo $row["id"]; ?>">Edit</a>
                    <a href="product_delete.php?id=<?php echo $row["id"]; ?>">Delete</a>
                  </td> 
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
    $('#products-listing').DataTable();
  });
  </script>  


<footer class="main-footer">
    <div class="pull-right hidden-xs"> Version 1.0</div>
    Copyright &copy; 2017 Yourdomian. All rights reserved. </footer>
</div>

<script src="bootstrap/js/bootstrap.min.js"></script> 

</body>
</html>