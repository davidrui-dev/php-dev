<?php
$newUser=new Users();
?>
<?php $this->start('head');?>
<?php $this->setSiteTitle('All Car Post | Broombids');?>
<style type="text/css">
    .animate-ball .ball
    {
        background: #2cc1d64f !important;
    }
    
</style>
<?php $this->end();?>

<?php $this->start('body');?>
<style type="text/css">
    @media only screen and (max-width: 600px) 
    {
        #blog-post-archive {
            padding-top: 0px !important;
        }
        .showing-result{
            margin-top: 40px;
            text-align: center;
        }
        .job__list .job-info .info .job-title
        {
            font-size: 14px;
            text-align: left;
        }
        .designation
        {
            text-align: left;
        }
        .job__list .job-time
        {
            margin-bottom: 0px; 
            text-align: center;
        }
    }
</style>

<section class="page-banner">
    <div class="container">
        <div class="page-title-wrapper">
            <h1 class="page-title">All Car Post</h1>
            <ul class="bradcurmed">
                <li><a href="<?=PROOT?>" rel="noopener noreferrer">Home</a></li>
                <li>All Car Post</li>
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
<?php  
    if(isset($_SESSION['master_id']))
    { 
        $token = $_SESSION['master_id'];
        $currentUser = $newUser->FindCurrentUser('users', str_replace(' ', '', $token));
        if($currentUser->utype == "Vender")
        {
?>
<div class="blog-post-archive" id="blog-post-archive">
    <div class="container">
        <div class="row">
            
            <div class="col-lg-3">
                <div class="sidebar">
                   
                    <div id="categories" class="widget widget_categories" style="margin-bottom: 20px;">
                        <h2 class="widget-title">Location</h2>
                        <ul>
                            <?php
                            $locations = $newUser->FindByAll('locationsadmin');
                            if($locations)
                            {
                                foreach ($locations as $location) 
                                {
                                    ?>
                                    <li>
                                        <div class="condition"><input class="styled-checkbox" id="<?php echo $location->lname; ?>" type="checkbox" name="location[]" value="<?php echo $location->id; ?>"> <label for="<?php echo $location->lname; ?>"></label> <span><?php echo $location->lname; ?></span></div>
                                    </li>
                                    <?php
                                }
                            }
                            ?>                            
                        </ul>
                    </div>

                    <div id="categories" class="widget widget_categories" style="margin-bottom: 20px;">
                        <h2 class="widget-title">Car Type</h2>
                        <ul>
                            <?php
                            $vehicle_types = $newUser->FindByAll('vehicle_type');
                            if($vehicle_types)
                            {
                                foreach ($vehicle_types as $vehicle_type) 
                                {
                                    ?>
                                    <li>
                                        <div class="condition"><input class="styled-checkbox" id="<?php echo $vehicle_type->vt_name; ?>" type="checkbox" name="vtype[]" value="<?php echo $vehicle_type->id; ?>"> <label for="<?php echo $vehicle_type->vt_name; ?>"></label> <span><?php echo $vehicle_type->vt_name; ?></span></div>
                                    </li>
                                    <?php
                                }
                            }
                            ?>
                        </ul>
                    </div>

                    <div id="categories" class="widget widget_categories" style="margin-bottom: 20px;">
                        <h2 class="widget-title">Price Range</h2>
                        <input type="number" placeholder="Minimum Price" style="border-radius: 5px;  padding: 5px 30px; margin-bottom: 10px;" id="min_price">
                        <input type="number" placeholder="Maximum Price" style="border-radius: 5px;  padding: 5px 30px; margin-bottom: 10px;" id="max_price">
                    </div>
                    <div id="error_filter"></div>
                    <button style="width: 100%;" type="button" id="filterpost" class="pix-btn submit-btn"><span class="btn-text">Filter</span></button>
                  
                </div>
            </div>

            <div class="col-lg-9">
                <?php
                $totalpost = $newUser->AllPosts_count(); 
                if($totalpost > 10)
                {
                    $lastcount = '10';
                }
                else
                {
                    $lastcount = $totalpost;
                }
                ?>
                <div class="showing-result"><p class="show-result">Showing <span id="start_num">0</span>-<span id="end_num"><?php echo $lastcount; ?></span> of <span><?php echo $totalpost; ?></span> Latest Posts</p></div>
                <div class="saaspik__jobs" id="getloadmorepost">
                    
                    <?php
                    $lastid = '';
                    $lastid_p ='';
                    $date_raw = date('Y-m-d');
                    $date = date('Y-m-d', strtotime('-1 day', strtotime($date_raw)));
                    $posts = $newUser->GetPosts('post',$date,10);
                    if($posts)
                    {
                        $n=0;
                        foreach ($posts as $post) 
                        {
                            $n++;
                            $lastid = $post->id;
                            $vtypename='';
                            if($n==1)
                            {
                                $lastid_p = $post->id;
                            }
                            $img=PROOT.'images/dummycar.png';
                            $car = $newUser->FindCurrentUser('vehicle_type',$post->ctype);
                            $lname = $newUser->FindCurrentUser('locationsadmin',$post->location);
                            if($car)
                            {
                                $img='https://admin.broombids.com/'.$car->img;
                                $vtypename = $car->vt_name;
                            }
                           
                            $start = $post->fromdate;
                            $end = $post->todate;
                            $diff = (strtotime($end)- strtotime($start))/24/3600; 
                           
                           ?>
                           <div class="job__list">
                                <div class="job-info">
                                    <div class="company-logo">
                                        <a href="<?=PROOT?>SinglePost/?post=<?php echo base64_encode($post->id); ?>"><img src="<?php echo $img; ?>"/>
                                        </a>
                                    </div>
                                    <div class="info">
                                        <h4 class="job-title"><a href="<?=PROOT?>SinglePost/?post=<?php echo base64_encode($post->id); ?>"><?php echo $post->title; ?></a></h4>
                                        <p class="designation"><?php echo $lname->lname; ?> - <?php echo $vtypename; ?></p>
                                    </div>
                                </div>
                                <div class="job-time"><span><?php echo $diff.' Days'; ?></span></div>
                                <div class="job-location"><span>€ <?php echo $post->budget_min.' - € '.$post->budget_max; ?></span></div>
                            </div>
                           <?php
                        }
                    }
                    else
                    {
                        echo '<center><h2>No Post Found.</h2></center>';
                    }
                    ?>
                    
                   <div class="tagcloud" style="margin-top: 50px;">
                        
                        <a href="javascript:void(0)" id="next_page" fdi="<?php echo $lastid; ?>" style="float: right;">Next</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<?php  
        }
        else
        {
            ?>
            <div class="blog-post-archive" id="blog-post-archive">
        <div class="container">
            <div class="row">
                <h2 style="margin: auto;"> You need to login as a Vendor to see this.</h2>
            </div>
            <div class="row">
                <center style="margin: auto; margin-top: 50px;"><a href="<?=PROOT?>login" class="pix-btn color-two wow pixFadeUp" data-wow-delay="0.3s" style="visibility: visible; width: 100%;">Go to Sign In</a></center>
            </div>
        </div>
    </div>
            <?php
        }
    }
    else{
?>
    <div class="blog-post-archive" id="blog-post-archive">
        <div class="container">
            <div class="row">
                <h2 style="margin: auto;"> You need to login as a Vendor to see this.</h2>
            </div>
            <div class="row">
                <center style="margin: auto; margin-top: 50px;"><a href="<?=PROOT?>login" class="pix-btn color-two wow pixFadeUp" data-wow-delay="0.3s" style="visibility: visible; width: 100%;">Go to Sign In</a></center>
            </div>
        </div>
    </div>

<?php
    }
?>

<?php $this->end();?>

