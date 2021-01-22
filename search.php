<?php include("header.php"); ?>
<!-- header end -->
<!-- breadcrumb-section start -->
<nav class="breadcrumb-section theme1 bg-lighten2 pt-110 pb-110">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title text-center mb-15">
                    <h2 class="title text-dark text-capitalize">Search Results</h2>
                </div>
            </div>
            <div class="col-12">
                <ol class="breadcrumb bg-transparent m-0 p-0 align-items-center justify-content-center">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Search Results</li>
                </ol>
            </div>
        </div>
    </div>
</nav>
<!-- breadcrumb-section end -->
<!-- product tab start -->
<div class="product-tab bg-white pt-80 pb-80">
    <div class="container">
        
        <!-- product-tab-nav end -->
        <div class="tab-content" id="pills-tabContent">
            <!-- first tab-pane -->
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
              <div id="message"></div>
              <?php 

                include('connect.php');
                $pro_search = $_GET['pro_search'];
                $pro_search = htmlspecialchars($pro_search); 
                $pro_search = mysqli_real_escape_string($connect,$pro_search);
                 
                $raw_results = mysqli_query($connect,"SELECT * FROM products WHERE (`name` LIKE '%".$pro_search."%')");
                 
                if(mysqli_num_rows($raw_results) > 0){ ?>

                <div class="row grid-view theme1">
                   
                   <?php  while($results = mysqli_fetch_array($raw_results)){  ?>   
                    
                    <div class="col-sm-6 col-lg-4 col-xl-3 mb-30">
                        <div class="card product-card">
                            <div class="card-body">
                                <div class="product-thumbnail position-relative">
                                    <span class="badge badge-danger top-right">New</span>
                                    <a href="single-product.php?id=<?php echo $results['id']; ?>">
                                        <img class="first-img" src="admin/productimgs/<?php echo $results['picture'];?>" alt="thumbnail">
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
                                                <span data-toggle="tooltip" data-placement="bottom" title="Quick view"
                                                    class="icon-magnifier"></span>
                                            </a>
                                        </li>
                                    </ul>
                                    <!-- product links end-->
                                </div>
                                <div class="product-desc py-0">
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
                        <!-- product-list End -->
                    </div>
                   <?php } ?>                     
                </div>
               <?php } else { ?>
                    <h3>No products found from your search query</h3>
               <?php } ?>
            </div>

        </div>
        <div class="row">
            <div class="col-12">
                <div class="cart-block-links theme1">
                            <ul class="d-flex">
                                
                            </ul>
                        </div>
            </div>
        </div>
    </div>
</div>
<!-- product tab end -->
<!-- footer strat -->
<?php include("footer.php"); ?>
