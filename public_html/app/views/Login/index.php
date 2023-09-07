
<?php $this->start('head');?>
<?php $this->setSiteTitle('Login | Broombids');?>

<?php $this->end();?>

<?php $this->start('body');?>
<style type="text/css">
    #signin-from-inner
    {
        margin-top: -150px;
    }

.fb {
  background-color: #3B5998 !important;
  color: white;
  width: 100%;
  margin: 10px 0px;
}

.twitter {
  background-color: #55ACEE !important;
  color: white;
  width: 100%;
  margin: 10px 0px;
}

.google {
  background-color: #dd4b39 !important;
  color: white;
  width: 100%;
  margin: 10px 0px;
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

    input,
.btn {
  width: 100%;
  padding: 12px;
  border: none;
  border-radius: 4px;
  margin: 5px 0;
  opacity: 0.85;
  display: inline-block;
  font-size: 17px;
  line-height: 20px;
  text-decoration: none; /* remove underline from anchors */
}

}
</style>
<section class="banner banner-two">
                <div class="vector-bg"><img src="<?=PROOT?>home_assets/media/banner/top%20shape.png" alt="circle" /></div>
                <div class="container">
                    <div class="banner-content-wrap">
                        <div class="row align-items-center">
                            <div class="col-lg-6">                                
                                <div class="signin-from-inner" id="signin-from-inner">
                                    <h2 class="title">Sign In</h2>
                                    <p> Login here to post your rent a car requirement.</p>
                                    <form action="#" class="singn-form">
                                        <input type="text" placeholder="Username or Email" name="email" id="email" /> 
                                        <input type="password" placeholder="Password" name="password" id="password" />
                                        <div id="err"></div>
                                        
                                        <div class="forget-link" style="margin-bottom: 20px;">
                                            <div class="condition"><input class="styled-checkbox" id="styled-checkbox-1" type="checkbox" value="value1" /> <label for="styled-checkbox-1"></label> <span>Remember Me</span></div>
                                            <a href="<?=PROOT?>ForgotPassword" class="forget">Forget Password</a>
                                        </div>
                                        
                                        <center><a href="javaScript:void(0);" class="pix-btn color-two wow pixFadeUp" data-wow-delay="0.3s" id="login_btn" style="visibility: visible; width: 100%;">Login</a></center>
                                        <p style="margin-top: 40px;">Don’t have any account? <a href="<?=PROOT?>Customer">Sign up</a> now.</p>
                                        
                                    </form>
                                    <div class="col">        
                                        <a href="#" class="twitter btn">Login with Facebook
                                        </a>
                                        <a href="#" class="google btn">Login with Google+
                                        </a>
                                      </div>
                                </div>
                               
                                
                            </div>
                            <div class="col-lg-6">
                                <div class="animate-promo-mockup" id="mobileimage">
                                    <img src="<?=PROOT?>images/Login-amico.svg" class="wow pixFadeDown" alt="mpckup" data-wow-duration="1.5s" style="width: 100%;"  />
                                    
                                     <img src="<?=PROOT?>home_assets/media/banner/cloud_01.png" alt="mpckup" />
                                    <img src="<?=PROOT?>home_assets/media/banner/cloud_02.png" alt="mpckup" /> <img src="<?=PROOT?>home_assets/media/banner/cloud_03.png" alt="mpckup" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

<?php $this->end();?>

