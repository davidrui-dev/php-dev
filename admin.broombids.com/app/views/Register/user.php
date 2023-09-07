
<?php $this->start('head');?>
<?php $this->setSiteTitle('Home Page');?>

<?php $this->end();?>

<?php $this->start('body');?>
	
<div class="signup_wrap">
		  <div class="row">
		  	<div class="col-md-3"></div>
            <div class="col-md-6 sidebar_widget" style="padding-top:50px " >
            	<center><h3 style="color: #4e4e4e;">Create an Account</h3></center>
            	<hr>
             	<div id="err"></div>
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Full Name" id="fname" name="fname">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Phone Number" id="phone" name="phone">
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" placeholder="Email Address" id="email" name="email">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" placeholder="Password" id="password" name="password">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" placeholder="Confirm Password" id="repassword" name="repassword">
                </div>
                <div class="form-group checkbox">
                  <input type="checkbox" id="terms_agree" name="terms_agree">
                  <label for="terms_agree">I Agree with <a href="#">Terms and Conditions</a></label>
                </div>

                <div class="form-group"> 
                	<div class="g-recaptcha brochure__form__captcha" data-sitekey="6LfjmLsZAAAAAFIhExZSxB11kSxtjQ-2E5zuuQSj"></div>
                </div>
                <div class="form-group">                  
                  <button type="button" id="userregister" class="btn btn-block"><i class="fa fa-spinner fa-spin" id="spin" style="display: none;"></i>&nbsp;&nbsp;Sign Up</button>
                </div>
              

              <div class="modal-footer text-center">
		        <p>Already got an account? <a href="<?=PROOT?>Login">Login Here</a></p>
		      </div>

            </div>
            <div class="col-md-3"></div>
        </div>
<?php $this->end();?>