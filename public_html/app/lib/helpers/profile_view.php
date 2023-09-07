<?php

function profileViewHtmlOffline($uid){
    $_SESSION['profile_id'] = $uid; 
    $NewCommon = new Common();
    // $_SESSION['visitor_id']=2;
    if(!empty($_SESSION['profile_id'])){
        $uid=$_SESSION['profile_id'];
    }else{
        Router::redirect('Unavailable');
    }
    // Get Users,User Profile Details
    $user = $NewCommon->UD_FindByID('users',$uid);
    $cover_image = Get_Cover_thumnail($uid,$user->coverpic);
    $profile = $NewCommon->UD_FindByUID('profile',$uid);
    ?>
    <!DOCTYPE HTML>
    <html lang="en">
        <head>  
            <title><?php echo $user->fullname;?></title>
            <link rel="apple-touch-icon" sizes="57x57" href="<?=PROOT?>images/favicon/apple-icon-57x57.png">
            <link rel="apple-touch-icon" sizes="60x60" href="<?=PROOT?>images/favicon/apple-icon-60x60.png">
            <link rel="apple-touch-icon" sizes="72x72" href="<?=PROOT?>images/favicon/apple-icon-72x72.png">
            <link rel="apple-touch-icon" sizes="76x76" href="<?=PROOT?>images/favicon/apple-icon-76x76.png">
            <link rel="apple-touch-icon" sizes="114x114" href="<?=PROOT?>images/favicon/apple-icon-114x114.png">
            <link rel="apple-touch-icon" sizes="120x120" href="<?=PROOT?>images/favicon/apple-icon-120x120.png">
            <link rel="apple-touch-icon" sizes="144x144" href="<?=PROOT?>images/favicon/apple-icon-144x144.png">
            <link rel="apple-touch-icon" sizes="152x152" href="<?=PROOT?>images/favicon/apple-icon-152x152.png">
            <link rel="apple-touch-icon" sizes="180x180" href="<?=PROOT?>images/favicon/apple-icon-180x180.png">
            <link rel="icon" type="image/png" sizes="192x192"  href="<?=PROOT?>images/favicon/android-icon-192x192.png">
            <link rel="icon" type="image/png" sizes="32x32" href="<?=PROOT?>images/favicon/favicon-32x32.png">
            <link rel="icon" type="image/png" sizes="96x96" href="<?=PROOT?>images/favicon/favicon-96x96.png">
            <link rel="icon" type="image/png" sizes="16x16" href="<?=PROOT?>images/favicon/favicon-16x16.png">
            <link rel="manifest" href="<?=PROOT?>images/favicon/manifest.json">
            <meta name="msapplication-TileColor" content="#4083ff">
            <meta name="msapplication-TileImage" content="<?=PROOT?>images/favicon/ms-icon-144x144.png">
            <meta name="theme-color" content="#4083ff">
            <!-- Required meta tags -->    
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />    
            <meta name="google" value="notranslate">
            <meta name="title" content="<?php echo $user->fullname;?>">
            <meta property="og:title" content="<?php echo $user->fullname;?>">
            <?php 
            $lastProfile = $NewCommon->UD_Last_profile_pic_prime($uid,'Profile');
            $profile_img_name = '';
            if(!empty($lastProfile)){
                $lastProfileImage = $NewCommon->UD_FindByPID('primeimages',$lastProfile->id);
                $profile_img_name = $lastProfileImage->timeline;        
            }
            $bio_description = trim(str_replace('<br />',"",$profile->bio));
            $descCount= strlen(iconv('utf-8', 'utf-16le', $bio_description)) / 2;
            $bio_char_limit= 159;
            if($descCount > 159){
                $bio_char_limit= 155;
            }?>
            <meta name="description" content="<?php echo custom_echo($bio_description,$bio_char_limit);?>">
            <meta property="og:description" content="<?php echo custom_echo($bio_description,$bio_char_limit);?>">
            <meta name="image" content="<?php echo GetImage($uid,'Profile','timeline',$user->type,$profile_img_name); ?>">
            <meta property="og:image" content="<?php echo GetImage($uid,'Profile','timeline',$user->type,$profile_img_name); ?>">
            <meta name="url" content="https://m.unidawn.com/<?=$user->username?>">
            <meta property="og:url" content="https://m.unidawn.com/<?=$user->username?>">

            <link rel="stylesheet" type="text/css" href="/css/main.css?<?=VERSION_NO?>">
            <script src="<?=PROOT?>js/jquery.js?<?=VERSION_NO?>" type="text/javascript"></script> 
            <script type="text/javascript">
            var path = "<?=PROOT?>";
            $(document).on('click', '.tab, .prime, .authorLocation', function(){
                $('.nonLoggedInPopup .unloginText').text('Unidawn is a unique social network. Join today and Explore a completely new world of Social Identity Networking');
                $('.nonLoggedInPopup').css('display', 'flex');
            });
            $(document).on('click', '.followBtn', function(){
                $('.nonLoggedInPopup .unloginText').text('Follow '+$('.authorName').text()+'  to see what they share on Unidawn. Sign up or Login so you never miss their Primes.');
                $('.nonLoggedInPopup').css('display', 'flex');
            });
            $(document).on('click', '.nonLoggedInPopup .closePopup', function(){
                $('.nonLoggedInPopup').css('display', 'none');
            });

            function loadmoreOfflinePrime() {
                var shildActive = $("#PrimesTab").attr('activetab');
                var lid = $("#load_prime").attr('fdi');
                if (lid != 0) {
                    $.ajax({
                        type: 'POST',
                        url: path + 'Rewards/loadmoreOfflinePrime',
                        data: 'lastID=' + lid + '&shield=' + shildActive,
                        beforeSend: function () {
                            //$('.load-more').show();
                        },
                        success: function (html) {
                            $('#load_prime').remove();
                            $('#PrimesTab').append(html);
                            loadProfilePrimeThumb();
                        }
                    });
                }
            }

            document.addEventListener('touchstart', handleTouchStart, false);
            document.addEventListener('touchmove', handleTouchMove, false);
            var xDown = null;
            var yDown = null;
            function getTouches(evt) {
                return evt.touches ||             // browser API
                    evt.originalEvent.touches; // jQuery
            }
            function handleTouchStart(evt) {
                const firstTouch = getTouches(evt)[0];
                xDown = firstTouch.clientX;
                yDown = firstTouch.clientY;
            };
            function handleTouchMove(evt) {
                if (!xDown || !yDown) {
                    return;
                }
                // var xUp = evt.touches[0].clientX;
                var yUp = evt.touches[0].clientY;
                // var xDiff = xDown - xUp;
                var yDiff = yDown - yUp;
                if (yDiff > 0) {
                    if ($('.globalOfflinePrimeViewContainer').is(":visible")) {
                        loadmoreOfflinePrime();
                    }
                } 
                xDown = null;
                yDown = null;
            };

            $(document).ready(function(){
                loadProfilePrimeThumb();
            });

            
            function loadProfilePrimeThumb() {    
                var lazyloadImages = document.querySelectorAll(".primesContainer img.lazy");
                var lazyloadThrottleTimeout;
                function lazyloadProfilePrime() {        
                    if (lazyloadThrottleTimeout) {
                        clearTimeout(lazyloadThrottleTimeout);
                    }
                    lazyloadThrottleTimeout = setTimeout(function () {            
                        var scrollTop = window.pageYOffset;
                        lazyloadImages.forEach(function (img) {                                                                
                            if ($(img).offset().top < (window.innerHeight + scrollTop)) {
                                img.src = img.attributes['data-src'].value;
                                img.classList.remove('lazy');
                            }
                        });
                        if (lazyloadImages.length == 0) {
                            document.removeEventListener("scroll", lazyloadProfilePrime);
                            window.removeEventListener("resize", lazyloadProfilePrime);
                            window.removeEventListener("orientationChange", lazyloadProfilePrime);
                        }
                    }, 20);
                }
                document.addEventListener("scroll", lazyloadProfilePrime);
                window.addEventListener("resize", lazyloadProfilePrime);
                window.addEventListener("orientationChange", lazyloadProfilePrime);
                lazyloadProfilePrime();
            }
            </script>  

        </head>
        <body>
            <div class="globalPrimeViewContainer globalOfflinePrimeViewContainer">
                <div class="container">
                    <?php include 'views/offline.php';?>
                </div>
                <div class="nonLoggedInPopup">
                    <img src="<?PROOT?>images/Tour/cross.svg" alt="" class="closePopup">
                    <div class="content">
                        <img src="<?PROOT?>images/login/logoBig.png" alt="" class="logo">
                        <h3 class="unloginText">Unidawn is a unique social network. Join today and Explore a completely new world of Social Identity Networking</h3>
                        <a href="<?=PROOT?>login"><button class="loginBtn">Log in</button></a><br />
                        <a href="<?=PROOT?>signup"><button href="#" class="signupBtn">Sign up</button></a>
                    </div>
                </div>
            </div>
            <div class="deviceOrientationContainer">
                <div class="content">
                <img src="/images/rotate.png" alt="">
                <h3>For Optimal Experiance, Please Rotate Your Device To Potrait Mode</h3>
                </div>    
            </div>
            <script>
                $(document).ready(function(){
                    if(window.orientation == 0){
                        $('.deviceOrientationContainer').hide();
                    }else{
                        $('.deviceOrientationContainer').show();
                    }
                });

                window.addEventListener("orientationchange", function() {
                    if(window.orientation == 0){
                        $('.deviceOrientationContainer').hide();
                    }else{
                        $('.deviceOrientationContainer').show();
                    }
                });
            </script>
        </body>
    </html>
<?php 
}

