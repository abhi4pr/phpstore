<?php include("header.php"); ?>
<!-- breadcrumb-section start -->
<nav class="breadcrumb-section theme3 bg-lighten2 pt-110 pb-110">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <ol class="breadcrumb bg-transparent m-0 p-0 align-items-center justify-content-center">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="shop.php">Shop</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Single Product</li>
                </ol>
            </div>
        </div>
    </div>
</nav>

      <?php

        include('connect.php');
        $id = $_GET['id'];
        
        $query = "SELECT * FROM `products` WHERE `id`='".$id."'";
        $run = mysqli_query($connect,$query);
          while($row = mysqli_fetch_assoc($run)) {
              $id = $row["id"];
              $product_name = $row["name"];
              $pro_category = $row["cname"];
              $pro_desc = $row["description"];
              $pro_price = $row["price"];
              $pro_image = $row["picture"];
              $pgallery = $row["pgallery"]; // gallery images
              $final = unserialize($pgallery); // gallery images
      } ?>

<section class="product-single theme3 pt-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <div class="position-relative">
                    <span class="badge badge-danger top-right">New</span>
                </div>
                <div class="product-sync-init mb-20">
                    <div class="single-product">
                        <div class="product-thumb">
                            <img src="admin/productimgs/<?php echo $pro_image; ?>" alt="product-thumb">
                        </div>
                    </div>
                    <!-- single-product end -->
                    <div class="single-product">
                        <div class="product-thumb">
                            <img src="admin/productimgs/<?php echo $final[0]; ?>" alt="product-thumb">
                        </div>
                    </div>
                    <!-- single-product end -->
                    <div class="single-product">
                        <div class="product-thumb">
                            <img src="admin/productimgs/<?php echo $final[1]; ?>" alt="product-thumb">
                        </div>
                    </div>
                    <!-- single-product end -->
                    <div class="single-product">
                        <div class="product-thumb">
                            <img src="admin/productimgs/<?php echo $final[2]; ?>" alt="product-thumb">
                        </div>
                    </div>
                    <!-- single-product end -->
                </div>

                <div class="product-sync-nav single-product">
                    <div class="single-product">
                        <div class="product-thumb">
                            <a href="javascript:void(0)"> <img src="admin/productimgs/<?php echo $pro_image; ?>"></a>
                        </div>
                    </div>
                    <!-- single-product end -->
                    <div class="single-product">
                        <div class="product-thumb">
                            <a href="javascript:void(0)"> <img src="admin/productimgs/<?php echo $final[0]; ?>"></a>
                        </div>
                    </div>
                    <!-- single-product end -->
                    <div class="single-product">
                        <div class="product-thumb">
                            <a href="javascript:void(0)"><img src="admin/productimgs/<?php echo $final[1]; ?>"></a>
                        </div>
                    </div>
                    <!-- single-product end -->
                    <div class="single-product">
                        <div class="product-thumb">
                            <a href="javascript:void(0)"><img src="admin/productimgs/<?php echo $final[2]; ?>"></a>
                        </div>
                    </div>
                    <!-- single-product end -->
                </div>
            </div>
            <div class="col-lg-6 mt-5 mt-md-0">
                <div class="single-product-info">
                    <div class="single-product-head">
                        <h2 class="title mb-20"><?php echo $product_name; ?></h2>
                        <div class="star-content mb-20">
                            <span class="star-on"><i class="ion-ios-star"></i> </span>
                            <span class="star-on"><i class="ion-ios-star"></i> </span>
                            <span class="star-on"><i class="ion-ios-star"></i> </span>
                            <span class="star-on"><i class="ion-ios-star"></i> </span>
                            <span class="star-on"><i class="ion-ios-star"></i> </span>
                            <a href="#" id="write-comment"><span class="ml-2"><i class="far fa-comment-dots"></i></span>
                                Read reviews <span>(1)</span></a>
                            <a href="#" data-toggle="modal" data-target="#exampleModalCenter"><span class="edite"><i
                                        class="far fa-edit"></i></span> Write a review</a>
                        </div>
                    </div>
                    <div class="product-body mb-40">
                        <div class="d-flex align-items-center mb-30">
                            <h6 class="product-price mr-20"><del class="del">$23.90</del>
                                <span class="onsale">Rs. <?php echo $pro_price; ?></span></h6>
                            <span class="badge position-static bg-dark rounded-0">Save 10%</span>
                        </div>
                        <p><?php echo $pro_desc; ?></p>
                    </div>
                    <div class="product-footer">
                        <div class="product-count style d-flex flex-column flex-sm-row mt-30 mb-30">
                            <div class="count d-flex">
                                <input type="number" min="1" max="10" step="1" value="1">
                                <div class="button-group">
                                    <button class="count-btn increment"><i class="fas fa-chevron-up"></i></button>
                                    <button class="count-btn decrement"><i class="fas fa-chevron-down"></i></button>
                                </div>
                            </div>
                            <div>
                                <!-- <form action="" class="form-submit">
                                    <input type="hidden" class="pid" value="<?php echo $results['id']; ?>">
                                    <input type="hidden" class="pname" value="<?php echo $results['name'];?>">
                                    <input type="hidden" class="pprice" value="<?php echo $results['price'];?>">
                                    <input type="hidden" class="pimage" value="<?php echo $results['picture'];?>"> -->
                                    <a href="#" class="btn theme-btn--dark3 btn--xl mt-5 mt-sm-0 rounded-5 addItemBtn">Add to cart</a>
                                <!-- </form>   -->
                            </div>
                        </div>
                        <div class="addto-whish-list">
                            <a href="#"><i class="icon-heart"></i> Add to wishlist</a>
                        </div>
                        <div class="pro-social-links mt-10">
                            <ul class="d-flex align-items-center">
                                <li class="share">Share</li>
                                <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                                <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                                <li><a href="#"><i class="ion-social-google"></i></a></li>
                                <li><a href="#"><i class="ion-social-pinterest"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- product-single end -->
