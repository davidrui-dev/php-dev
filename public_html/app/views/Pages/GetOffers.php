<?php
$newUser=new Users();
$post = $newUser->FindCurrentUser('post',$_SESSION['postid']);
$vehicle = $newUser->FindCurrentUser('vehicle_type',$post->ctype);
$location = $newUser->FindCurrentUser('locationsadmin',$post->location);
?>
<div class="dashboard-main-inner">
<div class="row">
    <div class="col-12">        
        <div class="page-breadcrumb-content">
            <h1><?php echo $post->title; ?></h1>
        </div>
        <ul class="page-breadcrumb">
            <li><?php echo $vehicle->vt_name; ?></li>
            <li><?php echo $location->lname; ?></li>
        </ul>
    </div>
</div>
<div class="dashboard-overview">
    <div class="row">
        <div class="job-applications-main-block" style="width: 100%;">
            <div class="job-applications-table">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="width-15">ID</th>
                            <th>Vendor Username</th>
                            <th>Offered Details</th>
                            <th>Offered car</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>                     
                    
        <?php        
        $bids = $newUser->GetAllBidsPIDAndDiscard($_SESSION['postid'],0);
            if($bids)
            {
              foreach ($bids as $bid) 
              {
                $of_user = $newUser->FindCurrentUser('users',$bid->uid); 
                $offered_car_type = $newUser->FindCurrentUser('vehicle_type',$bid->car_type);  
                $carname = $newUser->FindCurrentUser('vehicle_name',$bid->car_name);             
                ?>
                <tr class="job-application-item">
                    <td class="application-id">
                        <a href="<?=PROOT?>SingleBid/?Offer=<?php echo base64_encode($bid->id); ?>">#<?php echo $bid->id; ?></a>
                    </td>

                    <td class="application-price">
                        <a href="<?=PROOT?>SingleBid/?Offer=<?php echo base64_encode($bid->id); ?>"><span><?php echo $of_user->username; ?> </span></a>
                    </td>

                    <td class="application-created">
                         <a href="<?=PROOT?>SingleBid/?Offer=<?php echo base64_encode($bid->id); ?>"><span><b>Offered Price :</b>€ <?php echo $bid->bid_amount; ?></span><br>
                        <span><b>Offered car Type :</b><?php echo $offered_car_type->vt_name; ?></span><br>
                        <span><b>Offered car Name :</b><?php echo $carname->vname; ?></span></a>
                    </td>

                    <td class="application-status">
                        <a href="<?=PROOT?>SingleBid/?Offer=<?php echo base64_encode($bid->id); ?>">
                        <?php
                        if($carname)
                        {   

                            $carimage = $newUser->FindFuterImage('vehiclemanage',$carname->id);
                            if($carimage)
                            {
                                echo '<img src="'.FUTUREIMAGE.$carimage->img.'" style="width:150px;">';
                            }
                        }
                        ?>
                    </a>
                    </td>

                    <td class="delete-application text-right" >
                        <div class="submit-btn" id="OfferBtn_<?php echo $bid->id; ?>">
                            <?php 
                            if($bid->win_uid == 1 && $bid->pid == $post->id)
                            {
                                ?>

                                <?php
                            }
                            else
                            {
                                ?>
                                <button class="ht-btn" type="button" id="DiscardOffer" style="height: 40px; line-height: 40px; background: #666;" fdi="<?php echo $bid->id; ?>">Discard Offer</button>
                                <button class="ht-btn" type="button" id="OfferSelect" fdi="<?php echo $bid->id; ?>" style="height: 40px; line-height: 40px; margin-top: 10px;">Select Offer</button>
                                <?php
                            }
                            ?>

                        </div>
                    </td>
                </tr>
                <?php
               } 
            } 
        ?>

        <?php
        
        $bids = $newUser->GetAllBidsPIDAndDiscard($_SESSION['postid'],1);
        if($bids)
        {
          foreach ($bids as $bid) 
          {
            $of_user = $newUser->FindCurrentUser('users',$bid->uid); 
            $offered_car_type = $newUser->FindCurrentUser('vehicle_type',$bid->car_type);  
            $carname = $newUser->FindCurrentUser('vehicle_name',$bid->car_name); 
            
             ?>
                <tr class="job-application-item" style="background: #eee;">
                    <td class="application-id">
                        <a href="#">#<?php echo $bid->id; ?></a>
                    </td>

                    <td class="application-price">
                        <span><?php echo $of_user->username; ?> </span>
                    </td>

                    <td class="application-created">
                        <span><b>Offered Price :</b>€ <?php echo $bid->bid_amount; ?></span><br>
                        <span><b>Offered car Type :</b><?php echo $offered_car_type->vt_name; ?></span><br>
                        <span><b>Offered car Name :</b><?php echo $carname->vname; ?></span>
                    </td>

                    <td class="application-status">
                        <?php
                        if($carname)
                        {
                            $carimage = $newUser->FindFuterImage('vehiclemanage',$carname->id);
                            if($carimage)
                            {
                                echo '<img src="'.FUTUREIMAGE.$carimage->img.'" style="width:150px;">';
                            }
                        }
                        ?>
                    </td>

                    <td>
                        <span style="margin-right: 20px; color:red;">This offer has been Discard</span>
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

<script type="text/javascript">
    $(document).on('click','#OfferSelect',function()
    {
        var bid = $(this).attr('fdi');
        $("#selectbidid").val(bid);
        $('#myModal').modal('show'); // Show modal
    });

    $(document).on('click','#DiscardOffer',function()
    {
        var bid = $(this).attr('fdi');
        $("#discardbidid").val(bid);
        $('#myModalDiscard').modal('show'); // Show modal
    });
</script>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">     
      <div class="modal-body">
        <center><img src="<?=PROOT?>images/car.png" style="width: 30%;"></center>           
        <center><h4 class="modal-title w-100">Are you sure?</h4> 
        <p>Select This Offer</p>
        <div style="margin: 20px 0px;" id="bid_offer_error"></div>
        </center> 
        <input type="hidden" name="selectbidid" id="selectbidid">

        <center>
        <button type="button" class="btn btn-info" id="accept-offer">Select</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </center>
      </div>      
    </div>

  </div>
</div>

<!-- Modal -->
<div id="myModalDiscard" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">     
      <div class="modal-body">
        <center><img src="<?=PROOT?>images/car.png" style="width: 30%;"></center>           
        <center><h4 class="modal-title w-100">Are you sure?</h4> 
        <p>Discard This Offer</p>
        <div style="margin: 20px 0px;" id="bid_offer_error"></div>
        </center> 
        <input type="hidden" name="discardbidid" id="discardbidid">

        <center>
        <button type="button" class="btn btn-info" id="discard-offer">Discard</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </center>
      </div>      
    </div>

  </div>
</div>