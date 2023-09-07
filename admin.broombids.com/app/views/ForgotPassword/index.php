
<?php $this->start('head');?>
<?php $this->setSiteTitle('Home Page');?>

<?php $this->end();?>

<?php $this->start('body');?>
	
<div class="signup_wrap">
		  <div class="row">
		  	<div class="col-md-3"></div>
            <div class="col-md-6 sidebar_widget" style="padding-top:50px " >
            	<center><h3 id="headingtext" style="color: #4e4e4e;">Password Recovery</h3></center>
            	<hr>
             	<div id="err"></div>
                <div id="email_box">
	                <div class="form-group">
	                  <input type="email" class="form-control" placeholder="Email Address" id="email" name="email">
	                </div>
	                
	                <div class="form-group"> 
	                	<div class="g-recaptcha brochure__form__captcha" data-sitekey="6LfjmLsZAAAAAFIhExZSxB11kSxtjQ-2E5zuuQSj"></div>
	                </div>
	                <div class="form-group">                  
	                  <button type="button" id="resetpassword" class="btn btn-block"><i class="fa fa-spinner fa-spin" id="spin" style="display: none;"></i>&nbsp;&nbsp;Reset My Password</button>
	                </div>
                </div> 
                <div id="otp_box" style="display: none;">
                	<div class="form-group">
	                  <input type="number" class="form-control" placeholder="Enter One Time Password" id="otp" name="otp">
	                </div>	                
	                
	                <div class="form-group">                  
	                  <button type="button" id="matchotp" class="btn btn-block"><i class="fa fa-spinner fa-spin" id="spin" style="display: none;"></i>&nbsp;&nbsp;Submit</button>
	                </div>
                </div>   

                <div id="password_box" style="display: none;">
                	<div class="form-group">
	                  <input type="password" class="form-control" placeholder="Enter New Password" id="password" name="password">
	                </div>	

	                <div class="form-group">
	                  <input type="password" class="form-control" placeholder="Enter Confirm Password" id="cpass" name="cpass">
	                </div>                
	                
	                <div class="form-group">                  
	                  <button type="button" id="Changepassword" class="btn btn-block"><i class="fa fa-spinner fa-spin" id="spin" style="display: none;"></i>&nbsp;&nbsp;Change My Password</button>
	                </div>
                </div>          

            </div>
            <div class="col-md-3"></div>
        </div>
<?php $this->end();?>