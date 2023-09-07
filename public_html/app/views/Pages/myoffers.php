<style type="text/css">
    #btn-view-offer
    {
        text-align: center; width: 20%; float: right;
    }

    @media only screen and (max-width: 600px) {
         #btn-view-offer
        {
            text-align: center; float: right;
            width: 100%;
            margin-top: 10px;
        }
    }

</style>

<div class="dashboard-main-inner">
<div class="row">
    <div class="col-12">
        <div class="page-breadcrumb-content mb-40">
            <h1>All Requests</h1>
        </div>
    </div>
</div>
<div class="dashboard-overview">
    <div class="row">
     
                                <?php
                                $newUser=new Users();
                                //$posts = $newUser->FindAllOfferButNotBid($_SESSION['master_id'],10);
                                $posts = $newUser->FindByStatusLimit('post',1,50);
                                if($posts)
                                {
                                  foreach ($posts as $post) 
                                  {
                                    $check = $newUser->CheckAlreadyBid($_SESSION['master_id'],$post->id);
                                    if(!$check){
                                    $location = $newUser->FindCurrentUser('locationsadmin',$post->location);
                                    $ctype = $newUser->FindCurrentUser('vehicle_type',$post->ctype);
                                    if($ctype)
                                    {
                                        $img_feture=$ctype->img;
                                        $vehicaltype = $ctype->vt_name;
                                    }
                                    
                                    //$cname = $newUser->FindCurrentUser('vehicle_name',$post->carname);
                                    //$fimage = $newUser->FindFuterImage('vehiclemanage',$post->carname);
                                     ?>
                                       <div class="col-lg-12 mb-20">
                                            <!-- Single Job Start  -->
                                            <div class="single-employer-list style-two">
                                                <div class="info-top align-items-start">
                                                    <div class="employer-image">
                                                        <a href="<?=PROOT?>SinglePost/?post=<?php echo base64_encode($post->id); ?>" target="_blank">
                                                            <img src="<?='https://admin.broombids.com/'.$img_feture; ?>" alt="logo">
                                                        </a>
                                                    </div>
                                                    <div class="employer-info">
                                                        <div class="employer-info-inner">
                                                            <div class="employer-info-top">
                                                                <div class="saveJob for-listing">
                                                                    <span class="featured-label mr-20">
                                                                        € <?php echo $post->budget_min; ?> - € <?php echo $post->budget_max; ?>
                                                                    </span>
                                                                    
                                                                </div>
                                                                <div class="title-name">
                                                                    <h3 class="employer-title">
                                                                        <a href="<?=PROOT?>SinglePost/?post=<?php echo base64_encode($post->id); ?>" target="_blank"><?php echo $post->title; ?></a>
                                                                    </h3>
                                                                    <div class="employer-rate">
                                                                       
                                                                        <span class="total"><?php echo $vehicaltype; ?></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="employer-meta">
                                                                <div class="field-map"><i class="lnr lnr-map-marker"></i><?php echo $location->lname; ?></div>
                                                            </div>
                                                            <div class="field-description">
                                                                <?php
                                                                if(!empty($post->remark))
                                                                {
                                                                    echo '<p style="font-size:24px; color:red;">'.$post->remark.'</p>';
                                                                }
                                                                ?>
                                                                
                                                            </div>
                                                            <div class="employer-bottom">
                                                                <div class="employer-skill-tag">
                                                                    
                                                                </div>
                                                                
                                                                    <a id="btn-view-offer" class="ht-btn header-btn" href="<?=PROOT?>SinglePost/?post=<?php echo base64_encode($post->id); ?>" target="_blank">View Offer</a>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Job End -->
                                        </div>
                                    <?php } } } ?>    
                             
                            
    </div>
</div>
</div>