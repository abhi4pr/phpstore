<?php include("header.php"); ?>
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"> 
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Product</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li class="active"><i class="fa fa-dashboard"></i> Product</li>
      </ol>
    </section>
    
      <section class="content container-fluid">
      <div class="row">
        
        <div class="col-md-12">
          <div class="chart-box">
            <h4>Product</h4>
            <div class="row">
              <form method="POST" action="#" enctype="multipart/form-data">
                <div class="col-md-6">
                  <div class="form-group has-feedback">
                    <label class="control-label">Product Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Product name">
                     </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group has-feedback">
                    <label class="control-label">Price</label>
                    <input type="text" name="price" class="form-control" placeholder="Price">
                     </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group has-feedback">
                    <label class="control-label">Description</label>
                    <textarea class="form-control" name="description" id="placeTextarea" rows="3" placeholder="Description"></textarea>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group has-feedback">
                    <label class="control-label">Category</label>
                    <select class="form-control" id="category" name="cname">
                      <?php
                        include('../connect.php');
                        $cat = "SELECT * from categories";
                        $results = mysqli_query($connect,$cat);
                         
                         while($row = mysqli_fetch_array($results)){
                         //$id = $row['id']; 
                         $category = $row['cname'];
                      ?>
                      <option value="<?php echo $cname; ?>"><?php echo $category; ?></option>  
                                  
                     <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group has-feedback">
                    <label class="custom-file center-block block">
                      <input id="file" class="custom-file-input" name="picture" type="file">
                      <span class="custom-file-control"></span> </label>
                  </div>
                </div>
                <div class="col-md-12">
                  <input type="submit" value="submit" name="create" class="btn btn-default">
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

        $product = $_POST['name'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $category = $_POST['cname'];
        $picture= $_FILES['picture']['name'];
        $image_tmp= $_FILES['picture']['tmp_name'];

        move_uploaded_file($_FILES["picture"]["tmp_name"], "./productimgs/" . $_FILES["picture"]["name"]);

        $sql = "INSERT into products(name,price,description,cname,picture) VALUES('$product','$price','$description','$cname','$picture')";
        $run = mysqli_query($connect,$sql);
    }
?>