
<?php $this->start('head');?>
<?php $this->setSiteTitle('Home Page');?>

<?php $this->end();?>

<?php $this->start('body');
$newUser=new Users();
$newUser=new Users();
?>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-Y4JXD9LCHX"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-Y4JXD9LCHX');
</script>
<style type="text/css">
    #EndOffer span
    {
        color: #2dc1d6;
        text-align: center;
    }
</style>
 <!--slider section start-->
        <div class="hero-section section position-relative">
            <!--Hero Item start-->
            <div class="hero-item bg_image--1" style="background:url(<?=PROOT?>images/15128.jpg);object-fit: cover; width: 100%; background-size: cover;height: 124vh;background-position: 50% 50%;">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">

                            <!--Hero Content start-->
                            <div class="hero-content-2 left">
                                <h2 class="title">Best Deals on Fleets</h2>
                                <p class="sub-title">Rent the car with multiple price options in simple steps. Multiple vendors awaits to make you a live offer. <br>Receive free price quotes from our verified vendors within minutes.</p>

                                <div class="job-search-wrap mt-90 mt-md-70 mt-sm-50 mt-xs-30">
                                    <div class="job-search-form">
                                        <form action="#">
                                            <div class="row row-5"> 
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                                    <div class="submit-btn">
                                                        <button class="ht-btn" type="submit"> Offers</button>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                                    <div class="submit-btn" >
                                                       <a style="width: 100%;" href="<?=PROOT?>postrequirement"> <button class="ht-btn" type="button">Post Requirement </button></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    
                                </div>

                            </div>
                            <!--Hero Content end-->

                        </div>
                    </div>
                </div>
            </div>
            <!--Hero Item end-->
        </div>
        <!--slider section end-->

        <!-- Feature Section Start -->
        <div class="feature-section section bg-image-proparty bg_image--2 pt-40 pb-10">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <!-- Single Feature Start -->
                        <div class="single-feature mb-30" style="height: 220px;">
                            <div class="feature-icon">
                                <i class="far fa-address-card"></i>
                            </div>
                            <div class="feature-content">
                                <h3 class="title">Post Requirement</h3>
                                <p>It's easy. Simply post a car requirement you needed and receive competitive price from vendors within minutes. Enjoy seeing price decrease as vendors bids live.</p>
                            </div>
                        </div>
                        <!-- Single Feature End -->
                    </div>
                    <div class="col-lg-4">
                        <!-- Single Feature Start -->
                        <div class="single-feature mb-30" style="height: 220px;">
                            <div class="feature-icon">
                                <i class="far fa-file-alt"></i>
                            </div>
                            <div class="feature-content">
                                <h3 class="title">Select Vendors</h3>
                                <p>There will be multiple price offered by our vendors you just need to check often and finally select. You will imidiatelly get vendor details and discuss together to easy process.</p>
                               
                               
                            </div>
                        </div>
                        <!-- Single Feature End -->
                    </div>
                    <div class="col-lg-4">
                        <!-- Single Feature Start -->
                        <div class="single-feature mb-30" style="height: 220px;">
                            <div class="feature-icon">
                                <i class="fa fa-search-location"></i>
                            </div>
                            <div class="feature-content">
                                <h3 class="title">Rent the Car</h3>
                                <p>You now can confirm the agreement with the Vendor. Simplest and safest way to get work done online.We're always here for your next request</p>
                            </div>
                        </div>
                        <!-- Single Feature End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Feature Section End -->

      

          <!-- Job Categories Section Start -->
        <div class="job-categories-section section pb-90 pb-lg-70 pb-md-50 pb-sm-30 pb-xs-20">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title-wrap mb-45 mb-xs-30">
                            <div class="section-title">
                                <h2 class="title text-uppercase">Top Featured Car Listing</h2>
                            </div>
                           
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php
                    $date = date('Y-m-d', strtotime('+1 day', strtotime(date('Y-m-d'))));
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
                                $img=PROOT.'car icons/'.$car->img;
                            }
                            ?>
                            <div class="col-lg-3 col-md-6 mb-30">
                        <!-- Single Blog Start -->
                        <div class="single-blog">
                            <div class="blog-image">
                                <center><a href="<?=PROOT?>SinglePost/?post=<?php echo base64_encode($post->id); ?>">
                                    <img src="<?php echo $img; ?>" style="height: 150px;">
                                </a></center>
                                
                            </div>
                            <div class="blog-content">
                                <h5 >
                                    <a href="<?=PROOT?>SinglePost/?post=<?php echo base64_encode($post->id); ?>"><?php echo $post->title; ?></a>
                                </h5> 
                                <p style="margin: 0px;"><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo $lname->lname; ?></p>
                                <p><i class="fa fa-credit-card" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;€ <?php echo $post->budget_min.' - € '.$post->budget_max; ?></p>
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
                                    <span>End Offer :</span>
                                    <span class="days"></span> 
                                    <span class="hours"></span> 
                                    <span class="minutes"></span> 
                                    <span class="seconds"></span>
                                </div>                                
                               
                            </div>
                            <button style="width: 100%;border: none; background: #fff; margin-bottom: 5px;"><a href="<?=PROOT?>SinglePost/?post=<?php echo base64_encode($post->id); ?>" style="text-align: center;" class="ht-btn header-btn">Offer Now</a></button>
                        </div>
                        <!-- Single Blog End -->
                    </div>
                            <?php
                        }
                    }
                    else
                    {
                        echo '<h2>No Record Found.</h2>';
                    }
                    ?>
                    

                </div>
            </div>
        </div>
        <!-- Job Categories Section End -->


        <!-- Recruit Section Start -->
        <div class="recruit-section section pt-120 pt-lg-100 pt-md-80 pt-sm-60 pt-xs-50 pb-120 pb-lg-100 pb-md-80 pb-sm-60 pb-xs-50 bg_image-recruit" style="background:url(<?=PROOT?>images/ ); background-position: 80% 50%;">
            <div class="container">
                <div class="row align-items-center">
                    <div class="offset-lg-6 col-lg-6">
                        <div class="recruit-content">
                            <h3 class="title">Recruit talent candidates</h3>
                            <h4 class="sub-title">Faster with Jotopa</h4>
                            <p>Outsourcing all or part of your personnel management function can bring real efficiencies to your own business.</p>
                            <div class="recruit-list">
                                <ul>
                                    <li>
                                        <span class="list-icon"><i aria-hidden="true" class="fas fa-check"></i></span>
                                        <span class="list-text">Concentrate on your own core business</span>
                                    </li>
                                    <li>
                                        <span class="list-icon"><i aria-hidden="true" class="fas fa-check"></i></span>
                                        <span class="list-text">Improve effi­­ci­­en­­ci­­es by HR resources</span>
                                    </li>
                                    <li>
                                        <span class="list-icon"><i aria-hidden="true" class="fas fa-check"></i></span>
                                        <span class="list-text">Access to the very best profes­­si­­onals</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="recruit-action mt-60 mt-xs-30">
                                <a class="ht-btn theme-btn mr-30" href="#">Recruit With Us</a>
                                <a class="ht-btn theme-btn transparent-btn venobox" data-autoplay="true" data-vbtype="video" href="https://www.youtube.com/watch?v=XSGBVzeBUbk"><i class="fa fa-play"></i> Watch Tutorials</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Recruit Section Start -->


<?php $this->end();?>

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
            $timer.find( '.hours' ).text( days + 'h')
            $timer.find( '.minutes' ).text( minutes + 'm')
            $timer.find( '.seconds' ).text( seconds + 's' )
        }
    }
</script>