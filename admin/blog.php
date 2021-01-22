<?php include("header.php"); ?>

  <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"> 
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Create blog</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li class="active"><i class="fa fa-dashboard"></i> Create blog</li>
      </ol>
    </section>
    
      <section class="content container-fluid">
      <div class="row">
        
        <div class="col-md-12">
          <div class="chart-box">
            <h4>Create blog</h4>
            <div class="row">
              <form method="POST" action="#" enctype="multipart/form-data">
                <div class="col-md-12">
                  <div class="form-group has-feedback">
                    <label class="control-label">Article name</label>
                    <input type="text" name="aname" class="form-control" placeholder="Article name">
                     </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group has-feedback">
                    <label class="control-label">Description</label>
                    <textarea class="form-control" name="adesc" id="adesc" rows="3" placeholder="Description"></textarea>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group has-feedback">
                    <label class="custom-file center-block block">
                      <input id="file" class="custom-file-input" name="apicture" type="file">
                      <span class="custom-file-control"></span> </label>
                  </div>
                </div>
                <div class="col-md-12">
                  <input type="submit" value="submit" name="acreate" class="btn btn-default">
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

<script>
  CKEDITOR.replace( 'adesc' );
</script>

<?php

    include('../connect.php');

    if(isset($_POST['acreate'])){

        $aname = $_POST['aname'];
        $adesc = $_POST['adesc'];
        $apicture= $_FILES['apicture']['name'];
        $image_tmp= $_FILES['apicture']['tmp_name'];

        move_uploaded_file($_FILES["apicture"]["tmp_name"], "./blogimgs/" . $_FILES["apicture"]["name"]);

        $sql = "INSERT into articles(aname,adesc,apicture) VALUES('$aname','$adesc','$apicture')";
        $run = mysqli_query($connect,$sql);
        echo "<script>window.open('blogs.php','_self')</script>";
    }
?>