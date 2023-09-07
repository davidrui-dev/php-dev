<div class="row" style="margin: 50px;">
	<div class="section-header text-center col-md-12">
	  <h2>FAQ <span>(Frequently Asked Questions)</span></h2>  
	  <hr>
	</div>
	<?php
	$newUser=new Users();
	$faqs = $newUser->FindCarType('faq','Vendor');
	if($faqs)
	{
		foreach ($faqs as $faq) 
		{
			?>
			<div class="notifications-applications mb-20 mb-sm-80 mb-xs-80" style="width: 100%;">
		        <div class="notifications-heading" style="background: #e7e7e7;">
		            <h3><?php echo $faq->question; ?></h3>
		        </div>
		        <div class="notifications-main-block">
		            <div class="notification-listing">
		                <div class="empty">                    
		                    <p><?php echo $faq->answer; ?></p>
		                </div>
		            </div>
		        </div>
		    </div>
			<?php
		}
	}
	?>


</div>