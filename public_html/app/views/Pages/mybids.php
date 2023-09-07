<div class="dashboard-main-inner">
<div class="row">
    <div class="col-12">
        <div class="page-breadcrumb-content mb-40">
            <h1>My Offers</h1>
        </div>
    </div>
</div>
<div class="dashboard-overview">
    <div class="row">
        <div class="job-applications-main-block" style="width: 100%;">
            <div class="job-applications-table">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th class="width-35">Requirement</th>
                            <th>Offer Details</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        
                   
        <?php
        $newUser=new Users();
        $posts = $newUser->FindAllOfferButBid($_SESSION['master_id'],10);
            
        if($posts)
        {
          foreach ($posts as $post) 
          {
            //$post = $newUser->FindCurrentUser('post',$bid->pid);
            $location = $newUser->FindCurrentUser('locationsadmin',$post->location);
            $ctype = $newUser->FindCurrentUser('vehicle_type',$post->ctype);
            $img_feture=PROOT.'car icons/'.$ctype->img;

             $ctype_user = $newUser->FindCurrentUser('vehicle_type',$post->car_type);
             $ctype_vender = $newUser->FindCurrentUser('vehicle_name',$post->car_name);
            //$cname = $newUser->FindCurrentUser('vehicle_name',$post->carname);
            //$fimage = $newUser->FindFuterImage('vehiclemanage',$post->carname);
             ?>
              <tr class="job-application-item">
                <td class="application-id">
                    <a href="#">#<?php echo $post->id; ?></a>
                </td>

                <td class="application-price">
                    <span> <a href="<?=PROOT?>SinglePost/?post=<?php echo base64_encode($post->id); ?>"><?php echo $post->title; ?></a></span><br>
                    <span><b>Vehicle Type : </b><i class="lnr lnr-car"></i><?php echo $ctype->vt_name ?></span><br>
                    <span><b>Location : </b><i class="lnr lnr-map-marker"></i><?php echo $location->lname; ?></span><br>
                    <span><b>Budget :</b> € <?php echo $post->budget_min; ?> - € <?php echo $post->budget_max; ?></span><br>
                    <span><b>Dates :</b> <?php echo $post->fromdate; ?> - <?php echo $post->todate; ?></span>
                </td>

                <td class="application-created">
                    <span id="current_price_<?php echo $post->bidid; ?>"><b>Offered Price : </b>€ <?php echo $post->bid_amount; ?></span><br>
                    <span><b>Offered car Type : </b> <?php echo $ctype_user->vt_name; ?></span><br>
                    <span><b>Offered car Name : </b> <?php echo $ctype_vender->vname; ?></span><br>
                </td>

                <td class="application-status">
                    <?php
                    if($ctype_vender)
                    {
                        $carimage = $newUser->FindFuterImage('vehiclemanage',$ctype_vender->id);
                        if($carimage)
                        {
                            echo '<img src="'.FUTUREIMAGE.$carimage->img.'" style="width:150px;">';
                        }
                    }
                    ?>
                </td>

                <td class="delete-application text-right">
                    <?php 
                    $csk = $newUser->CheckSelecedOrNot('bid_post',$post->id);
                    if(!$csk)
                    {
                        ?>
                        <div class="message-form review-from mt-20" id="edit_box_<?php echo $post->bidid; ?>" style="display: none;">                
                            <input type="text" placeholder="Edit Offer Price" value="<?php echo $post->bid_amount; ?>" style="width: 100%; border-radius: 4px; border: 1px solid #ccc; padding: 7px 10px;" id="get_edit_price_<?php echo $post->bidid; ?>">
                            <button fdi="<?php echo $post->bidid; ?>" id="EditBidPrice" class="search-btn" style="background: #2dc1d6; border: none; padding: 7px 10px; width: 100%; margin-top: 5px; border-radius: 5px; color: #fff;">Save</button>
                        </div>
                         <button fdi="<?php echo $post->bidid; ?>" id="show_edit_box" class="search-btn" style="background: #2dc1d6; border: none; padding: 7px 10px; width: 100%; margin-top: 5px; border-radius: 5px; color: #fff;">Edit Offer</button>
                        <?php
                    }
                    ?>
                </td>
            </tr>
            <?php } } ?>    
              
                    </tbody>
                </table>
            </div>
        </div>                    
                            
    </div>
</div>
</div>