   <?php
    $newCommon = new Common();
    $connectedCounts=$newCommon->UD_GetConnectionCount('follow',$uid); 
    $primeCount=$newCommon->UD_FindByUIDWithStatus('primecount',$uid,1);
    $getNetworth=$newCommon->UD_FindByUIDWithStatus('networth',$uid,1);  
    $getPrimes=$newCommon->UD_FindByUIDAllAndPrimeType('primes',$uid,1,'Prime');
    $hashfollowcount=$newCommon->UD_hashfollowCount($uid);
    $taggedCounts=$newCommon->UD_phototag_count($uid);
    $reprimeCount=0;
    $redGreen=0; $redBlue=0; $redOrange=0; $redPink=0; $redVoilet=0; $redYellow=0; $redSilver=0; $redBrown=0;
    $whiteBlue=0; $whiteOrange=0;  $whitePink=0; $whiteVoilet=0; $whiteYellow=0; $whiteSilver=0;$whiteBrown=0;

        $totalShieldCount=0;
        if($getPrimes)
        {
         foreach ($getPrimes as  $getPrime)
         {  

              if($getPrime->shield=='green' && $getPrime->shield_status==1)
              $redGreen += 1;


              if($getPrime->shield=='blue' && $getPrime->shield_status==0)
                 $whiteBlue += 1;
             if($getPrime->shield=='blue' && $getPrime->shield_status==1)
                $redBlue += 1;

              if($getPrime->shield=='orange' && $getPrime->shield_status==0)
                 $whiteOrange += 1;
             if($getPrime->shield=='orange' && $getPrime->shield_status==1)
                 $redOrange += 1;

              if($getPrime->shield=='pink' && $getPrime->shield_status==0)
                 $whitePink += 1;
             if($getPrime->shield=='pink' && $getPrime->shield_status==1)
                 $redPink += 1;

              if($getPrime->shield=='voilet' && $getPrime->shield_status==0)
                 $whiteVoilet += 1;
             if($getPrime->shield=='voilet' && $getPrime->shield_status==1)
                 $redVoilet += 1;

              if($getPrime->shield=='yellow' && $getPrime->shield_status==0)
                 $whiteYellow += 1;
             if($getPrime->shield=='yellow' && $getPrime->shield_status==1)
                 $redYellow += 1;

              if($getPrime->shield=='silver' && $getPrime->shield_status==0)
                 $whiteSilver += 1;
             if($getPrime->shield=='silver' && $getPrime->shield_status==1)
                 $redSilver += 1;

              if($getPrime->shield=='brown' && $getPrime->shield_status==0)
                 $whiteBrown += 1;
             if($getPrime->shield=='brown' && $getPrime->shield_status==1)
                 $redBrown += 1;

               // your reprimes count   
                $reprimeCount=$reprimeCount+$getPrime->reprimecount;
         }
       }

        $totalShieldCount=$redGreen+$redBlue+$redOrange+$redPink+$redVoilet+$redYellow+$redSilver+$redBrown;

     

    ?>


      <div class="profileDetailsContainer statsContainer">
            <div class="blank_div" style="width: 100vw; height: 1px;"></div>
                        <h3 class="netWorthTitle">Net Worth</h3>
                        <div class="netWorthContainer">                            
                        <?php 
                        if($getNetworth){
                            ?>
                            <p><img src="<?=PROOT?>images/rp.png" class="rpIcon" style="width: 40px;"> <?php echo number_format($getNetworth->totalnetworth); ?></p>
                            <?php
                        }
                        else{
                        ?>
                         <p><span>&#x20b9;</span>0</p>
                        <?php }?>
                        </div>
                        <h3 class="shieldTitle">My shields status</h3>
                        <div class="statShieldContainer">                            
                            <div class="shieldScrollContainer" data-i="1">
                                <div class="singleShield">
                                    <div class="whiteShield">
                                        <div class="shield">
                                            <img src="<?PROOT?>images/shields/greenr.svg" alt="" style="height: 13vh; width: 15vw;">
                                        </div>
                                        <div class="count">
                                            <h3 style="color: #c60c0c;"><?=$redGreen?></h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="singleShield">
                                    <div class="whiteShield">
                                        <div class="shield">
                                            <img src="<?PROOT?>images/shields/bluew.svg" alt="">
                                        </div>
                                        <div class="count">
                                            <h3><?=$whiteBlue?></h3>
                                        </div>
                                    </div>
                                    <div class="redShield">
                                        <div class="shield">
                                            <img src="<?PROOT?>images/shields/bluer.svg" alt="">
                                        </div>
                                        <div class="count">
                                            <h3><?=$redBlue?></h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="singleShield">
                                    <div class="whiteShield">
                                        <div class="shield">
                                            <img src="<?PROOT?>images/shields/orangew.svg" alt="">
                                        </div>
                                        <div class="count">
                                            <h3><?=$whiteOrange?></h3>
                                        </div>
                                    </div>
                                    <div class="redShield">
                                        <div class="shield">
                                            <img src="<?PROOT?>images/shields/oranger.svg" alt="">
                                        </div>
                                        <div class="count">
                                            <h3><?=$redOrange?></h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="singleShield">
                                    <div class="whiteShield">
                                        <div class="shield">
                                            <img src="<?PROOT?>images/shields/pinkw.svg" alt="">
                                        </div>
                                        <div class="count">
                                            <h3><?=$whitePink?></h3>
                                        </div>
                                    </div>
                                    <div class="redShield">
                                        <div class="shield">
                                            <img src="<?PROOT?>images/shields/pinkr.svg" alt="">
                                        </div>
                                        <div class="count">
                                            <h3><?=$redPink?></h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="singleShield">
                                    <div class="whiteShield">
                                        <div class="shield">
                                            <img src="<?PROOT?>images/shields/yelloww.svg" alt="">
                                        </div>
                                        <div class="count">
                                            <h3><?=$whiteYellow?></h3>
                                        </div>
                                    </div>
                                    <div class="redShield">
                                        <div class="shield">
                                            <img src="<?PROOT?>images/shields/yellowr.svg" alt="">
                                        </div>
                                        <div class="count">
                                            <h3><?=$redYellow?></h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="singleShield">
                                    <div class="whiteShield">
                                        <div class="shield">
                                            <img src="<?PROOT?>images/shields/voiletw.svg" alt="">
                                        </div>
                                        <div class="count">
                                            <h3><?=$whiteVoilet?></h3>
                                        </div>
                                    </div>
                                    <div class="redShield">
                                        <div class="shield">
                                            <img src="<?PROOT?>images/shields/voiletr.svg" alt="">
                                        </div>
                                        <div class="count">
                                            <h3><?=$redVoilet?></h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="singleShield">
                                    <div class="whiteShield">
                                        <div class="shield">
                                            <img src="<?PROOT?>images/shields/silverw.svg" alt="">
                                        </div>
                                        <div class="count">
                                            <h3><?=$whiteSilver?></h3>
                                        </div>
                                    </div>
                                    <div class="redShield">
                                        <div class="shield">
                                            <img src="<?PROOT?>images/shields/silverr.svg" alt="">
                                        </div>
                                        <div class="count">
                                            <h3><?=$redSilver?></h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="singleShield">
                                    <div class="whiteShield">
                                        <div class="shield">
                                            <img src="<?PROOT?>images/shields/brownw.svg" alt="">
                                        </div>
                                        <div class="count">
                                            <h3><?=$whiteBrown?></h3>
                                        </div>
                                    </div>
                                    <div class="redShield">
                                        <div class="shield">
                                            <img src="<?PROOT?>images/shields/brownr.svg" alt="">
                                        </div>
                                        <div class="count">
                                            <h3><?=$redBrown?></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>                            
                        </div>
                        <div class="navDots">
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                        <h3 class="shieldTitle">My Activities</h3>

                        <div class="activitiesContainer">
                            <div class="singleAvtivity">
                                <div class="activityName">
                                    <img src="<?PROOT?>images/Stats/1.svg" alt="" class="iconBg">
                                    <h3>Followers</h3>
                                </div>
                                <div class="activityValue" style="background-color: #f2f4f7;">
                                    <h3><?=$user->followers?></h3>
                                </div>
                            </div>
                            <div class="singleAvtivity">
                                <div class="activityName">
                                    <img src="<?PROOT?>images/Stats/2.svg" alt="" class="iconBg">
                                    <h3>Following</h3>
                                </div>
                                <div class="activityValue" style="background-color: #f2f4f7;">
                                    <h3><?=$user->following?></h3>
                                </div>
                            </div>
                            <div class="singleAvtivity">
                                <div class="activityName">
                                    <img src="<?PROOT?>images/Stats/3.svg" alt="" class="iconBg">
                                    <h3>Connections</h3>
                                </div>
                                <div class="activityValue" style="background-color: #f2f4f7;">
                                    <?php if($connectedCounts){ ?>
                                        <h3><?=$connectedCounts?></h3>
                                    <?php } else { ?>
                                        <h3>0</h3>
                                    <?php } ?>   
                                </div>
                            </div>
                            <div class="singleAvtivity">
                                <div class="activityName">
                                    <img src="<?PROOT?>images/Stats/4.svg" alt="" class="iconBg">
                                    <h3>Verified Shields</h3>
                                </div>
                                <div class="activityValue" style="background-color: #f2f4f7;">
                                    <h3><?=$totalShieldCount?></h3>
                                </div>
                            </div>
                            <div class="singleAvtivity">
                                <div class="activityName">
                                    <img src="<?PROOT?>images/Stats/5.svg" alt="" class="iconBg">
                                    <h3>Primes with Shields</h3>
                                </div>
                                <div class="activityValue" style="background-color: #f2f4f7;">
                                    <?php if($primeCount){?>
                                        <h3><?php echo $primeCount->primes;?></h3>
                                    <?php }else{?>
                                        <h3>0</h3>
                                    <?php }?>                                    
                                </div>
                            </div>
                            <div class="singleAvtivity">
                                <div class="activityName">
                                    <img src="<?PROOT?>images/Stats/6.svg" alt="" class="iconBg">
                                    <h3>Structured Primes</h3>
                                </div>
                                <div class="activityValue" style="background-color: #f2f4f7;">
                                    <h3>-</h3>
                                </div>
                            </div>
                            <div class="singleAvtivity">
                                <div class="activityName">
                                    <img src="<?PROOT?>images/Stats/7.svg" alt="" class="iconBg">
                                    <h3>Wings</h3>
                                </div>
                                <div class="activityValue" style="background-color: #f2f4f7;">
                                    <h3><?=$user->wingscount?></h3>
                                </div>
                            </div>
                            <div class="singleAvtivity">
                                <div class="activityName">
                                    <img src="<?PROOT?>images/Stats/8.svg" alt="" class="iconBg">
                                    <h3>Shares</h3>
                                </div>
                                <div class="activityValue" style="background-color: #f2f4f7;">
                                    <?php if($primeCount){?>
                                        <h3><?php echo $primeCount->sharecount;?></h3>
                                    <?php }else{?>
                                        <h3>-</h3>
                                    <?php }?>                                    
                                </div>
                            </div>
                            <div class="singleAvtivity">
                                <div class="activityName">
                                    <img src="<?PROOT?>images/Stats/9.svg" alt="" class="iconBg">
                                    <h3>Re-Primes</h3>
                                </div>
                                <div class="activityValue" style="background-color: #f2f4f7;">
                                    <h3><?=$reprimeCount?></h3>
                                </div>
                            </div>
                            <div class="singleAvtivity">
                                <div class="activityName">
                                    <img src="<?PROOT?>images/Stats/10.svg" alt="" class="iconBg">
                                    <h3>External Links</h3>

                                </div>
                                <div class="activityValue" style="background-color: #f2f4f7;">
                                     <?php if($primeCount){?>
                                        <h3><?php echo $primeCount->extprime_count;?></h3>
                                    <?php }else{?>
                                        <h3>-</h3>
                                    <?php }?>                                   
                                </div>
                            </div>
                            <div class="singleAvtivity">
                                <div class="activityName">
                                    <img src="<?PROOT?>images/Stats/11.svg" alt="" class="iconBg">
                                    <h3>Tagged</h3>
                                </div>
                                <div class="activityValue" style="background-color: #f2f4f7;">
                                    <h3><?=$taggedCounts?></h3>
                                </div>
                            </div>
                            <div class="singleAvtivity">
                                <div class="activityName">
                                    <img src="<?PROOT?>images/Stats/12.svg" alt="" class="iconBg">
                                    <h3>Hashtags</h3>
                                </div>
                                <div class="activityValue" style="background-color: #f2f4f7;">
                                    <?php if($hashfollowcount){?>
                                        <h3><?php echo  $hashfollowcount;?></h3>
                                    <?php }else{?>
                                        <h3>0</h3>
                                    <?php }?>                                    
                                </div>
                            </div>
                        </div>
                        <div style="padding: 10px;"></div>
                    </div>
