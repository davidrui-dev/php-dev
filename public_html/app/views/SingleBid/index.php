<?php
$newUser=new Users();
$bidid = base64_decode($_GET['Offer']);
$bid_post = $newUser->FindCurrentUser('bid_post',$bidid);
if($bid_post)
{
    $post = $newUser->FindCurrentUser('post',$bid_post->pid);
    $customer = $newUser->FindCurrentUser('users',$post->uid);
    $vendor_u = $newUser->FindCurrentUser('users',$bid_post->uid);
    $customer_username='';
    $vendor_username='';
    if($customer)
    {
        $customer_username = $customer->username;
    }
    if($vendor_u)
    {
        $vendor_username = $vendor_u->username;
    }
}


$carname = '';
$companyname = '';
$location='';
$vtype='';
$fuel='';
$tra = '';
$cardescription='';
$img_feture=PROOT.'images/dummycar.png';
if($post)
{
    $vehicle_type = $newUser->FindCurrentUser('vehicle_type',$post->ctype);
    $vehicle_name = $newUser->FindCurrentUser('vehicle_name',$bid_post->car_name);
    $vehicle_compony = $newUser->FindCurrentUser('vehicle_company',$vehicle_name->cid);
    $lname = $newUser->FindCurrentUser('locationsadmin',$post->location);
    $img_feture_get = $newUser->FindFuterImage('vehiclemanage',$bid_post->car_name);

    $fueltype ='';
    $cartransmission='';
    $numberofgate='';
    $passengerseat='';
    if($img_feture)
    {
       $img_feture_get->id;
       $img_feture=FUTUREIMAGE.$img_feture_get->img;
       $cardescription = $img_feture_get->descreiption;
       $ftype = $newUser->FindCurrentUser('vehicle_fuel_type',$img_feture_get->vfule);
       $vtras = $newUser->FindCurrentUser('vehicle_transmission',$img_feture_get->vtra);

       if($ftype)
       {
         $fueltype =$ftype->fueltype;
       }
       if($vtras)
       {
         $cartransmission=$vtras->v_transmission;
       }
        
        
        $numberofgate=$img_feture_get->gate;
        $passengerseat=$img_feture_get->passenger_seat;
    }
    
    if($lname)
    {
      $location = $lname->lname;
    }
    if($vehicle_type)
    {
      $vtype = $vehicle_type->vt_name;
    } 
    if($vehicle_name)
    {
        $carname = $vehicle_name->vname;
    }   
    if($vehicle_compony)
    {
        $companyname = $vehicle_compony->v_company;
    }
}
?>
<?php $this->start('head');?>
<?php $this->setSiteTitle($post->title.' | Broombids');?>

<?php $this->end();?>

<?php $this->start('body');?>
<style type="text/css">
    .page-banner.blog-details-banner {
        height: 350px !important;
    }
    .section-title .sub-title {
            letter-spacing: 1px !important;
    }
</style>

<section class="page-banner blog-details-banner">
    <div class="container">
        <div class="page-title-wrapper">
            <ul class="post-meta color-theme">
                <li><a href="#"><?php echo date("d-m-Y", strtotime($post->fromdate)).' To '.date("d-m-Y", strtotime($post->todate)); ?></a></li>
            </ul>
            <h1 class="page-title"><?php echo $post->title; ?>.</h1>
            <ul class="post-meta">                
                <li><a href="#"><?php echo $customer_username;?></a></li>                
                <li><a href="#"></a><a href="#"><?php echo $location; ?></a></li>
            </ul>
        </div>
    </div>
  
    <ul class="animate-ball">
        <li class="ball"></li>
        <li class="ball"></li>
        <li class="ball"></li>
        <li class="ball"></li>
        <li class="ball"></li>
    </ul>
</section>

