<div class="dashboard-main-inner">
<div class="row">
    <div class="col-12">
        <div class="page-breadcrumb-content mb-40">
            <h1>Won Requests</h1>
        </div>
    </div>
</div>
<div class="dashboard-overview">
    <div class="row">
        <div class="col-xl-12 col-12" id="chat_error"></div>
        <div class="col-xl-12 col-12">
           <div class="job-applications mb-50">
                <div class="job-applications-main-block">
                    <div class="job-applications-table">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Offer Details</th>
                                    <th>Customer Details</th>
                                    <th>Payment</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $newUser=new Users();
                                $bids = $newUser->FindWinOffer('bid_post',$_SESSION['master_id']);
                                if($bids)
                                {
                                  foreach ($bids as $bid) 
                                  {
                                    $post = $newUser->FindCurrentUser('post',$bid->pid);
                                    $customer = $newUser->FindCurrentUser('users',$post->uid);
                                    $location = $newUser->FindCurrentUser('locationsadmin',$post->location);
                                    $ctype = $newUser->FindCurrentUser('vehicle_type',$post->ctype);
                                    $cname = $newUser->FindCurrentUser('vehicle_name',$bid->car_name);
                                    $fimage = $newUser->FindFuterImage('vehiclemanage',$cname->id);

                                    $earlier = new DateTime($post->fromdate);
                                    $later = new DateTime($post->todate);

                                    $diff = $later->diff($earlier)->format("%a");
                                     ?>
                                    <tr>
                                        <td>
                                            <img src="<?=FUTUREIMAGE.$fimage->img; ?>" style="width: 200px;">
                                        </td>
                                        <td>
                                        <strong><?php echo $post->title; ?></strong><br>
                                        <b>Buget : </b>€ <?php echo $post->budget_min; ?> - € <?php echo $post->budget_max; ?>  <br>
                                        <b>Offer :</b>€ <?php echo $bid->bid_amount; ?> / day<br>
                                        <b>Day :</b> <?php echo $diff; ?> days<br>                          
                                        <b>Car :</b> <?php echo $ctype->vt_name.' - '.$cname->vname; ?><br>
                                        <b>Location :</b> <?php echo $location->lname; ?> 
                                        </td>
                                        <td class="application-contact">
                                            <b>Name :</b> <?php echo $customer->fname.' '.$customer->surname; ?> <br>
                                            <b>Phone :</b> <?php echo $customer->phone; ?> <br>
                                            <b>Email :</b> <?php echo $customer->email; ?><br><br>
                                            <a href="javaScript:void(0);" id="cp_chat" fdi="<?php echo $customer->id; ?>" style="border-color: #2dc1d6; background-color: #2dc1d6;"><i class="lnr lnr-envelope"></i><span>Chat With Customer</span></a> 
                                           
                                        </td>
                                        <td>
                                            <p><b>Offered Price :</b> <span>€ <?php echo $bid->bid_amount; ?> / Per Day</span></p>
                                            <p><b>Total Price :</b> <span>€ <?php echo $total = $bid->bid_amount*$diff; ?> / For <?=$diff?>  Day</span></p>

                                            <p><b>Broom Price :</b> <span>€ <?php echo $total*BROOMS_PERCENTAGE/100; ?></span></p>
                                            
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
</div>
</div>