<!-- product tab start -->
<div class="product-tab theme3 bg-white pt-60 pb-80">
    <div class="container">
        <div class="product-tab-nav">
            <div class="row align-items-center">
                <div class="col-12">
                    <nav class="product-tab-menu single-product">
                        <ul class="nav nav-pills justify-content-center" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home"
                                    role="tab" aria-controls="pills-home" aria-selected="true">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile"
                                    role="tab" aria-controls="pills-profile" aria-selected="false">Product Details</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact"
                                    role="tab" aria-controls="pills-contact" aria-selected="false">Reviews</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- product-tab-nav end -->
        <div class="row">
            <div class="col-12">
                <div class="tab-content" id="pills-tabContent">
                    <!-- first tab-pane -->
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                        aria-labelledby="pills-home-tab">
                        <div class="single-product-desc">
                           <p><?php echo $pro_desc; ?></p>
                        </div>
                    </div>
                    <!-- second tab-pane -->
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div class="single-product-desc">
                           <p> <?php echo $pro_desc; ?> </p>
                        </div>
                    </div>
                    <!-- third tab-pane -->
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                        <div class="single-product-desc">
                            <div class="grade-content">
                                     <?php
                                        include('connect.php');
                                        $id = $_GET['id'];

                                        error_reporting(0);
                                        
                                        $query = "SELECT * FROM `rating_review` WHERE `prod_id`='".$id."'";
                                        $run = mysqli_query($connect,$query);
                                          while($row = mysqli_fetch_assoc($run)) {
                                              $email = $row["email"];
                                              $rating = $row["rating"];
                                              $review = $row["review"];
                                              $created_at = $row["created_at"];
                                      } 

                                        for( $x = 0; $x < 5; $x++ )
                                        {
                                            if( floatval( $rating )-$x >= 1 )
                                            { echo '<li style="display:inline;"><i class="fa fa-star"></i></li>'; }
                                            elseif( $rating-$x > 0 )
                                            { echo '<li style="display:inline;"><i class="fa fa-star-half"></i></li>'; }
                                            else
                                            { echo ''; }
                                        }
                                      ?>

                                <h6 class="sub-title"><?php echo $email; ?></h6>
                                <p><?php echo $created_at; ?></p>
                                <h4 class="title"><?php echo $review; ?></h4>

                            </div>
                            <hr class="hr">
                            <div class="grade-content">
                                <div class="contact-form">
                                    <h3 class="title">Leave a Reply</h3>
                                    <form action="" method="POST">
                                        <div class="form-group">
                                            <label for="name">your name</label>                                       
                                            <input type="text" class="form-control" value="<?php echo $_SESSION['email']; ?>" required="" name="email">                                      
                                        </div>
                                        <div class="form-group">
                                           <div class="rateyo" id="rating"
                                             data-rateyo-rating="4"
                                             data-rateyo-num-stars="5"
                                             data-rateyo-score="3">
                                           </div>
                                           <input type="hidden" name="rating">
                                        </div>
                                        <div class="form-group">
                                            <label for="comment">Comment:</label>
                                                <textarea class="form-control mb-30" name="review" required=""></textarea> 
                                        </div>
                                        <?php if(!isset($_SESSION['email'])){ ?>
                                        <a href="login.php" class="btn theme-btn--dark3 btn--xl mt-5 mt-sm-0 rounded-5">Please login to comment !</a>
                                         <?php } else { ?>
                                          <input type="submit" name="Sreview" value="Submit review" class="">
                                         <?php } ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- product tab end -->
