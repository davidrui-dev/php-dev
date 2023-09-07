<!doctype html>
<html class="no-js" lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>Broombids</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Place favicon.ico in the root directory -->
<link href="<?=PROOT?>images/favicon.ico" type="img/x-icon" rel="shortcut icon">
<!-- All css files are included here. -->
<link rel="stylesheet" href="<?=PROOT?>assets/css/vendor/bootstrap.min.css">
<link rel="stylesheet" href="<?=PROOT?>assets/css/vendor/iconfont.min.css">
<link rel="stylesheet" href="<?=PROOT?>assets/css/vendor/helper.css">
<!-- <link rel="stylesheet" href="<?=PROOT?>assets/css/plugins/plugins.css"> -->
<!-- <link rel="stylesheet" href="<?=PROOT?>assets/css/style.css"> -->
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-Y4JXD9LCHX"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-Y4JXD9LCHX');
</script>
<!-- Use the minified version files listed below for better performance and remove the files listed above -->
<link rel="stylesheet" href="<?=PROOT?>assets/css/plugins/plugins.min.css">
<link rel="stylesheet" href="<?=PROOT?>assets/css/style.min.css">
<!-- Modernizr JS -->
<script src="<?=PROOT?>assets/js/vendor/modernizr-3.10.0.min.js"></script>
</head>


<body class="template-color-1">

