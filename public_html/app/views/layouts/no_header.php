<!DOCTYPE html>
<html lang="en">    
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1" />
    <!-- <meta name="google-signin-client_id" content="764086051850-6qr4p6gpi6hn506pt8ejuq83di341hur.apps.googleusercontent.com"> -->
    <meta name="google-signin-client_id" content="906233784400-mtdnrr84lf4vaup77eid8k9s6b0j43ec.apps.googleusercontent.com">
    <title><?= $this->SiteTitle('Self Drive Car Rentals | Travel Safe in Sanitized Cars @ broombids'); ?></title>
    <link rel="apple-touch-icon" sizes="180x180" href="<?=PROOT?>images/favicon.ico" />
    <link rel="icon" type="image/png" sizes="32x32" href="<?=PROOT?>images/favicon.ico" />
    <link rel="icon" type="image/png" sizes="16x16" href="<?=PROOT?>images/favicon.ico" />
    <link rel="mask-icon" href="<?=PROOT?>home_assets/assets/img/fav/safari-pinned-tab.svg" color="#fa7070" />
    <meta name="msapplication-TileColor" content="#fa7070" />
    <meta name="theme-color" content="#fa7070" />
    <link rel="stylesheet" href="<?=PROOT?>dependencies/bootstrap/css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="<?=PROOT?>dependencies/fontawesome/css/all.min.css" type="text/css" />
    <link rel="stylesheet" href="<?=PROOT?>dependencies/swiper/css/swiper.min.css" type="text/css" />
    <link rel="stylesheet" href="<?=PROOT?>dependencies/wow/css/animate.css" type="text/css" />
    <link rel="stylesheet" href="<?=PROOT?>dependencies/magnific-popup/css/magnific-popup.css" type="text/css" />
    <link rel="stylesheet" href="<?=PROOT?>dependencies/components-elegant-icons/css/elegant-icons.min.css" type="text/css" />
    <link rel="stylesheet" href="<?=PROOT?>dependencies/simple-line-icons/css/simple-line-icons.css" type="text/css" />
    <link rel="stylesheet" href="<?=PROOT?>home_assets/assets/css/app.css" type="text/css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"> 

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="<?=PROOT?>css/my.css?v=<?php echo time(); ?>" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800" rel="stylesheet" />
    <script type="text/javascript">
        var path = '<?=PROOT?>';
    </script>
    <style type="text/css">
        #myaccountmenu
        {
            display: none;
        }
        @media only screen and (max-width: 600px) {
          #myaccountmenu
            {
                display: block;
            }
        }

    </style>
    <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-Y4JXD9LCHX"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-Y4JXD9LCHX');
