<div class="profileData">
    <div class="tabs">
        <?php

        
        if($uid == $myid)
        {
            ?>
            <div class="tab loadmoreget" id="primesMenu" loadmore="Primes">Primes</div>
            <div class="tab" id="timelineMenu">Prideline</div>
            <div class="tab" id="photosMenu">Photos</div>
            <div class="tab" id="statsMenu">Stats</div>
            <!-- <div class="tab" id="levelsMenu">Levels</div> -->
            <?php
        }
        else
        {
            if($user->profilestatus =='Private')
            {
                    
                if($connection > 0 || $isFollowing > 0)
                {
                    ?>
                    <div class="tab loadmoreget" id="primesMenu" loadmore="Primes">Primes</div>
                    <div class="tab" id="timelineMenu">Prideline</div>
                    <div class="tab" id="photosMenu">Photos</div>
                    <div class="tab" id="statsMenu">Stats</div>
                    <?php
                } 
                else
                {
                    ?>
                    <div class="tab loadmoreget" id="primesMenu" loadmore="Primes">Primes</div>
                    <div class="tab" id="timelineMenu">Prideline</div>
                    <?php
                }
            }
            else if($user->profilestatus =='Secret')
            {
                
                if($connection > 0 || $isFollowing > 0)
                {
                    ?>
                    <div class="tab loadmoreget" id="primesMenu" loadmore="Primes">Primes</div>
                    <div class="tab" id="timelineMenu">Prideline</div>
                    <div class="tab" id="photosMenu">Photos</div>
                    <div class="tab" id="statsMenu">Stats</div>
                    <?php
                }
                else
                {

                    include 'secret_template.php';
                }

            }
            else
            {
                ?>
                <div class="tab loadmoreget" id="primesMenu" loadmore="Primes">Primes</div>
                <div class="tab" id="timelineMenu">Prideline</div>
                <div class="tab" id="photosMenu">Photos</div>
                <div class="tab" id="statsMenu">Stats</div>
                <?php
            }
        }
    ?>
    
</div>
<?php
$cl='';
$cl1='';
if($connection > 0 || $isFollowing > 0 || $uid == $myid)
{

}

