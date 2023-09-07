
<?php $this->start('head');?>
<?php $this->setSiteTitle('Vender Registration');?>

<?php $this->end();?>
<style type="text/css">
    .animate-ball .ball
    {
        background: #2cc1d64f !important;
    }
  
</style>
<?php $this->start('body');
$newUser=new Users();
?>
<style type="text/css">
    .col-md-2
    {
        float: left;

    }
    .footer-social-link li i
    {
        margin-top: 13px !important;
    }
    .avatar
    {
        cursor: pointer;
        border: 1px solid #2c80d3;
        border-radius: 10%;
    }
    .image-container {
        width: 500px;
        height: 500px;
        overflow: hidden;
    }

    .image-container img {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
    }
</style>
<section class="page-banner">
    <div class="container">
        <div class="page-title-wrapper">
            <h1 class="page-title">Vendor Signup Now!</h1>
            <ul class="bradcurmed">
                <li><a href="<?=PROOT?>" rel="noopener noreferrer">Home</a></li>
                <li>Vendor Registration</li>
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
<div class="container" style="margin-top: 60px; margin-bottom: 60px;">
    <?php
    if(isset($_GET['success']))
    {
        // echo '<div class="alert alert-success" role="alert">Registration Success.</div>';
        echo '<center><h3>Registration Success</h3>';
        echo '<hr style="margin: 50px;">';
        echo '<p>Thanks for your trust</p>';
        echo '<p>An information e-mail with the contract and very useful informations has already been send to you.</p>';
        echo '<p>Please check it and return to us as soon as possible.</p>';
        echo '<p>Our support team will confirm your registeration within a few hours.</p></center>';
        echo '<div class="row">';
        echo '<center style="margin: auto; margin-top: 50px;"><a href="'.PROOT.'" class="pix-btn color-two wow pixFadeUp" data-wow-delay="0.3s" style="visibility: visible; width: 100%;">Go to Home</a></center>';
        echo '</div>';
    }
    else if(isset($_GET['Fail']))
    {
        echo '<div class="alert alert-warning" role="alert">Registration Fail Please Try Again.</div>';

    }
    else{
    ?>
    
    <div id="err"></div>
    <form action="<?=PROOT?>Master/ClientRegister" method="post" class="checkout-form" id="form_addlead" enctype="multipart/form-data">
    <div class="row" id="step1" >
        <select id="businesstype" name="businesstype">
            <option value="">Select Bussness Type</option>
            <option value="Car Rental Business">Car Rental Business</option>
            <option value="Travel Agent">Travel Agent</option>
        </select>
        <div style="width: 100%;"> 
            <a href="javaScript:void(0);" class="pix-btn color-two wow pixFadeUp" data-wow-delay="0.6s" style="visibility: visible; animation-delay: 0.6s; animation-name: i; float: right;" id="goto_step2">Next</a>
        </div>
        
    </div>
    <div class="row" id="step2" style="display: none;"> 
        <div class="col-md-6">
            <input type="text" placeholder="Enter First Name" id="fname" name="fname">
        </div>
        <div class="col-md-6">
            <input type="text" placeholder="Enter Surname" id="Surname" name="Surname">
        </div>
        <div class="col-md-6">
        <input type="text" placeholder="Phone Number" id="phone" name="phone">
        </div>
        <div class="col-md-6">
            <input type="text" placeholder="Email Address" id="email" name="email">
        </div>
        <div class="col-md-6">
            <input type="password" placeholder="Enter Password" id="password" name="password">
        </div>
        <div class="col-md-6">
            <input type="password" placeholder="Confirm Password" id="repassword" name="repassword">
        </div>
        <div class="col-md-12"> 
            <a href="javaScript:void(0);" class="pix-btn color-two wow pixFadeUp" data-wow-delay="0.6s" style="visibility: visible; animation-delay: 0.6s; animation-name: i; float: left;" id="back1">Back</a>

            <a href="javaScript:void(0);" class="pix-btn color-two wow pixFadeUp" data-wow-delay="0.6s" style="visibility: visible; animation-delay: 0.6s; animation-name: i; float: right;" id="goto_step3">Next</a>
        </div>
    </div>

    <div class="row" id="step3" style="display: none;">
        <div class="col-md-12" style="margin-bottom: 25px;">
            <center><h3>Choose your avatar</h3></center>
        </div>
        <div class="col-md-12" style="margin-bottom: 25px;">
            <!-- <input type="file" id="blogo" name="blogo"> -->
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
        </div>
        <div class="col-md-12">
            <input type="text" id="blogo" name="blogo" hidden>
            <p id="blogoName" name="blogoName" style="float: right;"></p>
        </div>
        <div class="col-md-6" id="bnamebox">
            <input type="text" placeholder="Business name" id="bname" name="bname">
        </div>
        <div class="col-md-6">
            <input type="text" placeholder="VAT ID" id="vatid" name="vatid">
        </div>
        <div class="col-md-12">
            <div class="row">
            <p style="margin-left: 20px;">Select Location:</p>
            <?php
                $newUser=new Users();
                $locationsadmins = $newUser->FindByAll('locationsadmin');
                if($locationsadmins)
                {
                    foreach ($locationsadmins as $locationsadmin) 
                    {                                                           
                        ?>
                      
                        <div class="col-md-2"> 
                        <div class="condition"><input name="locations[]" class="styled-checkbox" id="<?php echo $locationsadmin->lname; ?>" type="checkbox" value="<?php echo $locationsadmin->lname; ?>"> <label for="<?php echo $locationsadmin->lname; ?>"></label> <span><?php echo $locationsadmin->lname; ?></span></div>
                    </div>
                        <?php
                    }
                }
            ?>   
            </div>                                           
           </div>

           <div id="address_div" style="width: 100%;"></div>

           <div class="col-md-12"> 
            <a href="javaScript:void(0);" class="pix-btn color-two wow pixFadeUp" data-wow-delay="0.6s" style="visibility: visible; animation-delay: 0.6s; animation-name: i; float: left;" id="back2">Back</a>

            <a href="javaScript:void(0);" class="pix-btn color-two wow pixFadeUp" data-wow-delay="0.6s" style="visibility: visible; animation-delay: 0.6s; animation-name: i; float: right;" id="goto_step4">Next</a>
        </div>
        
    </div>

    <div class="row" id="step4" style="display: none;">
        <div class="col-md-12">
            <div class="condition" style="float: right;">
                <input name="vtype[]" class="styled-checkbox" id="select-all" type="checkbox" value="all">
                <label for="select-all"></label>
                <span>Select All</span>
            </div>
        </div>
        <input type="text" onclick="showCheckboxes_vtype();" id="selectvehicle" readonly="readonly" placeholder="Select Vehicle Type ">
        <div id="checkboxes_vtype" class="col-md-12" style="display: none; margin: 20px 10px;">
        <?php
            $newUser=new Users();
            $vehicle_types = $newUser->FindByAll('vehicle_type');
            if($vehicle_types)
            {
                foreach ($vehicle_types as $vehicle_type) 
                {                                                           
                    ?>
                    <div class="col-md-2"> 
                        <div class="condition"><input name="vtype[]" class="styled-checkbox" id="<?php echo $vehicle_type->vt_name; ?>" type="checkbox" value="<?php echo $vehicle_type->id; ?>"> <label for="<?php echo $vehicle_type->vt_name; ?>"></label> <span><?php echo $vehicle_type->vt_name; ?></span></div>
                    </div>                   
                    <?php
                }
            }
        ?>                                              
        </div>


        <div class="col-md-12">
            <div class="condition" id="select-panel1" style="display: none;"  style="float: right;">
                <input name="cname[]" class="styled-checkbox" id="select-all1" type="checkbox" value="all">
                <label for="select-all1"></label>
                <span>Select All</span>
            </div>
        </div>

        <input type="text" onclick="showCheckboxes_vcompany();" id="selectcompany" readonly="readonly" placeholder="Select Vehicle Company">
        <div id="checkboxes_cname" class="col-md-12" style="display: none; margin: 20px 10px;"></div>

        <div class="col-md-12">
            <div class="condition" id="select-panel2" style="display: none;"  style="float: right;">
                <input name="vname[]" class="styled-checkbox" id="select-all2" type="checkbox" value="all">
                <label for="select-all2"></label>
                <span>Select All</span>
            </div>
        </div>

        <input type="text" onclick="showCheckboxes_VehicleName();" id="selectname" readonly="readonly" placeholder="Select Vehicle Name">
        <div id="checkboxes_vname" class="col-md-12" style="display: none; margin: 20px 10px;"></div>

        <div class="col-md-12"> 
            <a href="javaScript:void(0);" class="pix-btn color-two wow pixFadeUp" data-wow-delay="0.6s" style="visibility: visible; animation-delay: 0.6s; animation-name: i; float: left;" id="back3">Back</a>

            <a href="javaScript:void(0);" class="pix-btn color-two wow pixFadeUp" data-wow-delay="0.6s" style="visibility: visible; animation-delay: 0.6s; animation-name: i; float: right;" id="finalregister" onclick="finalregister();">Submit</a>
        </div>
    </div>
   </form>
   <?php 
    }
   ?>