</script>
</head>
<body id="home-version-1" class="home-color-two" data-style="default">
    <a href="#main_content" data-type="section-switch" class="return-to-top"><i class="fa fa-chevron-up"></i></a>
    <div class="page-loader">
        <div class="loader">
            <div class="blobs">
                <div class="blob-center"></div>
                <div class="blob"></div>
                <div class="blob"></div>
                <div class="blob"></div>
                <div class="blob"></div>
                <div class="blob"></div>
                <div class="blob"></div>
            </div>            
        </div>
    </div>
    <div id="main_content">
        <header class="site-header header-two header_trans-fixed" data-top="992">
            <div class="container">
                <div class="header-inner">
                    <div class="site-mobile-logo">
                        <a href="<?=PROOT?>" class="logo"><img src="<?=PROOT?>images/maillogo.png" alt="broombids logo" class="main-logo" /> <img src="<?=PROOT?>images/maillogo.png" alt="broombids" class="sticky-logo" /></a>
                    </div>
                    <div class="toggle-menu"><span class="bar"></span> <span class="bar"></span> <span class="bar"></span></div>
                    <nav class="site-nav nav-two">
                        <div class="close-menu"><span></span> <i class="ei ei-icon_close"></i></div>
                        <div class="site-logo">
                            <a href="<?=PROOT?>" class="logo"><img src="<?=PROOT?>images/maillogo.png" alt="broombids logo" class="main-logo" /> <img src="<?=PROOT?>images/maillogo.png" alt="broombids logo" class="sticky-logo" /></a>
                        </div>
                    </nav>
                </div>
            </div>
        </header>

        <?= $this->content('body'); ?> 

        <footer id="footer" class="footer-two">
                <div class="container">
                    <div class="footer-inner wow pixFadeUp">
                        <div class="row">
                            <div class="col-lg-3 col-md-6">
                                <div class="widget footer-widget">
                                    <h3 class="widget-title">Company</h3>
                                    <ul class="footer-menu">                                        
                                        <li><a href="<?=PROOT?>About">About Us</a></li>
                                        <li><a href="<?=PROOT?>blog">Blog</a></li>
                                        <li><a href="<?=PROOT?>Contact">Get In Touch</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="widget footer-widget">
                                    <h3 class="widget-title">Policy</h3>
                                    <ul class="footer-menu">
                                        <li><a href="<?=PROOT?>PrivacyPolicy">Privacy Policy</a></li>
                                        <li><a href="<?=PROOT?>TermsAndConditions">Terms and Conditions</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="widget footer-widget">
                                    <h3 class="widget-title">Partner</h3>
                                    <ul class="footer-menu">
                                        <li><a href="<?=PROOT?>register">Vendor Registration</a></li>
                                        <li><a href="<?=PROOT?>VendorPolicy">Vendor Policy</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="widget footer-widget">
                                    <h3 class="widget-title">Our Address</h3>
                                    <p>Kos dodecaneese, 853 02, Greece</p>
                                    <ul class="footer-social-link">
                                        <li>
                                            <a href="https://www.facebook.com/Broombids-101315618351396/" target="_blank"><i class="fab fa-facebook-f" ></i></a>
                                        </li>
                                        <li>
                                            <a href="https://twitter.com/broombids" target="_blank"><i class="fab fa-twitter"></i></a>
                                        </li>
                                        <li>
                                            <a href="https://www.instagram.com/broombids/" target="_blank"><i class="fab fa-instagram"></i></a>
                                        </li>
                                        <li>
                                            <a href="https://www.linkedin.com/in/broom-bids-a681851b4/?originalSubdomain=gr" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="site-info">
                        <div class="copyright">
                            <p>© 2023 All Rights Reserved <a href="https://broombids.com/">Broombids</a></p>
                        </div>                        
                    </div>
                </div>
            </footer>
        </div>
        <div class="sticky-icon">
   <a href="https://www.instagram.com/" class="Instagram" target="_blank"><i class="fab fa-instagram"></i> Instagram </a>
   <a href="https://www.facebook.com/" class="Facebook" target="_blank"><i class="fab fa-facebook-f"> </i> Facebook </a>
   <a href="https://aboutme.google.com/" class="Google" target="_blank"><i class="fab fa-google-plus-g"> </i> Google + </a>
   <a href="https://www.youtube.com/" class="Youtube" target="_blank"><i class="fab fa-youtube"></i> Youtube </a>
   <a href="https://twitter.com/login" class="Twitter" target="_blank"><i class="fab fa-twitter"> </i> Twitter </a>   
</div>
        <script src="<?=PROOT?>dependencies/jquery/jquery.min.js"></script>
        <script src="<?=PROOT?>dependencies/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?=PROOT?>dependencies/swiper/js/swiper.min.js"></script>
        <script src="<?=PROOT?>dependencies/jquery.appear/jquery.appear.js"></script>
        <script src="<?=PROOT?>dependencies/wow/js/wow.min.js"></script>
        <script src="<?=PROOT?>dependencies/countUp.js/countUp.min.js"></script>
        <script src="<?=PROOT?>dependencies/isotope-layout/isotope.pkgd.min.js"></script>
        <script src="<?=PROOT?>dependencies/imagesloaded/imagesloaded.pkgd.min.js"></script>
        <script src="<?=PROOT?>dependencies/jquery.parallax-scroll/js/jquery.parallax-scroll.js"></script>
        <script src="<?=PROOT?>dependencies/magnific-popup/js/jquery.magnific-popup.min.js"></script>
        <script src="<?=PROOT?>dependencies/gmap3/js/gmap3.min.js"></script>        
        <script src="<?=PROOT?>home_assets/assets/js/header.js"></script>
        <script src="<?=PROOT?>js/login.js?v=<?php echo time(); ?>"></script>
        <script src="<?=PROOT?>home_assets/assets/js/app.js"></script>
        <script src="https://apis.google.com/js/platform.js" async defer></script>

    </body>
</html>
