
<?php $this->start('head');?>
<?php $this->setSiteTitle('Home Page');?>

<?php $this->end();?>
<link rel="stylesheet" href="<?=PROOT?>dist/fastselect.min.css">

<script src="<?=PROOT?>dist/fastselect.js"></script>

<?php $this->start('body');?>
	
<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-10 box">
		<div class="row" style="padding: 0px;">
			<div class="col-md-4" style="padding-left: 0px;">
				<img id="banner_left" src="<?=PROOT?>images/olav-tvedt--oVaYMgBMbs-unsplash.jpg" style="width: 100%; height: 360px; object-fit: cover;">
			</div>
			<div class="col-md-8">				
				
				<div id="step1">
					<center><h3 style="margin-top: 30px;">Login</h3></center>
					<div id="err"></div>
					<div class="form-group">
	                  <input type="email" class="form-control" placeholder="Enter Register Email Address" id="email" name="email">
	                </div>

	                <div class="form-group">
	                  <input type="password" class="form-control" placeholder="Enter Your Password" id="password" name="password">
	                </div>

	                <div class="form-group"> 
	                	<div class="g-recaptcha brochure__form__captcha" data-sitekey="6LfjmLsZAAAAAFIhExZSxB11kSxtjQ-2E5zuuQSj"></div>
	                </div>
	                <div class="form-group">                  
	                  <button type="button" id="login_btn" class="btn btn-block">Login</button>
	                </div>


		            <div class="modal-footer " style="display: block;">
		            	<div style="width: 30%; float: left; text-align: left;"><a href="<?=PROOT?>ForgotPassword">Forgot Password ?</a></div>
		            	<div style="width: 60%; float: right; text-align: right;"><p>Don't have an account? <a href="<?=PROOT?>">Signup Here</a></p></div>
				    </div>
				    
				</div>

			
				<div id="err"></div>
			</div>
		</div>
	</div>
	<div class="col-md-1"></div>
</div>
<?php $this->end();?>