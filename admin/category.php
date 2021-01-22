<?php include("header.php"); ?>
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"> 
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Category</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li class="active"><i class="fa fa-dashboard"></i> Category</li>
      </ol>
    </section>
    
      <section class="content container-fluid">
      <div class="row">
        
        <div class="col-md-12">
          <div class="chart-box">
            <h4>Category</h4>
            <div class="row">
              <form action="#" method="POST">
                <div class="col-md-6">
                  <div class="form-group has-feedback">
                    <label class="control-label">Category ID</label>
                    <input type="text" class="form-control" placeholder="ID" disabled>
                    <span class="fa fa-user form-control-feedback" aria-hidden="true"></span> </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group has-feedback">
                    <label class="control-label">Category name</label>
                    <input type="text" class="form-control" name="cname" placeholder="Category name">
                    <span class="fa fa-user form-control-feedback" aria-hidden="true"></span> </div>
                </div>
                
                <div class="col-md-12">
                  <input type="submit" name="create" value="Submit" class="btn btn-default">
                </div>
              </form>
            </div>
          </div>
        </div>
        
      </div>
    </section>

  </div>
  <!-- content-wrapper --> 
  
<?php include("footer.php"); ?>

<?php

    include('../connect.php');

    if(isset($_POST['create'])){

        $category = $_POST['cname'];

        $sql = "INSERT into categories(cname) VALUES('$category')";
        $run = mysqli_query($connect,$sql);
    }
?>