<?php
$newUser=new Users();
$postid = base64_decode($_GET['post']);
$postid = base64_decode($_GET['post']);
$post = $newUser->FindCurrentUser('post',$postid);
$utype='';
if(isset($_SESSION['master_id']))
{
    $cskbid = $newUser->CheckAlreadyBid($_SESSION['master_id'],$postid);
    $currentuser = $newUser->FindCurrentUser('users',$_SESSION['master_id']);
    if($currentuser)
    {
        $utype = $currentuser->utype;
    }
}


$carname = '';
$location='';
$vtype='';
$fuel='';
$tra = '';
$img_feture=PROOT.'images/dummycar.png';
if($post)
{
    $vehicle_type = $newUser->FindCurrentUser('vehicle_type',$post->ctype);
    $lname = $newUser->FindCurrentUser('locationsadmin',$post->location);
    if($vehicle_type)
    {
       $img_feture=PROOT.'car icons/'.$vehicle_type->img;
    }
    
    if($lname)
    {
      $location = $lname->lname;
    }
    if($vehicle_type)
    {
      $vtype = $vehicle_type->vt_name;
    }    
}
?>
<?php $this->start('head');?>
<?php $this->setSiteTitle($post->title.' | Broombids');?>

<?php $this->end();?>

<?php $this->start('body');?>
<style type="text/css">
    .page-banner.blog-details-banner {
        height: 400px !important;
    }
    .section-title .sub-title {
            letter-spacing: 1px !important;
    }
</style>
<section class="page-banner blog-details-banner">
    <div class="container">
        <div class="page-title-wrapper" style="letter-spacing: 1px !important;">
            <ul class="post-meta color-theme">
                <li><a href="#"><?php echo date("d-m-Y", strtotime($post->fromdate)).' To '.date("d-m-Y", strtotime($post->todate)); ?></a></li>
            </ul>
            <h1 class="page-title"><?php echo $post->title; ?>.</h1>
            <ul class="post-meta">                
                <li><a href="#">€ <?php echo $post->budget_min.' - € '.$post->budget_max; ?></a></li>
                <li><a href="#"><?php echo $vtype; ?></a></li>
                <li><a href="#">Location : </a><a href="#"><?php echo $location; ?></a></li>
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

<style type="text/css">
    table
    {
        width: 100%;
        margin-bottom: 20px;
    }
    tr:nth-of-type(odd) { 
    background: #f8f9fa; 
    }

    th { 
        background: #7bd8e545; 
        color: #666; 
        font-weight: bold; 
        padding: 10px; 

        }

    td, th {         
        border: 1px solid #ccc; 
        text-align: left; 
        font-size: 16px;
        }
        td input
        {
            margin-top: 10px;
        }

