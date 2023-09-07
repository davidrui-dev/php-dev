
<?php $this->start('head');?>
<?php $this->setSiteTitle('Broombids | Self Drive Car Rentals | Travel Safe in Sanitized Cars ');?>

<?php $this->end();?>

<?php $this->start('body');
$newUser=new Users();
?>
<style type="text/css">
    .footer-social-link li i
    {
        margin-top: 13px !important;
    }
    .banner-content
    {
        margin-top: -175px;
    }
    #jeepimage
    {
        width: 85%; margin-top:-40px
    }
    #blog-grid
    {
        padding-top: 0px;
        padding-bottom: 0px;
    }
    @media only screen and (max-width: 600px) 
    {
      .banner-content
      {
        margin-top: -50px;
      }
      .banner .banner-content .banner-btn 
      {
        padding: 10px 25px;
      }
      .banner.banner-two .animate-promo-mockup img:first-child
      {
        left: 0px;
        top: 20;
      }
      .job-bord-tabs
      {
            margin-top: 40px;
      }
      #jeepimage
        {
            width: 100%; margin-top:-40px
        }
        #blog-grid
        {
            padding-top: 30px;
            padding-bottom: 0px;
        }

    }
</style>
<?php
    $messages = $newUser->FindByAll('messages');
    if(count($messages) > 0)
    {
?>
<section class="banner banner-two">
    <div class="vector-bg"><img src="<?=PROOT?>home_assets/media/banner/top%20shape.png" alt="circle" /></div>
    <div class="container">
        <div class="banner-content-wrap">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="banner-content">
                        <h1 class="banner-title wow pixFadeUp" data-wow-delay="0.3s">
                            PRICE 
                            <span>
                               REVOLUTION
                            </span><br>
                        </h1>
                        <h4 class="title wow pixFadeUp" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: i;">Discover Unbeatable Deals!</h4>
                        <p class="description wow pixFadeUp" data-wow-delay="0.5s">
                           Rent the car with multiple price options in simple steps. Multiple vendors awaits to make you a live offer. Receive free price quotes from our verified vendors within minutes.
                        </p>
                        <?php if(isset($_SESSION['master_id'])){ ?>
                        <a href="<?=PROOT?>postrequirement" class="pxs-btn banner-btn color-two wow pixFadeUp" data-wow-delay="0.6s">Post Requirement</a>
                        <?php } else { ?>
                        <a href="<?=PROOT?>login" class="pxs-btn banner-btn color-two wow pixFadeUp" data-wow-delay="0.6s" style="background: #404040;">Place A Request</a>
                        <?php }?>
                    </div>
                    
                </div>
                <div class="col-lg-6">
                    <div class="animate-promo-mockup" style="margin-right:70px;">
                        <img src="<?=PROOT?>images/wallpaper.png" class="wow pixFadeDown" alt="mpckup" data-wow-duration="1.5s" style="width: 100%;bottom: 175px; " />
                        
                         <img src="<?=PROOT?>home_assets/media/banner/04.png" class="wow pixFadeRight" alt="mpckup" />
                        
                         <img src="<?=PROOT?>home_assets/media/banner/cloud_01.png" alt="mpckup" />
                        <img src="<?=PROOT?>home_assets/media/banner/cloud_02.png" alt="mpckup" /> <img src="<?=PROOT?>home_assets/media/banner/cloud_03.png" alt="mpckup" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

            <section class="job-bord-tabs" style="padding: 0px;">
			    <div class="container">
			        <div class="section-title style-four text-center">
			            <h2 class="title wow pixFadeUp" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: i;">LATEST OFFERED</h2>
			            <h3 class="sub-title wow pixFadeUp" style="visibility: visible; animation-name: i;">Check what other customers requested</h3>
			        </div>
			        <div id="pix-tabs" class="wow pixFadeUp" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: i;">
			            
			            <div id="pix-tabs-content" class="job-board-tabs-content">
			                <ul id="pix-tabs-nav" style="display: none;"><li class="active"><a href="#job_tab2" class="color--two"><i class="ei ei-icon_pencil"></i> Design</a></ul>

			                <div id="job_tab2" class="content">
			                    <div class="row">
		                    	<?php
			                    $date = date('Y-m-d', strtotime('-1 day', strtotime(date('Y-m-d'))));
			                    $posts = $newUser->GetPosts('post',$date,8);
			                    if($posts)
			                    {
			                        foreach ($posts as $post) 
			                        {
			                            $img=PROOT.'images/dummycar.png';
			                            $car = $newUser->FindCurrentUser('vehicle_type',$post->ctype);
			                            $lname = $newUser->FindCurrentUser('locationsadmin',$post->location);
			                            if($car)
			                            {
			                                $img='https://admin.broombids.com/'.$car->img;
			                            }
			                            ?>
				                        <div class="col-lg-4 col-md-7 col-sm-7">
				                            <div class="job job__color--one">
				                                <div class="job__logo">
				                                    <div class="logo-container">
				                                        <a href="<?=PROOT?>login"><img src="<?php echo $img; ?>" alt="<?php echo $post->title; ?>" style="width: 40%;" /></a>
				                                    </div>
				                                </div>
				                                <div class="job__description">
				                                    <h3 class="job__title"><a href="<?=PROOT?>login"><?php 
                                                        $dot ='';
                                                        if(strlen($post->title) > 20)
                                                        {
                                                            $dot ='..';
                                                        }
                                                        echo substr($post->title,0,20).$dot; 
                                                        ?>.</a></h3>
				                                    
				                                    <div class="job__location">
                                                        <h5 class="sallery" style="margin-top: 5px;font-size: 32px;">€ <?php echo $post->budget_min.' - € '.$post->budget_max; ?></h5>
				                                        
				                                    </div>
				                                </div>
				                                <div class="job__sallery">
				                                    <div class="sallery-info"><p><i class="ei ei-icon_pin_alt"></i><?php echo $lname->lname; ?></p></div>
				                                    <div class="job__time">
				                                        
				                                        	<?php
						                                $date1=date_create(date("d-m-Y"));
						                                $date2=date_create("$post->fromdate");
						                                $diff=date_diff($date1,$date2);
						                                $day = $diff->format("%a");
						                                ?>
										                                        	<script>
						                                    timer.push( setInterval( function()
						                                    {
						                                        var compareDate = new Date()
						                                        compareDate.setTime( timestamp.getTime() )
						                                        compareDate.setDate( compareDate.getDate() + <?php echo $day;  ?> )
						                                        timeBetweenDates( compareDate, <?php echo $post->id; ?> )
						                                    }, 1000) )
						                                </script>
						                               <div class="timer-<?php echo $post->id; ?>" id="EndOffer">
						                                   <span><i class="ei ei-icon_clock_alt"></i> </span>
						                                    <span class="days"></span> 
						                                    <span class="hours"></span> 
						                                    <span class="minutes"></span> 
						                                    <!--<span class="seconds"></span>-->
						                                </div> 
				                                       
				                                    </div>
				                                </div>
				                            </div>
				                        </div>
				                    <?php } } ?>
			                        
			                    </div>
			                    <a href="<?=PROOT?>post" class="pix-btn color-two wow pixFadeUp" data-wow-delay="0.9s" style="visibility: visible; animation-delay: 0.5s; animation-name: i;">Discover More</a>
			                </div>
			               
			            </div>
			        </div>
			    </div>
			</section>


            <section class="editor-design-two" style="padding-top: 80px; padding-bottom: 0px;">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="editure-feature-image-two">
                                <div class="animaated-elements">
                                    <img src="<?=PROOT?>images/Off-road-amico.svg" alt="main-bg" id="jeepimage" class="main-bg wow pixFade" /> 
                                    
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="editor-content color-two">
                                <div class="section-title style-two color-two">
                                    <h2 class="title wow pixFadeUp" data-wow-delay="0.3s">
                                        World's first platform to offer car and price
                                    </h2>
                                    <p class="wow pixFadeUp" data-wow-delay="0.5s">
                                       Ever wondered how many customers do not know about your existence? Have they never received an offer from you?
                                    </p>
                                </div>
                                <div class="description wow pixFadeUp" data-wow-delay="0.7s">
                                    <p>
                                       Just register and offer on deals as you can. it will help business to increase your customer base, win new customers, make an offer and get more deals. 
                                    </p>
                                    <center><a href="<?=PROOT?>HowItWorks/vendor" class="pix-btn color-two wow pixFadeUp" data-wow-delay="0.9s">Discover More</a></center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="blog-grid" >
                <div class="container">
                    <div class="section-title color-two text-center">                       
                        <h2 class="title wow pixFadeUp" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: i;">FRESH DEALS</h2>
                        <p>See what deals others already got</p>
                    </div>
                    <div class="row">
                        <?php
                        $latestoffers = $newUser->LatestOffered(8);
                        if($latestoffers)
                        {
                            foreach ($latestoffers as $latestoffer) 
                            {
                                $logo =PROOT.'images/support.png';
                                $vendor_name ='Details Not Avalable';
                                $carimage = PROOT.'images/noimage.png';
                                $title='No Title Avalable';
                                $date = 'Jan 1 1999';
                                $vendor_logo = $newUser->FindByUIDSingle('bussnessdetails',$latestoffer->uid);
                                $vendor = $newUser->FindCurrentUser('users',$latestoffer->uid);
                                $post = $newUser->FindCurrentUser('post',$latestoffer->pid);
                                $getimage = $newUser->FindFuterImage('vehiclemanage',$latestoffer->car_name);
                                $location = $newUser->FindCurrentUser('locationsadmin',$post->location);
                                $carname = $newUser->FindCurrentUser('vehicle_name',$latestoffer->car_name);
                                if($vendor_logo)
                                {
                                    $logo = PROOT.$vendor_logo->logo;
                                }
                                if($vendor)
                                {
                                    $vendor_name = $vendor->username;
                                }
                                if($getimage)
                                {
                                    $carimage = FUTUREIMAGE.$getimage->img;
                                }
                                if($post)
                                {
                                    $title = $post->title;
                                    $date = date("M d,Y", strtotime($post->fromdate));
                                }
                            
                            ?>
                            <div class="col-lg-3 col-md-6">
                                <article class="blog-post color-two wow pixFadeLeft" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: k;">
                                    <div class="feature-image">
                                        <a href="<?=PROOT?>SingleBid/?Offer=<?php echo base64_encode($latestoffer->id); ?>"><img src="<?php echo $carimage; ?>" alt="blog-thumb" style="height: 170px;"></a>
                                    </div>
                                    <div class="blog-content" style="padding: 22px 10px 30px; height: 300px;">
                                        <center><p class="job__title" style="font-size: 25px; margin: 10px 0 10px; height: 50px;">
                                        <?php 
                                            $pieces = explode("/", $carname->vname);
                                            echo $pieces[0]; 
                                        ?>
                                        </p>
                                        <h1>€ <?php echo $latestoffer->bid_amount; ?></h1>
                                        <p>Daily price</p>
                                        <h5 style="color: darkorange; font-family: emoji;  height: 50px;"><i class="ei ei-icon_pin_alt"></i><?php if($location)echo $location->lname; else echo 'Invisible';?></h5>
                                        <!-- <ul class="post-meta">

                                            <li></li>
                                             <li><p><?php echo $date; ?></p></li>
                                            
                                        </ul></center> -->
                                        <!-- <h3 class="entry-title" style="font-size: 16px; margin: 10px 0 10px;"><a href="<?//=PROOT?>SingleBid/?Offer=<?php //echo base64_encode($latestoffer->id); ?>"> -->

                                            <?php 
                                            $dot ='';
                                            if(strlen($title) > 25)
                                            {
                                                $dot ='..';
                                            }
                                            // echo substr($title,0,25).$dot; 
                                            ?>
                                        </a></h3>
                                        <!-- <a href="<?=PROOT?>SingleBid/?Offer=<?php echo base64_encode($latestoffer->id); ?>" class="post-author"><img src="<?=PROOT?>images/Mail-sent-bro.svg" alt="<?php echo $vendor_name; ?>" style="width: 50px;"><?php echo $vendor_name; ?></a> -->
                                        <p><?php echo $date; ?></p>
                                    
                                    </div>
                                </article>
                            </div>
                            <?php
                            }
                        }
                        ?>
                        
                        
                    </div>
                </div>
            </section>



            <section class="newsletter" style="background: #2cc1d6; margin-top: 60px;">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-5">
                            <div class="newsletter-content"><h2 class="title wow pixFadeUp">Subscribe now to get company news and HUGE OFFERS.</h2></div>
                        </div>
                        <div class="col-lg-7">
                            <form action="#" method="post" class="newsletter-form wow pixFadeUp" data-pixsaas="newsletter-subscribe">
                                <div class="newsletter-inner">
                                    <input type="email" name="email" class="form-control" id="newsletteremail" placeholder="Enter your Email" required />
                                    <button type="button" name="submit" id="newsletter-submit" class="newsletter-submit"><span class="btn-text">Subscribe</span> <i class="fas fa-spinner fa-spin"></i></button>
                                </div>                                
                                <div class="clearfix"></div>
                                <div class="form-result alert" style="margin-top:0px;"><div class="content" id="err"></div></div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="scroll-circle wow fadeInUp"><img src="<?=PROOT?>home_assets/media/background/circle10.png" alt="circle6" data-parallax='{"y" : 50}' /></div>
            </section>

<?php }$this->end();?>


<script>
    var timer = []
    var timestamp = new Date()

    function timeBetweenDates(toDate, key) {
        var now = new Date()
        var difference = toDate.getTime() - now.getTime()

        if ( difference <= 0 )
        {
            // Timer done
            clearInterval( timer[key] );
        }
        else
        {
            var seconds = Math.floor( difference / 1000 )
            var minutes = Math.floor( seconds / 60 )
            var hours = Math.floor( minutes / 60 )
            var days = Math.floor( hours / 24 )

            hours %= 24
            minutes %= 60
            seconds %= 60

            var $timer = $( '.timer-' + key )                     
            $timer.find( '.days' ).text( days + 'd')
            $timer.find( '.hours' ).text( hours + 'h')
            $timer.find( '.minutes' ).text( minutes + 'm')
            // $timer.find( '.seconds' ).text( seconds + 's' )
        }
    }
</script>