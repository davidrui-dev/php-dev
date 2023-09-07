
<?php $this->start('head');?>
<?php $this->setSiteTitle('Home Page');?>

<?php $this->end();?>
<link rel="stylesheet" href="<?=PROOT?>dist/fastselect.min.css">

<script src="<?=PROOT?>dist/fastselect.js"></script>

<?php $this->start('body');?>
	
 <!-- Breadcrumb Section Start -->
        <div class="breadcrumb-section section bg_color--5 pt-60 pt-sm-50 pt-xs-40 pb-60 pb-sm-50 pb-xs-40">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="page-breadcrumb-content">
                            <ul class="page-breadcrumb">
                                <li><a href="index.html">Home</a></li>
                                <li>Login & Register</li>
                            </ul>
                            <h1>Login & Register</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumb Section Start -->

        <!-- Login Register Section Start -->
        <div class="login-register-section section bg_color--5 pb-120 pb-lg-100 pb-md-80 pb-sm-60 pb-xs-50">
            <div class="container">
                <div class="row no-gutters">

                    <div class="col-lg-5">
                        <div class="login-register-form-area">
                            <div class="login-tab-menu">
                                <ul class="nav">
                                    <li><a class="active show" data-toggle="tab" href="#login">Login</a></li>
                                    <li><a data-toggle="tab" href="#register">Register</a></li>
                                </ul>
                            </div>
                            <div class="tab-content">
                                <div id="login" class="tab-pane fade show active">
                                    <div class="login-register-form">
                                        <form action="#" method="post">
                                            <p>Login to broombids with your registered account</p>
                                            <div class="row">
                                                <div id="err" class="col-12"></div>
                                                <div class="col-12">
                                                    <div class="single-input">
                                                        <input type="text" placeholder="Username or Email" name="email" id="email">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="single-input">
                                                        <input type="password" placeholder="Password" name="password" id="password">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="checkbox-input">
                                                        <input type="checkbox" name="login-form-remember" id="login-form-remember">
                                                        <label for="login-form-remember">Remember me</label>
                                                    </div>
                                                </div>
                                                <div class="col-12 mb-25"><button type="button" id="login_btn" class="ht-btn">Login</button></div>
                                            </div>
                                        </form>
                                        <!-- <div class="divider">
                                            <span class="line"></span>
                                            <span class="circle">or login with</span>
                                        </div>
                                        <div class="social-login">
                                            <ul class="social-icon">
                                                <li><a class="facebook" href="#"><i class="fab fa-facebook"></i></a></li>
                                                <li><a class="twitter" href="#"><i class="fab fa-twitter"></i></a></li>
                                                <li><a class="linkedin" href="#"><i class="fab fa-linkedin"></i></a></li>
                                                <li><a class="google" href="#"><i class="fab fa-google-plus"></i></a></li>
                                            </ul>
                                        </div> -->
                                    </div>
                                </div>
                                <div id="register" class="tab-pane fade">
                                    <div class="login-register-form">
                                        <form action="#" method="post">
                                            <p>Create Your account</p>
                                            <div class="row row-5">
                                                <div class="col-12">
                                                    <div class="single-input">
                                                        <input type="text" placeholder="Your Name" name="fname" id="fname">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="single-input">
                                                        <input type="text" placeholder="Your Surname" name="sname" id="sname">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="single-input">
                                                        <input type="text" placeholder="Your Country Name" name="country" id="country">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="single-input">
                                                        <input type="text" placeholder="Phone Number" name="phone" id="phone">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="single-input">
                                                        <input type="email" placeholder="Your Email Address" name="re_email" id="re_email">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="single-input">
                                                        <input type="password" placeholder="Password" name="re_password" id="re_password">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="single-input">
                                                        <input type="password" placeholder="Confirm Password" name="repassword" id="repassword">
                                                    </div>
                                                </div>
                                               
                                                <div class="col-12">
                                                    <div class="register-account">
                                                        <input id="register-terms-conditions" type="checkbox" class="checkbox" required="" name="terms_agree">
                                                        <label for="register-terms-conditions">I read and agree to the <a href="#">Terms &amp; Conditions</a> and <a href="#">Privacy Policy</a></label>
                                                    </div>
                                                </div>
                                                <div id="err_reg" class="col-12"></div>
                                                <div class="col-12 mb-25"><button type="button" class="ht-btn" id="userregister_second">Register</button></div>
                                            </div>
                                        </form>
                                        <!-- <div class="divider">
                                            <span class="line"></span>
                                            <span class="circle">or login with</span>
                                        </div>
                                        <div class="social-login">
                                            <ul class="social-icon">
                                                <li><a class="facebook" href="#"><i class="fab fa-facebook"></i></a></li>
                                                <li><a class="twitter" href="#"><i class="fab fa-twitter"></i></a></li>
                                                <li><a class="linkedin" href="#"><i class="fab fa-linkedin"></i></a></li>
                                                <li><a class="google" href="#"><i class="fab fa-google-plus"></i></a></li>
                                            </ul>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="login-instruction">
                            <div class="login-instruction-content">
                                <h3 class="title">Why Login To Us</h3>
                                <p>It’s important for you to have an account and login in order to have full access at Jotopa. We need to know your account details in order to allow work together</p>
                                <ul class="list-reasons">
                                    <li class="reason">Be alerted to the latest jobs</li>
                                    <li class="reason">Apply for jobs with a single click</li>
                                    <li class="reason">Showcase your CV to thousands of employers</li>
                                    <li class="reason">Keep a record of all your applications</li>
                                </ul>
                                
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Login Register Section End -->	

<?php $this->end();?>