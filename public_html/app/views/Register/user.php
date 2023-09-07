
<?php $this->start('head');?>
<?php $this->setSiteTitle('Customer Register | Brommbids');?>

<?php $this->end();?>

<?php $this->start('body');?>
	<style type="text/css">
    .banner-two
    {
        height:890px !important; 
    } 
    #signin-from-inner
    {
      margin-top: 15px;
    }
    input
    {
        margin-bottom: 20px !important;
    }
   @media only screen and (max-width: 600px) 
  {
  
    .banner-two
    {
        background: #fff !important;
        height:1060px !important; 
    }   
     #mobileimage
    {
        display: none !important;
    }

} 
  </style>
<section class="banner banner-two" style="height: 850px;">
    <div class="vector-bg"><img src="<?=PROOT?>home_assets/media/banner/top%20shape.png" alt="circle" /></div>
    <div class="container">
        <div class="banner-content-wrap">
            <div class="row align-items-center">
                <div class="col-lg-6">                                
                    <div class="signin-from-inner" id="signin-from-inner">
                        <h2 class="title">Sign Up</h2>
                        <p> Register here to post your rent a car requirement.</p>
                        <form action="#" class="singn-form">
                          <div class="row">
                            <div class="col-lg-12">
                              <input type="text" placeholder="First Name" name="fname" id="fname" /> 
                            </div>
                            <div class="col-lg-6">
                              <input type="text" placeholder="Surname" name="sname" id="sname" /> 
                            </div>
                            <div class="col-lg-6">
                              <input type="text" placeholder="Country Name" name="country" id="country" /> 
                            </div>
                            <div class="col-lg-6">
                              <input type="text" placeholder="Contact Number" name="phone" id="phone" /> 
                            </div>
                            <div class="col-lg-6">
                              <input type="text" placeholder="Email Address" name="re_email" id="re_email" />
                            </div> 
                            <div class="col-lg-6">
                              <input type="password" placeholder="Password" name="re_password" id="re_password" />
                            </div>
                            <div class="col-lg-6">
                              <input type="password" placeholder="Confirm Password" name="repassword" id="repassword" />
                            </div>
                          </div>
                          <div class="forget-link" style="margin-bottom: 0px;"><div class="condition"><input class="styled-checkbox" id="styled-checkbox-1" name="terms_agree" type="checkbox" value="value1"> <label for="styled-checkbox-1"></label> <span>I read and agree to the <a href="#">Terms &amp; Conditions</a> and <a href="#">Privacy Policy</a>.</span></div></div>
                            <div id="err"></div>                            
                            
                            <center><a href="javaScript:void(0);" class="pix-btn color-two" id="userregister_second" style="visibility: visible; width: 100%;">Register</a></center>
                            <p style="margin-top: 10px;">Already have an account? <a href="<?=PROOT?>login">Sign in</a> now.</p>
                            
                        </form>
                    </div>
                   
                    
                </div>
                <div class="col-lg-6">
                    <div class="animate-promo-mockup" id="mobileimage">
                        <img src="<?=PROOT?>images/www-amico.svg" class="wow pixFadeDown" alt="mpckup" data-wow-duration="1.5s" style="width: 100%;" />
                        
                         <img src="<?=PROOT?>home_assets/media/banner/cloud_01.png" alt="mpckup" />
                        <img src="<?=PROOT?>home_assets/media/banner/cloud_02.png" alt="mpckup" /> <img src="<?=PROOT?>home_assets/media/banner/cloud_03.png" alt="mpckup" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $this->end();?>