
<?php $this->start('head');?>
<?php $this->setSiteTitle('Post Your Requirement');?>

<?php $this->end();?>
<link rel="stylesheet" href="<?=PROOT?>css/price_range.css">
<?php $this->start('body');
$newUser=new Users();
?>
<style type="text/css">
    textarea
    {
        width: 100%;
        background-color: transparent;
        border: 1px solid #999;
        border-radius: 0;
        line-height: 23px;
        padding: 10px 20px;
        font-size: 14px;
        color: #444;
        margin-bottom: 15px;
    }
</style>
<!-- Breadcrumb Section Start -->
        <div class="breadcrumb-section section bg_color--5 pt-60 pt-sm-50 pt-xs-40 pb-60 pb-sm-50 pb-xs-40">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="page-breadcrumb-content">
                            <ul class="page-breadcrumb">
                                <li><a href="<?=PROOT?>">Home</a></li>
                                <li>Post Requirement</li>
                            </ul>
                            <h1>Post Your Requirement</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumb Section Start -->

        <!--Checkout section start-->
        <div class="checkout-section section bg_color--5 pb-120 pb-lg-100 pb-md-80 pb-sm-60 pb-xs-50">
            <div class="container faq-wrapper">
                <div class="row">
                    <div class="col-12">

                        <!-- Checkout Form Start-->
                        <form action="#" class="checkout-form">
                            <div class="row row-40">

                                <div class="col-lg-7">
                                    <style type="text/css">
                                        .cartype_radio
                                        {
                                            width: 100%;
                                        }
                                        .cartype_radio li
                                        {
                                            width: auto;
                                            float: left;
                                            padding: 14px;
                                            margin: 10px 15px;                                           
                                            box-shadow: 5px 5px 5px 5px rgba(0,0,0,0.15);
                                            border-radius: 5px;
                                        }
                                        .cartype_radio li:hover
                                        {
                                            box-shadow: 5px 5px 2px #2dc1d685;
                                        }
                                        .cartype_radio li img
                                        {
                                            width: 70px;
                                        }
                                        .car_active
                                        {
                                            box-shadow: 5px 5px 2px #2dc1d685 !important;
                                        }
                                    </style>

                                    <!-- Billing Address -->
                                    <div id="billing-form" class="mb-10">
                                        <h4 class="checkout-title">Get Your Dream Car</h4>

                                        <div class="row">
                                        	
                                            <div class="col-md-12 col-12 mb-20">
                                                <label>Select Car Type*</label>
                                                <ul class="cartype_radio">
                                                    <?php                                                     
                                                      $cartypes = $newUser->FindByAll('vehicle_type');
                                                      if($cartypes)
                                                      {
                                                            foreach ($cartypes as $cartype) 
                                                            {
                                                                ?>
                                                                <li title="<?php echo $cartype->vt_name; ?>">
                                                                    <img src="<?php echo 'https://admin.broombids.com/'.$cartype->img;?>">                       
                                                                    <input type="radio" value="<?php echo $cartype->id; ?>" name="vcartype" style="display: none;">
                                                                    <p style="text-align: center;"><?php echo $cartype->vt_name; ?></p>
                                                                </li>
                                                                <?php
                                                            }
                                                      }
                                                      ?>
                                                    
                                                </ul>
                                            </div>

                                            <div class="col-md-12 col-12 mb-20">
                                                <label>Enter Title Eg : I want to rent Car*</label>
                                                <input type="text" placeholder="Enter Title (I want to rent Car)" id="ptitle" name="ptitle">
                                            </div>
                                           
                                            <div class="col-md-12 col-12 mb-20">
                                                <label>Select Location*</label>
                                                <select class="nice-select" id="plocation" name="plocation">
                                                    <option value="">Select Location</option>
                                                    <?php
													  $locations = $newUser->FindByAll('locationsadmin');
													  if($locations)
													  {
														  	foreach ($locations as $location) 
														  	{
														  		echo '<option value="'.$location->id.'">'.$location->lname.'</option>';
														  	}
													  }
						  							?>
                                                </select>
                                            </div>

                                            <div class="col-md-6 col-12 mb-20">
                                                <label>From Date*</label>
                                                <input type="text" placeholder="From Date" id="fromdate" name="fromdate">
                                            </div>

                                            <div class="col-md-6 col-12 mb-20">
                                                <label>To Date*</label>
                                                <input type="text" placeholder="To Date" id="todate" name="todate">
                                            </div>

                                            <div class="col-md-6 col-12 mb-20">
                                                    <label>Price Range(25 EURO to)</label>
                                                    <input type="number" placeholder="From budget" id="rangrfrom" name="rangrfrom">
                                                </div>
                                                <div class="col-md-6 col-12 mb-20">
                                                    <label>Price Range(1000 EURO)</label>
                                                    <input type="number" placeholder="To budget" id="rangrto" name="rangrto">
                                                </div>

									        <div class="wrapper" style="padding: 0px 20px; width: 100%">
												<div class="range-slider">
												    <input type="text" class="js-range-slider" value="" />
												</div>
												  
												<div class="extra-controls form-inline">
												  	<div class="form-group">
													    <input type="hidden" id="rangrfrom" name="rangrfrom" class="js-input-from form-control" value="0" />
													    <input type="hidden" id="rangrto" name="rangrto" class="js-input-to form-control" value="0" />
													</div>
												</div>
											</div>

                                            <div class="col-md-12 col-12 mb-20" style="margin-top: 20px;">
                                                <label>Special Remark</label>
                                                <textarea rows="3" placeholder="Special Remark." id="remark" name="remark"></textarea>
                                            </div>

											<div id="err" class="col-md-12 col-12"></div>
                                            <button type="button" class="ht-btn black-btn mt-40" id="postrequirement">Place Offer</button>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-5">
                                    <div class="row">

                                       
                                    </div>
                                </div>

                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <!--Checkout section end-->



<?php $this->end();?>





