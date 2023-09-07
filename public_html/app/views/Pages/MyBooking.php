<div class="row" style="margin: 50px;">
<div class="section-header text-center col-md-12">
  <h2>Your <span>Booking List</span></h2>  
  <hr>
</div>

<?php
$newUser=new Users();
$posts = $newUser->FindByUIDAll('post',$_SESSION['master_id']);
if($posts)
{
  foreach ($posts as $post) 
  {
    $location = $newUser->FindCurrentUser('locationsadmin',$post->location);
    $ctype = $newUser->FindCurrentUser('vehicle_type',$post->ctype);
    $cname = $newUser->FindCurrentUser('vehicle_name',$post->carname);
    $fimage = $newUser->FindFuterImage('vehiclemanage',$post->carname);
     ?>
     <div class="col-md-3 grid_listing">
        <div class="product-listing-m gray-bg">
          <div class="product-listing-img"> <a id="singlepost" fdi="<?php echo $post->id; ?>" href="javascript:void(0);"><img src="<?php echo 'https://admin.broombids.com/'.$ctype->img; ?>" class="img-fluid" alt="image"> </a>
            <?php
            if($post->status == 1)
            {
              echo '<div class="label_icon">New Post</div>';
            }
            if($post->status == 0)
            {
              echo '<div class="label_icon" style="color:#000; background:#eee;">Cancel</div>';
            }
            ?>                
          </div>
          <div class="product-listing-content">
            <h5><a id="singlepost" fdi="<?php echo $post->id; ?>" href="javascript:void(0);"><?php echo $post->title; ?> </a></h5>
            <p class="list-price" style="font-size: 14px;">€ <?php echo $post->budget_min; ?> <b> To </b> € <?php echo $post->budget_max; ?></p>
            <div class="car-location"><span><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $location->lname; ?></span></div>
            <ul class="features_list">
              <li><i class="fa fa-clock-o" aria-hidden="true"></i><b>From: </b><?php echo date("d-m-Y", strtotime($post->fromdate)); ?></li>
              <li><i class="fa fa-clock-o" aria-hidden="true"></i><b>To: </b><?php echo date("d-m-Y", strtotime($post->todate)); ?></li>
              <li style="width: 100%;"><i class="fa fa-car" aria-hidden="true"></i><?php echo $ctype->vt_name.' - '.$cname->vname; ?></li>
            </ul>
          </div>
        </div>
    </div>
     <?php
  }
}
?>
</div>