<section class="about" style="padding-bottom: 50px; padding-top: 50px;">

    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="about-content">
                    <div class="section-title" style="margin-top: 30px;">
                        <h3 class="sub-title wow pixFadeUp" style="visibility: visible; animation-name: i;"><span style="color: #666;">Car Type : </span><?php echo $vtype; ?></h3>
                        <h3 class="sub-title wow pixFadeUp" style="visibility: visible; animation-name: i;"><span style="color: #666;">company name : </span><?php echo $companyname; ?></h3>
                        <h3 class="sub-title wow pixFadeUp" style="visibility: visible; animation-name: i;"><span style="color: #666;">Car Name : </span><?php echo $carname; ?></h3>
                        
                    </div>
                    <p class="description wow pixFadeUp" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: i;">
                        <?php echo $cardescription; ?>
                    </p>

                    <!-- <h2 class="title wow pixFadeUp" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: i; font-size: 20px;">
                           Offer Amount :  € <?php echo $bid_post->bid_amount; ?>
                    </h2>
                    <div class="section-title">
                    <h3 class="sub-title wow pixFadeUp" style="visibility: visible; animation-name: i;"><span style="color: #666;">Vendor : </span><?php echo $vendor_username; ?></h3> -->
                <!-- </div> -->
                    
                </div>
            </div>  
            <div class="col-lg-6">
                <div class="container">
    <div class="testimonial-wrapper-two wow pixFadeUp" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: i;">
        <div class="swiper-container swiper-container-fade swiper-container-initialized swiper-container-horizontal" id="testimonials-four" data-speed="700" data-effect="fade" data-autoplay="5000">
            <div class="swiper-wrapper" style="transition-duration: 0ms;">
                
                <div class="swiper-slide swiper-slide-duplicate-active" data-swiper-slide-index="0" style="width: 1170px; opacity: 1; transform: translate3d(-1170px, 0px, 0px); transition-duration: 0ms;">
                    <div class="testimonial-four">
                        <img src="<?php echo $img_feture; ?>" alt="about" />
                    </div>
                </div>
                <?php
                   
                    $gallerys = $newUser->FindCidAll('car_gallary',$img_feture_get->id);
                    if($gallerys) {  ?>
                <div class="swiper-slide" data-swiper-slide-index="1" style="width: 1170px; opacity: 1; transform: translate3d(-2340px, 0px, 0px); transition-duration: 0ms;">
                    <div class="testimonial-four">
                        <?php foreach ($gallerys as $gallery) 
                        {
                            ?>
                            <img src="<?php echo FUTUREIMAGE.$gallery->img; ?>" />
                            <?php
                        }
                        ?>
                    </div>
                </div>
            <?php } ?>
               
            </div><span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
        <div class="slider-nav wow pixFadeUp" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: i;">
            <div id="slide-prev" class="swiper-button-prev" tabindex="0" role="button" aria-label="Previous slide"><i class="ei ei-arrow_left"></i></div>
            <div id="slide-next" class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide"><i class="ei ei-arrow_right"></i></div>
        </div>
    </div>
</div>
            </div>
            <div class="col-lg-4" style="display: none;">
                <div class="about-thumb wow pixFadeRight" data-wow-delay="0.6s" style="visibility: visible; animation-delay: 0.6s; animation-name: l;"><img src="<?php echo $img_feture; ?>" alt="about" /></div>
                <?php
                   
                    $gallerys = $newUser->FindCidAll('car_gallary',$img_feture_get->id);
                    if($gallerys) {  ?>
                    <div class="singiture wow pixFadeUp" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: i; margin-top: 20px;">
                       
                        <?php foreach ($gallerys as $gallery) 
                        {
                            ?>
                            <img src="<?php echo FUTUREIMAGE.$gallery->img; ?>" class="wow pixFadeUp" data-wow-delay="0.6s" alt="sign" style="visibility: visible; animation-delay: 0.6s; animation-name: i; width: 100px;    box-shadow: 0px 3px 14px;  border-radius: 10px; border: 1px solid #eee;" />
                            <?php
                        }
                        ?>
                        
                    </div>
                 <?php } ?>
            </div>          
        </div>
    </div>
</section>

<!-- <div class="container banner-content">
    <style type="text/css">
        .cp_btn
        {
            background: #7052fb;
            box-shadow: 0 20px 30px 0 rgba(90,70,176,.3);
            border: 1px solid transparent;
            color: #fff;
            padding: 10px 40px;
            border-radius: 30px;
            font-size: 14px;
            display: inline-block;
        }
        .cp_btn:hover
        {
            color: #000;
            background: #fff;
            border: 1px solid #7052fb;
        }
    </style>
   <center> <a href="javascript:void(0);" id="showcountup" class="cp_btn" data-wow-delay="0.6s" style="visibility: visible; animation-delay: 0.6s; animation-name: i;">Car Features</a>

    <a href="javascript:void(0);" id="showpricing" class="cp_btn" data-wow-delay="0.6s" style="visibility: visible; animation-delay: 0.6s; animation-name: i;">Vendor Faciluty</a></center>
