<?php include("header.php"); ?>

<!-- main slider start -->
<section class="bg-light position-relative">
    <div class="main-slider dots-style theme1">
        <div class="slider-item bg-img bg-img1">
            <div class="container">
                <div class="row align-items-center slider-height">
                    <div class="col-12">
                        <div class="slider-content">
                            <p class="text text-white text-uppercase animated mb-25" data-animation-in="fadeInDown">
                                nike running shoes</p>
                            <h4 class="title text-white animated text-capitalize mb-25" data-animation-in="fadeInLeft"
                                data-delay-in="1">Sport Shoes</h4>
                            <h2 class="sub-title text-white animated" data-animation-in="fadeInRight" data-delay-in="2">
                                Sale 40% Off</h2>
                            <a href="shop-grid-4-column.html"
                                class="btn theme--btn1 btn--lg text-uppercase rounded-5 animated mt-45 mt-sm-25"
                                data-animation-in="zoomIn" data-delay-in="3">Shop now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- slider-item end -->
        <div class="slider-item bg-img bg-img2">
            <div class="container">
                <div class="row align-items-center slider-height">
                    <div class="col-12">
                        <div class="slider-content">
                            <p class="text text-white text-uppercase animated mb-25" data-animation-in="fadeInLeft">
                                New Arrivals</p>
                            <h4 class="title text-white animated text-capitalize mb-25" data-animation-in="fadeInRight"
                                data-delay-in="1"> Sumer Sale</h4>
                            <h2 class="sub-title text-white animated" data-animation-in="fadeInUp" data-delay-in="2">Up
                                To 70% Off</h2>
                            <a href="shop-grid-4-column.html"
                                class="btn theme--btn1 btn--lg text-uppercase rounded-5 animated mt-45 mt-sm-25"
                                data-animation-in="zoomIn" data-delay-in="3">Shop now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- slider-item end -->
    </div>
    <!-- slick-progress -->
    <div class="slick-progress">
        <span></span>
    </div>
    <!-- slick-progress end-->
</section>
<!-- main slider end -->
<!-- common banner  start -->
<div class="common-banner pt-80 bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mb-30">
                <div class="banner-thumb">
                    <a href="shop-grid-4-column.html" class="zoom-in d-block overflow-hidden">
                        <img src="assets/img/banner/1.jpg" alt="banner-thumb-naile">
                    </a>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 mb-30">
                <div class="banner-thumb">
                    <a href="shop-grid-4-column.html" class="zoom-in d-block overflow-hidden">
                        <img src="assets/img/banner/2.jpg" alt="banner-thumb-naile">
                    </a>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 mb-30">
                <div class="banner-thumb">
                    <a href="shop-grid-4-column.html" class="zoom-in d-block overflow-hidden">
                        <img src="assets/img/banner/3.jpg" alt="banner-thumb-naile">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- common banner  end -->
<!-- product tab start -->
<section class="product-tab bg-white pt-50 pb-80">
    <div class="container">
        <div class="product-tab-nav mb-35">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="section-title text-center mb-30">
                        <h2 class="title text-dark text-capitalize">Our products</h2>
                        <p class="text mt-10">Add our products to weekly line up</p>
                    </div>
                </div>
                <div class="col-12">
                    <nav class="product-tab-menu theme1">
                        <ul class="nav nav-pills justify-content-center" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home"
                                    role="tab" aria-controls="pills-home" aria-selected="true">Women Shoes</a>
                            </li>
                            
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- product-tab-nav end -->
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
                                            <form class="form-submit">
                                                <input type="hidden" class="pid" value="<?php echo $results['id']; ?>">
                                                <input type="hidden" class="pname" value="<?php echo $results['name']; ?>">
                                                <input type="hidden" class="pprice" value="<?php echo $results['price']; ?>">
                                                <input type="hidden" class="pimage" value="<?php echo $results['picture']; ?>">
                                                <button id="addItem" class="pro-btn"><i class="icon-basket"></i></button>
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
</section>
<!-- product tab end -->

<!-- staic media start -->
<section class="static-media-section pb-80 bg-white">
    <div class="container">
        <div class="static-media-wrap theme-bg rounded-5">
            <div class="row">
                <div class="col-lg-3 col-sm-6 py-3">
                    <div class="d-flex static-media2 flex-column flex-sm-row">
                        <img class="align-self-center mb-2 mb-sm-0 mr-auto  mr-sm-3" src="assets/img/icon/2.png"
                            alt="icon">
                        <div class="media-body">
                            <h4 class="title text-capitalize text-white">Free Shipping</h4>
                            <p class="text text-white">On all orders over $75.00</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 py-3">
                    <div class="d-flex static-media2 flex-column flex-sm-row">
                        <img class="align-self-center mb-2 mb-sm-0 mr-auto  mr-sm-3" src="assets/img/icon/3.png"
                            alt="icon">
                        <div class="media-body">
                            <h4 class="title text-capitalize text-white">Free Returns</h4>
                            <p class="text text-white">Returns are free within 9 days</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 py-3">
                    <div class="d-flex static-media2 flex-column flex-sm-row">
                        <img class="align-self-center mb-2 mb-sm-0 mr-auto  mr-sm-3" src="assets/img/icon/4.png"
                            alt="icon">
                        <div class="media-body">
                            <h4 class="title text-capitalize text-white">100% Payment Secure</h4>
                            <p class="text text-white">Your payment are safe with us.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 py-3">
                    <div class="d-flex static-media2 flex-column flex-sm-row">
                        <img class="align-self-center mb-2 mb-sm-0 mr-auto  mr-sm-3" src="assets/img/icon/5.png"
                            alt="icon">
                        <div class="media-body">
                            <h4 class="title text-capitalize text-white">Support 24/7</h4>
                            <p class="text text-white">Contact us 24 hours a day</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- staic media end -->
