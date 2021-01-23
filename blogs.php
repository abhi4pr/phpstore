<?php include("header.php"); ?>
<!-- breadcrumb-section start -->
<nav class="breadcrumb-section theme1 bg-lighten2 pt-110 pb-110">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title text-center mb-15">
                    <h2 class="title text-dark text-capitalize">Blogs</h2>
                </div>
            </div>
            <div class="col-12">
                <ol class="breadcrumb bg-transparent m-0 p-0 align-items-center justify-content-center">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Blogs</li>
                </ol>
            </div>
        </div>
    </div>
</nav>
<!-- breadcrumb-section end -->
<!-- product tab start -->
<section class="blog-section pt-80 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
               <?php 
                include('connect.php');
                 $raw_results = mysqli_query($connect,"SELECT * FROM articles LIMIT 40");
                if(mysqli_num_rows($raw_results) > 0){ ?>   
                <div class="row">
                   <?php  while($results = mysqli_fetch_array($raw_results)){  ?>  
                    <div class="col-12 col-md-6 col-xl-4 mb-30">
                        <div class="single-blog text-left">
                            <a class="blog-thumb mb-20 zoom-in d-block overflow-hidden"
                                href="single-blog.php?id=<?php echo $results['id']; ?>">
                                <img src="admin/blogimgs/<?php echo $results['apicture']; ?>" alt="blog-thumb-naile">
                            </a>
                            <div class="blog-post-content">
                                <h5 class="sub-title"> Posted by <a class="blog-link" href="#">Admin</a> <span
                                        class="separator">/</span> <?php echo $results['created_at']; ?></h5>
                                <h3 class="title mb-15"><a href="single-blog.php?id=<?php echo $results['id']; ?>"><?php echo $results['aname']; ?></a>
                                </h3>
                                <p class="text">
                                    <?php echo substr($results['adesc'],0,40); ?>
                                </p>
                                <a class="read-more" href="single-blog.php?id=<?php echo $results['id']; ?>">Read More</a>
                            </div>
                        </div>
                    </div>
                  <?php } ?>  
                </div>
            <?php } ?>
            </div>
            <div class="col-lg-3 mb-30 order-lg-first">
                <aside class="blog-left-sidebar">
                    <div class="sidebar-widget theme1 mb-30">
                        <h3 class="post-title">Search</h3>
                        <div class="blog-search-form">
                            <form action="#" class="position-relative">
                                <input class="form-control rounded" type="text" placeholder="Enter your search key ...">
                                <button class="btn blog-search-btn text-capitalize" type="submit"><i
                                        class="ion-ios-search-strong"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="sidebar-widget mb-30">
                        <h3 class="post-title">Categories</h3>
                        <ul class="blog-links">
                            <li><a href="#">Dresses (20)</a></li>
                            <li><a href="#">Jackets &amp; Coats (9)</a></li>
                            <li><a href="#">Sweaters (5)</a></li>
                            <li><a href="#">Jeans (11)</a></li>
                            <li><a href="#">Blouses &amp; Shirts (3)</a></li>
                            <li><a href="#">Electronic Cigarettes (6)</a></li>
                            <li><a href="#">Bags &amp; Cases (4)</a></li>
                        </ul>
                    </div>
                    <div class="sidebar-widget mb-30">
                        <h3 class="post-title">Recent Post</h3>
                        <div class="blog-media-list mb-30 media">
                            <div class="post-thumb mr-4">
                                <a href="#"><img src="assets/img/blog-post/1.jpg" alt="img"></a>
                            </div>
                            <div class="media-body">
                                <h5 class="sub-title mb-1"><a href="single-blog.php">This Is First Post </a></h5>
                                <span class="date">Lorem Ipsum is simply</span>
                            </div>
                        </div>
                        <div class="blog-media-list mb-30 media">
                            <div class="post-thumb mr-4">
                                <a href="#"><img src="assets/img/blog-post/2.jpg" alt="img"></a>
                            </div>
                            <div class="media-body">
                                <h5 class="sub-title mb-1"><a href="single-blog.php">This Is Secound Post </a></h5>
                                <span class="date">Lorem Ipsum is simply</span>
                            </div>
                        </div>
                        <div class="blog-media-list mb-30 media">
                            <div class="post-thumb mr-4">
                                <a href="#"><img src="assets/img/blog-post/3.jpg" alt="img"></a>
                            </div>
                            <div class="media-body">
                                <h5 class="sub-title mb-1"><a href="single-blog.php">This Is Third Post </a></h5>
                                <span class="date">Lorem Ipsum is simply</span>
                            </div>
                        </div>
                        <div class="blog-media-list media">
                            <div class="post-thumb mr-4">
                                <a href="#"><img src="assets/img/blog-post/1.jpg" alt="img"></a>
                            </div>
                            <div class="media-body">
                                <h5 class="sub-title mb-1"><a href="single-blog.php">This Is Fourth Post </a></h5>
                                <span class="date">Lorem Ipsum is simply</span>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar-widget">
                        <h3 class="post-title">Tags</h3>
                        <ul class="product-tag d-flex flex-wrap">
                            <li><a href="#">Computer</a></li>
                            <li><a href="#">sale</a></li>
                            <li><a href="#">Electronics</a></li>
                            <li><a href="#">Jewelry &amp; Watches</a></li>
                        </ul>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</section>
<!-- product tab end -->
<?php include("footer.php"); ?>