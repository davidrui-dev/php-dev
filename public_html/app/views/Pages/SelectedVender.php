<?php
$newUser=new Users();

?>
<div class="dashboard-main-inner">
<div class="row">
    <div class="col-12">
        <div class="page-breadcrumb-content mb-40">
            <h1>My Selected Offers</h1>
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
                            <th>Vendor Details</th>
                            <th>Offered Details</th>
                            <th style="width: 20%;"></th>
                        </tr>
                    </thead>
                    <tbody>                        
                    
        <?php
        
        $posts = $newUser->FindByUIDAllWithStatus('post',$_SESSION['master_id'],2);
        if($posts)
        {
          foreach ($posts as $post) 
          {
            $vendername = '';
            $cost = '';
            $venderemail='';
            $venderphone='';
            $vederid = $newUser->FindSelectedVender('bid_post',$post->id,1);
            $ctype_user = $newUser->FindCurrentUser('vehicle_type',$post->ctype);
            $location = $newUser->FindCurrentUser('locationsadmin',$post->location);
            
            if($vederid)
            {
                $ctype_vender = $newUser->FindCurrentUser('vehicle_name',$vederid->car_name);
                $vendor =  $newUser->FindCurrentUser('users',$vederid->uid);
                $vendername = $vendor->fname.' '.$vendor->surname;
                $venderemail = $vendor->email;
                $venderphone = $vendor->phone;
                $cost = $vederid->bid_amount;
            }
            //$of_user = $newUser->FindCurrentUser('users',$bid->uid);
            //$location = $newUser->FindCurrentUser('locationsadmin',$post->location);
            ?>
            <tr class="job-application-item">
                    <td>
                        <center>
                        <span><?php echo $ctype_user->vt_name; ?></span><br>
                        <img src="<?php echo PROOT.'car icons/'.$ctype_user->img; ?>" style="width: 50px;">
                        <br>
                        <a href="<?=PROOT?>SingleBid/?Offer=<?php echo base64_encode($vederid->id); ?>">#<?php echo $post->id; ?></a>
                    </center>
                    </td>

                    <td class="application-price">
                        <span> <b><?php echo $post->title; ?></b> </span><br>
                        <span> <b>Location</b> <?php echo $location->lname; ?> </span><br>
                        <span> <b>Remark : </b><?php echo $post->remark; ?> </span><br>
                        <span> <b>Budget :</b> € <?php echo $post->budget_min; ?> TO € <?php echo $post->budget_max; ?> </span><br>
                        <span> <b>Date :</b><?php echo $post->fromdate; ?> TO <?php echo $post->todate; ?> </span>
                    </td>

                    <td class="application-created">
                        <span> <b>Name :</b><?php echo $vendername; ?></span><br>
                        <span> <b>Email Id :</b><a href="mailto:<?php echo $venderemail; ?>"><?php echo $venderemail; ?></a></span><br>
                        <span> <b>Phone :</b><?php echo $venderphone; ?></span>
                    </td>

                    <td class="application-created">
                        <span> <b>Offered Price :</b> € <?php echo $cost; ?></span><br>
                        <?php
                        if(isset($ctype_vender))
                        {
                            echo '<span> <b>Offered car :</b> '.$ctype_vender->vname.' </span>';
                        }
                        ?>
                    </td>

                    <td class="application-contact">
                        <a style="background: #fff;" href="<?=PROOT?>SingleBid/?Offer=<?php echo base64_encode($vederid->id); ?>">
                        <?php
                        if(isset($ctype_vender))
                        {
                            $carimage = $newUser->FindFuterImage('vehiclemanage',$ctype_vender->id);
                            if($carimage)
                            {
                                echo '<img src="'.FUTUREIMAGE.$carimage->img.'" style="width:150px;">';
                            }
                        }
                        ?>
                    </a>
                        <a href="javaScript:void(0);" id="cp_chat" fdi="<?php echo $vendor->id; ?>" style="border-color: #2dc1d6; background-color: #2dc1d6;"><i class="lnr lnr-envelope"></i><span>Chat With Vendor</span></a>
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