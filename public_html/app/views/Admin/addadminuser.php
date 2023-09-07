<?php
if(!isset($_SESSION['master_id']))
{
  Router::redirect('home');
}
?>

<div class="panel" style="width: 100%;">          
  <div class="panel-body container-fluid">
    <div class="row">
      <div class="col-lg-12" id="error"></div>
      <div class="col-lg-6 form-group">
      	<label>Fullname</label>
        <input type="text" class="form-control" placeholder="Enter Fullname" id="fname">
      </div>
      <div class="col-lg-6 form-group">
      	<label>Email Address</label>
        <input type="text" class="form-control" placeholder="Enter Your Email Address" id="email">
      </div>

      <div class="col-lg-6 form-group">
      	<label>Contact Number</label>
        <input type="text" class="form-control" placeholder="Enter Mobile Number" id="phone">
      </div>

      <div class="col-lg-6 form-group">
      	<label>User Type</label>
        <select class="form-control" id="utype">
          <option value="">Select User Type</option>
          <option value="Admin">Admin</option>
          <option value="Executive">Executive</option>
        </select>
      </div>

      <div class="col-lg-12 form-group">
      	<label>Full Address</label>
        <input type="text" class="form-control" placeholder="Enter Your Full Address" id="address">
      </div>

      <div class="col-lg-6 form-group">
      	<label>Password</label>
        <input type="password" class="form-control" placeholder="Enter Password" id="password">
      </div>

      <div class="col-lg-6 form-group">
      	<label>Confirm Password</label>
        <input type="password" class="form-control" placeholder="Enter Confirm Password" id="cpass">
      </div>

	  <div class="col-lg-3 form-group">
	      <button type="Reset" class="btn btn-block btn-default">Reset</button>
	  </div>
	  <div class="col-lg-6 form-group"></div>

	  <div class="col-lg-3 form-group">
	      <button type="button" class="btn btn-block btn-success" id="adduseradmin">Submit</button>
	  </div>
      
    </div>
  </div>
</div>

    