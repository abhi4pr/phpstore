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

    <?php

      include('../connect.php');
      $id = $_GET['id'];
      $query = "SELECT * from products WHERE id = '".$id."'";
      $run = mysqli_query($connect,$query);
       while($row = mysqli_fetch_assoc($run)){
        $product_name = $row['name'];
        $price = $row['price'];
        $description = $row['description'];
        $picture = $row['picture'];
        $category = $row['cname'];
       }
    ?>
    
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
                    <input type="text" name="name" value="<?php echo $product_name; ?>" class="form-control" placeholder="Product name" disabled>
                     </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group has-feedback">
                    <label class="control-label">Price</label>
                    <input type="text" name="price" value="<?php echo $price; ?>" class="form-control" placeholder="Price" disabled>
                     </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group has-feedback">
                    <label class="control-label">Description</label>
                    <textarea class="form-control" name="description" id="placeTextarea" rows="3" placeholder="Description" disabled=""><?php echo $description; ?></textarea>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group has-feedback">
                    <label class="control-label">Category</label>
                    <select class="form-control" id="category" name="cname">                      
                      <option value="<?php echo $cname; ?>"><?php echo $category; ?></option>                    
                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group has-feedback">
                    <img src="productimgs/<?php echo $picture; ?>" alt="Italian Trulli" style="height:350px; width:350px;">
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

