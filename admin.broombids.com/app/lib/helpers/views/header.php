<?php
$iddd='';
$abc = '';
$lastProfile = $NewCommon->UD_Last_profile_pic_prime($uid,'Profile');
if($lastProfile)
{
	$conncetion=$NewCommon->UD_GetConnectionCount_visitor('follow',$lastProfile->uid);
	if($lastProfile->prime_status == 'Private')
	{
		if($lastProfile->uid == $myid || $conncetion > 0)
		{
			$iddd = 'OpenModelPrime';
			$abc = 'fdi="'.Encode($lastProfile->id).'" popid="'.$lastProfile->id.'" popkey="'.md5($lastProfile->id).'"';
		}
		else
		{
			$iddd = 'profileImgContainer';
		}
		
	}
	else
	{
		$iddd = 'OpenModelPrime';
		$abc = 'fdi="'.Encode($lastProfile->id).'" popid="'.$lastProfile->id.'" popkey="'.md5($lastProfile->id).'"';
	}
}

?>
<div class="profileContainer">
    <div class="profileAndPrimesCounterContainer">
        <div class="profileImgContainer" id="<?php echo $iddd; ?>" <?php echo $abc; ?>>
            <img src="<?php echo GetImage($uid,'Profile','cropped',$user->type,$user->profilepic); ?>" data-img="<?php echo GetImage($uid,'Profile','cropped',$user->type,$user->profilepic); ?>"/>
        </div>
        <div class="primesCounterAndFollowBtn">
            <div class="authorPrimes">
                <div class="primesCount">
                    <p><?php echo bd_nice_number($prime_count); ?></p>
                    <h3>Primes</h3>
                </div>
                <div class="followersCount">
                    <p><?php echo bd_nice_number($user->followers); ?></p>
                    <h3>Followers</h3>
                </div>
                <div class="netWorthCount">
                    <p><?php echo bd_nice_number($netwoth); ?></p>
                    <h3>Net Worth</h3>
                </div>
            </div>
            <?php                            
            if($uid == $_SESSION['master_id'])
            {
                echo '<a href="'.PROOT.'profile/edit" class="saveBtn">Edit Pride</a>';
            }
            else
            {
                if($blockUser)
                {
                     if($blockUser[0]->uid == $myid)
                     {
                         echo '<a href="javascript:void(0);" id="unblock_user" fdi="'.Encode($uid).'" class="followingBtn unblockBtn">Unblock</a>';
                     } 
                 }
                 else
                 {
                    echo $NewCommon->GetFFCButton($uid,$myid);
                }

            }
        ?>
        </div>
    </div>
    <div class="profileInfo">
        <?php                            
            if($uid == $_SESSION['master_id'])
            {
                echo '<button class="inviteBtn">Share Pride</button>';
            }
            if($user->user_stick != 0){
                if($user->user_stick == 1){
                    $stick= '<img src="'.PROOT.'images/ud_veri/content creator.svg" class="udVerifyTick"/>';
                }else if($user->user_stick == 2){
                    $stick= '<img src="'.PROOT.'images/ud_veri/lev 1.svg" class="udVerifyTick"/>';
                }else if($user->user_stick == 3){
                    $stick= '<img src="'.PROOT.'images/ud_veri/lev 2.svg" class="udVerifyTick"/>';
                }else if($user->user_stick == 4){
                    $stick= '<img src="'.PROOT.'images/ud_veri/lev 3.svg" class="udVerifyTick"/>';
                }
            }
            else{
                $stick='';
            }
        ?>
        <h3 class="authorName"><?php echo custom_echo($user->fullname,22).$stick; ?></h3>
        <p class="authorId"><?php echo $user->username; ?></p>
        
        <?php
        if($profile){ ?>

        <?php if($profile->bio != ''){ ?>
            <?php if($profile->bio_status == 'Public') { ?>
                <p class="authorBio">
                    <?php echo Convert_to_links(custom_echo($bio,90)); ?>
                    <?php if(strlen($bio) > 90){
                        echo '...<a href="javascript:void(0);">more</a>';
                    } ?>
                    </p> 
                <p class="authorBio" id="More_visible" style="display: none;"><?php echo Convert_to_links($bio); ?></p> 
            <?php } 
        } ?>    
        
        <?php if($profile->website != ''){ ?>
            <?php if($profile->website_status == 'Public') { ?>
                <a href="https://<?php echo $profile->website; ?>" target="_blank" class="authorUrl"><img src="<?=PROOT?>images/ProfileEdit/url.svg" alt="" class="linkIco"><?php echo $profile->website; ?></a> 
            <?php } 
        } ?>

        <?php if($profile->location != ''){ ?>
            <?php if($profile->location_status == 'Public') { ?>
                <p id="placetag_url"  lastid="<?=$profile->location?>" class="authorLocation">
                <img src="<?=PROOT?>images/ProfileEdit/location.svg" alt="" class="locationIco"><?php echo $profile->location ?></p> 
            <?php } 
        } ?>

        <?php if($user->dob != '' && $user->dob!='0000-00-00'){ ?>
            <?php if($profile->dob_status == 'Public') { ?>
                <p class="authorLocation" style="color:#000;font-size: 14px;line-height: 22px; padding-left: 2px;">
                <img src="<?=PROOT?>images/ProfileEdit/calendar.svg" alt="" class="locationIco"><?php echo date("d-m-Y", strtotime($user->dob) ) ?></p> 
            <?php } 
        } ?>
        
        <?php } ?>
    </div>
</div>


        