<!-- new arrival section start -->
<section class="theme3 bg-white pb-80">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title text-center mb-30">
                    <h2 class="title text-dark text-capitalize">You might also like</h2>
                    <p class="text mt-10">Add Related products to weekly line up
                    </p>
                </div>
            </div>
            
            <?php 
            include('connect.php');
             $raw_results = mysqli_query($connect,"SELECT * FROM products LIMIT 4");
            if(mysqli_num_rows($raw_results) > 0){ ?>
            <div class="row">
              <?php  while($results = mysqli_fetch_array($raw_results)){  ?>  
                <div class="col-md-3">
                    <div class="product-list">
                        <div class="card product-card">
                            <div class="card-body p-0">
                                <div class="media flex-column">
                                    <div class="product-thumbnail position-relative">
                                        <span class="badge badge-danger top-right">New</span>
                                        <a href="single-product.php?id=<?php echo $results['id']; ?>">
                                            <img class="first-img" src="admin/productimgs/<?php echo $results['picture']; ?>"
                                                alt="thumbnail">
                                        </a>
                                        <!-- product links -->
                                        <ul class="product-links d-flex justify-content-center">
                                            <li>
                                                <a href="wishlist.html">
                                                    <span data-toggle="tooltip" data-placement="bottom"
                                                        title="add to wishlist" class="icon-heart"> </span>
                                                </a>
                                            </li>
                                            
                                            <li>
                                                <a href="#" data-toggle="modal" data-target="#quick-view">
                                                    <span data-toggle="tooltip" data-placement="bottom"
                                                        title="Quick view" class="icon-magnifier"></span>
                                                </a>
                                            </li>
                                        </ul>
                                        <!-- product links end-->
                                    </div>
                                    <div class="media-body">
                                        <div class="product-desc">
                                            <h3 class="title"><a href="single-product.php?id=<?php echo $results['id']; ?>"><?php echo $results['name']; ?></a></h3>
                                            <div class="star-rating">
                                                <span class="ion-ios-star"></span>
                                                <span class="ion-ios-star"></span>
                                                <span class="ion-ios-star"></span>
                                                <span class="ion-ios-star"></span>
                                                <span class="ion-ios-star de-selected"></span>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <h6 class="product-price">Rs. <?php echo $results['price']; ?></h6>
                                                <form action="" class="form-submit">
                                                    <input type="hidden" class="pid" value="<?php echo $results['id']; ?>">
                                                    <input type="hidden" class="pname" value="<?php echo $results['name'];?>">
                                                    <input type="hidden" class="pprice" value="<?php echo $results['price'];?>">
                                                    <input type="hidden" class="pimage" value="<?php echo $results['picture'];?>">
                                                    <button class="pro-btn addItemBtn"><i class="icon-basket"></i></a></button>
                                                </form>  
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            </div>
            <?php } ?>
            
        </div>
    </div>
</section>
<!-- new arrival section end -->

<!-- new arrival section end -->
<?php include("footer.php"); ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>

<script type="text/javascript"> 

    $(function () {
      $(".rateyo").rateYo({
        halfStar: true
      });
    });
 
    $(function () {
        $(".rateyo").rateYo().on("rateyo.change", function (e, data) {
            var rating = data.rating;
            $(this).parent().find('.score').text('score :'+ $(this).attr('data-rateyo-score'));
            $(this).parent().find('.result').text('rating :'+ rating);
            $(this).parent().find('input[name=rating]').val(rating); //add rating value to input field
        });
    });
 
</script>

<?php

    include('connect.php');
    $id = $_GET['id'];

    if(isset($_POST['Sreview'])){

        $prod_id = $id;
        $email = $_POST['email'];
        $rating = $_POST['rating'];
        $review = $_POST['review'];

        $sql = "INSERT into rating_review(prod_id,email,rating,review) VALUES('$id','".$_SESSION['email']."','$rating','$review')";
        $run = mysqli_query($connect,$sql);
    }
?>