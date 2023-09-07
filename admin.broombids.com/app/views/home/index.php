<!DOCTYPE html>
<html lang="en">
<head>
    <title>Broombids - Admin Panel</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
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

<body class="bg-white">
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

            <!--start login contant-->
            <div class="app-contant">
                <div class="bg-white">
                    <div class="container-fluid p-0">
                        <div class="row no-gutters">
                            <div class="col-sm-6 col-lg-5 col-xxl-3  align-self-center order-2 order-sm-1">
                                <div class="d-flex align-items-center h-100-vh">
                                    <div class="login p-50">
                                        <center><img src="<?=PROOT?>images/Logo Main.png" style="width: 70%;"></center>
                                        
                                        <form class="mt-3 mt-sm-5">

                                            <div class="row">
                                                <div id="err" class="col-12" style="margin-bottom: 10px;"></div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Email Address*</label>
                                                        <input type="text" class="form-control" placeholder="Email Address" id="email" />
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Password*</label>
                                                        <input type="password" class="form-control" id="password" placeholder="Password" />
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="d-block d-sm-flex  align-items-center">
                                                        <!-- <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="gridCheck">
                                                            <label class="form-check-label" for="gridCheck">
                                                                Remember Me
                                                            </label>
                                                        </div> -->
                                                        <!-- <a href="javascript:void(0);" class="ml-auto">Forgot Password ?</a> -->
                                                    </div>
                                                </div>
                                                <div class="col-12 mt-3">
                                                    <a href="javascript:void(0);" id="admin_login" class="btn btn-primary text-uppercase">Sign In</a>
                                                </div>                                                
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xxl-9 col-lg-7 bg-gradient o-hidden order-1 order-sm-2">
                                <div class="row align-items-center h-100">
                                    <div class="col-7 mx-auto ">
                                        <img class="img-fluid" src="<?=PROOT?>assets/img/bg/login.svg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end login contant-->
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