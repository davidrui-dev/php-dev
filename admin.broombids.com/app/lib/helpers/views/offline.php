<?php
if($profile){
    $bio = $profile->bio;
    if($profile->location_status == 'Public'){
        $loca= $profile->location;
    }else{
        $loca='';
    }

    if($profile->dob_status == 'Public'){
        $website=$profile->website;
    }else{
        $website='';
    }      
}else{
    $bio = '';
    $loca= '';
    $website='';
}
$prime_counts=$NewCommon->UD_GetPrimeCount($uid);
if($prime_counts){
    $prime_count=$prime_counts[0]->primes;
}else{
    $prime_count=0;
}
$netwoths=$NewCommon->UD_GetNetworth($uid);
if($netwoths){
    $netwoth=$netwoths[0]->totalnetworth;
}else{
    $netwoth=0;
}
$connection = $NewCommon->UD_GetConnectionCount('follow',$uid);
?>
<div class="coverImgContainer">
    <img src="<?=$cover_image?>" alt="" class="coverImg">
    </div>
    <div class="globalProfileContainer">    	                      
        <div class="profileContainer">
            <div class="profileAndPrimesCounterContainer">
                <div class="profileImgContainer">          
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
                    <button class="rightBtn followBtn">Follow</button>
                </div>
            </div>
            <div class="profileInfo">
                <h3 class="authorName"><?php echo $user->fullname; ?></h3>
                <?php if($profile->bio != ''){ ?>
            <?php if($profile->bio_status == 'Public') { ?>
                <p class="authorBio"><?php echo substr(Convert_to_links($bio), 0, 90); ?>
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
                
                

                <?php if($loca != ''){ ?>
                <?php if($profile->location_status == 'Public') { ?>
                <p lastid="<?=$loca?>" class="authorLocation">
                <img src="<?=PROOT?>images/ProfileEdit/location.svg" alt="" class="locationIco"><?php echo $loca ?></p> <?php } } ?>
            </div>
        </div> 
        <?php 
    	if($user->profilestatus == 'Secret')
        {
            include 'secret_template.php';
        } else{
        ?>
        <div class="profileData">
            <div class="tabs">
                <div class="tab loadmoreOfflinePrime" id="primesMenu">Primes</div>
                <div class="tab" id="timelineMenu">Prideline</div>
                <div class="tab" id="photosMenu">Photos</div>
                <div class="tab" id="statsMenu">Stats</div>
                <div class="tab" id="levelsMenu">Levels</div>                        
            </div>  
            <div class="profileDetailsContainer primesContainer">
                <div class="primesTabs">
                    <div class="tab" tab="brown"><img src="<?=PROOT?>images/shields/brownr.svg" alt=""></div>
                    <div class="tab" tab="voilet"><img src="<?=PROOT?>images/shields/voiletr.svg" alt=""></div>
                    <div class="tab" tab="blue"><img src="<?=PROOT?>images/shields/bluer.svg" alt=""></div>
                    <div class="tab" tab="orange"><img src="<?=PROOT?>images/shields/oranger.svg" alt=""></div>
                    <div class="tab" tab="all" style="border-bottom: 3px solid rgb(96, 96, 96);"><img src="<?=PROOT?>images/shields/all.svg" alt=""></div>
                        <div class="tab" tab="green"><img src="<?=PROOT?>images/shields/greenr.svg" alt=""></div>
                        <div class="tab" tab="pink"><img src="<?=PROOT?>images/shields/pinkr.svg" alt=""></div>
                        <div class="tab" tab="yellow"><img src="<?=PROOT?>images/shields/yellowr.svg" alt=""></div>
                        <div class="tab" tab="silver"><img src="<?=PROOT?>images/shields/silverr.svg" alt=""></div>
                </div>
                <div class="primesImages" id="PrimesTab" activetab="all">
                        <?php
                        $prime_all_shield=$NewCommon->UD_Get_Oflline_primes('primes',$uid,'Prime');
                        if($prime_all_shield){
                            foreach ($prime_all_shield as $PrimeData){
                                $lid = $PrimeData->id;
                                $multiImage = '';    
                                $multLockImage = '';    
                                $primeImages = $NewCommon->UD_FindByPIDAll('primeimages',$PrimeData->id);

                                if(count($primeImages) > 1){
                                    $multiImage = '<img src="/images/Timeline/multiTab.svg" class="multiTab" />';
                                }
                                if($PrimeData->prime_status =='Private'){
                                    $multLockImage = '<img src="/images/Timeline/multiLock.svg" class="multiLock" />';                        
                                }
                                
                                echo '<div class="prime" id="OpenModelPrime" fdi="'.Encode($PrimeData->id).'" popid="'.$PrimeData->id.'" popkey="'.md5($PrimeData->id).'">'.$multiImage.$multLockImage.'<img class="lazy" src="'.Get_PostGenral_image($PrimeData->prime_type,$uid,$primeImages[0]->thumbnail,'thumbnail').'" data-src="'.Get_PostGenral_image($PrimeData->prime_type,$uid,$PrimeData->img,'cropped').'"></div>';

                            }
                            echo '<div id="load_prime" fdi="'.Encode($lid).'"></div>';
                        }else{
                            echo '<div id="load_prime" fdi="0"></div>';
                        }?>
                </div>                                
            </div>  
        </div> 
        <?php 
    	}
        ?>                    
    </div>  