else 
{ 
    $cl = 'style="margin-top: 6px !important;"';
    $cl1 = 'style="margin: 0 !important;"';   
}
?>
<div class="profileDetailsContainer primesContainer" <?php echo $cl; ?>>    
    <?php
    if($connection > 0 || $isFollowing > 0 || $uid == $myid) { ?>
    <div class="primesTabs">
        <div class="tab" tab="brown"><img src="<?=PROOT?>images/shields/brownr.svg" alt=""></div>
        <div class="tab" tab="voilet"><img src="<?=PROOT?>images/shields/voiletr.svg" alt=""></div>
        <div class="tab" tab="blue"><img src="<?=PROOT?>images/shields/bluer.svg" alt=""></div>
        <div class="tab" tab="orange"><img src="<?=PROOT?>images/shields/oranger.svg" alt=""></div>
        <div class="tab" tab="all" style="border-bottom: 3px solid rgb(96, 96, 96);"><img src="<?=PROOT?>images/shields/all.svg"
            alt=""></div>
            <div class="tab" tab="green"><img src="<?=PROOT?>images/shields/greenr.svg" alt=""></div>
            <div class="tab" tab="pink"><img src="<?=PROOT?>images/shields/pinkr.svg" alt=""></div>
            <div class="tab" tab="yellow"><img src="<?=PROOT?>images/shields/yellowr.svg" alt=""></div>
            <div class="tab" tab="silver"><img src="<?=PROOT?>images/shields/silverr.svg" alt=""></div>
        </div>
    <?php } ?>
        <div class="primesImages" id="PrimesTab" activetab="all" <?php echo $cl1; ?>>
            <?php
            $prime_all_shield=$NewCommon->UD_Get_primes_visitor($uid);
            if($prime_all_shield)
            {
                foreach ($prime_all_shield as $PrimeData) 
                {
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
                    //echo $connection;
                    if($PrimeData->prime_status =='Private')
                    {
                        if($PrimeData->uid == $_SESSION['master_id'] || $connection > 0)
                        {
                            echo '<div class="prime" id="OpenModelPrime" popid="'.$PrimeData->id.'" popkey="'.md5($PrimeData->id).'" fdi="'.Encode($PrimeData->id).'">'.$multiImage.$multLockImage.'<img src="'.GetImage($uid,'Prime','thumbnail','',$primeImages[0]->thumbnail).'" data-src="'.Get_PostGenral_image($PrimeData->prime_type,$uid,$PrimeData->img,'cropped').'" class="lazy"></div>';
                        }                        
                    }
                    if($PrimeData->prime_status == 'Public')
                    {
                        echo '<div class="prime" id="OpenModelPrime" fdi="'.Encode($PrimeData->id).'" popid="'.$PrimeData->id.'" popkey="'.md5($PrimeData->id).'">'.$multiImage.$multLockImage.'<img src="'.GetImage($uid,'Prime','thumbnail','',$primeImages[0]->thumbnail).'" data-src="'.Get_PostGenral_image($PrimeData->prime_type,$uid,$PrimeData->img,'cropped').'" class="lazy"></div>';
                    }
                    //echo '<div class="prime" id="OpenModelPrime" fdi="'.Encode($PrimeData->id).'">'.$multiImage.$multLockImage.'<img src="'.Get_PostGenral_image($PrimeData->prime_type,$uid,$PrimeData->img,'cropped').'"></div>';

                }
                echo '<div id="load_prime" fdi="'.Encode($lid).'"></div>';
            }
            else
            {
                echo '<div id="load_prime" fdi="0"></div>';
                ?>
                <h3>No Primes Yet</h3>
                <?php if($uid == $myid) { ?>
                <h3>Click <img src="<?=PROOT?>images/plusic.png" style="width: 17px;"> to upload pictures</h3>
                <?php }
            }
            ?>
            
            
        </div>
        
    </div>
    <div class="profileDetailsContainer timelineContainer" id="TimelineDataLoadMore">
     <?php include 'timeline.php'; ?>
 </div>
 <div class="profileDetailsContainer photosContainer">
    <div class="photosTabs">
        <div class="tab" activetab="Profile">Profile</div>
        <div class="tab" activetab="Cover">Cover</div>                            
        <div class="tab" activetab="Share">Shared</div>
        <div class="tab" activetab="Tagged">Tagged</div>
    </div>
    <div class="primesImages" id="PhotosMore">
        <?php
        $prime_all_shield=$NewCommon->UD_Get_primes('primes',$uid,'Profile');
        if($prime_all_shield)
        {
            foreach ($prime_all_shield as $PrimeData) 
            {
             $lid=$PrimeData->id;

             $multLockImage = ''; 

             if($PrimeData->prime_status =='Private'){
                $multLockImage = '<img src="/images/Timeline/multiLock.svg" class="multiLock" />';                        
            }

            $primeImages = $NewCommon->UD_FindByPIDAll('primeimages',$PrimeData->id);

            if($PrimeData->prime_status =='Private')
            {
                if($PrimeData->uid == $_SESSION['master_id'] || $connection > 0)
                {
                    echo '<div class="prime" id="OpenModelPrime" fdi="'.Encode($PrimeData->id).'" popid="'.$PrimeData->id.'" popkey="'.md5($PrimeData->id).'">'.$multLockImage.'<img class="lazy" src="'.GetImage($uid,'Profile','thumbnail','',$primeImages[0]->thumbnail).'" data-src="'.Get_PostGenral_image($PrimeData->prime_type,$uid,$PrimeData->img,'cropped').'"></div>';
                }
            }
            else
            {
                echo '<div class="prime" id="OpenModelPrime" fdi="'.Encode($PrimeData->id).'" popid="'.$PrimeData->id.'" popkey="'.md5($PrimeData->id).'">'.$multLockImage.'<img class="lazy" src="'.GetImage($uid,'Profile','thumbnail','',$primeImages[0]->thumbnail).'" data-src="'.Get_PostGenral_image($PrimeData->prime_type,$uid,$PrimeData->img,'cropped').'"></div>';
            }
            
        }
        echo '<div id="load_photos" fdi="'.Encode($lid).'"></div>';
    }
    else
    {
        echo '<div id="load_photos" fdi="0"></div>';
        // echo '<h3>No Primes</h3>';
    }
    ?>
</div>

</div>
<?php include 'stats.php';?>

<!-- INCLUDE LEVEL.PHP HERE -->

<?php include 'levels.php';?>


</div>