</div>


<?php $this->end();?>

<script type="text/javascript">
var expanded = false;
function showCheckboxes() {
  var checkboxes = document.getElementById("checkboxes");
  if (!expanded) {
    checkboxes.style.display = "block";
    expanded = true;
  } else {
    checkboxes.style.display = "none";
    expanded = false;
  }
}

var selectvehicle = false;
function showCheckboxes_vtype() {    
     var checkboxes = document.getElementById("checkboxes_vtype");
      if (!selectvehicle) {
        checkboxes.style.display = "block";
        selectvehicle = true;
      } else {
        checkboxes.style.display = "none";
        selectvehicle = false;
      }
}

var selectcompany = false;
function showCheckboxes_vcompany(){
     var checkboxes = document.getElementById("checkboxes_cname");
      if (!selectcompany) {
        checkboxes.style.display = "block";
        selectcompany = true;
      } else {
        checkboxes.style.display = "none";
        selectcompany = false;
      }
}

var selectname = false;
function showCheckboxes_VehicleName(){
     var checkboxes = document.getElementById("checkboxes_vname");
      if (!selectname) {
        checkboxes.style.display = "block";
        selectname = true;
      } else {
        checkboxes.style.display = "none";
        selectname = false;
      }
}
 
function finalregister()
{
    $("#form_addlead").submit();
    // window.location.href =path + "register/success";
} 
document.addEventListener("DOMContentLoaded", function(){
    var avatarImages = document.getElementsByClassName("avatar");
    for (var i = 0; i < avatarImages.length; i++) {
      avatarImages[i].addEventListener("click", function() {
        var imageId = this.id;
        var imageName = this.getAttribute("name");
        var blogo = document.getElementById("blogo");
        var blogoName = document.getElementById("blogoName");
        blogo.value = imageName;
        blogoName.innerText = imageName + " selected!";
        var avatars = document.getElementsByClassName("avatar");
        for (var j = 0; j < avatarImages.length; j++)
        {
            avatars[j].style.width="100px";
            avatars[j].style.border = "1px solid #2c80d3";
        }
        this.style.width = "120px";
        this.style.border = "3px solid #2f284f";
      });
    }
});



  </script>