function profileViewHtmlOnline($uid){
    if(isset($_COOKIE['ud'])){
        $newUsers = new Users();
        $cookiename=$_COOKIE['ud'];
        $tbl='loginhistory';        
        $user = $newUsers->findBycookiename($tbl,$cookiename);
        if($user){            
            $_SESSION['master_id']=$user->uid;
            $current_login_history = '';
            if(isset($_SESSION['master_id'])){
                $current_login_history = $newUsers->getCurrentLoginHistory($_SESSION['master_id'],$cookiename);
                if(!empty($current_login_history) && $_SESSION['master_id']==$user->uid){
                    $_SESSION['master_id']=$user->uid;                      
                }else{
                    Cookie::delete('ud');                                             
                    echo '<meta http-equiv="refresh" content="0;url'.PROOT.'home/index" />';
                }
            }else{
                Cookie::delete('ud');                                              
                echo '<meta http-equiv="refresh" content="0;url'.PROOT.'home/index" />';
            }
        }else{
          Cookie::delete('ud');                
          echo '<meta http-equiv="refresh" content="0;url'.PROOT.'home/index" />';
        }
    }else{                 
        echo '<meta http-equiv="refresh" content="0;url'.PROOT.'home/index" />';
    }
    $_SESSION['visitor_id'] = $uid;
    $NewCommon = new Common();
    $Newsfeed = new Newsfeeds();
    if(!empty($_SESSION['visitor_id']))
    {
        $uid=$_SESSION['visitor_id'];
        $myid=$_SESSION['master_id'];
    } 
    else
    {
        Router::redirect('Unavailable');
    }

    $user = $NewCommon->UD_FindByID('users',$uid);
    $cover_image = Get_Cover_thumnail($uid,$user->coverpic);
    $profile = $NewCommon->UD_FindByUID('profile',$uid);
    if($profile)
    {
        $bio = $profile->bio;
        if($profile->location_status == 'Public')
        {
            $loca= $profile->location;
        }
        else
        {
            $loca='';
        }

        if($profile->dob_status == 'Public')
        {
            $website=$profile->website;
        }
        else
        {
            $website='';
        }
        
        
    }
    else
    {
        $bio = '';
        $loca= '';
        $website='';
    }
    $prime_counts=$NewCommon->UD_GetPrimeCount($uid);
    if($prime_counts) 
    {
        $prime_count=$prime_counts[0]->primes +$prime_counts[0]->sharecount+$prime_counts[0]->extprime_count ;
    }   
    else
    {
        $prime_count=0;
    }
    $netwoths=$NewCommon->UD_GetNetworth($uid);
    if($netwoths) 
    {
        $netwoth=$netwoths[0]->totalnetworth;
    }   
    else
    {
        $netwoth=0;
    }
    $connection = $NewCommon->UD_GetConnectionCount_visitor('follow',$uid);
    $blockUser = $NewCommon->UD_Get_BlockUser($myid,$uid);
    $isFollowing = $NewCommon->Count_Following($myid,$uid);
?>
    <!DOCTYPE HTML>
<html lang="en">
  <head>  
    <meta http-equiv="content-language" content="en">
    <title><?php echo $user->fullname;?></title>
    
    <link rel="apple-touch-icon" sizes="57x57" href="<?=PROOT?>images/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?=PROOT?>images/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?=PROOT?>images/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?=PROOT?>images/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?=PROOT?>images/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?=PROOT?>images/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?=PROOT?>images/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?=PROOT?>images/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?=PROOT?>images/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="<?=PROOT?>images/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?=PROOT?>images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?=PROOT?>images/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?=PROOT?>images/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?=PROOT?>images/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#4083ff">
    <meta name="msapplication-TileImage" content="<?=PROOT?>images/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#4083ff">

    <meta name="title" content="<?php echo $user->fullname;?>">
    <meta property="og:title" content="<?php echo $user->fullname;?>">
    <?php 
    $lastProfile = $NewCommon->UD_Last_profile_pic_prime($uid,'Profile');
    $profile_img_name = '';
    if(!empty($lastProfile)){
        $lastProfileImage = $NewCommon->UD_FindByPID('primeimages',$lastProfile->id);
        $profile_img_name = $lastProfileImage->timeline;        
    }
    $bio_description = trim(str_replace('<br />',"",$profile->bio));
    $descCount= strlen(iconv('utf-8', 'utf-16le', $bio_description)) / 2;
    $bio_char_limit= 159;
    if($descCount > 159){
        $bio_char_limit= 155;
    }?>
    <meta name="description" content="<?php echo custom_echo($bio_description,$bio_char_limit);?>">
    <meta property="og:description" content="<?php echo custom_echo($bio_description,$bio_char_limit);?>">
    <meta name="image" content="<?php echo GetImage($uid,'Profile','timeline',$user->type,$profile_img_name); ?>">
    <meta property="og:image" content="<?php echo GetImage($uid,'Profile','timeline',$user->type,$profile_img_name); ?>">
    <meta name="url" content="https://m.unidawn.com/<?=$user->username?>">
    <meta property="og:url" content="https://m.unidawn.com/<?=$user->username?>">

    <!-- Required meta tags -->    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" /> 
  
    <link rel="stylesheet" type="text/css" href="<?=PROOT?>css/custom.css?<?=VERSION_NO?>"> 
    <link rel="stylesheet" type="text/css" href="<?=PROOT?>css/main.css?<?=VERSION_NO?>">  
    <!-- <link rel="stylesheet" type="text/css" href="<?=PROOT?>css/scss/main.scss">   -->
    <script src="<?=PROOT?>js/jquery.js?<?=VERSION_NO?>" type="text/javascript"></script> 
    <script type="text/javascript">
        var path = "<?=PROOT?>";
        </script> 
    <script src="<?=PROOT?>js/hammer.min.js?<?=VERSION_NO?>"></script>
    <script src="<?=PROOT?>js/jquery.hammer.js?<?=VERSION_NO?>"></script>
    <script src="<?=PROOT?>js/jquery.hashtags.js?<?=VERSION_NO?>" type="text/javascript"></script> 
    <script src="<?=PROOT?>js/autosize.min.js?<?=VERSION_NO?>" type="text/javascript"></script> 
    <?php
if($_SERVER['HTTP_HOST']=='m.unidawn.com'){?>
    <script src="<?=PROOT?>js/main.min.js?<?=VERSION_NO?>" type="text/javascript"></script> 
    <script src="<?=PROOT?>js/ud.min.js?<?=VERSION_NO?>" type="text/javascript"></script> 
<?php
}else{?>
    <script src="<?=PROOT?>js/main.js?<?=VERSION_NO?>" type="text/javascript"></script> 
    <script src="<?=PROOT?>js/ud.js?<?=VERSION_NO?>" type="text/javascript"></script> 
<?php
}
?>
    <script src="<?=PROOT?>js/firebase.js?<?=VERSION_NO?>" type="text/javascript"></script>
    <script src="<?=PROOT?>js/pushTokenCreate.js?<?=VERSION_NO?>" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/1.7.3/socket.io.js"></script> 
      
    <script type="text/javascript">
     
    <?php
      if(isset($_SESSION['master_id'])){
        ?>
        var socket = io.connect('https://unidawn.com:3000'); 
        var userid = "<?=$_SESSION['master_id']?>"; 
        <?php
      }else{
        ?>
        var socket = ""; 
        var userid = "";
        <?php
      }
    ?>
    var path = "<?=PROOT?>";
    </script>  
   <script src="<?=PROOT?>js/socket_connection.js" type="text/javascript"></script>
  </head>
    <body>

<?php
$idddc='';
$abcc = '';
$lastCover = $NewCommon->UD_Last_profile_pic_prime($uid,'Cover');
if($lastCover)
{
    $conncetion=$NewCommon->UD_GetConnectionCount_visitor('follow',$lastCover->uid);
    if($lastCover->prime_status == 'Private')
    {
        if($lastCover->uid == $myid || $conncetion > 0)
        {
            $idddc = 'OpenModelPrime';
            $abcc = 'fdi="'.Encode($lastCover->id).'" popid="'.$lastCover->id.'" popkey="'.md5($lastCover->id).'"';
        }
        else
        {
            $idddc = 'coverImgContainer';
        }
        
    }
    else
    {
        $idddc = 'OpenModelPrime';
        $abcc = 'fdi="'.Encode($lastCover->id).'" popid="'.$lastCover->id.'" popkey="'.md5($lastCover->id).'"';
    }
}

?>

<div class="menuOverlay"></div>
<div class="menuPride">
    <div class="menuLogoSection">
       <div class="menuProfile" id="visitor_url" lastid="<?=EnCode($user->id)?>">
            <div class="profileName">
                <h3><?php echo $user->username;?></h3>
            </div>
       </div>      
    </div>
    <ul class="menuList headerMargin">
        <a href="<?=PROOT?>mynetwork">
            <li>
                <img src="<?=PROOT?>images/Menu/10.svg" alt="">
                <p>My Network</p>
            </li>
        </a>
        
        
        <a href="<?=PROOT?>activitylog">
            <li>
                <img src="<?=PROOT?>images/Menu/7.svg" alt="">
                <p>Activity Log</p>
            </li>
        </a>
        <a href="<?=PROOT?>links">
            <li>
                <img src="<?=PROOT?>images/Menu/8.svg" alt="">
                <p>Social Links</p>
            </li>
        </a>
        <a href="<?=PROOT?>UDVerification">
            <li>
                <img src="<?=PROOT?>images/login/logoSmall.png" alt="">
                <p>UD Verification</p>
            </li>
        </a>
        <a href="<?=PROOT?>invite">
            <li>
                <img src="<?=PROOT?>images/Menu/invite.svg" alt="">
                <p>Invite Friends</p>
            </li>
        </a>
        <a href="<?=PROOT?>contact">
            <li>
                <img src="<?=PROOT?>images/Menu/feedback.svg" alt="">
                <p>Feedback</p>
            </li>
        </a>

       <!--  <li>
            <img src="<?=PROOT?>images/Menu/inbox.svg" alt="">
            <p>Identity Index</p>
        </li> -->
    </ul>
    <hr>
    <ul class="menuList settingMenuList">
        <a href="<?=PROOT?>Register/logout">
            <li>
                <p>Logout</p>
            </li>
        </a>
        <!-- <div class="copyright">
        <p>&copy; Unidawn <br /><a href="#">About</a> &bull; <a href="#">Terms</a> &bull; <a href="#">Privacy</a>
            &bull; <a href="#">Cookies</a></p>
        </div> -->
    </ul>
    <div class="menuBg"></div>
</div>

        <div class="globalPrimeViewContainer">
        <div class="container">
            <!-- style="background-image: url(<?=$cover_image?>);" -->
            <div class="coverImgContainer" id="<?php echo $idddc; ?>" <?php echo $abcc; ?>>
            <img src="<?=$cover_image?>" alt="" class="coverImg" data-img="<?=$cover_image?>">
                <?php if($uid != $myid) { ?>
                <div class="coverImgOptions">
                    <img src="<?=PROOT?>images/prideMenu.svg" alt="" class="prideMenu">
                </div>                
                <?php }else{ ?>
                    <div class="personalMenu">
                        <img src="<?=PROOT?>images/prideMenu.svg" alt="" class="prideMenu">
                    </div> 
                <?php } ?>
                <div class="backBtn">                    
                    <img src="<?PROOT?>images/Menu/left-arrow-white.svg" alt="">                   
                </div>
            </div>
            <div class="globalProfileContainer">
            <?php

            if($blockUser)
            {
                if($blockUser[0]->uid == $myid)
                {
                    include 'views/header.php';
                }
                else
                {
                    Router::redirect('error/404');
                }
            } 
            else
            {
                include 'views/header.php';
            }
            ?>   
                <?php 
                if($uid==$myid)
                {
                    include 'views/mainfile.php';
                }
                else
                {
                    if(!$blockUser)
                    {
                        if($user->profilestatus == 'Secret' &&  $connection > 0 || $user->profilestatus == 'Secret' && $isFollowing > 0)
                        {
                            include 'views/mainfile.php';
                        }
                        if($user->profilestatus == 'Secret' &&  $connection == 0  && $isFollowing == 0)
                        {
                            include 'views/secret_template.php';
                        }
                        if($user->profilestatus == 'Public')
                        {
                            include 'views/mainfile.php';
                        }
                        if($user->profilestatus == 'Private')
                        {
                            include 'views/mainfile.php';
                        }
                    }
                    
                }
                
                ?>
                
            </div>
            
        </div>

 <div class="newMessageRequestConatiner"></div>
        <div class="profileOptionConatiner">
            <div class="prideOptions">
                <ul>
                    
                    
                    <?php
                                      
                    
                    if($blockUser)
                    {
                        if($blockUser[0]->uid == $myid)
                        {
                            //echo '<li>Report</li>';
                            echo '<li id="unblock_user" fdi="'.Encode($uid).'">Unblock</li>';
                        }
                    }
                    else
                    {
                        //echo '<li>Report</li>';
                        echo '<li id="Send_Message_to_friens" fdi="'.Encode($uid).'" name="'.$user->fullname.'">Message</li>';
                        $turnon=$NewCommon->UD_CheckTurnOn($uid,$myid);
                        if($turnon > 0)
                        {
                            echo'<li id="turnOff" fdi="'.Encode($uid).'">Turn Off Notification</li>';
                        }
                        else
                        {
                            echo'<li id="turnOn" fdi="'.Encode($uid).'">Turn On Notification</li>';
                        }
                        
                        ?>
                       <!--  <li>Share Pride</li> -->
                        
                        <?php
                        $hideuser=$NewCommon->UD_CheckHideUser($uid,$myid);
                        if($hideuser)
                        {
                            echo '<li id="Unhide_post" fdi="'.Encode($uid).'">Unhide from Newsfeed</li>';
                        }
                        else
                        {
                            echo '<li id="Hide_post" fdi="'.Encode($uid).'">Hide from Newsfeed</li>';
                        }
                        

                        $muteuser=$NewCommon->UD_CheckMuteUser($uid,$myid);
                        if($muteuser > 0)
                        {
                            echo '<li id="unmute_user" fdi="'.Encode($uid).'">Unmute</li>';
                        }
                        else
                        {
                             echo '<li id="mute_user" fdi="'.Encode($uid).'">Mute</li>';
                        } 
                        echo '<li id="Block_user" fdi="'.Encode($uid).'">Block</li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
        <div class="imageZoomContainer"></div>
        
        <div class="commentInteractionContainer"></div>

        <div class="commentReplyInteractionContainer"></div>

        <?php
            if($uid==$_SESSION['master_id'])
            {
                if($user->first_pride_visit==0)
                {
                    ?>
                    <div class="earnUploadPicCoverPop" style="display: block">
                    <div class="prideOptions">
                        <img src="<?=PROOT?>images/offers/rupee.svg" alt="" class="coin">
                        <h3>Earn Rs 10</h3>
                        <p>Edit Pride, Upload Profile and Cover Photo</p>
                        <p>Upload 3 Primes by clicking + Icon and posting 3 different photos</p>
                        
                    </div>    
                </div>
                    <?php
                }
            }
        ?>

        

        <div class="networkContainer">            
            <div class="pageHeader">
                <img src="<?=PROOT?>images/Timeline/left-arrow.svg" alt="" class="leftArrow">
                <h3 class="headerTitle">Network</h3>
                <div class="headerOptionsNull">
                </div>
            </div>
            <div class="interactionTabs">
                <div class="tab active" id="profile_following">
                    <p>Following</p>
                </div>
                <div class="tab" id="profile_follower">
                    <p>Followers</p>
                </div>
                <div class="tab" id="profile_connections">
                    <p>Connections</p>
                </div>
            </div>
            <div class="tabs" id="following_tabs">
                <div class="tab" id="profile_following">Identities</div>
                <div class="tab" id="profile_following_hashtags">Hashtag</div>
                <div class="tab" id="profile_following_places">Places</div>
            </div>
            <div class="search">
                <input type="text" placeholder="Search" id="Search_following" class="searchText">
                <img src="<?=PROOT?>images/Timeline/search.svg" alt="" class="searchIco">
            </div>

            <ul class="interactionList" id="appendSearch"></ul>
            <div id="searchHide">
                <ul class="interactionList" id="folow_lazyload"></ul>
            </div>
            <div class="typingAnim" id="show-proccess-all" style="display: none;"> 
                Loading...
            </div>
        </div>
    </div>

<?php require_once(ROOT.DS.'app'.DS.'views'.DS.'layouts'.DS.'pop'.'.php'); ?>
<?php require_once(ROOT.DS.'app'.DS.'views'.DS.'layouts'.DS.'footer'.'.php'); ?>
<?php
if($_SERVER['HTTP_HOST']=='m.unidawn.com' || $_SERVER['HTTP_HOST']=='app.unidawn.com'){?>
    <script src="<?=PROOT?>js/MobilePrimeView.min.js?<?=VERSION_NO?>" type="text/javascript"></script>
    <script type="text/javascript" src="<?=PROOT?>js/important.min.js?<?=VERSION_NO?>"></script>
    <script id="slid_photocp" type="text/javascript" src="<?=PROOT?>js/slidephoto.min.js?<?=VERSION_NO?>"></script>
<?php
}else{?>
    <script src="<?=PROOT?>js/MobilePrimeView.js?<?=VERSION_NO?>" type="text/javascript"></script>
    <script type="text/javascript" src="<?=PROOT?>js/important.js?<?=VERSION_NO?>"></script>
    <script id="slid_photocp" type="text/javascript" src="<?=PROOT?>js/slidephoto.js?<?=VERSION_NO?>"></script>
<?php
} 

include ('views/shieldPopup.php');
?>



<div class="deviceOrientationContainer">
    <div class="content">
        <img src="/images/rotate.png" alt="">
        <h3>For Optimal Experiance, Please Rotate Your Device To Potrait Mode</h3>
    </div>    
</div>

</body>

<script type="text/javascript"> 
    $(document).on('click','.authorBio a',function()
    {
        $(this).parent().hide();
        $("#More_visible").show();
    })
</script>
</html>
<?php 
}
?>