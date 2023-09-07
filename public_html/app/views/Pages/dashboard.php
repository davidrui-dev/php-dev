    <?php
    $newUser=new Users();
    $user = $newUser->FindCurrentUser('users',$_SESSION['master_id']);
    ?>
    <div class="user_profile_info gray-bg padding_4x4_40" style="width: 815px; margin-top: 20px;">
      <div class="upload_user_logo"> <img src="assets/images/dealer-logo.jpg" alt="image">
        <div class="upload_newlogo">
          <input name="upload" type="file">
        </div>
      </div>
      <div class="dealer_info">
        <h5><?php echo $user->fname; ?></h5>
        <p><?php echo $user->email; ?> <br>
          <?php echo $user->phone; ?></p>
      </div>
    </div>
    <div class="main_features" style="margin: 20px auto;">
      <ul>
    <?php
    if($user->utype == 'Vender')
    {
      $offers = $newUser->AllOffersCount($_SESSION['master_id']);
      $winoffers = $newUser->WinOffersCount($_SESSION['master_id']);
      ?>
      
        
          <li> <i class="fa fa-edit" aria-hidden="true"></i>
            <h5><?php echo $offers; ?></h5>
            <p>Total Offers</p>
          </li>
          <li> <i class="fa fa-car" aria-hidden="true"></i>
            <h5><?php echo $winoffers; ?></h5>
            <p>Win Offers</p>
          </li> 
          <li> <i class="fa fa-calendar" aria-hidden="true"></i>
            <h5><?php echo date("d-m-Y", strtotime($user->time)); ?></h5>
            <p>Reg.Date</p>
          </li>      
          
        
      
      <?php
    }
    ?>
    </ul>
    </div>