<style type="text/css">
    @media only screen and (max-width: 600px) {
      #getoffers-div
      {
        margin-top: 20px;
      }
    }

</style>
<div class="dashboard-main-inner">
<div class="row">
    <div class="col-12">
        <div class="page-breadcrumb-content mb-40">
            <h1>My Post</h1>
        </div>
    </div>
</div>
<div class="dashboard-overview">
    <div class="row">
        <?php
        $newUser=new Users();
        $posts = $newUser->FindByUIDAllWithStatus('post',$_SESSION['master_id'],1);
        if($posts)
        {
          foreach ($posts as $post) 
          {
            //$post = $newUser->FindCurrentUser('post',$bid->pid);
            $location = $newUser->FindCurrentUser('locationsadmin',$post->location);
            $ctype = $newUser->FindCurrentUser('vehicle_type',$post->ctype);
            //$cname = $newUser->FindCurrentUser('vehicle_name',$post->carname);
            $fimage = $newUser->FindFuterImage('vehiclemanage',$post->carname);
             ?>
        <div class="col-lg-12 mb-20">
            <!-- Single Job Start  -->
            <div class="single-employer-list style-two">
                <div class="info-top align-items-start">
                    <div class="employer-image">
                        <a href="javascript:void(0);">
                            <img src="<?='https://admin.broombids.com/'.$ctype->img; ?>" alt="logo">
                        </a>
                    </div>
                    <div class="employer-info">
                        <div class="employer-info-inner">
                            <div class="employer-info-top">
                                <div class="saveJob for-listing">
                                    <span class="featured-label mr-20">#<?php echo $post->id; ?></span>
                                    
                                </div>
                                <div class="title-name">
                                    <h3 class="employer-title">
                                        <a href="javascript:void(0);"><?php echo $post->title; ?></a>
                                    </h3>                                    
                                </div>
                            </div>
                            <div class="employer-meta">
                                <div class="field-map"><i class="lnr lnr-map-marker"></i><?php echo $location->lname; ?></div>
                            </div>
                            <?php
                                if(!empty($post->remark))
                                {
                                    ?>
                            <div class="field-description">
                                <p><b>Remark : </b><?php echo $post->remark; ?>.</p>
                            </div>
                           <?php } ?>
                            <div class="employer-bottom">
                                <div class="row" style="width: 100%;">
                                    <div class="col-lg-8">
                                        <div class="employer-skill-tag">
                                            <a href="javascript:void(0);">€ <?php echo $post->budget_min; ?> - € <?php echo $post->budget_max; ?></a>
                                            <a href="javascript:void(0);"><?php echo date("d-m-Y", strtotime($post->fromdate)).' - '.date("d-m-Y", strtotime($post->todate)); ?></a>
                                            <a href="javascript:void(0);"><?php echo $ctype->vt_name; ?></a>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" id="getoffers-div">
                                        <a style="text-align: center; width: 100%; float: right;" class="ht-btn header-btn" href="javascript:void(0);" id="getoffers" fdi="<?php echo $post->id; ?>">Offers </a>
                                    </div>
                                </div>
                                
                                
                                    
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Single Job End -->
        </div>
        <?php } } ?>
    </div>
</div>
</div>