<div id="main-wrapper">
    <!--Header section start-->
    <header class="header-absolute white-logo-version header-sticky sticky-black no-padding d-none d-lg-block pb-25">
        <div class="main-header">
            <div class="container-fluid pl-50 pl-lg-15 pl-md-15 pr-0">
                <div class="row align-items-center no-gutters">

                    <!--Logo start-->
                    <div class="col-xl-2 col-lg-2 col-12">
                        <div class="logo">
                            <a href="<?=PROOT?>"><img src="<?=PROOT?>images/logo-white.png" alt="broombids Logo" style="width: 100%;"></a>
                        </div>
                    </div>
                    <!--Logo end-->

                    <!--Menu start-->
                    <div class="col-xl-8 col-lg-8 col-12">
                        <nav class="main-menu" style="float: right;">
                            <ul>
                                <li><a href="<?=PROOT?>">Home</a></li>
                                <li><a href="<?=PROOT?>Post">Post</a></li>
                                <li><a href="<?=PROOT?>HowItWorks">How it Work</a></li>
                                <li><a href="<?=PROOT?>Vendors">Vendor</a></li>
                                <li><a href="<?=PROOT?>About">About Us</a></li>
                                <li><a href="<?=PROOT?>Contact">Contact Us</a></li>
                                
                            </ul>
                        </nav>
                    </div>
                    <!--Menu end-->

                    <!-- Cart & Search Area Start -->
                    <div class="col-xl-2 col-lg-2 col-12">
                        <div class="header-btn-action d-flex justify-content-end">
                            <div class="btn-action-wrap d-flex">
                                <?php
                                    if(isset($_SESSION['master_id']))
                                    {
                                        ?>
                                        <div class="jp-author item">
                                            <a href="<?=PROOT?>dashboard">
                                                <i class="lnr lnr-home" ></i>
                                                <span>My Account</span>
                                            </a>
                                        </div>
                                        <?php
                                    }
                                    else
                                    {
                                        ?>
                                        <div class="jp-author item">
                                            <a href="<?=PROOT?>Login">
                                                <i class="lnr lnr-user" ></i>
                                                <span>Login</span>
                                            </a>
                                        </div>
                                        <?php
                                    }
                                    ?>
                              
                            </div>
                        </div>
                    </div>
                    <!-- Cart & Search Area End -->
                </div>

            </div>
        </div>
    </header>
    <!--Header section end-->

    <!--Header Mobile section start-->
    <header class="header-mobile bg_color--2 d-block d-lg-none">
        <div class="header-bottom menu-right">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="header-mobile-navigation d-block d-lg-none">
                            <div class="row align-items-center">
                                <div class="col-3 col-md-3">
                                    <div class="mobile-navigation text-right">
                                        <div class="header-icon-wrapper">
                                            <ul class="icon-list justify-content-start">
                                                <li class="popup-mobile-click">
                                                    <a href="javascript:void(0)"><i class="lnr lnr-menu"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-md-6">
                                    <div class="header-logo text-center">
                                        <a href="index.html">
                                            <img src="<?=PROOT?>assets/images/logo-mobile.png" class="img-fluid" alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-3 col-md-3">
                                    <div class="mobile-navigation text-right">
                                        <div class="header-icon-wrapper">
                                            <ul class="icon-list justify-content-end">
                                                <li>
                                                    <div class="header-cart-icon">
                                                        <a href="#" class="header-search-toggle"><i class="lnr lnr-magnifier"></i></a>
                                                    </div>
                                                    <div class="header-search-form">
                                                        <form action="#">
                                                            <input type="text" placeholder="Type and hit enter">
                                                            <button><i class="lnr lnr-magnifier"></i></button>
                                                        </form>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </header>
    <!--Header Mobile section end-->

    <!-- Start Popup Menu -->
    <div class="popup-mobile-manu popup-mobile-visiable">
        <div class="inner">
            <div class="mobileheader">
                <div class="logo">
                    <a href="index.html">
                        <img src="<?=PROOT?>assets/images/logo-mobile.png" alt="Multipurpose">
                    </a>
                </div>
                <a class="mobile-close" href="#"></a>
            </div>
            <div class="menu-content">
                <ul class="menulist object-custom-menu">
                    <li class="has-mega-menu"><a href="#"><span>Home</span></a>
                        <!-- Start Dropdown Menu -->
                        <ul class="object-submenu">
                            <li><a href="index.html"><span>Home V1</span></a></li>
                            <li><a href="index-2.html"><span>Home V2</span></a></li>
                            <li><a href="index-3.html"><span>Home V3</span></a></li>
                            <li><a href="index-4.html"><span>Home V4</span></a></li>
                        </ul>
                        <!-- End Dropdown Menu -->
                    </li>

                    <li class="has-mega-menu"><a href="#"><span>Jobs</span></a>
                        <!-- Start Dropdown Menu -->
                        <ul class="object-submenu">
                            <li><a href="job-listing.html"><span>Jobs Listing</span></a></li>
                            <li><a href="job-with-map.html"><span>Jobs With Map</span></a></li>
                            <li><a href="job-details.html"><span>Job Detail V1</span></a></li>
                            <li><a href="job-details-two.html"><span>Job Detail V2</span></a></li>
                        </ul>
                        <!-- End Dropdown Menu -->
                    </li>

                    <li class="has-mega-menu"><a href="#"><span>Candidates</span></a>
                        <!-- Start Dropdown Menu -->
                        <ul class="object-submenu">
                            <li><a href="candidates-listing.html"><span>Candidates Listing</span></a></li>
                            <li><a href="candidate-details.html"><span>Candidate Details V1</span></a></li>
                            <li><a href="candidate-details-two.html"><span>Candidate Details V2</span></a></li>
                        </ul>
                        <!-- End Dropdown Menu -->
                    </li>

                    <li class="has-mega-menu"><a href="#"><span>Employers</span></a>
                        <!-- Start Dropdown Menu -->
                        <ul class="object-submenu">
                            <li><a href="employer-listing.html"><span>Employers Listing</span></a></li>
                            <li><a href="employer-details.html"><span>Employer Detail V1</span></a></li>
                            <li><a href="employer-details-two.html"><span>Employer Detail V2</span></a></li>
                        </ul>
                        <!-- End Dropdown Menu -->
                    </li>

                    <li class="has-mega-menu"><a href="#"><span>Blog</span></a>
                        <!-- Start Dropdown Menu -->
                        <ul class="object-submenu">
                            <li><a href="blog.html"><span>Blog</span></a></li>
                            <li><a href="blog-details.html"><span>Blog Details</span></a></li>
                        </ul>
                        <!-- End Dropdown Menu -->
                    </li>

                    <li class="has-mega-menu"><a href="#"><span>Pages</span></a>
                        <!-- Start Dropdown Menu -->
                        <ul class="object-submenu">
                            <li><a href="about.html"><span>About Us</span></a></li>
                            <li><a href="contact.html"><span>Contact Us</span></a></li>
                            <li><a href="faq.html"><span>FAQS</span></a></li>
                            <li><a href="pricing.html"><span>Pricing & Plan</span></a></li>
                            <li><a href="login-register.html"><span>Login / Register</span></a></li>
                            <li><a href="dashboard.html"><span>Dashboard</span></a></li>
                            <li><a href="shop.html"><span>Shop</span></a></li>
                            <li><a href="product-details.html"><span>Product Details</span></a></li>
                            <li><a href="cart.html"><span>Cart</span></a></li>
                            <li><a href="checkout.html"><span>Checkout</span></a></li>
                            <li><a href="wishlist.html"><span>Wishlist</span></a></li>
                            <li><a href="404.html"><span>404 Error</span></a></li>
                        </ul>
                        <!-- End Dropdown Menu -->
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Popup Menu -->

    <!-- Bottom Navbar Mobile Start -->
    <div class="bottom-navbar-mobile section d-block d-lg-none">
        <nav>
            <ul class="list-actions">
                <li>
                    <a class="toggle-btn active" href="index.html">
                        <span><i class="lnr lnr-home"></i></span>
                        <span class="text">Home</span>
                    </a>
                </li>
                <li>
                    <a class="toggle-btn toggle-btn-js" data-target="#job-list-mobile-id" href="#">
                        <span><i class="lnr lnr-list"></i></span>
                        <span class="text">Jobs list</span>
                    </a>
                </li>
                <li>
                    <a href="login-register.html">
                        <span><i class="lnr lnr-heart"></i></span>
                        <span class="text">Save</span>
                    </a>
                </li>
                <li>
                    <a class="toggle-btn-two toggle-btn-js" data-target="#notifications-mobile-id" href="#">
                        <span><i class="lnr lnr-alarm"></i></span>
                        <span class="text">Notifications</span>
                    </a>
                </li>
                <li>
                    <a href="login-register.html">
                        <span><i class="lnr lnr-user"></i></span>
                        <span class="text">Account</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <!-- Bottom Navbar Mobile End -->

    <!-- Bottom Navbar Mobile Popup Start -->
    <div class="mobile-popup">
        <div class="job-list-mobile" id="job-list-mobile-id">
            <div class="heading">
                <div class="title">
                    <i class="lnr lnr-list"></i>
                    <h3>All Jobs list</h3>
                </div>
                <a class="view-all" href="#">See all jobs</a>
            </div>
            <div class="content-popup-scroll">
                <ul class="list-item">
                    <li><a href="job-listing.html"><i class="lnr lnr-printer"></i>Accounting </a></li>
                    <li><a href="job-listing.html"><i class="lnr lnr-film-play"></i>Broadcasting </a></li>
                    <li><a href="job-listing.html"><i class="lnr lnr-phone"></i>Customer Service </a></li>
                    <li><a href="job-listing.html"><i class="lnr lnr-bullhorn"></i>Digital Marketing </a></li>
                    <li><a href="job-listing.html"><i class="lnr lnr-chart-bars"></i>Finance & Accounting </a></li>
                    <li><a href="job-listing.html"><i class="lnr lnr-smartphone"></i>Game Mobile </a></li>
                    <li><a href="job-listing.html"><i class="lnr lnr-picture"></i>Graphics & Design </a></li>
                    <li><a href="job-listing.html"><i class="lnr lnr-home"></i>Graphics & Design </a></li>
                    <li><a href="job-listing.html"><i class="lnr lnr-database"></i>Medical Doctor </a></li>
                    <li><a href="job-listing.html"><i class="lnr lnr-dinner"></i>Restaurant </a></li>
                </ul>
            </div>
        </div>
        <div class="notifications-mobile" id="notifications-mobile-id">
            <div class="heading">
                <div class="title">
                    <i class="lnr lnr-list"></i>
                    <h3>All Notifications</h3>
                </div>
                <a class="view-all" href="#">See all jobs</a>
            </div>
            <div class="content-popup-scroll">
                <ul class="list-item">
                    <li><a href="login-register.html"><i class="lnr lnr-book"></i><span><b class="highlight">Register now</b> to reach dream jobs easier.</span> </a></li>
                    <li><a href="job-with-map.html"><i class="lnr lnr-book"></i><span><b class="highlight">Job suggestion</b> you might be interested based on your profile.</span> </a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Bottom Navbar Mobile Popup End -->


