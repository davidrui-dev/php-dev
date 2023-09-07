
<?php $this->start('head');?>
<?php $this->setSiteTitle('Password Recovery | Broombids');?>

<?php $this->end();?>

<?php $this->start('body');?>
<style type="text/css">
    #signin-from-inner
    {
        margin-top: -150px;
    }
@media only screen and (max-width: 600px) 
{
  #signin-from-inner
    {
        margin-top: -15px;

    }
    .banner-two
    {
        background: #fff !important;
        height:550px !important; 
    }
    #mobileimage
    {
        display: none !important;
    }

}
</style>
<section class="banner banner-two">
                <div class="vector-bg"><img src="<?=PROOT?>home_assets/media/banner/top%20shape.png" alt="circle" /></div>
                <div class="container">
                    <div class="banner-content-wrap">
                        <div class="row align-items-center">
                            <div class="col-lg-6" id="email_box">                                
                                <div class="signin-from-inner" id="signin-from-inner">
                                    <h2 class="title">Password Recovery</h2>
                                    <p> Enter Your Email Address And we'll send a OTP to reset Your Password</p>
                                    <form action="#" class="singn-form">
                                        <input type="text" placeholder="Enter Your Register Email Id" name="fo_email" id="fo_email" />                                        
                                        <div id="err"></div>                                       
                                        
                                        <center><a href="javaScript:void(0);" class="pix-btn color-two wow pixFadeUp" data-wow-delay="0.3s" id="resetpassword" style="visibility: visible; width: 100%;">Get a OTP</a></center>
                                        
                                    </form>
                                </div>                                
                            </div>
                            <div class="col-lg-6" id="otp_box" style="display: none;">                                
                                <div class="signin-from-inner" id="signin-from-inner">
                                    <h2 class="title">Enter One Time Password</h2>
                                    <p> Enter Your Email Address And we'll send a OTP to reset Your Password</p>
                                    <form action="#" class="singn-form">
                                        <input type="number" placeholder="Enter One Time Password" name="otp" id="otp" />                                        
                                        <div id="err_otp"></div>                                       
                                        
                                        <center><a href="javaScript:void(0);" class="pix-btn color-two wow pixFadeUp" data-wow-delay="0.3s" id="matchotp" style="visibility: visible; width: 100%;">Submit</a></center>
                                        
                                    </form>
                                </div>                                
                            </div>
                            <div class="col-lg-6" id="password_box" style="display: none;">                                
                                <div class="signin-from-inner" id="signin-from-inner">
                                    <h2 class="title">Reset My Password</h2>
                                    <p>Create Your New Password.</p>
                                    <form action="#" class="singn-form">
                                         <input type="password" placeholder="Enter New Password" id="fo_password" name="fo_password">  
                                         <input type="password" placeholder="Enter Confirm Password" id="cpass" name="cpass">                                      
                                        <div id="err_pass"></div>                                       
                                        
                                        <center><a href="javaScript:void(0);" class="pix-btn color-two wow pixFadeUp" data-wow-delay="0.3s" id="Changepassword" style="visibility: visible; width: 100%;">Change Password</a></center>
                                        
                                    </form>
                                </div>                                
                            </div>
                            <div class="col-lg-6">
                                <div class="animate-promo-mockup" id="mobileimage">
                                    <img src="<?=PROOT?>images/Forgot-password-amico.svg" class="wow pixFadeDown" alt="mpckup" data-wow-duration="1.5s" style="width: 100%;"  />
                                    
                                     <img src="<?=PROOT?>home_assets/media/banner/cloud_01.png" alt="mpckup" />
                                    <img src="<?=PROOT?>home_assets/media/banner/cloud_02.png" alt="mpckup" /> <img src="<?=PROOT?>home_assets/media/banner/cloud_03.png" alt="mpckup" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

<?php $this->end();?>
