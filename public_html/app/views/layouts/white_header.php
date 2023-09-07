<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?= $this->SiteTitle('Self Drive Car Rentals | Travel Safe in Sanitized Cars @ broombids'); ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Place favicon.ico in the root directory -->
    <link href="images/favicon.ico" type="img/x-icon" rel="shortcut icon">
    <!-- All css files are included here. -->
    <link rel="stylesheet" href="<?=PROOT?>assets/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="<?=PROOT?>assets/css/vendor/iconfont.min.css">
    <link rel="stylesheet" href="<?=PROOT?>assets/css/vendor/helper.css">
    <!-- <link rel="stylesheet" href="<?=PROOT?>assets/css/plugins/plugins.css"> -->
    <!-- <link rel="stylesheet" href="<?=PROOT?>assets/css/style.css"> -->

    <!-- Use the minified version files listed below for better performance and remove the files listed above -->
    <link rel="stylesheet" href="<?=PROOT?>assets/css/plugins/plugins.min.css">
    <link rel="stylesheet" href="<?=PROOT?>assets/css/style.min.css">
    <link rel="stylesheet" href="<?=PROOT?>css/style.css">
    <!-- Modernizr JS -->
    <script src="<?=PROOT?>assets/js/vendor/modernizr-3.10.0.min.js"></script>
</head>
<style type="text/css">
    body
    {
        font-family: Poppins, sans-serif !important;
    }
    .myaccount_btn
    {
        background: transparent; 
        color: #2dc1d6; 
        padding: 6px 37px; 
        border: 2px solid #2dc1d6; 
        font-weight: 600; 
        border-radius: 30px;    
        font-size: 14px;
        margin-right: 30px;
    }
    .myaccount_btn:hover
    {
        background: #2dc1d6;
        color: #fff !important;
        text-decoration: none !important;
    }
    .footer-social a
    {
       height: 45px;
        width: 45px;
        line-height: 45px;
        border: 1px solid #e6dbdb;
        display: block;
        border-radius: 50%;
        color: #9694a1;
        text-align: center;
        font-size: 16px;
    }
    .footer-social a
    {
        padding-right: 0px;
    }
    .footer-social .fab 
    {
        margin-top: 14px;
    }
