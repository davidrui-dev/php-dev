     <div class="profileDetailsContainer levelsContainer">
                        <?php
                        if($user->level == 1)
                        {
                        ?>
                          <div class="level level1 activelevel" id="level1">
                              <p class="conditions">Conditions: Registration</p>
                            <img src="<?=PROOT?>images/Levels/1.png" alt="" class="animalImg">
                            <h3 class="levelTitle">Level <span>1</span></h3>
                            <div class="levelDetails">
                                <div class="detailItem">
                                    <div class="detailIcon">
                                        <img src="<?=PROOT?>images/Levels/greenbg.svg" alt="" class="detailsIcoBg">
                                        <img src="<?=PROOT?>images/Levels/tik.svg" alt="" class="detailsIco tickIco">
                                    </div>
                                    <h3 class="detailText">Green Shield <img src="<?=PROOT?>images/shields/greenw.svg" alt=""
                                            class="shield greenShield"></h3>
                                </div>
                                 <div class="detailItem">
                                    <div class="detailIcon">
                                        <img src="<?=PROOT?>images/Levels/greenbg.svg" alt="" class="detailsIcoBg">
                                        <img src="<?=PROOT?>images/Levels/tik.svg" alt="" class="detailsIco tickIco">
                                    </div>
                                    <h3 class="detailText"><span class="primeDescription">Prime</span> &amp; <span class="reprimeDescription">Re-Prime</span></h3>
                                </div>
                                 <div class="detailItem">
                                    <div class="detailIcon">
                                        <img src="<?=PROOT?>images/Levels/greenbg.svg" alt="" class="detailsIcoBg">
                                        <img src="<?=PROOT?>images/Levels/tik.svg" alt="" class="detailsIco tickIco">
                                    </div>
                                     <h3 class="detailText 100RpRecieved">100 RP Received</h3>
                                </div>
                            </div>
                        </div>
                        
                        <?php
                        } 
                        else
                        {
                        ?>

                        <div class="level level1 previouslevel" id="level1">
                            <img src="<?=PROOT?>images/Levels/bigtikbg.svg" alt="" class="lockedBg">
                            <img src="<?=PROOT?>images/Levels/bigtik.svg" alt="" class="bigTick">
                            <p class="conditions">Conditions: Registration</p>
                            <img src="<?=PROOT?>images/Levels/1.png" alt="" class="animalImg">
                            <h3 class="levelTitle">Level <span>1</span></h3>
                            <div class="levelDetails">
                                <div class="detailItem">
                                    <div class="detailIcon">
                                        <img src="<?=PROOT?>images/Levels/greenbg.svg" alt="" class="detailsIcoBg">
                                        <img src="<?=PROOT?>images/Levels/tik.svg" alt="" class="detailsIco tickIco">
                                    </div>
                                    <h3 class="detailText">Green Shield <img src="<?=PROOT?>images/shields/greenw.svg" alt=""
                                            class="shield greenShield"></h3>
                                </div>
                                <div class="detailItem">
                                    <div class="detailIcon">
                                        <img src="<?=PROOT?>images/Levels/greenbg.svg" alt="" class="detailsIcoBg">
                                        <img src="<?=PROOT?>images/Levels/tik.svg" alt="" class="detailsIco tickIco">
                                    </div>
                                    <h3 class="detailText"><span class="primeDescription">Prime</span> &amp; <span class="reprimeDescription">Re-Prime</span></h3>
                                </div>
                                 <div class="detailItem">
                                    <div class="detailIcon">
                                        <img src="<?=PROOT?>images/Levels/greenbg.svg" alt="" class="detailsIcoBg">
                                        <img src="<?=PROOT?>images/Levels/tik.svg" alt="" class="detailsIco tickIco">
                                    </div>
                                     <h3 class="detailText 100RpRecieved">100 RP Received</h3>
                                </div>
                            </div>
                        </div>
                         <?php
                        }
                        if($user->level == 2)
                        {
                        ?>
                            <div class="level level2 activelevel" id="level2">
                                <p class="conditions">Conditions: 10 Followers<br />*Upload a Profile picture<br />*Upload a Cover picture<br />*Link 1 Social Account</p>
                                <img src="<?=PROOT?>images/Levels/2.png" alt="" class="animalImg">
                                <h3 class="levelTitle">Level <span>2</span></h3>
                                <div class="levelDetails">
                                    <div class="detailItem">
                                        <div class="detailIcon">
                                            <img src="<?=PROOT?>images/Levels/greenbg.svg" alt="" class="detailsIcoBg">
                                            <img src="<?=PROOT?>images/Levels/tik.svg" alt="" class="detailsIco tickIco">
                                        </div>
                                        <h3 class="detailText profileLinkActivationDescription">Profile Link Activation</h3>
                                    </div>
                                </div>
                            </div>
                        <?php   
                        }
                        else if($user->level < 2)
                        {
                        ?>
                         <div class="level level2 nextlevel" id="level2">
                            <img src="<?=PROOT?>images/Levels/lockbg.svg" alt="" class="lockedBg">
                            <img src="<?=PROOT?>images/Levels/lock.svg" alt="" class="lock">
                           <p class="conditions">Conditions: 10 Followers<br />*Upload a Profile picture<br />*Upload
                                a
                                Cover picture<br />*Link
                                1 Social Account</p>
                            <img src="<?=PROOT?>images/Levels/2.png" alt="" class="animalImg">
                            <h3 class="levelTitle">Level <span>2</span></h3>
                            <div class="levelDetails">
                                 <div class="detailItem">
                                    <div class="detailIcon">
                                        <img src="<?=PROOT?>images/Levels/orange.svg" alt="" class="detailsIcoBg">
                                        <img src="<?=PROOT?>images/Levels/smallLock.svg" alt="" class="detailsIco lockIco">
                                    </div>
                                      <h3 class="detailText profileLinkActivationDescription">Profile Link Activation</h3>
                                </div>
                            </div>
                        </div>
                        <?php
                        } 
                        else
                        {
                        ?>
                         <div class="level level2 previouslevel" id="level2">
                            <img src="<?=PROOT?>images/Levels/bigtikbg.svg" alt="" class="lockedBg">
                            <img src="<?=PROOT?>images/Levels/bigtik.svg" alt="" class="bigTick">
                            <p class="conditions">Conditions: 10 Followers<br />*Upload a Profile picture<br />*Upload
                                a
                                Cover picture<br />*Link
                                1 Social Account</p>
                            <img src="<?=PROOT?>images/Levels/2.png" alt="" class="animalImg">
                            <h3 class="levelTitle">Level <span>2</span></h3>
                            <div class="levelDetails">
                                <div class="detailItem">
                                    <div class="detailIcon">
                                        <img src="<?=PROOT?>images/Levels/greenbg.svg" alt="" class="detailsIcoBg">
                                        <img src="<?=PROOT?>images/Levels/tik.svg" alt="" class="detailsIco tickIco">
                                    </div>
                                    <h3 class="detailText profileLinkActivationDescription">Profile Link Activation</h3>
                                </div>
                            </div>
                        </div>

                        <?php
                        }
                         if($user->level == 3)
                        {
                         ?>
                          <div class="level level3 activelevel" id="level3">
                            <p class="conditions">Conditions: 100 Followers</p>
                            <img src="<?=PROOT?>images/Levels/3.png" alt="" class="animalImg">
                            <h3 class="levelTitle">Level <span>3</span></h3>
                            <div class="levelDetails">
                                <div class="detailItem">
                                    <div class="detailIcon">
                                        <img src="<?=PROOT?>images/Levels/greenbg.svg" alt="" class="detailsIcoBg">
                                        <img src="<?=PROOT?>images/Levels/tik.svg" alt="" class="detailsIco tickIco">
                                    </div>
                                   <h3 class="detailText">Orange Shield <img src="<?=PROOT?>images/shields/orangew.svg" alt=""
                                            class="shield orangeShield"></h3>
                                </div>
                                <div class="detailItem">
                                    <div class="detailIcon">
                                        <img src="<?=PROOT?>images/Levels/greenbg.svg" alt="" class="detailsIcoBg">
                                        <img src="<?=PROOT?>images/Levels/tik.svg" alt="" class="detailsIco tickIco">
                                    </div>
                                     <h3 class="detailText">Blue Shield <img src="<?=PROOT?>images/shields/bluew.svg" alt="" class="shield blueShield"></h3>
                                </div>
                                <div class="detailItem">
                                    <div class="detailIcon">
                                        <img src="<?=PROOT?>images/Levels/greenbg.svg" alt="" class="detailsIcoBg">
                                        <img src="<?=PROOT?>images/Levels/tik.svg" alt="" class="detailsIco tickIco">
                                    </div>
                                     <h3 class="detailText editFullnameDescription">Edit Fullname</h3>
                                </div>


                            </div>
                        </div>
                         <?php   
                        }
                        else if($user->level < 3)
                        {
                        ?>
                        <div class="level level3 nextlevel" id="level3">
                            <img src="<?=PROOT?>images/Levels/lockbg.svg" alt="" class="lockedBg">
                            <img src="<?=PROOT?>images/Levels/lock.svg" alt="" class="lock">
                            <p class="conditions">Conditions: 100 Followers</p>
                            <img src="<?=PROOT?>images/Levels/3.png" alt="" class="animalImg">
                            <h3 class="levelTitle">Level <span>3</span></h3>
                            <div class="levelDetails">
                                 <div class="detailItem">
                                    <div class="detailIcon">
                                        <img src="<?=PROOT?>images/Levels/orange.svg" alt="" class="detailsIcoBg">
                                        <img src="<?=PROOT?>images/Levels/smallLock.svg" alt="" class="detailsIco lockIco">
                                    </div>
                                      <h3 class="detailText">Orange Shield <img src="<?=PROOT?>images/shields/orangew.svg" alt=""
                                            class="shield orangeShield"></h3>
                                </div>
                                <div class="detailItem">
                                    <div class="detailIcon">
                                        <img src="<?=PROOT?>images/Levels/orange.svg" alt="" class="detailsIcoBg">
                                        <img src="<?=PROOT?>images/Levels/smallLock.svg" alt="" class="detailsIco lockIco">
                                    </div>
                                   <h3 class="detailText">Blue Shield <img src="<?=PROOT?>images/shields/bluew.svg" alt="" class="shield blueShield"></h3>
                                </div>
                                <div class="detailItem">
                                    <div class="detailIcon">
                                        <img src="<?=PROOT?>images/Levels/orange.svg" alt="" class="detailsIcoBg">
                                        <img src="<?=PROOT?>images/Levels/smallLock.svg" alt="" class="detailsIco lockIco">
                                    </div>
                                <h3 class="detailText editFullnameDescription">Edit Fullname</h3>
                                </div>
                            </div>
                        </div>
                        <?php
                        } 
                        else
                        {
                        ?>
                        <div class="level level3 previouslevel" id="level3">
                            <img src="<?=PROOT?>images/Levels/bigtikbg.svg" alt="" class="lockedBg">
                            <img src="<?=PROOT?>images/Levels/bigtik.svg" alt="" class="bigTick">
                            <p class="conditions">Conditions: 100 Followers</p>
                            <img src="<?=PROOT?>images/Levels/3.png" alt="" class="animalImg">
                            <h3 class="levelTitle">Level <span>3</span></h3>
                            <div class="levelDetails">
                                <div class="detailItem">
                                    <div class="detailIcon">
                                        <img src="<?=PROOT?>images/Levels/greenbg.svg" alt="" class="detailsIcoBg">
                                        <img src="<?=PROOT?>images/Levels/tik.svg" alt="" class="detailsIco tickIco">
                                    </div>
                                    <h3 class="detailText">Orange Shield <img src="<?=PROOT?>images/shields/orangew.svg" alt=""
                                            class="shield orangeShield"></h3>
                                </div>
                                <div class="detailItem">
                                    <div class="detailIcon">
                                        <img src="<?=PROOT?>images/Levels/greenbg.svg" alt="" class="detailsIcoBg">
                                        <img src="<?=PROOT?>images/Levels/tik.svg" alt="" class="detailsIco tickIco">
                                    </div>
                                    <h3 class="detailText">Blue Shield <img src="<?=PROOT?>images/shields/bluew.svg" alt="" class="shield blueShield"></h3>
                                </div>
                                <div class="detailItem">
                                    <div class="detailIcon">
                                        <img src="<?=PROOT?>images/Levels/greenbg.svg" alt="" class="detailsIcoBg">
                                        <img src="<?=PROOT?>images/Levels/tik.svg" alt="" class="detailsIco tickIco">
                                    </div>
                                    <h3 class="detailText editFullnameDescription">Edit Fullname</h3>
                                </div>
                            </div>
                        </div>

                        <?php
                        }
                        if($user->level == 4)
                        {
                        ?>
                          <div class="level level4 activelevel" id="level4">
                            <p class="conditions">Conditions: 200 Followers</p>
                            <img src="<?=PROOT?>images/Levels/4.png" alt="" class="animalImg">
                            <h3 class="levelTitle">Level <span>4</span></h3>
                            <div class="levelDetails">
                                <div class="detailItem">
                                    <div class="detailIcon">
                                        <img src="<?=PROOT?>images/Levels/greenbg.svg" alt="" class="detailsIcoBg">
                                        <img src="<?=PROOT?>images/Levels/tik.svg" alt="" class="detailsIco tickIco">
                                    </div>
                                    <h3 class="detailText wingDescription">Create Wings</h3>
                                </div>
                                <div class="detailItem">
                                    <div class="detailIcon">
                                        <img src="<?=PROOT?>images/Levels/greenbg.svg" alt="" class="detailsIcoBg">
                                        <img src="<?=PROOT?>images/Levels/tik.svg" alt="" class="detailsIco tickIco">
                                    </div>
                                    <h3 class="detailText">Pink Shield <img src="<?=PROOT?>images/shields/pinkw.svg" alt="" class="shield pinkShield"></h3>
                                </div>
                                <div class="detailItem">
                                    <div class="detailIcon">
                                        <img src="<?=PROOT?>images/Levels/greenbg.svg" alt="" class="detailsIcoBg">
                                        <img src="<?=PROOT?>images/Levels/tik.svg" alt="" class="detailsIco tickIco">
                                    </div>
                                   <h3 class="detailText shareDirectPostDescription">Share Direct post</h3>
                                </div>
                            </div>
                        </div>
                        <?php   
                        }
                        else if($user->level < 4)
                        {
                        ?>
                        <div class="level level4 nextlevel" id="level4">
                            <img src="<?=PROOT?>images/Levels/lockbg.svg" alt="" class="lockedBg">
                            <img src="<?=PROOT?>images/Levels/lock.svg" alt="" class="lock">
                            <p class="conditions">Conditions: 200 Followers</p>
                            <img src="<?=PROOT?>images/Levels/4.png" alt="" class="animalImg">
                            <h3 class="levelTitle">Level <span>4</span></h3>
                            <div class="levelDetails">
                                 <div class="detailItem">
                                    <div class="detailIcon">
                                        <img src="<?=PROOT?>images/Levels/orange.svg" alt="" class="detailsIcoBg">
                                        <img src="<?=PROOT?>images/Levels/smallLock.svg" alt="" class="detailsIco lockIco">
                                    </div>
                                      <h3 class="detailText wingDescription">Create Wings</h3>
                                </div>
                                <div class="detailItem">
                                    <div class="detailIcon">
                                        <img src="<?=PROOT?>images/Levels/orange.svg" alt="" class="detailsIcoBg">
                                        <img src="<?=PROOT?>images/Levels/smallLock.svg" alt="" class="detailsIco lockIco">
                                    </div>
                                  <h3 class="detailText">Pink Shield <img src="<?=PROOT?>images/shields/pinkw.svg" alt="" class="shield pinkShield"></h3>
                                </div>
                                <div class="detailItem">
                                    <div class="detailIcon">
                                        <img src="<?=PROOT?>images/Levels/orange.svg" alt="" class="detailsIcoBg">
                                        <img src="<?=PROOT?>images/Levels/smallLock.svg" alt="" class="detailsIco lockIco">
                                    </div>
                                      <h3 class="detailText shareDirectPostDescription">Share Direct post</h3>
                                </div>
                            </div>
                        </div>
                        <?php
                        } 
                        else
                        {
                        ?>
                         <div class="level level4 previouslevel" id="level4">
                            <img src="<?=PROOT?>images/Levels/bigtikbg.svg" alt="" class="lockedBg">
                            <img src="<?=PROOT?>images/Levels/bigtik.svg" alt="" class="bigTick">
                            <p class="conditions">Conditions: 200 Followers</p>
                            <img src="<?=PROOT?>images/Levels/4.png" alt="" class="animalImg">
                            <h3 class="levelTitle">Level <span>4</span></h3>
                            <div class="levelDetails">
                                <div class="detailItem">
                                    <div class="detailIcon">
                                        <img src="<?=PROOT?>images/Levels/greenbg.svg" alt="" class="detailsIcoBg">
                                        <img src="<?=PROOT?>images/Levels/tik.svg" alt="" class="detailsIco tickIco">
                                    </div>
                                    <h3 class="detailText wingDescription">Create Wings</h3>
                                </div>
                                <div class="detailItem">
                                    <div class="detailIcon">
                                        <img src="<?=PROOT?>images/Levels/greenbg.svg" alt="" class="detailsIcoBg">
                                        <img src="<?=PROOT?>images/Levels/tik.svg" alt="" class="detailsIco tickIco">
                                    </div>
                                    <h3 class="detailText">Pink Shield <img src="<?=PROOT?>images/shields/pinkw.svg" alt="" class="shield pinkShield"></h3>
                                </div>
                                <div class="detailItem">
                                    <div class="detailIcon">
                                        <img src="<?=PROOT?>images/Levels/greenbg.svg" alt="" class="detailsIcoBg">
                                        <img src="<?=PROOT?>images/Levels/tik.svg" alt="" class="detailsIco tickIco">
                                    </div>
                                    <h3 class="detailText shareDirectPostDescription">Share Direct post</h3>
                                </div>
                                
                            </div>
                        </div>
                        <?php
                        }
                        if($user->level == 5)
                        {
                        ?>
                        <div class="level level5 activelevel" id="level5">
                            <p class="conditions">Conditions: 800 Followers</p>
                            <img src="<?=PROOT?>images/Levels/5.png" alt="" class="animalImg">
                            <h3 class="levelTitle">Level <span>5</span></h3>
                            <div class="levelDetails">

                                <div class="detailItem">
                                    <div class="detailIcon">
                                        <img src="<?=PROOT?>images/Levels/greenbg.svg" alt="" class="detailsIcoBg">
                                        <img src="<?=PROOT?>images/Levels/tik.svg" alt="" class="detailsIco tickIco">
                                    </div>
                                     <h3 class="detailText postExternalInfoDescription">Post External information</h3>
                                </div>

                               
                                <div class="detailItem">
                                    <div class="detailIcon">
                                        <img src="<?=PROOT?>images/Levels/greenbg.svg" alt="" class="detailsIcoBg">
                                        <img src="<?=PROOT?>images/Levels/tik.svg" alt="" class="detailsIco tickIco">
                                    </div>
                                     <h3 class="detailText">Violet Shield 
                                         <img src="<?=PROOT?>images/shields/voiletw.svg" alt=""
                                            class="shield voiletShield"></h3>
                                </div>
                                <div class="detailItem">
                                    <div class="detailIcon">
                                        <img src="<?=PROOT?>images/Levels/greenbg.svg" alt="" class="detailsIcoBg">
                                        <img src="<?=PROOT?>images/Levels/tik.svg" alt="" class="detailsIco tickIco">
                                    </div>
                                     <h3 class="detailText">Yellow Shield <img src="<?=PROOT?>images/shields/yelloww.svg" alt=""
                                            class="shield yellowShield"></h3>
                                </div>
                            </div>
                        </div>
                         <?php   
                        }
                        else if($user->level < 5)
                        {
                        ?>
                         <div class="level level5 nextlevel" id="level5">
                            <img src="<?=PROOT?>images/Levels/lockbg.svg" alt="" class="lockedBg">
                            <img src="<?=PROOT?>images/Levels/lock.svg" alt="" class="lock">
                            <p class="conditions">Conditions: 800 Followers</p>
                            <img src="<?=PROOT?>images/Levels/5.png" alt="" class="animalImg">
                            <h3 class="levelTitle">Level <span>5</span></h3>
                            <div class="levelDetails">

                                 <div class="detailItem">
                                    <div class="detailIcon">
                                        <img src="<?=PROOT?>images/Levels/orange.svg" alt="" class="detailsIcoBg">
                                        <img src="<?=PROOT?>images/Levels/smallLock.svg" alt="" class="detailsIco lockIco">
                                    </div>
                                  <h3 class="detailText postExternalInfoDescription">Post External information</h3>
                                </div>                            
                                <div class="detailItem">
                                    <div class="detailIcon">
                                        <img src="<?=PROOT?>images/Levels/orange.svg" alt="" class="detailsIcoBg">
                                        <img src="<?=PROOT?>images/Levels/smallLock.svg" alt="" class="detailsIco lockIco">
                                    </div>
                                    <h3 class="detailText">Violet Shield <img src="<?=PROOT?>images/shields/voiletw.svg" alt=""
                                            class="shield voiletShield"></h3>
                                </div>
                                <div class="detailItem">
                                    <div class="detailIcon">
                                        <img src="<?=PROOT?>images/Levels/orange.svg" alt="" class="detailsIcoBg">
                                        <img src="<?=PROOT?>images/Levels/smallLock.svg" alt="" class="detailsIco lockIco">
                                    </div>
                                   <h3 class="detailText">Yellow Shield <img src="<?=PROOT?>images/shields/yelloww.svg" alt=""
                                            class="shield yellowShield"></h3>
                                </div>
                                
                            </div>
                        </div>
                        <?php
                        } 
                        else
                        {
                        ?>
                        <div class="level level5 previouslevel" id="level5">
                            <img src="<?=PROOT?>images/Levels/bigtikbg.svg" alt="" class="lockedBg">
                            <img src="<?=PROOT?>images/Levels/bigtik.svg" alt="" class="bigTick">
                            <p class="conditions">Conditions: 800 Followers</p>
                            <img src="<?=PROOT?>images/Levels/5.png" alt="" class="animalImg">
                            <h3 class="levelTitle">Level <span>5</span></h3>
                            <div class="levelDetails">
                                <div class="detailItem">
                                    <div class="detailIcon">
                                        <img src="<?=PROOT?>images/Levels/greenbg.svg" alt="" class="detailsIcoBg">
                                        <img src="<?=PROOT?>images/Levels/tik.svg" alt="" class="detailsIco tickIco">
                                    </div>
                                    <h3 class="detailText postExternalInfoDescription">Post External information</h3>
                                </div>
                                <div class="detailItem">
                                    <div class="detailIcon">
                                        <img src="<?=PROOT?>images/Levels/greenbg.svg" alt="" class="detailsIcoBg">
                                        <img src="<?=PROOT?>images/Levels/tik.svg" alt="" class="detailsIco tickIco">
                                    </div>
                                    <h3 class="detailText">Violet Shield <img src="<?=PROOT?>images/shields/voiletw.svg" alt=""
                                            class="shield voiletShield"></h3>
                                </div>
                                <div class="detailItem">
                                    <div class="detailIcon">
                                        <img src="<?=PROOT?>images/Levels/greenbg.svg" alt="" class="detailsIcoBg">
                                        <img src="<?=PROOT?>images/Levels/tik.svg" alt="" class="detailsIco tickIco">
                                    </div>
                                    <h3 class="detailText">Yellow Shield <img src="<?=PROOT?>images/shields/yelloww.svg" alt=""
                                            class="shield yellowShield"></h3>
                                </div>
                            </div>
                        </div>
                        <?php
                        }
                             if($user->level == 6)
                        {
                        ?>
                        <div class="level level6 activelevel" id="level6">
                            <p class="conditions">Conditions: 4000 Followers</p>
                            <img src="<?=PROOT?>images/Levels/6.png" alt="" class="animalImg">
                            <h3 class="levelTitle">Level <span>6</span></h3>
                            <div class="levelDetails">
                                <div class="detailItem">
                                    <div class="detailIcon">
                                        <img src="<?=PROOT?>images/Levels/greenbg.svg" alt="" class="detailsIcoBg">
                                        <img src="<?=PROOT?>images/Levels/tik.svg" alt="" class="detailsIco tickIco">
                                    </div>
                                    <h3 class="detailText profileLinkActivation2Description">Profile Link Activation 2</h3>
                                </div>
                                <div class="detailItem">
                                    <div class="detailIcon">
                                        <img src="<?=PROOT?>images/Levels/greenbg.svg" alt="" class="detailsIcoBg">
                                        <img src="<?=PROOT?>images/Levels/tik.svg" alt="" class="detailsIco tickIco">
                                    </div>
                                      <h3 class="detailText editUsernameDescription">Change user name</h3>
                                </div>
                                  <div class="detailItem">
                                    <div class="detailIcon">
                                        <img src="<?=PROOT?>images/Levels/greenbg.svg" alt="" class="detailsIcoBg">
                                        <img src="<?=PROOT?>images/Levels/tik.svg" alt="" class="detailsIco tickIco">
                                    </div>
                                      <h3 class="detailText editFullnameAgainDescription">Edit Fullname</h3>
                                </div>
                            </div>
                        </div>
                        <?php   
                        }
                        else if($user->level < 6)
                        {
                        ?>
                        <div class="level level6 nextlevel" id="level6">
                            <img src="<?=PROOT?>images/Levels/lockbg.svg" alt="" class="lockedBg">
                            <img src="<?=PROOT?>images/Levels/lock.svg" alt="" class="lock">
                            <p class="conditions">Conditions: 4000 Followers</p>
                            <img src="<?=PROOT?>images/Levels/6.png" alt="" class="animalImg">
                            <h3 class="levelTitle">Level <span>6</span></h3>
                            <div class="levelDetails">
                                <div class="detailItem">
                                    <div class="detailIcon">
                                        <img src="<?=PROOT?>images/Levels/orange.svg" alt="" class="detailsIcoBg">
                                        <img src="<?=PROOT?>images/Levels/smallLock.svg" alt="" class="detailsIco lockIco">
                                    </div>
                                     <h3 class="detailText profileLinkActivation2Description">Profile Link Activation 2</h3>
                                </div>
                                <div class="detailItem">
                                    <div class="detailIcon">
                                        <img src="<?=PROOT?>images/Levels/orange.svg" alt="" class="detailsIcoBg">
                                        <img src="<?=PROOT?>images/Levels/smallLock.svg" alt="" class="detailsIco lockIco">
                                    </div>
                                    <h3 class="detailText editUsernameDescription">Change user name</h3>
                                </div>
                                 <div class="detailItem">
                                    <div class="detailIcon">
                                        <img src="<?=PROOT?>images/Levels/orange.svg" alt="" class="detailsIcoBg">
                                        <img src="<?=PROOT?>images/Levels/smallLock.svg" alt="" class="detailsIco lockIco">
                                    </div>
                                    <h3 class="detailText editFullnameAgainDescription">Edit Fullname</h3>
                                </div>
                            </div>
                        </div>
                        <?php
                        } 
                        else
                        {
                        ?>
                         <div class="level level6 previouslevel" id="level6">
                            <img src="<?=PROOT?>images/Levels/bigtikbg.svg" alt="" class="lockedBg">
                            <img src="<?=PROOT?>images/Levels/bigtik.svg" alt="" class="bigTick">
                            <p class="conditions">Conditions: 4000 Followers</p>
                            <img src="<?=PROOT?>images/Levels/6.png" alt="" class="animalImg">
                            <h3 class="levelTitle">Level <span>6</span></h3>
                            <div class="levelDetails">
                                <div class="detailItem">
                                    <div class="detailIcon">
                                        <img src="<?=PROOT?>images/Levels/greenbg.svg" alt="" class="detailsIcoBg">
                                        <img src="<?=PROOT?>images/Levels/tik.svg" alt="" class="detailsIco tickIco">
                                    </div>
                                    <h3 class="detailText profileLinkActivation2Description">Profile Link Activation 2</h3>
                                </div>
                                <div class="detailItem">
                                    <div class="detailIcon">
                                        <img src="<?=PROOT?>images/Levels/greenbg.svg" alt="" class="detailsIcoBg">
                                        <img src="<?=PROOT?>images/Levels/tik.svg" alt="" class="detailsIco tickIco">
                                    </div>
                                    <h3 class="detailText editUsernameDescription">Change user name</h3>
                                </div>
                                 <div class="detailItem">
                                    <div class="detailIcon">
                                        <img src="<?=PROOT?>images/Levels/greenbg.svg" alt="" class="detailsIcoBg">
                                        <img src="<?=PROOT?>images/Levels/tik.svg" alt="" class="detailsIco tickIco">
                                    </div>
                                    <h3 class="detailText editFullnameAgainDescription">Edit Fullname</h3>
                                </div>
                            </div>
                        </div>

                        <?php
                        }
                             if($user->level == 7)
                        {
                        ?>
                          <div class="level level7 activelevel" id="level7">
                            <p class="conditions">Conditions: 10,000 Followers</p>
                            <img src="<?=PROOT?>images/Levels/7.png" alt="" class="animalImg">
                            <h3 class="levelTitle">Level <span>7</span></h3>
                            <div class="levelDetails">
                              <!--   <div class="detailItem">
                                    <div class="detailIcon">
                                        <img src="<?=PROOT?>images/Levels/greenbg.svg" alt="" class="detailsIcoBg">
                                        <img src="<?=PROOT?>images/Levels/tik.svg" alt="" class="detailsIco tickIco">
                                    </div>
                                    <h3 class="detailText">Level 1 identity verification</h3>
                                </div> -->
                                <div class="detailItem">
                                    <div class="detailIcon">
                                        <img src="<?=PROOT?>images/Levels/greenbg.svg" alt="" class="detailsIcoBg">
                                        <img src="<?=PROOT?>images/Levels/tik.svg" alt="" class="detailsIco tickIco">
                                    </div>
                                    <h3 class="detailText">Silver Shield <img src="<?=PROOT?>images/shields/silverw.svg" alt=""
                                            class="shield silverShield"></h3>
                                </div>
                            </div>
                        </div>
                         <?php   
                        }
                        else if($user->level < 7)
                        {
                        ?>
                         <div class="level level7 nextlevel" id="level7">
                            <img src="<?=PROOT?>images/Levels/lockbg.svg" alt="" class="lockedBg">
                            <img src="<?=PROOT?>images/Levels/lock.svg" alt="" class="lock">
                            <p class="conditions">Conditions: 10,000 Followers</p>
                            <img src="<?=PROOT?>images/Levels/7.png" alt="" class="animalImg">
                            <h3 class="levelTitle">Level <span>7</span></h3>
                            <div class="levelDetails">
                              <!--   <div class="detailItem">
                                    <div class="detailIcon">
                                        <img src="<?=PROOT?>images/Levels/orange.svg" alt="" class="detailsIcoBg">
                                        <img src="<?=PROOT?>images/Levels/smallLock.svg" alt="" class="detailsIco lockIco">
                                    </div>
                                     <h3 class="detailText">Level 1 identity verification</h3>
                                </div> -->
                                <div class="detailItem">
                                    <div class="detailIcon">
                                        <img src="<?=PROOT?>images/Levels/orange.svg" alt="" class="detailsIcoBg">
                                        <img src="<?=PROOT?>images/Levels/smallLock.svg" alt="" class="detailsIco lockIco">
                                    </div>
                                    <h3 class="detailText">Silver Shield <img src="<?=PROOT?>images/shields/silverw.svg" alt=""
                                            class="shield silverShield"></h3>
                                </div>
                            </div>
                        </div>
                        <?php
                        } 
                        else
                        {
                        ?>
                         <div class="level level7 previouslevel" id="level7">
                            <img src="<?=PROOT?>images/Levels/bigtikbg.svg" alt="" class="lockedBg">
                            <img src="<?=PROOT?>images/Levels/bigtik.svg" alt="" class="bigTick">
                            <p class="conditions">Conditions: 10,000 Followers</p>
                            <img src="<?=PROOT?>images/Levels/7.png" alt="" class="animalImg">
                            <h3 class="levelTitle">Level <span>7</span></h3>
                            <div class="levelDetails">                                                   
                                <div class="detailItem">
                                    <div class="detailIcon">
                                        <img src="<?=PROOT?>images/Levels/greenbg.svg" alt="" class="detailsIcoBg">
                                        <img src="<?=PROOT?>images/Levels/tik.svg" alt="" class="detailsIco tickIco">
                                    </div>
                                   <h3 class="detailText">Silver Shield <img src="<?=PROOT?>images/shields/silverw.svg" alt=""
                                            class="shield silverShield"></h3>
                                </div>
                            </div>
                        </div>
                        <?php
                        }
                              if($user->level == 8)
                        {
                        ?>
                        <div class="level level8 activelevel" id="level8">
                            <p class="conditions">Conditions: 50,000 Followers</p>
                            <img src="<?=PROOT?>images/Levels/8.png" alt="" class="animalImg">
                            <h3 class="levelTitle">Level <span>8</span></h3>
                            <div class="levelDetails">
                               <div class="detailItem">
                                    <div class="detailIcon">
                                        <img src="<?=PROOT?>images/Levels/greenbg.svg" alt="" class="detailsIcoBg">
                                        <img src="<?=PROOT?>images/Levels/tik.svg" alt="" class="detailsIco tickIco">
                                    </div>
                                     <h3 class="detailText">Brown Shield <img src="<?=PROOT?>images/shields/brownw.svg" alt=""
                                            class="shield goldShield"></h3>
                                </div> 
                                <div class="detailItem">
                                    <div class="detailIcon">
                                        <img src="<?=PROOT?>images/Levels/greenbg.svg" alt="" class="detailsIcoBg">
                                        <img src="<?=PROOT?>images/Levels/tik.svg" alt="" class="detailsIco tickIco">
                                    </div>
                                    <h3 class="detailText profileLinkActivation3Description">Profile Link Activation 3</h3>
                                </div>                          
                            </div>
                        </div>
                         <?php   
                        }
                        else if($user->level < 8)
                        {
                        ?>
                        <div class="level level8 nextlevel" id="level8">
                            <img src="<?=PROOT?>images/Levels/lockbg.svg" alt="" class="lockedBg">
                            <img src="<?=PROOT?>images/Levels/lock.svg" alt="" class="lock">
                            <p class="conditions">Conditions: 50,000 Followers</p>
                            <img src="<?=PROOT?>images/Levels/8.png" alt="" class="animalImg">
                            <h3 class="levelTitle">Level <span>8</span></h3>
                            <div class="levelDetails">
                                <div class="detailItem">
                                    <div class="detailIcon">
                                        <img src="<?=PROOT?>images/Levels/orange.svg" alt="" class="detailsIcoBg">
                                        <img src="<?=PROOT?>images/Levels/smallLock.svg" alt="" class="detailsIco lockIco">
                                    </div>
                                    <h3 class="detailText">Brown Shield <img src="<?=PROOT?>images/shields/brownw.svg" alt=""
                                            class="shield goldShield"></h3>
                                </div>
                                <div class="detailItem">
                                    <div class="detailIcon">
                                        <img src="<?=PROOT?>images/Levels/orange.svg" alt="" class="detailsIcoBg">
                                        <img src="<?=PROOT?>images/Levels/smallLock.svg" alt="" class="detailsIco lockIco">
                                    </div>
                                    <h3 class="detailText profileLinkActivation3Description">Profile Link Activation 3</h3>
                                </div>
                            </div>
                        </div>

                        <?php
                        } 
                        else
                        {
                        ?>
                        <div class="level level8 previouslevel" id="level8">
                            <img src="<?=PROOT?>images/Levels/bigtikbg.svg" alt="" class="lockedBg">
                            <img src="<?=PROOT?>images/Levels/bigtik.svg" alt="" class="bigTick">
                            <p class="conditions">Conditions: 50,000 Followers</p>
                            <img src="<?=PROOT?>images/Levels/8.png" alt="" class="animalImg">
                            <h3 class="levelTitle">Level <span>8</span></h3>
                            <div class="levelDetails"> 
                             <div class="detailItem">
                                    <div class="detailIcon">
                                        <img src="<?=PROOT?>images/Levels/greenbg.svg" alt="" class="detailsIcoBg">
                                        <img src="<?=PROOT?>images/Levels/tik.svg" alt="" class="detailsIco tickIco">
                                    </div>
                                    <h3 class="detailText">Brown Shield <img src="<?=PROOT?>images/shields/brownw.svg" alt=""
                                            class="shield goldShield"></h3>
                                </div>                             
                                <div class="detailItem">
                                    <div class="detailIcon">
                                        <img src="<?=PROOT?>images/Levels/greenbg.svg" alt="" class="detailsIcoBg">
                                        <img src="<?=PROOT?>images/Levels/tik.svg" alt="" class="detailsIco tickIco">
                                    </div>
                                    <h3 class="detailText profileLinkActivation3Description">Profile Link Activation 3</h3>
                                </div>
                            </div>
                        </div>
                        <?php
                        }
                             if($user->level == 9)
                        {
                         ?>
                         <div class="level level9 activelevel" id="level9">
                            <p class="conditions">Conditions: 100,000 Followers</p>
                            <img src="<?=PROOT?>images/Levels/9.png" alt="" class="animalImg">
                            <h3 class="levelTitle">Level <span>9</span></h3>
                            <div class="levelDetails">
                                <div class="detailItem">
                                    <div class="detailIcon">
                                        <img src="<?=PROOT?>images/Levels/greenbg.svg" alt="" class="detailsIcoBg">
                                        <img src="<?=PROOT?>images/Levels/tik.svg" alt="" class="detailsIco tickIco">
                                    </div>
                                    <h3 class="detailText profileLinkActivation4Description">Profile Link Activation 4</h3>
                                </div>                          
                            </div>
                        </div>
                         <?php   
                        }
                        else if($user->level < 9)
                        {
                        ?>
                         <div class="level level9 nextlevel" id="level9">
                            <img src="<?=PROOT?>images/Levels/lockbg.svg" alt="" class="lockedBg">
                            <img src="<?=PROOT?>images/Levels/lock.svg" alt="" class="lock">
                            <p class="conditions">Conditions: 100,000 Followers</p>
                            <img src="<?=PROOT?>images/Levels/9.png" alt="" class="animalImg">
                            <h3 class="levelTitle">Level <span>9</span></h3>
                            <div class="levelDetails">
                                <div class="detailItem">
                                    <div class="detailIcon">
                                        <img src="<?=PROOT?>images/Levels/orange.svg" alt="" class="detailsIcoBg">
                                        <img src="<?=PROOT?>images/Levels/smallLock.svg" alt="" class="detailsIco lockIco">
                                    </div>
                                    <h3 class="detailText profileLinkActivation4Description">Profile Link Activation 4</h3>
                                </div>
                            </div>
                        </div>
                        <?php
                        } 
                        else
                        {
                        ?>
                         <div class="level level9 previouslevel" id="level9">
                            <img src="<?=PROOT?>images/Levels/bigtikbg.svg" alt="" class="lockedBg">
                            <img src="<?=PROOT?>images/Levels/bigtik.svg" alt="" class="bigTick">
                            <p class="conditions">Conditions: 100,000 Followers</p>
                            <img src="<?=PROOT?>images/Levels/9.png" alt="" class="animalImg">
                            <h3 class="levelTitle">Level <span>9</span></h3>
                            <div class="levelDetails">                              
                                <div class="detailItem">
                                    <div class="detailIcon">
                                        <img src="<?=PROOT?>images/Levels/greenbg.svg" alt="" class="detailsIcoBg">
                                        <img src="<?=PROOT?>images/Levels/tik.svg" alt="" class="detailsIco tickIco">
                                    </div>
                                    <h3 class="detailText profileLinkActivation4Description">Profile Link Activation 4</h3>
                                </div>
                            </div>
                        </div>

                        <?php
                        }
                          if($user->level == 10)
                        {  
                         ?>
                            <div class="level level10 activelevel" id="level10">
                                <p class="conditions">Conditions: 700,000 Followers</p>
                                <img src="<?=PROOT?>images/Levels/10.png" alt="" class="animalImg">
                                <h3 class="levelTitle">Level <span>10</span></h3>
                                <div class="levelDetails">
                                    <div class="detailItem">
                                        <div class="detailIcon">
                                            <img src="<?=PROOT?>images/Levels/greenbg.svg" alt="" class="detailsIcoBg">
                                            <img src="<?=PROOT?>images/Levels/tik.svg" alt="" class="detailsIco tickIco">
                                        </div>
                                        <h3 class="detailText">Unidawn Identity Verification</h3>
                                    </div>                          
                                </div>
                            </div>

                        <?php
                        } 
                        else
                        {
                        ?>
                            <div class="level level10 nextlevel" id="level10">
                                <img src="<?=PROOT?>images/Levels/lockbg.svg" alt="" class="lockedBg">
                                <img src="<?=PROOT?>images/Levels/lock.svg" alt="" class="lock">
                                <p class="conditions">Conditions: 700,000 Followers</p>
                                <img src="<?=PROOT?>images/Levels/10.png" alt="" class="animalImg">
                                <h3 class="levelTitle">Level <span>10</span></h3>
                                <div class="levelDetails">
                                    <div class="detailItem">
                                        <div class="detailIcon">
                                            <img src="<?=PROOT?>images/Levels/orange.svg" alt="" class="detailsIcoBg">
                                            <img src="<?=PROOT?>images/Levels/smallLock.svg" alt="" class="detailsIco lockIco">
                                        </div>
                                        <h3 class="detailText">Unidawn Identity Verification</h3>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }  
                        ?>
                <!----------------------------------------------------Overlay Shields Conditions Container --------------------------------------------->
                        
                    </div>