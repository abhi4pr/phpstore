<?php include("header.php"); ?>
<!-- breadcrumb-section start -->
<nav class="breadcrumb-section theme1 bg-lighten2 pt-110 pb-110">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title text-center mb-15">
                    <h2 class="title text-dark text-capitalize">single blog</h2>
                </div>
            </div>
            <div class="col-12">
                <ol class="breadcrumb bg-transparent m-0 p-0 align-items-center justify-content-center">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">single blog</li>
                </ol>
            </div>
        </div>
    </div>
</nav>

  <?php

    include('connect.php');
    $id = $_GET['id'];
    
    $query = "SELECT * FROM `articles` WHERE `id`='".$id."'";
    $run = mysqli_query($connect,$query);
      while($row = mysqli_fetch_assoc($run)) {
          $id = $row["id"];
          $aname = $row["aname"];
          $apicture = $row["apicture"];
          $adesc = $row["adesc"];
          $created_at = $row["created_at"];
  } ?>

<section class="blog-section pt-80 pb-80">
    <div class="container">
        <div class="row">
            <div class="col-12 col-xl-9 mx-auto">
                <div class="blog-title">
                    <h2 class="title">From Our Blog </h2>
                    <p class="text">The latest news, videos, and discussion topics</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-xl-9 mx-auto">
                <div class="single-blog text-left">
                    <a class="blog-thumb zoom-in d-block overflow-hidden" href="#">
                        <img class="object-fit-none" src="admin/blogimgs/<?php echo $apicture; ?>" alt="blog-thumb-naile">
                    </a>
                    <div class="blog-post-content pt-30">
                        <h3 class="title mb-15"><a href="#"><?php echo $aname; ?></a></h3>
                        <h5 class="sub-title font-style-normal"> Posted by <a class="blog-link"
                                href="#">Admin</a> <span class="separator">/</span>
                            <?php echo $created_at; ?> <span class="separator">/</span></h5>
                        <p class="text">
                            <?php echo $adesc; ?>
                        </p>
                    </div>
                </div>
                <!-- comment-section start -->
                
            </div>
        </div>
    </div>
</section>
<!-- product tab end -->
<!-- footer strat -->
<?php include("footer.php"); ?>