</style>
<body class="template-color-1">

    <div id="main-wrapper">

        <!--Header section start-->
        <header class="black-logo-version header-sticky sticky-white d-none d-lg-block">
            <div class="main-header">
                <div class="container-fluid pl-50 pl-lg-15 pl-md-15 pr-0">
                    <div class="row align-items-center no-gutters">

                        <!--Logo start-->
                        <div class="col-xl-2 col-lg-2 col-12">
                            <div class="logo">
                                <a href="<?=PROOT?>"><img src="<?=PROOT?>images/maillogo.png" alt="broombids Logo" style="width: 70%;"></a>
                            </div>
                        </div>
                        <!--Logo end-->

                        <!--Menu start-->
                        <div class="col-xl-8 col-lg-8 col-12">
                            <nav class="main-menu" style="float: right;">
                                <ul>
                                    <li><a href="<?=PROOT?>">Home</a></li>
                                    <li><a href="<?=PROOT?>HowItWorks">How it Works</a></li>
                                    <li><a href="<?=PROOT?>Post">Post</a></li>                                    
                                    <li><a href="<?=PROOT?>Contact">Contact Us</a></li>
                                </ul>
                            </nav>
                        </div>
                        <!--Menu end-->

                        <div class="col-xl-2 col-lg-2 col-12">
                            <div class="header-btn-action d-flex justify-content-end">
                                <div class="btn-action-wrap d-flex">
                                    <?php
                                    if(isset($_SESSION['master_id']))
                                    {
                                        ?>
                                        <div class="jp-author-action-two item">
                                            <a class="myaccount_btn"  href="<?=PROOT?>dashboard">My Account</a>
                                        </div>
                                        <?php
                                    }
                                    else {
                                    ?>
                                    <div class="jp-author-action-two item">
                                            <a class="myaccount_btn" style="padding: 6px 25px;" href="<?=PROOT?>Login">Login/Sign Up</a>
                                        </div>
                                    <?php } ?>
                                    
                                    
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
                                                <img src="<?=PROOT?>images/logo-white.png" class="img-fluid" alt="Cer Rental Service">
                                            </a>
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
                            <img src="<?=PROOT?>images/logo-white.png" alt="Car Rental Service">
                        </a>
                    </div>
                    <a class="mobile-close" href="#"></a>
                </div>
                <div class="menu-content">
                    <ul class="menulist object-custom-menu">
                        <li><a href="<?=PROOT?>">Home</a></li>
                        <li><a href="<?=PROOT?>HowItWorks">How it Works</a></li>
                        <li><a href="<?=PROOT?>Post">Post</a></li>                                    
                        <li><a href="<?=PROOT?>Contact">Contact Us</a></li>
                        <?php
                        if(isset($_SESSION['master_id']))
                        {
                            ?>
                            <li><a href="<?=PROOT?>dashboard">My Account</a></li>                           
                            <?php
                        }
                        else {
                        ?>
                        <li><a href="<?=PROOT?>Login">Login/Sign Up</a></li>    
                        
                        <?php } ?>
                      
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
        <footer class="footer-section section" style="background: #f8f7fc;">

            <!-- Footer Top Section Start -->
            <div class="footer-top-section section pt-115 pt-lg-95 pt-md-75 pt-sm-55 pt-xs-45 pb-90 pb-lg-70 pb-md-40 pb-sm-20 pb-xs-15">
                <div class="container">
                    <div class="row">

                        
                    <div class="col-xl-3 col-lg-2 col-md-6">
                            <!-- Footer Widget Start -->
                            <div class="footer-widget mb-30">
                                <h6 class="title">Company</h6>
                                <div class="footer-widget-link">
                                    <ul>
                                        <li><a href="<?=PROOT?>About">About Us</a></li>
                                        <li><a href="<?=PROOT?>Contact">Get In Touch</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Footer Widget End -->
                        </div>

                        <div class="col-xl-2 col-lg-2 col-md-6">
                            <!-- Footer Widget Start -->
                            <div class="footer-widget mb-30">
                                <h6 class="title">Policy</h6>
                                <div class="footer-widget-link">
                                    <ul>
                                        <li><a href="<?=PROOT?>PrivacyPolicy">Privacy Policy</a></li>
                                        <li><a href="<?=PROOT?>TermsAndConditions">Terms and Conditions</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Footer Widget End -->
                        </div>

                        <div class="col-xl-3 col-lg-3 col-md-6">
                            <!-- Footer Widget Start -->
                            <div class="footer-widget mb-30">
                                <h6 class="title">Partner</h6>
                                <div class="footer-widget-link">
                                    <ul>
                                       <li><a href="<?=PROOT?>register">Vendor Registration</a></li>
                                        <li><a href="<?=PROOT?>VendorPolicy">Vendor Policy</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Footer Widget End -->
                        </div>

                        <div class="col-xl-4 col-lg-3 col-md-6">
                            <!-- Footer Widget Start -->
                            <div class="footer-widget mb-30">
                                <h6 class="title">Contact Info</h6>
                                <div class="address">
                                    <i class="lnr lnr-map-marker"></i>
                                    <span>Kos dodecaneese, 853 02, Greece</span>
                                </div>   
                                <div class="footer-social" style="justify-content: flex-start;">
                                    <a href="https://www.facebook.com/Broombids-101315618351396/" target="_blank"><i class="fab fa-facebook-f" ></i></a>
                                     <a href="https://twitter.com/broombids" target="_blank"><i class="fab fa-twitter"></i></a>
                                    <a href="https://www.instagram.com/broombids/" target="_blank"><i class="fab fa-instagram"></i></a>
                                    <a href="https://www.linkedin.com/in/broom-bids-a681851b4/?originalSubdomain=gr" target="_blank"><i class="fab fa-linkedin-in"></i></a>
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
                                <p>&copy;2023 All Rights Reserved <a href="https://broombids.com/">Broombids</a></p>
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
    <script type="text/javascript">
        var path = '<?=PROOT?>';
    </script>
    <!-- All jquery file included here -->
    <script src="<?=PROOT?>assets/js/vendor/jquery-3.5.0.min.js"></script>
    <script src="<?=PROOT?>assets/js/vendor/jquery-migrate-3.1.0.min.js"></script>
    <script src="<?=PROOT?>assets/js/vendor/bootstrap.bundle.min.js"></script>
    <!-- <script src="<?=PROOT?>assets/js/plugins/plugins.js"></script> -->

    <!-- Use the minified version files listed below for better performance and remove the files listed above -->
   
    <script src="<?=PROOT?>assets/js/main.js"></script>
    <script src="<?=PROOT?>js/my.js?v=<?php echo time(); ?>"></script>
    <script src="<?=PROOT?>js/price_range.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
   <script type="text/javascript">
    var today = new Date(); 
    var dd = today.getDate(); 
    var mm = today.getMonth()+1; //January is 0! 
    var yyyy = today.getFullYear(); 
    if(dd<10){ dd='0'+dd } 
    if(mm<10){ mm='0'+mm } 
    var today = dd+'/'+mm+'/'+yyyy; 

  $('#fromdate').daterangepicker({
    singleDatePicker: true,
    minYear: 1901,
    minDate:today,
    "autoApply": true,
    "drops": "up",
    maxYear: parseInt(moment().format('YYYY'),10)
  }, function(start, end, label) {
  });

  $('#todate').daterangepicker({
    singleDatePicker: true,
    minYear: 1901,
    minDate:today,
    "autoApply": true,
    "drops": "up",
    maxYear: parseInt(moment().format('YYYY'),10)
  }, function(start, end, label) {
  });
  $('#fromdate').val('');
  $('#todate').val('');
  </script>
  <script type="text/javascript">
var expanded = false;
function showCheckboxes() {
  var checkboxes = document.getElementById("checkboxes");
  if (!expanded) {
    checkboxes.style.display = "block";
    expanded = true;
  } else {
    checkboxes.style.display = "none";
    expanded = false;
  }
}

var selectvehicle = false;
$(document).on('click','#selectvehicle',function(){
     var checkboxes = document.getElementById("checkboxes_vtype");
      if (!selectvehicle) {
        checkboxes.style.display = "block";
        selectvehicle = true;
      } else {
        checkboxes.style.display = "none";
        selectvehicle = false;
      }
});

var selectcompany = false;
$(document).on('click','#selectcompany',function(){
     var checkboxes = document.getElementById("checkboxes_cname");
      if (!selectcompany) {
        checkboxes.style.display = "block";
        selectcompany = true;
      } else {
        checkboxes.style.display = "none";
        selectcompany = false;
      }
});

var selectname = false;
$(document).on('click','#selectname',function(){
     var checkboxes = document.getElementById("checkboxes_vname");
      if (!selectname) {
        checkboxes.style.display = "block";
        selectname = true;
      } else {
        checkboxes.style.display = "none";
        selectname = false;
      }
});
 

  </script>
</body>

</html>