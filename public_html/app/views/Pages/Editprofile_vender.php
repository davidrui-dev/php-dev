<?php
$newUser=new Users();
$user = $newUser->FindCurrentUser('users',$_SESSION['master_id']);
$bussness = $newUser->FindByUIDSingle('bussnessdetails',$_SESSION['master_id']);
$getlocation = $newUser->FindByUIDAll('locations',$_SESSION['master_id']);
$ediloc = array();
if($getlocation)
{
    foreach ($getlocation as $getlocation_c) {
        $ediloc[]=$getlocation_c->location;
    }
    
}
$bussness_id='';
$btype='';
$bname='';
$vatid='';
$fname='';
$surname='';
$country = '';
$email='';
$phone='';
if($user)
{
    $fname=$user->fname;
    $surname=$user->surname;
    $country = $user->country;
    $email=$user->email;
    $phone=$user->phone;
}
$blogo = PROOT.'images/support.png';
if($bussness)
{
    $bussness_id=$bussness->id;
    $btype=$bussness->btype;
    $bname=$bussness->bname;
    $vatid=$bussness->vatid;
    $blogo = PROOT.$bussness->logo;
}
?>
<style type="text/css">
    .single-input select
    {
        width: 100%;
        padding: 14px 13px 14px 10px;
        border: 1px solid #d1d3da;
        border-radius: 3px;
        color: #444;
        margin-bottom: 10px;
    }
    #checkboxes_vtype label
    {
        border: none;
    }
    #checkboxes_vname label
    {
        border: none;
    }
    #checkboxes_cname label
    {
        border: none;
    }
    .download-cv
    {
        color: #fff;
        border-color: #4c53b6;
        background-color: #4c53b6;
        display: inline-block;
        font-size: 14px;
        font-weight: 400;
        line-height: 1.2em;
        height: auto;
        padding: 7px 10px;
        margin-right: 5px;
        border-radius: 3px;
    }
    .avatar
    {
        cursor: pointer;
        border: 1px solid #2c80d3;
        border-radius: 10%;
    }
</style>
<div class="dashboard-main-inner">
<div class="row">
    <div class="col-12">
        <div class="page-breadcrumb-content mb-40">
            <h1>My Account</h1>
        </div>
    </div>
