
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
				<img id="banner_left" src="<?=PROOT?>images/olav-tvedt--oVaYMgBMbs-unsplash.jpg" style="width: 100%; object-fit: cover;">
			</div>
			<div class="col-md-8">
				<form id="form_addlead" action="ajaxupload.php" method="post" enctype="multipart/form-data">
				
				<div id="step1">
					<center><h3 style="margin-top: 30px;">Vender Registration</h3></center>
					<div class="form-group">
	                  <select class="form-control" name="businesstype" id="businesstype">
	                  	<option value="">Select Business Type</option>
	                  	<option value="Car Rental Business">Car Rental Business</option>
	                  	<option value="Travel Agent">Travel Agent</option>
	                  </select>
	                </div>

	                <div class="form-group"> 
	                	<div class="g-recaptcha brochure__form__captcha" data-sitekey="6LfjmLsZAAAAAFIhExZSxB11kSxtjQ-2E5zuuQSj"></div>
	                </div>
	                <div class="form-group">                  
	                  <button type="button" id="goto_step2" class="btn btn-block">Next</button>
	                </div>
				</div>

				<div id="step2" style="display: none;">
					<center><h3 style="margin-top: 30px;">Personal information</h3></center>
					<div class="form-group">
	                  <input type="text" class="form-control" placeholder="First Name" id="fname" name="fname">
	                </div>
	                <div class="form-group">
	                  <input type="text" class="form-control" placeholder="Surname" id="surname" name="surname">
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
	                <div class="form-group">                  
	                  <button style="width: 45%; float: left; margin-top: 10px; background: #253241;" type="button" id="back1" class="btn btn-block">Back</button>
	                  <button style="width: 45%; float: left; margin-left: 10%;" type="button" id="goto_step3" class="btn btn-block">Next</button>
	                </div>
				</div>

				<div id="step3" style="display:none;">
					<center><h3 style="margin-top: 30px;">Business information</h3></center>
					<div class="form-group">
	                  <label class="filelabel">
					    <i class="fa fa-paperclip">
					    </i>
					    <span class="title">
					        Business logo
					    </span>
					    <input class="FileUpload1" name="blogo" id="FileInput" name="booking_attachment" type="file"/>
					</label>
	                </div>
	                <div class="form-group" id="bnamebox">
	                  <input type="text" class="form-control" placeholder="Business name" id="bname" name="bname">
	                </div>                

	                <div id="multi-select4" class="form-group">
					  <select class="form-control">
					    <option value="Ahmedabad">Ahmedabad</option>
					    <option value="Rajkot">Rajkot</option>
					    <option value="Mumbai">Mumbai</option>
					    <option value="Indore">Indore</option>
					  </select>
					  <input type="hidden" name="locations" id="locations"  placeholder="Selected Values"/>
					</div>

					<div id="locationbox"></div>

	                
	                <div class="form-group">
	                  <input type="text" class="form-control" placeholder="Address" id="address" name="address">
	                </div>
	                <div class="form-group">
	                  <input type="text" class="form-control" placeholder="Pin Code" id="pincode" name="zipcode">
	                </div>
	                <div class="form-group">
	                  <input type="text" class="form-control" placeholder="VAT ID" id="vatid" name="vatid">
	                </div>
	               
	                <div class="form-group">                  
	                  <button style="width: 45%; float: left; margin-top: 10px; background: #253241;" type="button" id="back2" class="btn btn-block">Back</button>
	                  <button style="width: 45%; float: left; margin-left: 10%;" type="button" id="goto_step4" class="btn btn-block">Next</button>
	                </div>
				</div>

				<div id="step4" style="display: none;">
					<center><h3 style="margin-top: 30px;">Vender Registration</h3></center>
					<div id="multi-select" class="form-group">
					  <select class="form-control">
					    <option value="SUV">SUV</option>
					    <option value="Truck">Truck</option>
					    <option value="Sedan">Sedan</option>
					    <option value="Van">Van</option>
					    <option value="Coupe">Coupe</option>
					  </select>
					  <input type="hidden" name="vehicletype" id="vehicletype" placeholder="Selected Values"/>
					</div>

					<div id="multi-select2" class="form-group">
					  <select class="form-control">
					    <option value="Tesla">Tesla</option>
					    <option value="BMW">BMW</option>
					    <option value="Ferrari">Ferrari</option>
					    <option value="Ford">Ford</option>
					    <option value="Maruti Suzuki">Maruti Suzuki</option>
					  </select>
					  <input type="hidden" name="vehiclecompany" id="vehiclecompany" placeholder="Selected Values"/>
					</div>

					<div id="multi-select3" class="form-group">
					  <select class="form-control">
					    <option value="Suzuki Swift">Suzuki Swift</option>
					    <option value="Suzuki Dzire">Suzuki Dzire</option>
					    <option value="Suzuki Vitara Brezza">Suzuki Vitara Brezza</option>
					  </select>
					  <input type="hidden" name="vehiclename" id="vehiclename" placeholder="Selected Values"/>
					</div>

	                
	                <div class="form-group">                  
	                  <button style="width: 45%; float: left; margin-top: 10px; background: #253241;" type="button" id="back3" class="btn btn-block">Back</button>
	                  <button type="submit" style="width: 45%; float: left; margin-left: 10%;" id="finalregister" class="btn btn-block">Sign Up</button>
	              </form>
	                </div>
				</div>
				<div id="err"></div>
			</div>
		</div>
	</div>
	<div class="col-md-1"></div>
</div>
<?php $this->end();?>