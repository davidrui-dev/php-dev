<?php
$newUser=new Users();
$user = $newUser->FindCurrentUser('users',$_SESSION['master_id']);
?>
<div class="dashboard-main-inner">
<div class="row">
    <div class="col-12">
        <div class="page-breadcrumb-content mb-40">
            <h1>My Profile</h1>
        </div>
    </div>
</div>
<div class="dashboard-overview">
  <div class="row">
    <div class="col-xl-12 col-12">
        <div class="profile-applications mb-50">
            <!-- <div class="profile-applications-heading">
                <ul class="nav">
                    <li><a class="active" href="profile.html">My profile</a></li>
                </ul>
            </div> -->
            <div class="profile-applications-main-block">
                <div class="profile-applications-form">
                    <form action="#">
                        <div class="row mb-30">
                           <!--  <div class="col-lg-2">
                                <div class="profile-avatar mb-30">
                                    <label class="d-block"><span>Avatar</span></label>
                                    <img src="assets/images/author/author1.jpg" alt="">
                                </div>
                            </div> -->
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                                        <!-- Single Input Start -->
                                        <div class="single-input mb-25">
                                            <label for="ed_fname">Username </label>
                                            <input type="text" id="username" name="username" value="<?php echo $user->username; ?>" readonly style="background: #eee;">
                                        </div>
                                        <!-- Single Input End -->
                                    </div>

                                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                                        <!-- Single Input Start -->
                                        <div class="single-input mb-25">
                                            <label for="ed_fname">Full Name <span>*</span></label>
                                            <input type="text" id="ed_fname" name="ed_fname" value="<?php echo $user->fname; ?>">
                                        </div>
                                        <!-- Single Input End -->
                                    </div>

                                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                                        <!-- Single Input Start -->
                                        <div class="single-input mb-25">
                                            <label for="ed_fname">Surname <span>*</span></label>
                                            <input type="text" id="ed_sname" name="ed_sname" value="<?php echo $user->surname; ?>">
                                        </div>
                                        <!-- Single Input End -->
                                    </div>

                                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                                        <!-- Single Input Start -->
                                        <div class="single-input mb-25">
                                            <label for="ed_fname">Country <span>*</span></label>
                                            <input type="text" id="ed_country" name="ed_country" value="<?php echo $user->country; ?>">
                                        </div>
                                        <!-- Single Input End -->
                                    </div>

                                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                                        <!-- Single Input Start -->
                                        <div class="single-input mb-25">
                                            <label for="ed_email">Email Address <span>*</span></label>
                                            <input type="email" id="ed_email" name="ed_email" value="<?php echo $user->email; ?>">
                                        </div>
                                        <!-- Single Input End -->
                                    </div>

                                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                                        <!-- Single Input Start -->
                                        <div class="single-input mb-25">
                                            <label for="ed_phone">Phone Number <span>*</span></label>
                                            <input type="text" id="ed_phone" name="ed_phone" value="<?php echo $user->phone; ?>">
                                        </div>
                                        <!-- Single Input End -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div id="ed_error" class="col-md-12"></div>
                                    <div class="col-12">
                                        <div class="profile-action-btn d-flex flex-wrap align-content-center justify-content-between">
                                            <button type="button" id="editprofile" class="ht-btn theme-btn theme-btn-two mb-xs-20">Update Profile</button>
                                        </div>
                                    </div>
                                </div>

                                  
                                <div class="row" style="margin-top: 30px;">
                                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                                        <!-- Single Input Start -->
                                        <div class="single-input mb-25">
                                            <label for="old_password">Current Password</label>
                                            <input type="password" id="old_password" name="old_password" >
                                        </div>
                                        <!-- Single Input End -->
                                    </div>

                                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                                        <!-- Single Input Start -->
                                        <div class="single-input mb-25">
                                            <label for="new_password">New Password</label>
                                            <input type="password" id="new_password" name="new_password">
                                        </div>
                                        <!-- Single Input End -->
                                    </div>

                                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                                        <!-- Single Input Start -->
                                        <div class="single-input mb-25">
                                            <label for="cnf_password">Confirm Password</label>
                                            <input type="password" id="cnf_password" name="cnf_password">
                                        </div>
                                        <!-- Single Input End -->
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div id="pa_error" class="col-md-12"></div>
                            <div class="col-12">
                                <div class="profile-action-btn d-flex flex-wrap align-content-center justify-content-between">
                                    <button type="button" id="changepassword" class="ht-btn theme-btn theme-btn-two mb-xs-20">Change Password</button>
                                    <button href="#myModal" data-toggle="modal" type="button" style="float: right; background: #EC7063;" class="ht-btn theme-btn theme-btn-two mb-xs-20">Delete Account</button>
                                </div>
                            </div>                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>


        <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">     
      <div class="modal-body">
        <center><img src="<?=PROOT?>images/car.png" style="width: 30%;"></center>           
        <center><h4 class="modal-title w-100">Are you sure?</h4> 
        <p>You want to delete your account.</p>
        <div style="margin: 20px 0px;" id="bid_offer_error"></div>
        </center> 
        <center><button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-info" id="deleteaccount">Confirm</button></center>
      </div>      
    </div>

  </div>
</div>