</div>
<div class="dashboard-overview">
  <div class="row">
    <!-- <input type="file" name="ed_blogo" id="ed_blogo" style="display: none;"> -->
    <input type="text" name="blogo" id="blogo" style="display: none;">
    <div class="col-xl-12 col-12">
        <div class="profile-applications-main-block pt-0">
            <div class="profile-applications-form">
                <form action="<?=PROOT?>Master/Edit_Vendor" method="post" id="vendor_ed_form" enctype="multipart/form-data">
                    <div class="row mb-30" style="padding-top: 50px;">                        
                        <div class="col-lg-3">
                            <div class="profile-avatar mb-30">
                                <img src="<?=$blogo?>" alt="<?php echo $bname; ?>">
                                <!-- <input type="file" name="ed_blogo" id="ed_blogo" style="display:none;"> -->
                            </div>
                            <!-- <div class="download-cv" id="download-cv">
                                <i class="lnr lnr-download"></i> Select Logo
                            </div> -->
                        </div>
                        
                        <div class="col-lg-9">
                            
                            <div class="row">
                                <input type="hidden" name="bussness_id" id="bussness_id" value="<?php echo $bussness_id; ?>">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                        <!-- Single Input Start -->
                                    <div class="single-input mb-25">
                                        <label for="ed_fname">Username </label>
                                        <input type="text" id="username" name="username" value="<?php echo $user->username; ?>" readonly style="background: #eee;">
                                    </div>
                                    <!-- Single Input End -->
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                    <!-- Single Input Start -->
                                    <div class="single-input mb-25">
                                        <label for="ed_fname">First Name <span>*</span></label>
                                        <input type="text" id="ed_fname" name="ed_fname" placeholder="Enter First Name" value="<?php echo $fname; ?>">
                                    </div>
                                    <!-- Single Input End -->
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                    <!-- Single Input Start -->
                                    <div class="single-input mb-25">
                                        <label for="ed_surname">Surname <span>*</span></label>
                                        <input type="text" id="ed_surname" name="ed_surname" placeholder="Enter Surname" value="<?php echo $surname; ?>">
                                    </div>
                                    <!-- Single Input End -->
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                    <!-- Single Input Start -->
                                    <div class="single-input mb-25">
                                        <label for="ed_email">Email Address <span>*</span></label>
                                        <input type="text" id="ed_email" name="ed_email" placeholder="Enter Email Address" value="<?php echo $email; ?>">
                                    </div>
                                    <!-- Single Input End -->
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                    <!-- Single Input Start -->
                                    <div class="single-input mb-25">
                                        <label for="ed_phone">Contact Number <span>*</span></label>
                                        <input type="text" id="ed_phone" name="ed_phone" placeholder="Enter Email Address" value="<?php echo $phone; ?>">
                                    </div>
                                    <!-- Single Input End -->
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                    <!-- Single Input Start -->
                                    <div class="single-input mb-25">
                                        <label for="ed_country">Country <span>*</span></label>
                                        <input type="text" id="ed_country" name="ed_country" placeholder="Enter Country" value="<?php echo $country; ?>">
                                    </div>
                                    <!-- Single Input End -->
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="custom-width-group">
                                <h3>Select Avatar</h3>
                            </div>
                        <?php
                            $newUser=new Users();
                            $avatars = $newUser->FindByAvatar('vendor_avatars');
                            if($avatars)
                            {
                                foreach ($avatars as $avatar) 
                                {                                                           
                                    echo '<img  class="avatar" name="'.$avatar->avatars.'" src="'.PROOT.'uploads/'.$avatar->avatars.'" style="width: 100px; margin: 5px;">';
                                }
                                // for ($i = 1; $i <= 10; $i++) {
                                //     echo '<img  class="avatar" id="avatar_id'.$i.'" name="AV '.$i.'" src="'.PROOT.'uploads/AV '.$i.'.png" style="width: 100px; margin: 5px;">';
                                //     // echo '<input type="image" src="'.PROOT.'uploads/AV '.$i.'.png" alt="Button Image" class="avatar" id="avatar_id'.$i.'"  style="width: 100px; margin: 5px;">';
                                // }
                            }
                        ?>   
                            <div style="width: 100%;">
                                <center><button type="button" class="ht-btn theme-btn theme-btn-two" id="ed_blogo" style="height: 50px;"> Set this Avatar</button></center>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="custom-width-group">
                                <h3>Bussness Details</h3>
                            </div>
                            <div class="row">

                                <div class="col-xl-4">
                                    <!-- Single Input Start -->
                                    <div class="single-input mb-25">
                                        <label for="ed_btype">Select Bussness Type</label>
                                        <select name="ed_btype" id="ed_btype">
                                            <option value="<?php echo $btype; ?>" selected><?php echo $btype; ?></option>
                                            <option value="Car Rental Business">Car Rental Business</option>
                                            <option value="Travel Agent">Travel Agent</option>
                                        </select>
                                    </div>
                                    <!-- Single Input End -->
                                </div>

                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                                    <!-- Single Input Start -->
                                    <div class="single-input mb-25">
                                        <label for="ed_bname">Bussness Name <span>*</span></label>
                                        <input type="text" id="ed_bname" name="ed_bname" placeholder="Enter Country" value="<?php echo $bname; ?>">
                                    </div>
                                    <!-- Single Input End -->
                                </div>

                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                                    <div class="single-input mb-25">
                                        <label for="ed_vat">VAT Number <span>*</span></label>
                                        <input type="text" id="ed_vat" name="ed_vat" placeholder="Enter Country" value="<?php echo $vatid; ?>">
                                    </div>
                                </div>

                                <div class="multiselect col-xl-4 col-lg-6 col-md-6 col-sm-6">
                                    <div class="selectBox single-input" onclick="showCheckboxes()">
                                        <label for="ed_vat">Location <span>*</span></label>
                                      <select>
                                        <option>Select an option</option>
                                      </select>
                                      <div class="overSelect"></div>
                                    </div>
                                    <div id="checkboxes">
                                    <?php
                                        
                                        $locationsadmins = $newUser->FindByAll('locationsadmin');
                                        if($locationsadmins)
                                        {
                                            foreach ($locationsadmins as $locationsadmin) 
                                            {   
                                                $location_checked = '';
                                                if (in_array($locationsadmin->lname, $ediloc))
                                                {
                                                    $location_checked = 'checked';
                                                }                                                        
                                                ?>
                                                <label for="<?php echo $locationsadmin->lname; ?>">
                                                    <input type="checkbox" name="ed_locations[]" value="<?php echo $locationsadmin->lname; ?>" id="<?php echo $locationsadmin->lname; ?>" <?php echo $location_checked; ?> /><?php echo $locationsadmin->lname; ?>
                                                </label>
                                                <?php
                                            }
                                        }
                                    ?>                                              
                                    </div>
                                </div>
                                <?php
                                if($getlocation)
                                {
                                    foreach ($getlocation as $value_loc) 
                                    {
                                        ?>
                                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                                            <div class="single-input mb-25">
                                                <label for="ed_<?php echo $value_loc->location; ?>">Address Of <?php echo $value_loc->location; ?> <span>*</span></label>
                                                <input type="text" id="ed_<?php echo $value_loc->location; ?>" name="ed_<?php echo $value_loc->location; ?>" placeholder="Address Of <?php echo $value_loc->location; ?>" value="<?php echo $value_loc->address; ?>">
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                            <div id="address_div" class="row" style="width: 100%;"></div>
                        </div>
                        
                        <div class="col-12">
                            <div class="custom-width-group">
                                <h3>Vehicle Details</h3>
                            </div>                            
                                <div class="row">

                                   <div class="col-xl-4">
                                        <div class="single-input" id="selectvehicle">
                                            <select id="ed_vtype">        
                                                <option value="">Select Vehicle Type</option>
                                            </select>
                                        </div>
                                        <div id="checkboxes_vtype">
                                                <?php
                                                   
                                                    $vehicle_types = $newUser->FindByAll('vehicle_type');
                                                    if($vehicle_types)
                                                    {
                                                        $vt = explode(',',$bussness->vehicletype); 
                                                        foreach ($vehicle_types as $vehicle_type) 
                                                        {                                                          
                                                            $vehicle_type_checked ='';
                                                            if (in_array($vehicle_type->id,$vt))
                                                            {
                                                                $vehicle_type_checked ='checked';
                                                            } 
                                                            ?>
                                                            <div style="width: 100%;">
                                                            <label for="<?php echo $vehicle_type->vt_name; ?>">
                                                                <input type="checkbox" name="vtype[]" value="<?php echo $vehicle_type->id; ?>" id="<?php echo $vehicle_type->vt_name; ?>" <?php echo $vehicle_type_checked; ?> /><?php echo $vehicle_type->vt_name; ?>
                                                            </label>
                                                            </div>
                                                            <?php
                                                        }
                                                    }
                                                ?>                                              
                                                </div>
                                    </div>

                                    <div class="multiselect col-md-4 col-12 mb-20">
                                        <div class="selectBox" id="selectcompany">
                                          <select class="nice-select">
                                            <option>Select Vehicle Company</option>
                                          </select>
                                          <div class="overSelect"></div>
                                        </div>
                                        <div id="checkboxes_cname">
                                             <?php
                                             $compnaynames = $newUser->QueryIDIN('vehicle_company',$bussness->vehiclecompany);
                                             if($compnaynames)
                                             {
                                                foreach ($compnaynames as $compnayname) 
                                                {
                                                    ?>
                                                    <div style="width: 100%;">
                                                    <label for="<?php echo $compnayname->v_company; ?>">
                                                        <input type="checkbox" name="cnames[]" value="<?php echo $compnayname->id; ?>" id="<?php echo $compnayname->v_company; ?>" checked /><?php echo $compnayname->v_company; ?>
                                                    </label>
                                                    </div>
                                                    <?php
                                                }
                                             }
                                             ?>
                                        </div>
                                    </div>

                                    <div class="multiselect col-md-4 col-12 mb-20">
                                        <div class="selectBox" id="selectname">
                                          <select class="nice-select">
                                            <option>Select Vehicle Name</option>
                                          </select>
                                          <div class="overSelect"></div>
                                        </div>
                                        <div id="checkboxes_vname">
                                            <?php
                                             $vehiclenames = $newUser->QueryIDIN('vehicle_name',$bussness->vehiclename);
                                             if($vehiclenames)
                                             {
                                                foreach ($vehiclenames as $vehiclename) 
                                                {
                                                    ?>
                                                    <div style="width: 100%;">
                                                    <label for="<?php echo $vehiclename->vname; ?>">
                                                        <input type="checkbox" name="cars[]" value="<?php echo $vehiclename->id; ?>" id="<?php echo $vehiclename->vname; ?>" checked /><?php echo $vehiclename->vname; ?>
                                                    </label>
                                                    </div>
                                                    <?php
                                                }
                                             }
                                             ?>                                  
                                        </div>
                                    </div>

                                </div>                            
                        </div>                        
                        
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="profile-action-btn">
                                <button type="button" id="submit_vendor_form" class="ht-btn theme-btn theme-btn-two"> Save Changes</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
  </div>
</div>

<script type="text/javascript">
    $(document).on('click','#download-cv',function(){
        $("#ed_blogo").click();
    });

    $('#ed_blogo').on('click', function() {
        // $('.profile-avatar img').attr('src',path+'images/Loadingsome.gif');
        // var file_data = $('#ed_blogo').prop('files')[0];
        var bid = $('#bussness_id').val();
        var blogo =  $('#blogo').val();  // Create a FormData object
        var form_data = new FormData();  //
        form_data.append('blogo', blogo);
        form_data.append('bid', bid);  // Append all element in FormData  object
        if(blogo != "")
            $.ajax({
                    url         : path+'Master/ChengeBussnessLogo',     // point to server-side PHP script 
                    dataType    : 'text',           // what to expect back from the PHP script, if anything
                    cache       : false,
                    contentType : false,
                    processData : false,
                    data        : form_data,                         
                    type        : 'post',
                    success     : function(output){
                        $('.profile-avatar img').attr('src',path+output);              // display response from the PHP script, if any
                    }
            });
         //$('#pic').val('');                     /* Clear the input type file */
    });

    $(document).ready(function() {
        $(".avatar").click(function() {
            var imageId = $(this).attr("id");
            var imageName = $(this).attr("name");
            $("#blogo").val(imageName);
            $(".avatar").css({
            "width": "100px",
            "border": "1px solid #2c80d3"
            });
            $(this).css({
            "width": "150px",
            "border": "3px solid #2f284f"
            });
        });
    });

</script>