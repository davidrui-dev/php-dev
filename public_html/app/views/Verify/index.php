
<?php $this->start('head');?>
<?php $this->setSiteTitle('Home Page');?>

<?php $this->end();?>

<?php $this->start('body');?>

<!-- <section class="coming_soon_content" style="background:linear-gradient(0deg, rgba(23, 32, 42, 0.7), rgba(23, 32, 42, 0.7)), url(assets/images/coming_soon_bg.jpg);
  background-size:cover;"> -->
  <section class="page-banner">
    <div class="container">
        <div class="page-title-wrapper">
            <h1 class="page-title">Please verify your email</h1>
            <ul class="bradcurmed">
                <!-- <li><a href="<?=PROOT?>" rel="noopener noreferrer"></a></li> -->
                <li>To verify, please check your inbox and follow the links.</li>
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
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          
          <?php 
          $key = $_SESSION['hash_id'];
          $link = 'https://broombids.com/Verify?key='.$key;
          $newUser=new Users();
          $user = $newUser->FindByHash('users',$key);
          if($user)
          {
             if($user->status == 2)
             {
                ?>

                <?php
                // $fields=[
                //   "status"=>1,
                //   "updatetime"=>date('Y-m-d H:i:s')
                // ];
                // $newUser->Update_Query('users',$user->id,$fields);
               
                if(isset($_GET['key']))
                {
                  
                  $isVerify = $_GET['key'];
                  $user = $newUser->FindByHash('users',$isVerify);
                  if($user){
                    ?>
                    <center><h2 style="margin-top:20px;">Hi <?php echo $user->email; ?></h2>
                    <h3>Your account has been successfully verified.</h3>
                    <h4 style="margin-top:20px;">Click bellow to get into your account and create your personal contest.</h4>
                    </center>
                    <?php
                    
                    $fields=[
                      "status"=>1,
                      "updatetime"=>date('Y-m-d H:i:s')
                    ];
                    $newUser->Update_Query('users',$user->id,$fields);
                    if($user->utype == 'Vender')
                    {
                      $message = Welecome_Mail_Vendor($user->username);
				              MailSend_file(trim($user->email),'Welcome to Broombids',$message);
                    }
                    else
                    {
                      $message = Welecome_Mail_Customer($user->username);         
                      MailSend(trim($user->email),'Welcome to Broombids',$message);
                    }
                    $_SESSION['master_id']=$user->id;
                  }
                  else {
                    ?>           
                    <center><h3 style="margin-top:20px;">Verification Key is wrong.</h3></center>
                    <?php
                  }
                }
                else
                {
                  ?>
                <center style="margin: 100px;">
                  <h2>We sent an email to:<h6><?php echo $user->email; ?></h6></h2>
                </center>
                  <?php
                  $message = Mail_Verification_Template($user->fname.' '.$user->surname,$link,'Welcome to Broombids');       
                  MailSend(trim($user->email),'Welcome to Broombids',$message);
                }
                
             }
             else
             {
                ?>                                                    
                  <center><h2 style="margin-top:20px;">Hi <?php echo $user->email; ?></h2>
                  <h3>Your account has been already verified.</h3>
                  <h4 style="margin-top:20px;">Click bellow to get into your account and create your personal contest.</h4></center>
                <?php
             }
          }
          else
          {
            ?>           
            <center><h3>Your account Not Foud Please Try again.</h3></center>
            <?php
          }
          ?>
        <div class="row">
          <center style="margin: auto; margin-bottom: 50px; margin-top: 50px;"><a href="<?=PROOT?>home" class="pix-btn color-two wow pixFadeUp" data-wow-delay="0.3s" style="visibility: visible; width: 100%;">Main Page</a></center>
        </div>
        </div>
        <!-- <div class="col-md-7"> <img src="<?=PROOT?>assets/images/car_755x430.png" alt="image"> </div> -->
      </div>
    </div>
  <!-- </section> -->
  

<?php $this->end();?>

<script type="text/javascript">
  // setTimeout(function(){ 
  //   window.location.href = path+"home";
  //  }, 4000);
</script>