</div> -->
<div class="row">
        <center style="margin: auto; margin-bottom: 50px;"><a href="<?=PROOT?>home" class="pix-btn color-two wow pixFadeUp" data-wow-delay="0.3s" style="visibility: visible; width: 100%;">Main Page</a></center>
    </div>
<section class="countup" style="padding: 0px;">
    <div class="bg-map" data-bg-image="<?=PROOT?>home_assets/media/background/map2.png" style="background-image: url(&quot;<?=PROOT?>home_assets/media/background/map2.png&quot;);"></div>
    <div class="container">
       
        <!-- <div class="countup-wrapper">

            <div class="row">

            <div class="col-md-6">
                <h2 class="title wow pixFadeUp" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: i; text-align: center; margin-bottom: 50px;">Car Features</h2>
                <div class="row">
                    <div class="col-lg-12 saaspik-icon-box-wrapper style-six wow pixFadeRight" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: l;">
                        <div class="saaspik-icon-box-icon"><img src="<?=PROOT?>images/dispenser.svg" alt="icon"></div>
                        <div class="pixsass-icon-box-content">
                            <h3 class="pixsass-icon-box-title"><a href="#">Fuel Type<br><span style="color: #2CC1D6;"><?php echo $fueltype; ?></span></a></h3>
                        </div>
                    </div>

                    <div class=" col-lg-12 saaspik-icon-box-wrapper style-six wow pixFadeRight" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: l;">
                        <div class="saaspik-icon-box-icon"><img src="<?=PROOT?>images/automatic-transmission.svg" alt="icon"></div>
                        <div class="pixsass-icon-box-content">
                            <h3 class="pixsass-icon-box-title"><a href="#">Car Transmission<br><span style="color: #2CC1D6;"><?php echo $cartransmission; ?></span></a></h3>
                        </div>
                    </div>

                    <div class="col-lg-12 saaspik-icon-box-wrapper style-six wow pixFadeRight" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: l;">
                        <div class="saaspik-icon-box-icon"><img src="<?=PROOT?>images/car-door.svg" alt="icon"></div>
                        <div class="pixsass-icon-box-content">
                            <h3 class="pixsass-icon-box-title"><a href="#">Car Number Of Gate<br><span style="color: #2CC1D6;"><?php echo $numberofgate; ?></span></a></h3>
                        </div>
                    </div>

                    <div class="col-lg-12 saaspik-icon-box-wrapper style-six wow pixFadeRight" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: l;">
                        <div class="saaspik-icon-box-icon"><img src="<?=PROOT?>images/seat.svg" alt="icon"></div>
                        <div class="pixsass-icon-box-content">
                            <h3 class="pixsass-icon-box-title"><a href="#">Passenger Seat<br><span style="color: #2CC1D6;"><?php echo $passengerseat; ?></span></a></h3>
                        </div>
                    </div>
               
            </div>
            </div>
            <div class="col-md-6">
                <h2 class="title wow pixFadeUp" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: i; text-align: center;">Vendor Facility</h2>
                <div class="pricing-table color-two" style="border-right: none;">
                     <ul class="price-feture">
                    <?php
                    $seq = $newUser->FindBybid('customer_security',$bidid);
                    if($seq)
                    {
                        foreach ($seq as $security) 
                        {
                            $classb = 'not';
                            if($security->status == 'Yes')
                            {
                                $classb = 'have';
                            }
                            echo '<li class="'.$classb.'">'.$security->security.'</li>';
                        }
                    }
                    ?>                       
                    </ul>
                   
                </div>
            </div>
            </div>
        </div> -->
       
    </div>
</section>

<!-- <section class="pricing" style="display: none;">
    <div class="container">
        <div class="section-title text-center">
           
            <h2 class="title wow pixFadeUp"  style="visibility: visible;">Vendor Faciluty</h2>
        </div>
       
        <div class="row advanced-pricing-table no-gutters wow pixFadeUp" 
            style="visibility: visible; ">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <div class="pricing-table color-two">
                     <ul class="price-feture">
                    <?php
                    $seq = $newUser->FindBybid('customer_security',$bidid);
                    if($seq)
                    {
                        foreach ($seq as $security) 
                        {
                            $classb = 'not';
                            if($security->status == 'Yes')
                            {
                                $classb = 'have';
                            }
                            echo '<li class="'.$classb.'">'.$security->security.'</li>';
                        }
                    }
                    ?>                       
                    </ul>
                   
                </div>
            </div>
          
        </div>
    </div>
    
</section> -->


<?php $this->end();?>
