<?php
if(isset($_SESSION['adminid']))
{
  $newUser=new Users();
  $id=$_SESSION['adminid'];
  $user = $newUser->FindByIDSigle('adminusers',$id);
  if($user)
  {
      $uname = $user->fname;
      $uemail = $user->email;
  }
  else
  {
    Router::redirect('dashboard');
  }
}
else
{
  Router::redirect('home');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Broombids - Dashboard</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="Admin template that can be used to build dashboards for CRM, CMS, etc." />
    <meta name="author" content="Potenza Global Solutions" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- app favicon -->
    <link rel="shortcut icon" href="<?=PROOT?>images/icon.fw.png">
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <!-- plugin stylesheets -->
    <link rel="stylesheet" type="text/css" href="<?=PROOT?>assets/css/vendors.css" />
    <!-- app style -->
    <link rel="stylesheet" type="text/css" href="<?=PROOT?>assets/css/style.css" />
</head>

<body>
<!-- begin app -->
<div class="app">
    <!-- begin app-wrap -->
    <div class="app-wrap">
        <!-- begin pre-loader -->
        <div class="loader">
            <div class="h-100 d-flex justify-content-center">
                <div class="align-self-center">
                    <img src="<?=PROOT?>assets/img/loader/loader.svg" alt="loader">
                </div>
            </div>
        </div>
        <!-- end pre-loader -->
        <!-- begin app-header -->
        <header class="app-header top-bar">
            <!-- begin navbar -->
            <nav class="navbar navbar-expand-md">

                <!-- begin navbar-header -->
                <div class="navbar-header d-flex align-items-center">
                    <a href="javascript:void:(0)" class="mobile-toggle"><i class="ti ti-align-right"></i></a>
                    <a class="navbar-brand" href="<?=PROOT?>dashboard">
                        <img src="<?=PROOT?>images/logolight.png" class="img-fluid logo-desktop" alt="logo" />
                        <img src="<?=PROOT?>images/sidelogo.fw.png" class="img-fluid logo-mobile" alt="logo" />
                    </a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="ti ti-align-left"></i>
                </button>
                <!-- end navbar-header -->
                <!-- begin navigation -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <div class="navigation d-flex">
                        <ul class="navbar-nav nav-left">
                            <li class="nav-item">
                                <a href="javascript:void(0)" class="nav-link sidebar-toggle">
                                    <i class="ti ti-align-right"></i>
                                </a>
                            </li>
                           
                            <li class="nav-item full-screen d-none d-lg-block" id="btnFullscreen">
                                <a href="javascript:void(0)" class="nav-link expand">
                                    <i class="icon-size-fullscreen"></i>
                                </a>
                            </li>
                        </ul>
                        <ul class="navbar-nav nav-right ml-auto">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="ti ti-email"></i>
                                </a>
                                <div class="dropdown-menu extended animated fadeIn" aria-labelledby="navbarDropdown">
                                    <ul>
                                        <li class="dropdown-header bg-gradient p-4 text-white text-left">Messages
                                            <label class="label label-info label-round">6</label>
                                            <a href="#" class="float-right btn btn-square btn-inverse-light btn-xs m-0">
                                                <span class="font-13"> Mark all as read</span></a>
                                        </li>
                                        <li class="dropdown-body">
                                            <ul class="scrollbar scroll_dark max-h-240">
                                                <li>
                                                    <a href="javascript:void(0)">
                                                        <div class="notification d-flex flex-row align-items-center">
                                                            <div class="notify-icon bg-img align-self-center">
                                                                <img class="img-fluid" src="<?=PROOT?>assets/img/avtar/03.jpg" alt="user3">
                                                            </div>
                                                            <div class="notify-message">
                                                                <p class="font-weight-bold">Brianing Leyon</p>
                                                                <small>You will sail along until you...</small>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)">
                                                        <div class="notification d-flex flex-row align-items-center">
                                                            <div class="notify-icon bg-img align-self-center">
                                                                <img class="img-fluid" src="<?=PROOT?>assets/img/avtar/01.jpg" alt="user">
                                                            </div>
                                                            <div class="notify-message">
                                                                <p class="font-weight-bold">Jimmyimg Leyon</p>
                                                                <small>Okay</small>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)">
                                                        <div class="notification d-flex flex-row align-items-center">
                                                            <div class="notify-icon bg-img align-self-center">
                                                                <img class="img-fluid" src="<?=PROOT?>assets/img/avtar/02.jpg" alt="user2">
                                                            </div>
                                                            <div class="notify-message">
                                                                <p class="font-weight-bold">Brainjon Leyon</p>
                                                                <small>So, make the decision...</small>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)">
                                                        <div class="notification d-flex flex-row align-items-center">
                                                            <div class="notify-icon bg-img align-self-center">
                                                                <img class="img-fluid" src="<?=PROOT?>assets/img/avtar/04.jpg" alt="user4">
                                                            </div>
                                                            <div class="notify-message">
                                                                <p class="font-weight-bold">Smithmin Leyon</p>
                                                                <small>Thanks</small>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)">
                                                        <div class="notification d-flex flex-row align-items-center">
                                                            <div class="notify-icon bg-img align-self-center">
                                                                <img class="img-fluid" src="<?=PROOT?>assets/img/avtar/05.jpg" alt="user5">
                                                            </div>
                                                            <div class="notify-message">
                                                                <p class="font-weight-bold">Jennyns Leyon</p>
                                                                <small>How are you</small>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)">
                                                        <div class="notification d-flex flex-row align-items-center">
                                                            <div class="notify-icon bg-img align-self-center">
                                                                <img class="img-fluid" src="<?=PROOT?>assets/img/avtar/06.jpg" alt="user6">
                                                            </div>
                                                            <div class="notify-message">
                                                                <p class="font-weight-bold">Demian Leyon</p>
                                                                <small>I like your themes</small>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="dropdown-footer">
                                            <a class="font-13" href="javascript:void(0)"> View All messages </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            
                            
                            <li class="nav-item dropdown user-profile">
                                <a href="javascript:void(0)" class="nav-link dropdown-toggle " id="navbarDropdown4" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="<?=PROOT?>images/sidelogo.fw.png" alt="avtar-img">
                                    <span class="bg-success user-status"></span>
                                </a>
                                <div class="dropdown-menu animated fadeIn" aria-labelledby="navbarDropdown">
                                    <div class="bg-gradient px-4 py-3">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="mr-1">
                                                <h4 class="text-white mb-0"><?php echo $uname; ?></h4>
                                                <small class="text-white"><?php echo $uemail; ?></small>
                                            </div>
                                            <a href="<?=PROOT?>Logout" class="text-white font-20 tooltip-wrapper" data-toggle="tooltip" data-placement="top" title="" data-original-title="Logout"> <i
                                                            class="zmdi zmdi-power"></i></a>
                                        </div>
                                    </div>
                                    <div class="p-4">
                                        <a class="dropdown-item d-flex nav-link" href="javascript:void(0)" id="getcontroller_edit" fdi="<?php echo $user->id; ?>" controller="AdminUserEdit">
                                            <i class="fa fa-user pr-2 text-success"></i> Profile</a>
                                       
                                        <a class="dropdown-item d-flex nav-link" href="<?=PROOT?>Logout">
                                            <i class="zmdi zmdi-power pr-2 text-info"></i> Log Out
                                        </a>
                                       
                                        
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- end navigation -->
            </nav>
            <!-- end navbar -->
        </header>
        <!-- end app-header -->
        <!-- begin app-container -->
        <div class="app-container">
            <!-- begin app-nabar -->
            <aside class="app-navbar">
                <!-- begin sidebar-nav -->
                <div class="sidebar-nav scrollbar scroll_light">
                    <ul class="metismenu " id="sidebarNav">
                        
                        <li class="active" href="javascript:void(0);" id="getcontroller" controller="Dashboard">
                            <a href="javascript:void(0)" aria-expanded="false">
                                <i class="nav-icon ti ti-home"></i>
                                <span class="nav-title">Dashboard</span>
                            </a>
                        </li>
                       
                        <li><a class="has-arrow" href="javascript:void(0)" aria-expanded="false"><i class="nav-icon ti ti-user"></i><span class="nav-title">Admin Users</span></a>
                            <ul aria-expanded="false">
                                <li id="getcontroller" controller="addAdminUser"> <a href='javascript:void(0);'>Add New User</a> </li>
                                <li id="getcontroller" controller="AdminUserList"> <a href='javascript:void(0);'>Users List</a> </li>
                            </ul>
                        </li>                  
                       
                        <li>
                            <a class="has-arrow" href="javascript:void(0)" aria-expanded="false"><i class="nav-icon ti ti-face-smile"></i> <span class="nav-title">Customer</span></a>
                            <ul aria-expanded="false">
                                <li> <a href="javascript:void(0);" id="getcontroller" controller="CreateCustomer">Create Customer</a> </li>
                                <li> <a href="javascript:void(0);" id="getcontroller" controller="CustomerList">Customers</a> </li>                                    
                            </ul>
                        </li> 

                        

                        <li>
                            <a class="has-arrow" href="javascript:void(0)" aria-expanded="false"><i class="nav-icon ti ti-face-smile"></i> <span class="nav-title">Vendors</span></a>
                            <ul aria-expanded="false">
                                <li> <a href="javascript:void(0);" id="getcontroller" controller="CreateVender">Create Vendor</a> </li>
                                <li> <a href="javascript:void(0);" id="getcontroller" controller="VenderUserList">Vendors</a> </li>                                    
                            </ul>
                        </li> 

                        <li><a class="has-arrow" href="javascript:void(0)" aria-expanded="false"><i class="nav-icon ti ti-car"></i><span class="nav-title">Vehicle Settings</span></a>
                            <ul aria-expanded="false">
                                <li id="getcontroller" controller="VehicleType"> <a href='javascript:void(0);'>Vehicle Type</a> </li>
                                <li id="getcontroller" controller="VehicleCompany"> <a href='javascript:void(0);'>Vehicle Company</a> </li>
                                <li id="getcontroller" controller="VehicleName"> <a href='javascript:void(0);'>Vehicle Name</a> </li>
                                <li id="getcontroller" controller="VehicleFuelType"> <a href='javascript:void(0);'>Vehicle Fuel Type</a> </li>
                                <li id="getcontroller" controller="VehicleTransmission"> <a href='javascript:void(0);'>Vehicle Transmission</a> </li>
                                <li id="getcontroller" controller="ManageVehicle"> <a href='javascript:void(0);'>Manage Vehicle</a> </li>
                            </ul>
                        </li>

                        <li id="getcontroller" controller="VehicleList">
                            <a href="javascript:void(0)" aria-expanded="false">
                                <i class="nav-icon ti ti-server"></i>
                                <span class="nav-title">Vehicle List</span>
                            </a>
                        </li> 

                        <li id="getcontroller" controller="Post">
                            <a href="javascript:void(0)" aria-expanded="false">
                                <i class="nav-icon ti ti-list-ol"></i>
                                <span class="nav-title">All Post</span>
                            </a>
                        </li> 

                        <li id="getcontroller" controller="ContestInformation">
                            <a href="javascript:void(0)" aria-expanded="false">
                                <i class="nav-icon ti ti-list-ol"></i>
                                <span class="nav-title">Contest Information</span>
                            </a>
                        </li> 


                        <li id="getcontroller" controller="Location">
                            <a href="javascript:void(0)" aria-expanded="false">
                                <i class="nav-icon ti ti-location-pin"></i>
                                <span class="nav-title">Locations</span>
                            </a>
                        </li> 
                        

                        <li id="getcontroller" controller="Faq">
                            <a href="javascript:void(0)" aria-expanded="false">
                                <i class="nav-icon ti ti-help"></i>
                                <span class="nav-title">FAQ</span>
                            </a>
                        </li> 
                        
                        <li id="getcontroller" controller="Subscription">
                            <a href="javascript:void(0)" aria-expanded="false">
                                <i class="nav-icon ti ti-bell"></i>
                                <span class="nav-title">Subscription</span>
                            </a>
                        </li> 

                        <li id="getcontroller" controller="support">
                            <a href="javascript:void(0)" aria-expanded="false">
                                <i class="nav-icon ti ti-headphone-alt"></i>
                                <span class="nav-title">Support</span>
                            </a>
                        </li> 

                        <li>
                            <a href="<?php echo PROOT; ?>blog" aria-expanded="false">
                                <i class="nav-icon ti ti-write"></i>
                                <span class="nav-title">Blog</span>
                            </a>
                        </li> 

                        <!-- <li id="getcontroller" controller="NotFound">
                            <a href="javascript:void(0)" aria-expanded="false">
                                <i class="nav-icon ti ti-location-pin"></i>
                                <span class="nav-title">404</span>
                            </a>
                        </li>  -->



                        <li >
                            <a href="<?=PROOT?>Logout" aria-expanded="false">
                                <i class="nav-icon ti ti-power-off"></i>
                                <span class="nav-title">Log Out</span>
                            </a>
                        </li>                        
                    </ul>
                </div>
                <!-- end sidebar-nav -->
            </aside>
            <!-- end app-navbar -->
            <!-- begin app-main -->
            <div class="app-main" id="main">
                <!-- begin container-fluid -->
                <div class="container-fluid" id="pagecontain">
  
                  <?= $this->content('body'); ?> 


                 </div>
                    <!-- end container-fluid -->
            </div>
                <!-- end app-main -->
        </div>
        <!-- end app-container -->
        <!-- begin footer -->
        <footer class="footer">
            <div class="row">
                <div class="col-12 col-sm-6 text-center text-sm-left">
                    <p>&copy; Copyright <?php echo date('Y'); ?>. All rights reserved.</p>
                </div>
                <div class="col  col-sm-6 ml-sm-auto text-center text-sm-right">
                    <p>Broombids</p>
                </div>
            </div>
        </footer>
        <!-- end footer -->
    </div>
    <!-- end app-wrap -->
</div>
<!-- end app -->
  <script type="text/javascript">
    var path = '<?=PROOT?>';
  </script>
    <!-- plugins -->

    <script src="<?=PROOT?>assets/js/vendors.js"></script>

    <!-- custom app -->
    <script src="<?=PROOT?>assets/js/app.js"></script>
    <script src="<?=PROOT?>js/admin.js"></script>

</body>

</html>