<?php
if(!isset($_SESSION['admin_name']) || empty($_SESSION['admin_name']))
{
  Router::Redirect('Admin');
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>      
    
    
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

 <title><?= $this->SiteTitle('Legacy Giveaway'); ?></title> 

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?=PROOT?>plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
 

   <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=PROOT?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=PROOT?>dist/css/adminlte.min.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?=PROOT?>plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- jQuery -->
<script src="<?=PROOT?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=PROOT?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=PROOT?>dist/js/adminlte.min.js"></script>
<script src="<?=PROOT?>dist/js/demo.js"></script>
<!-- Summernote -->
<script src="<?=PROOT?>plugins/summernote/summernote-bs4.min.js"></script>

<script type="text/javascript">
  var path = '<?=PROOT?>';
</script>
<script src="<?=PROOT?>js/admin.js"></script>

 <?= $this->content('head'); ?>

<style type="text/css">
  .sk-folding-cube {
  margin: 20px auto;
  width: 40px;
  height: 40px;
  position: relative;
  -webkit-transform: rotateZ(45deg);
          transform: rotateZ(45deg);
}

.sk-folding-cube .sk-cube {  
  float: left;
  width: 50%;
  height: 50%;
  position: relative;
  -webkit-transform: scale(1.1);
      -ms-transform: scale(1.1);
          transform: scale(1.1); 
}
.sk-folding-cube .sk-cube:before {

  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: #007bff;
  -webkit-animation: sk-foldCubeAngle 2.4s infinite linear both;
          animation: sk-foldCubeAngle 2.4s infinite linear both;
  -webkit-transform-origin: 100% 100%;
      -ms-transform-origin: 100% 100%;
          transform-origin: 100% 100%;
}
.sk-folding-cube .sk-cube2 {
  -webkit-transform: scale(1.1) rotateZ(90deg);
          transform: scale(1.1) rotateZ(90deg);
}
.sk-folding-cube .sk-cube3 {
  -webkit-transform: scale(1.1) rotateZ(180deg);
          transform: scale(1.1) rotateZ(180deg);
}
.sk-folding-cube .sk-cube4 {
  -webkit-transform: scale(1.1) rotateZ(270deg);
          transform: scale(1.1) rotateZ(270deg);
}
.sk-folding-cube .sk-cube2:before {
  -webkit-animation-delay: 0.3s;
          animation-delay: 0.3s;
}
.sk-folding-cube .sk-cube3:before {
  -webkit-animation-delay: 0.6s;
          animation-delay: 0.6s; 
}
.sk-folding-cube .sk-cube4:before {
  -webkit-animation-delay: 0.9s;
          animation-delay: 0.9s;
}
@-webkit-keyframes sk-foldCubeAngle {
  0%, 10% {
    -webkit-transform: perspective(140px) rotateX(-180deg);
            transform: perspective(140px) rotateX(-180deg);
    opacity: 0; 
  } 25%, 75% {
    -webkit-transform: perspective(140px) rotateX(0deg);
            transform: perspective(140px) rotateX(0deg);
    opacity: 1; 
  } 90%, 100% {
    -webkit-transform: perspective(140px) rotateY(180deg);
            transform: perspective(140px) rotateY(180deg);
    opacity: 0; 
  } 
}

@keyframes sk-foldCubeAngle {
  0%, 10% {
    -webkit-transform: perspective(140px) rotateX(-180deg);
            transform: perspective(140px) rotateX(-180deg);
    opacity: 0; 
  } 25%, 75% {
    -webkit-transform: perspective(140px) rotateX(0deg);
            transform: perspective(140px) rotateX(0deg);
    opacity: 1; 
  } 90%, 100% {
    -webkit-transform: perspective(140px) rotateY(180deg);
            transform: perspective(140px) rotateY(180deg);
    opacity: 0; 
  }
}
</style>
</head>
<body class="hold-transition sidebar-mini"> 

<div class="wrapper">
 <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>    
    
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?=PROOT?>img/logo.png" alt="AdminLTE Logo" class="brand-image elevation-3"
           style="opacity: .8; max-height: 38px; width: 90%;">
      <span class="brand-text font-weight-light">&nbsp;</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['admin_name']; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="javascript:void(0)" class="nav-link active" id="LoadController" fdi="Dashboard" title="Dashboard">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>            
          </li>
          <li class="nav-item" >
            <a href="javascript:void(0)" class="nav-link" id="LoadController" fdi="Users" title="All Users List">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Users
              </p>
            </a>
          </li>
          <li class="nav-item" >
            <a href="javascript:void(0)" class="nav-link" id="LoadController" fdi="Category" title="All Category List">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Category
              </p>
            </a>
          </li>

          <li class="nav-item" >
            <a href="javascript:void(0)" class="nav-link" id="LoadController" fdi="AddCategory" title="Add New Category">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Add Category
              </p>
            </a>
          </li>

          <li class="nav-item" >
            <a href="javascript:void(0)" class="nav-link" id="LoadController" fdi="Tickets" title="All Tickets List">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Tickets
              </p>
            </a>
          </li>

          <li class="nav-item" >
            <a href="javascript:void(0)" class="nav-link" id="LoadController" fdi="Orders" title="All Tickets List">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Tickets Booking
              </p>
            </a>
          </li>

          <li class="nav-item" >
            <a href="javascript:void(0)" class="nav-link" id="LoadController" fdi="Payment" title="All Payment List">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Payment
              </p>
            </a>
          </li>

          <li class="nav-item" >
            <a href="javascript:void(0)" class="nav-link" id="LoadController" fdi="AdminUsers" title="Create new Admin Users">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Add Admin Users
              </p>
            </a>
          </li>

          <li class="nav-item" >
            <a href="javascript:void(0)" class="nav-link" id="LoadController" fdi="AdminUserslist" title="All Admin Users List">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Admin Users
              </p>
            </a>
          </li>

          <li class="nav-item" >
            <a href="<?=PROOT?>Pages/AdminLogout" class="nav-link" >
              <i class="nav-icon fas fa-th"></i>
              <p>
               Logout
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

<?= $this->content('body'); ?>  

 <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

</div>
  
  </body>







</html>