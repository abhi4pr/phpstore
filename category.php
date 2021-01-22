<?php include("header.php"); ?>
<!-- breadcrumb-section start -->
<nav class="breadcrumb-section theme1 bg-lighten2 pt-110 pb-110">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title text-center mb-15">
                    <h2 class="title text-dark text-capitalize">Category</h2>
                </div>
            </div>
            <div class="col-12">
                <ol class="breadcrumb bg-transparent m-0 p-0 align-items-center justify-content-center">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Category</li>
                </ol>
            </div>
        </div>
    </div>
</nav>
<!-- breadcrumb-section end -->
<!-- product tab start -->
<div class="product-tab bg-white pt-80 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 mb-30">
                <div class="grid-nav-wraper bg-lighten2 mb-30">
                    <div class="row align-items-center">
                        <div class="col-12 col-md-6 mb-3 mb-md-0">
                            <nav class="shop-grid-nav">
                                <ul class="nav nav-pills align-items-center" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill"
                                            href="#pills-home" role="tab" aria-controls="pills-home"
                                            aria-selected="true">
                                            <i class="fa fa-th"></i>

                                        </a>
                                    </li>
                                    <li class="nav-item mr-0">
                                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill"
                                            href="#pills-profile" role="tab" aria-controls="pills-profile"
                                            aria-selected="false"><i class="fa fa-list"></i></a>
                                    </li>
                                    <li> <span class="total-products text-capitalize">There are 13 products.</span></li>
                                </ul>
                            </nav>
                        </div>
                        <div class="col-12 col-md-6 position-relative">
                            <div class="shop-grid-button d-flex align-items-center">
                                <span class="sort-by">Sort by:</span>
                                <button class="btn-dropdown rounded d-flex justify-content-between" type="button"
                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    Relevance <span class="ion-android-arrow-dropdown"></span>
                                </button>
                                <div class="dropdown-menu shop-grid-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">Relevance</a>
                                    <a class="dropdown-item" href="#"> Name, A to Z</a>
                                    <a class="dropdown-item" href="#"> Name, Z to A</a>
                                    <a class="dropdown-item" href="#"> Price, low to high</a>
                                    <a class="dropdown-item" href="#"> Price, high to low</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- product-tab-nav end -->
                <div class="tab-content" id="pills-tabContent">
                    <!-- first tab-pane -->
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                        aria-labelledby="pills-home-tab">
                        <?php 
                        include('connect.php');
                        $cat_name = $_GET['cname'];
                        $raw_results = mysqli_query($connect,"SELECT * FROM products WHERE cname = '".$cat_name."'");
                             
                            if(mysqli_num_rows($raw_results) > 0){ ?>
                        <div class="row grid-view theme1">
                            <?php  while($results = mysqli_fetch_array($raw_results)){  ?>
                            <div class="col-sm-6 col-lg-4 col-xl-3 mb-30">
                                <div class="card product-card">
                                    <div class="card-body">
                                        <div class="product-thumbnail position-relative">
                                            <span class="badge badge-danger top-right">New</span>
                                            <a href="single-product.php?id=<?php echo $results['id']; ?>">
                                                <img class="first-img" src="admin/productimgs/<?php echo $results['picture']; ?>" alt="thumbnail">
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
                        <h3>No products found from this category</h3>
                     <?php } ?>   
                    </div>
                    <!-- second tab-pane -->
                    
                </div>
                <div class="row">
                    <div class="col-12">
                        <nav class="pagination-section mt-30">
                            <div class="row align-items-center">
                                <div class="col-12">
                                    
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 mb-30 order-lg-first">
                <aside class="left-sidebar theme1">
                    <!-- search-filter start -->
                    <div class="search-filter">
                        <div class="check-box-inner pt-0">
                            <h4 class="title">Bags &amp; Shoes</h4>
                        </div>

                    </div>

                    <ul id="offcanvas-menu2" class="blog-ctry-menu">
                        <li><a href="javascript:void(0)">Shoes</a>
                            <ul class="category-sub-menu">
                                <li><a href="#">Women Shoes</a></li>
                                <li><a href="#">Men Shoes</a></li>
                                <li><a href="#">Boots</a></li>
                                <li><a href="#">Casual Shoes</a></li>
                                <li><a href="#">Flip Flops</a></li>
                            </ul>

                        </li>
                        <li><a href="javascript:void(0)">Luggage &amp; Bags</a>
                            <ul class="category-sub-menu">
                                <li><a href="#">Stylish Backpacks</a></li>
                                <li><a href="#">Shoulder Bags</a></li>
                                <li><a href="#">Crossbody Bags</a></li>
                                <li><a href="#">Briefcases</a></li>
                                <li><a href="#">Luggage &amp; Travel</a></li>
                            </ul>
                        </li>
                        <li><a href="javascript:void(0)">Accessories</a>
                            <ul class="category-sub-menu">
                                <li><a href="#">Cosmetic Bags &amp; Cases</a></li>
                                <li><a href="#">Wallets &amp; Card Holders</a></li>
                                <li><a href="#">Luggage Covers</a></li>
                                <li><a href="#">Passport Covers</a></li>
                                <li><a href="#">Bag Parts &amp; Accessories</a></li>
                            </ul>
                        </li>
                    </ul>

                    <div class="search-filter">
                        <form action="#">
                            <div class="check-box-inner mt-10">
                                <h4 class="title">Filter By</h4>
                                <h4 class="sub-title pt-10">Categories</h4>
                                <div class="filter-check-box">
                                    <input type="checkbox" id="20820">
                                    <label for="20820">Digital Cameras <span>(13)</span></label>
                                </div>
                                <div class="filter-check-box">
                                    <input type="checkbox" id="20821">
                                    <label for="20821">Camcorders <span>(13)</span></label>
                                </div>
                                <div class="filter-check-box">
                                    <input type="checkbox" id="20822">
                                    <label for="20822">Camera Drones<span>(13)</span></label>
                                </div>
                            </div>
                            <!-- check-box-inner -->
                            <div class="check-box-inner mt-10">
                                <h4 class="sub-title">Price</h4>
                                <div class="price-filter mt-10">
                                    <div class="price-slider-amount">
                                        <input type="text" id="amount" name="price" readonly
                                            placeholder="Add Your Price" />
                                    </div>
                                    <div id="slider-range"></div>
                                </div>
                            </div>
                            <div class="check-box-inner mt-10">
                                <h4 class="sub-title">Size</h4>
                                <div class="filter-check-box">
                                    <input type="checkbox" id="test9">
                                    <label for="test9">s <span>(2)</span></label>
                                </div>
                                <div class="filter-check-box">
                                    <input type="checkbox" id="test10">
                                    <label for="test10">m <span>(2)</span></label>
                                </div>
                                <div class="filter-check-box">
                                    <input type="checkbox" id="test11">
                                    <label for="test11">l <span>(2)</span></label>
                                </div>
                                <div class="filter-check-box">
                                    <input type="checkbox" id="test12">
                                    <label for="test12">xl <span>(2)</span></label>
                                </div>
                            </div>
                            <!-- check-box-inner -->
                            <div class="check-box-inner mt-10">
                                <h4 class="sub-title">color</h4>
                                <div class="filter-check-box color-grey">
                                    <input type="checkbox" id="20826">
                                    <label for="20826">grey <span>(4)</span></label>
                                </div>
                                <div class="filter-check-box color-white">
                                    <input type="checkbox" id="20827">
                                    <label for="20827">white <span>(3)</span></label>
                                </div>
                                <div class="filter-check-box color-black">
                                    <input type="checkbox" id="20828">
                                    <label for="20828">black <span>(6)</span></label>
                                </div>
                                <div class="filter-check-box color-camel">
                                    <input type="checkbox" id="20829">
                                    <label for="20829">camel <span>(2)</span></label>
                                </div>
                            </div>
                            <!-- check-box-inner -->
                            <div class="check-box-inner mt-10">
                                <h4 class="sub-title">Brand</h4>
                                <div class="filter-check-box">
                                    <input type="checkbox" id="20824">
                                    <label for="20824">Graphic Corner<span>(5)</span></label>
                                </div>
                                <div class="filter-check-box">
                                    <input type="checkbox" id="20825">
                                    <label for="20825">Studio Design<span>(8)</span></label>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- search-filter end -->
                    <div class="product-widget mb-60 mt-30">
                        <h3 class="title">Product Tags</h3>
                        <ul class="product-tag d-flex flex-wrap">
                            <li><a href="#">shopping</a></li>
                            <li><a href="#">New products</a></li>
                            <li><a href="#">Accessories</a></li>
                            <li><a href="#">sale</a></li>
                        </ul>
                    </div>
                    
                </aside>
            </div>
        </div>
    </div>
</div>

<!-- product tab end -->
<?php include("footer.php"); ?>