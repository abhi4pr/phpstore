<?php include("header.php"); ?>
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"> 
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Profile</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li class="active"><i class="fa fa-dashboard"></i> Admin Profile</li>
      </ol>
    </section>

    <?php

      include('../connect.php');
      $query = "SELECT * from admins";
      $run = mysqli_query($connect,$query);
       while($row = mysqli_fetch_assoc($run)){
        $username = $row['username'];
        $password = $row['password'];
       }
    ?>
    
      <section class="content container-fluid">
      <div class="row">
        
        <div class="col-md-12">
          <div class="chart-box">
            <h4>Admin Profile</h4>
              <form method="POST" action="">
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" class="form-control" name="username" value="<?php echo $username; ?>" placeholder="Email">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="text" class="form-control" name="password" value="<?php echo $password; ?>" placeholder="Password">
                </div>                
                <input type="submit" name="prof_update" value="Update" class="btn btn-default">
              </form>
            
          </div>
        </div>
        
      </div>
    </section>

  </div>
  <!-- content-wrapper --> 
  
<?php include("footer.php"); ?>

  <?php 

      include('../connect.php');
      
      if(isset($_POST['prof_update'])){
     
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $update_query = "UPDATE admins set name='".$username."',password='".$password."'";

        if(mysqli_query($connect,$update_query)){
      
          echo "<script>alert('Congo, Profile updated')</script>";
          echo "<script>window.open('index.php','_self')</script>";
          
        }
        
      }

  ?>