<?= $this->content('body'); ?> 

<!--Footer section start-->
        <footer class="footer-section section">

            <!-- Footer Top Section Start -->
            <div class="footer-top-section section pt-115 pt-lg-95 pt-md-75 pt-sm-55 pt-xs-45 pb-90 pb-lg-70 pb-md-40 pb-sm-20 pb-xs-15">
                <div class="container">
                    <div class="row">

                        <div class="col-xl-4 col-lg-3 col-md-6">
                            <!-- Footer Widget Start -->
                            <div class="footer-widget mb-30">
                                <h6 class="title">Contact Info</h6>
                                <div class="address">
                                    <i class="lnr lnr-map-marker"></i>
                                    <span>8375 E. Heather Drive Tonawanda, Manchester 14150, United Kingdom</span>
                                </div>
                                <div class="email">
                                    <i class="lnr lnr-envelope"></i>
                                    <span>jopota@recruitment.com</span>
                                </div>
                                <div class="phone theme-color">(+1) 000 987-1234</div>
                                <div class="footer-widget-image d-flex mt-35">
                                    <a class="mr-5" href="#"><img src="<?=PROOT?>assets/images/app-store/app-store-2.png" alt=""></a>
                                    <a href="#"><img src="<?=PROOT?>assets/images/app-store/app-chplay-2.png" alt=""></a>
                                </div>
                            </div>
                            <!-- Footer Widget End -->
                        </div>

                        <div class="col-xl-2 col-lg-2 col-md-6">
                            <!-- Footer Widget Start -->
                            <div class="footer-widget mb-30">
                                <h6 class="title">Useful Links</h6>
                                <div class="footer-widget-link">
                                    <ul>
                                        <li><a href="<?=PROOT?>register">Vendor Register</a></li>
                                        <li><a href="<?=PROOT?>PrivacyPolicy">Policy Privacy</a></li>
                                        <li><a href="<?=PROOT?>TermsAndConditions">Terms And Conditions</a></li>
                                        <li><a href="#">Partner</a></li>
                                        <li><a href="#">Help Center</a></li>
                                        <li><a href="<?=PROOT?>Contact">Contact Us</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Footer Widget End -->
                        </div>

                        <div class="col-xl-2 col-lg-3 col-md-6">
                            <!-- Footer Widget Start -->
                            <div class="footer-widget mb-30">
                                <h6 class="title">Featured Jobs</h6>
                                <div class="footer-widget-link">
                                    <ul>
                                        <li><a href="#">Teachers</a></li>
                                        <li><a href="#">Accounting</a></li>
                                        <li><a href="#">Customer Service</a></li>
                                        <li><a href="#">Digital Marketing</a></li>
                                        <li><a href="#">Web & Software Dev</a></li>
                                        <li><a href="#">Science & Analitycs</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Footer Widget End -->
                        </div>

                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <!-- Footer Widget Start -->
                            <div class="footer-widget mb-30">
                                <h6 class="title">Newsletter</h6>
                                <div class="newsletter">
                                    <p>Join our email subscription now to get updates on <strong>new jobs</strong> and <strong>notifications</strong>.</p>
                                    <div class="newsletter-form">
                                        <form id="mc-form" class="mc-form">
                                            <input type="email" placeholder="Enter Your email..." required="" name="EMAIL">
                                            <button class="ht-btn small-btn" type="submit" value="submit">Subscribe</button>
                                        </form>
                                    </div>
                                    <!-- mailchimp-alerts Start -->
                                    <div class="mailchimp-alerts">
                                        <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                                        <div class="mailchimp-success"></div><!-- mailchimp-success end -->
                                        <div class="mailchimp-error"></div><!-- mailchimp-error end -->
                                    </div>
                                    <!-- mailchimp-alerts end -->
                                </div>
                            </div>
                            <!-- Footer Widget End -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer Top Section End -->

            <!--Footer bottom start-->
            <div class="footer-bottom section fb-60">
                <div class="container">
                    <div class="row no-gutters st-border pt-35 pb-35 align-items-center justify-content-between">
                        <div class="col-lg-6 col-md-6">
                            <div class="copyright">
                                <p>&copy;2023 <a href="#">Broombids</a>. All rights reserved.</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="footer-social">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                                <a href="#"><i class="fab fa-google"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Footer bottom end-->

        </footer>
        <!--Footer section end-->


    </div>

    <!-- Placed js at the end of the document so the pages load faster -->

    <!-- All jquery file included here -->
    <script src="<?=PROOT?>assets/js/vendor/jquery-3.5.0.min.js"></script>
    <script src="<?=PROOT?>assets/js/vendor/jquery-migrate-3.1.0.min.js"></script>
    <script src="<?=PROOT?>assets/js/vendor/bootstrap.bundle.min.js"></script>
    <!-- <script src="<?=PROOT?>assets/js/plugins/plugins.js"></script> -->

    <!-- Use the minified version files listed below for better performance and remove the files listed above -->
    <script src="<?=PROOT?>assets/js/plugins/plugins.min.js"></script>
    <script src="<?=PROOT?>assets/js/main.js"></script>
    <script src="<?=PROOT?>js/my.js"></script>
   
</body>

</html>