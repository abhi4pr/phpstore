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
      <h1>All Customers</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li class="active"><i class="fa fa-dashboard"></i>All Customers</li>
      </ol>
    </section>


    <section class="content container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="chart-box">
            <h4>All Customers</h4>
            <div id="example_filter" class="dataTables_filter pull-right">
              
            </div>
            
            <table id="users-listing" class="table table-bordered display">
             <thead>
              <tr>
               <th>User ID</th>
               <th>User name</th>
               <th>User email</th> 
               <th>User password</th> 
               <th>User number</th> 
               <th>User address</th>  
             </tr> 
               </thead> 
               <tbody> 

                <?php 
                    include('../connect.php');
                    $query = "SELECT * from customers";
                    $result = mysqli_query($connect,$query);

                    while($row=mysqli_fetch_array($result)){

                      $id = $row['id'];
                      $username = $row['username'];
                      $user_email = $row['email'];
                      $user_pass = $row['password'];
                      $user_number = $row['number'];
                      $user_addrs = $row['address'];
                  ?>  

                <tr> 
                  <td><?php echo $id; ?></td> 
                  <td><?php echo $username; ?></td> 
                  <td><?php echo $user_email; ?></td> 
                  <td><?php echo $user_pass; ?></td> 
                  <td><?php echo $user_number; ?></td> 
                  <td><?php echo $user_addrs; ?> </td>   
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
    $('#users-listing').DataTable();
  });
  </script>  


<footer class="main-footer">
    <div class="pull-right hidden-xs"> Version 1.0</div>
    Copyright &copy; 2017 Yourdomian. All rights reserved. </footer>
</div>

<script src="bootstrap/js/bootstrap.min.js"></script> 

</body>
</html>