<!-- blog-section start -->
<section class="blog-section theme1 pb-65">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title text-center mb-30">
                    <h2 class="title text-dark text-capitalize">Latest Blogs</h2>
                    <p class="text mt-10">Present posts in a best way to highlight interesting moments of your blog.
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="blog-init slick-nav">
                    <div class="slider-item">
                        <div class="single-blog">
                            <a class="blog-thumb mb-20 zoom-in d-block overflow-hidden"
                                href="blog-grid-left-sidebar.html">
                                <img src="assets/img/blog-post/1.jpg" alt="blog-thumb-naile">
                            </a>
                            <div class="blog-post-content">
                                <a class="blog-link theme-color d-inline-block mb-10 text-uppercase"
                                    href="https://themeforest.net/user/hastech">Fashion</a>
                                <h3 class="title text-capitalize mb-15"><a href="single-blog.html">This is first
                                        Post For XipBlog</a></h3>
                                <h5 class="sub-title"> Posted by <a class="blog-link theme-color d-inline-block mx-1"
                                        href="https://themeforest.net/user/hastech">HasTech</a>31TH Aug 2020</h5>

                            </div>
                        </div>
                    </div>
                    <!-- slider-item end -->
                    <div class="slider-item">
                        <div class="single-blog">
                            <a class="blog-thumb mb-20 zoom-in d-block overflow-hidden"
                                href="blog-grid-left-sidebar.html">
                                <img src="assets/img/blog-post/2.jpg" alt="blog-thumb-naile">
                            </a>
                            <div class="blog-post-content">
                                <a class="blog-link theme-color d-inline-block mb-10 text-uppercase"
                                    href="https://themeforest.net/user/hastech">Fashion</a>
                                <h3 class="title text-capitalize mb-15"><a href="single-blog.html">This is Secound
                                        Post For XipBlog</a></h3>
                                <h5 class="sub-title"> Posted by <a class="blog-link theme-color d-inline-block mx-1"
                                        href="https://themeforest.net/user/hastech">HasTech</a>31TH Aug 2020</h5>

                            </div>
                        </div>
                    </div>
                    <!-- slider-item end -->
                    <div class="slider-item">
                        <div class="single-blog">
                            <a class="blog-thumb mb-20 zoom-in d-block overflow-hidden"
                                href="blog-grid-left-sidebar.html">
                                <img src="assets/img/blog-post/3.jpg" alt="blog-thumb-naile">
                            </a>
                            <div class="blog-post-content">
                                <a class="blog-link theme-color d-inline-block mb-10 text-uppercase"
                                    href="https://themeforest.net/user/hastech">Fashion</a>
                                <h3 class="title text-capitalize mb-15"><a href="single-blog.html">This is third
                                        Post For XipBlog</a></h3>
                                <h5 class="sub-title"> Posted by <a class="blog-link theme-color d-inline-block mx-1"
                                        href="https://themeforest.net/user/hastech">HasTech</a>31TH Aug 2020</h5>

                            </div>
                        </div>
                    </div>
                    <!-- slider-item end -->
                    <div class="slider-item">
                        <div class="single-blog">
                            <a class="blog-thumb mb-20 zoom-in d-block overflow-hidden"
                                href="blog-grid-left-sidebar.html">
                                <img src="assets/img/blog-post/4.jpg" alt="blog-thumb-naile">
                            </a>
                            <div class="blog-post-content">
                                <a class="blog-link theme-color d-inline-block mb-10 text-uppercase"
                                    href="https://themeforest.net/user/hastech">Fashion</a>
                                <h3 class="title text-capitalize mb-15"><a href="single-blog.html">This is fourth
                                        Post For XipBlog</a></h3>
                                <h5 class="sub-title"> Posted by <a class="blog-link theme-color d-inline-block mx-1"
                                        href="https://themeforest.net/user/hastech">HasTech</a>31TH Aug 2020</h5>

                            </div>
                        </div>
                    </div>
                    <!-- slider-item end -->
                    <div class="slider-item">
                        <div class="single-blog">
                            <a class="blog-thumb mb-20 zoom-in d-block overflow-hidden"
                                href="blog-grid-left-sidebar.html">
                                <img src="assets/img/blog-post/1.jpg" alt="blog-thumb-naile">
                            </a>
                            <div class="blog-post-content">
                                <a class="blog-link theme-color d-inline-block mb-10 text-uppercase"
                                    href="https://themeforest.net/user/hastech">Fashion</a>
                                <h3 class="title text-capitalize mb-15"><a href="single-blog.html">This is fiveth
                                        Post For XipBlog</a></h3>
                                <h5 class="sub-title"> Posted by <a class="blog-link theme-color d-inline-block mx-1"
                                        href="https://themeforest.net/user/hastech">HasTech</a>31TH Aug 2020</h5>

                            </div>
                        </div>
                    </div>
                    <!-- slider-item end -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- blog-section end -->
<!-- brand slider start -->
<?php include("footer.php"); ?>