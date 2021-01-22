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
                    <input type="text" name="name" value="<?php echo $product_name; ?>" class="form-control" placeholder="Product name">
                     </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group has-feedback">
                    <label class="control-label">Price</label>
                    <input type="text" name="price" value="<?php echo $price; ?>" class="form-control" placeholder="Price">
                     </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group has-feedback">
                    <label class="control-label">Description</label>
                    <textarea class="form-control" name="description" id="placeTextarea" rows="3" placeholder="Description"><?php echo $description; ?></textarea>
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
                
                <div class="col-md-6">
                  <div class="form-group has-feedback">
                    <label class="custom-file center-block block">
                      <input id="file" class="custom-file-input" name="picture" type="file">
                      <span class="custom-file-control"></span> </label>
                     </div>
                </div> 
                <div class="col-md-6">
                  <div class="form-group has-feedback">
                    <img src="productimgs/<?php echo $picture; ?>" alt="Italian Trulli" style="height:150px; width:150px;">
                  </div>
                </div>
                
                <div class="col-md-12">
                  <input type="submit" value="submit" name="update" class="btn btn-default">
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
      $id = $_GET['id'];
      if(isset($_POST['update'])){
     
        $product_name = $_POST['name'];
        $pro_category = $_POST['cname'];
        $pro_desc = $_POST['description'];
        $pro_price = $_POST['price'];
        $pro_image= $_FILES['picture']['name'];
        $image_tmp= $_FILES['picture']['tmp_name'];

        move_uploaded_file($_FILES["picture"]["tmp_name"], "./productimgs/" . $_FILES["picture"]["name"]);
        
        if((!($_FILES['picture']['name']))){

        $update_query="UPDATE products set name='".$product_name."',description='".$pro_desc."',price='".$pro_price."',cname='".$pro_category."' where id='".$id."'";
        //echo $update_query;
       
        } else{
        
        $update_query = "UPDATE products set name='".$product_name."',cname='".$pro_category."',description='".$pro_desc."',price='".$pro_price."',picture='".$pro_image."' WHERE id='".$id."'";
        }

        if(mysqli_query($connect,$update_query)){
      
          echo "<script>alert('Congo, product updated !')</script>";
          echo "<script>window.open('products.php','_self')</script>";
          
        }
        
      }

  ?>