</style>
<div class="container pb-120" style="margin-top: 80px;margin-bottom: 50px;">
    <div class="row">
        <div class="col-md-8">
            <table id="security_table" style="display: none;">
                <thead>
                   <tr>
                        <th><center>its not security its insurance</center></th>
                        <th><center>Yes</center></th>
                        <th><center>No</center></th>
                   </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="padding-left: 10px;">Complete security</td>
                        <td><input type="radio" name="Complete_security" value="Yes" fdi="Complete security"></td>
                        <td><input type="radio" name="Complete_security" value="No" fdi="Complete security"></td>
                    </tr>
                    <tr>
                        <td style="padding-left: 10px;">Complete security with exemption up to 500E</td>
                        <td><input type="radio" name="Complete_security_with_exemption" value="Yes" fdi="Complete security with exemption up to 500E"></td>
                        <td><input type="radio" name="Complete_security_with_exemption" value="No" fdi="Complete security with exemption up to 500E"></td>
                    </tr>
                    <tr>
                        <td style="padding-left: 10px;">Security for third parties</td>
                        <td><input type="radio" name="Security_for_third_parties" value="Yes" fdi="Security for third parties"></td>
                        <td><input type="radio" name="Security_for_third_parties" value="No" fdi="Security for third parties"></td>
                    </tr>
                    <tr>
                        <td style="padding-left: 10px;">Accident insurance</td>
                        <td><input type="radio" name="Accident_insurance" value="Yes" fdi="Accident insurance"></td>
                        <td><input type="radio" name="Accident_insurance" value="No" fdi="Accident insurance"></td>
                    </tr>
                    <tr>
                        <td style="padding-left: 10px;">Theft security</td>
                        <td><input type="radio" name="Theft_security" value="Yes" fdi="Theft security"></td>
                        <td><input type="radio" name="Theft_security" value="No" fdi="Theft security"></td>
                    </tr>
                    <tr>
                        <td style="padding-left: 10px;">Safety of passengers</td>
                        <td><input type="radio" name="Safety_of_passengers" value="Yes" fdi="Safety of passengers"></td>
                        <td><input type="radio" name="Safety_of_passengers" value="No" fdi="Safety of passengers"></td>
                    </tr>
                    <tr>
                        <td style="padding-left: 10px;">Safety of glass wear</td>
                        <td><input type="radio" name="Safety_of_glass_wear" value="Yes" fdi="Safety of glass wear"></td>
                        <td><input type="radio" name="Safety_of_glass_wear" value="No" fdi="Safety of glass wear"></td>
                    </tr>
                    <tr>
                        <td style="padding-left: 10px;">Fire safety</td>
                        <td><input type="radio" name="Fire_safety" value="Yes" fdi="Fire safety"></td>
                        <td><input type="radio" name="Fire_safety" value="No" fdi="Fire safety"></td>
                    </tr>
                    <tr>
                        <td style="padding-left: 10px;">Road safety</td>
                        <td><input type="radio" name="Road_safety" value="Yes" fdi="Road safety"></td>
                        <td><input type="radio" name="Road_safety" value="No" fdi="Road safety"></td>
                    </tr>
                    <tr>
                        <td style="padding-left: 10px;">10% discount if prepaid</td>
                        <td><input type="radio" name="10_discount_if_prepaid" value="Yes" fdi="10% discount if prepaid"></td>
                        <td><input type="radio" name="10_discount_if_prepaid" value="No" fdi="10% discount if prepaid"></td>
                    </tr>
                    
                    <tr>
                        <td style="padding-left: 10px;">Free kilometres</td>
                        <td><input type="radio" name="Free_kilometres" value="Yes" fdi="Free kilometres"></td>
                        <td><input type="radio" name="Free_kilometres" value="No" fdi="Free kilometres"></td>
                    </tr>
                    <tr>
                        <td style="padding-left: 10px;">The first 100 kilometres free</td>
                        <td><input type="radio" name="The_first_100_kilometres_free" value="Yes" fdi="The first 100 kilometres free"></td>
                        <td><input type="radio" name="The_first_100_kilometres_free" value="No" fdi="The first 100 kilometres free"></td>
                    </tr>
                    <tr>
                        <td style="padding-left: 10px;">0.10E per kilometres after the first 100</td>
                        <td><input type="radio" name="10E_per_kilometres_after_the_first_100" value="Yes" fdi="0.10E per kilometres after the first 100"></td>
                        <td><input type="radio" name="10E_per_kilometres_after_the_first_100" value="No" fdi="0.10E per kilometres after the first 100"></td>
                    </tr>
                    <tr>
                        <td style="padding-left: 10px;">0.20E per kilometres after the first 100</td>
                        <td><input type="radio" name="20E_per_kilometres_after_the_first_100" value="Yes" fdi="0.20E per kilometres after the first 100"></td>
                        <td><input type="radio" name="20E_per_kilometres_after_the_first_100" value="No" fdi="0.20E per kilometres after the first 100"></td>
                    </tr>
                    <!-- <tr>
                        <td style="padding-left: 10px;">Other options</td>
                        <td><input type="radio" name="Other_options" value="Yes" fdi="Other options"></td>
                        <td><input type="radio" name="Other_options" value="No" fdi="Other options"></td>
                    </tr> -->
                    <tr>     
                        <td id="error_security"></td>                   
                        <td colspan="2">
                           <center> <button type="button" id="post_bid_final" class="submit-btn pix-btn" style="margin: 5px 10px; width: 95%;">Submit</button></center>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="saaspik__jobs">
                <?php 
                $bids = $newUser->GetAllBidsPID($postid);         
                  if($bids)
                    {    
                        foreach ($bids as $bid) 
                        {
                            $biduser = $newUser->FindCurrentUser('users',$bid->uid);
                            if($biduser){
                            $car = $newUser->FindFuterImage('vehiclemanage',$bid->car_name);
                            $bussness = $newUser->FindByUIDSingle('bussnessdetails',$bid->uid);
                            $img_usericon = PROOT.'images/usericon.png';
                            $carname = FUTUREIMAGE.$car->img;
                            if($bussness)
                            {                                                
                                if($bussness->logo)
                                {
                                    $img_usericon = PROOT.$bussness->logo;
                                }
                            }
                            ?>  
                                <div class="job__list">
                                    <div class="job-info">
                                        <div class="company-logo">
                                            <a href="#"><img src="<?php echo $img_usericon; ?>" alt="<?php echo $biduser->username; ?>" /></a>
                                        </div>
                                        <div class="info">
                                            <h4 class="job-title"><a href="#"><?php echo $biduser->username; ?></a></h4>
                                            <p class="designation">Broombids</p>
                                        </div>
                                    </div>
                                    <div class="job-time"><span>€ <?php echo $bid->bid_amount; ?></span></div>
                                    <div class="company-logo">
                                            <a href="#"><img src="<?php echo $carname; ?>" style="width: 100px;" /></a>
                                        </div>
                                </div>
                                <?php
                        }  }         
                        
                    }
              ?>
           
            </div>

        </div>
        <div class="col-md-4">
            <div id="respond" class="comment-respond">
                <h3 style="text-align: center;" id="reply-title" class="comment-reply-title">Place Your Offer</h3>
                <form action="#" class="comment-form">
                        <input type="hidden" name="posttitle" id="posttitle" value="<?php echo $post->title; ?>">
                        <select id="pcartype" name="pcartype" style="margin-bottom: 15px; border-color: #eee;padding: 10px; border-radius: 10px;" class="col-12">
                            <option value="">Select Car Type</option>
                            <?php
                            $cartypes = $newUser->FindByAll('vehicle_type');
                              if($cartypes)
                              {
                                    foreach ($cartypes as $cartype) 
                                    {
                                        echo '<option value="'.$cartype->id.'">'.$cartype->vt_name.'</option>';
                                    }
                                }
                            ?>
                        </select>
                        <input type="hidden" name="postid" id="postid" value="<?php echo $postid; ?>">
                        <select id="pcarname" name="pcarname" style="margin-bottom: 15px;border-color: #eee;padding: 10px; border-radius: 10px;" class="col-12">
                            <option>Select Car Name</option>
                        </select>
                        <input type="number" id="bid_amount" name="bid_amount" placeholder="Enter Offer Amount" class="col-12" style="margin-bottom: 15px;border-color: #eee; border: 1px solid #eee; padding: 5px 10px; border-radius: 10px;" >
                         <div id="bid_error"></div>   
                        <div class="form-footer" >                       
                            <button type="button" id="post_bid" class="submit-btn pix-btn" style="width: 100%;">Submit</button>
                        </div>
                </form>
            </div>
            <?php if(isset($_SESSION['master_id'])) { ?> 
                <?php
                if($utype == 'Vender')
                {
                    echo '<h3 style="text-align: center; margin-top: 60px;" id="reply-title" class="comment-reply-title">Customer Details</h3>';
                }
                else
                {
                    echo '<h3 style="text-align: center; margin-top: 60px;" id="reply-title" class="comment-reply-title">Vendor Details</h3>';
                }
                }
                ?>
            <?php
            if($utype == 'Vender') 
            { 
                $csk = $newUser->CheckSelecedOrNot('bid_post',$postid);
                if($csk)
                {
                    $userpost = $newUser->FindCurrentUser('post',$csk->pid);
                    if($userpost)
                    {
                        $userdet = $newUser->FindCurrentUser('users',$userpost->uid);
                        if($userdet)
                        {
                            ?>
                            <div class="pixsass_post_author_box clearfix" style="margin-top: 5px;"><div class="profile_image"><img alt="author" src="<?=PROOT?>home_assets/media/blog/author.jpg"></div><div class="profile_content"><h4 class="profile_name"><?php echo $userdet->fname.' '.$userdet->surname; ?></h4><span class="author-job"><?php echo $userdet->email; ?></span><div class="profile_bio"><p><?php echo $userdet->phone; ?></p></div></div></div>
                            <?php
                        }
                    }
                }
                else
                {
                    echo '<p>Customer details will be shown here ones you got selected.</p>';
                }
            }
            ?>

            <?php
               if($utype == 'User') {
               $csk = $newUser->CheckSelecedOrNot('bid_post',$postid); 
               if($csk) 
               {
                    $venderd = $newUser->FindCurrentUser('users',$csk->uid);
                    if($venderd)
                    {
                        $logos = $newUser->FindByUIDSingle('bussnessdetails',$venderd->id);
                        if($logos)
                        {
                          $logo = '<img src="'.FUTUREIMAGE.$logos->logo.'" alt="image">';
                        }
                        else
                        {
                          $logo = '<img src="assets/images/dealer_img.jpg" alt="image">';
                        }
                        ?>
                        <div class="pixsass_post_author_box clearfix" style="margin-top: 5px;"><div class="profile_image"><img alt="author" src="<?=$logo?>"></div><div class="profile_content"><h4 class="profile_name"><?php echo $venderd->fname.' '.$venderd->surname; ?></h4><span class="author-job"><?php echo $venderd->email; ?></span><div class="profile_bio"><p><?php echo $venderd->phone; ?></p></div></div></div>
                        <?php
                    }
                }
                else
               {
                 echo '<p>Vendor details will be shown here ones you got selected.</p>';
               }
           }
                    ?>
            

        </div>
    </div>
</div>




<?php $this->end();?>

