<div class="col-md-12">
<div class="card card-statistics">
    <div class="card-header">
        <div class="card-heading">
            <h4 class="card-title">Add Vehicle Details</h4>
        </div>
    </div>
    <div class="card-body">
        <form id="form_cardetails" action="ajaxupload.php" method="post" enctype="multipart/form-data">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="vtype">Select Vehicle Type</label>
                    <select class="form-control" id="vtype" name="vtype" required="">
                        <option value="">Select Vehicle Type</option>
                        <?php
                        $newUser=new Users();
                        $vtypes = $newUser->FindByAll('vehicle_type');
                        if($vtypes)
                        {
                            foreach ($vtypes as $vtype) 
                            {
                                echo '<option value="'.$vtype->id.'">'.$vtype->vt_name.'</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="vcompany">Select Vehicle Company</label>
                    <select class="form-control" id="vcompany" name="vcompany" required="">
                        <option value="">Select Vehicle Company</option>
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="vname">Select Vehicle Name</label>
                    <select class="form-control" id="vname" name="vname" required="">
                        <option value="">Select Vehicle Name</option>
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="ftype">Select Vehicle Fuel Type</label>
                    <select class="form-control" id="ftype" name="ftype" required="">
                        <option value="">Select Vehicle Fuel Type</option>
                        <?php
                        $newUser=new Users();
                        $ftypes = $newUser->FindByAll('vehicle_fuel_type');
                        if($ftypes)
                        {
                            foreach ($ftypes as $ftype) 
                            {
                                echo '<option value="'.$ftype->id.'">'.$ftype->fueltype.'</option>';
                            }
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="ftran">Select Vehicle Transmission</label>
                    <select class="form-control" id="ftran" name="ftran" required="">
                        <option value="">Select Vehicle Transmission</option>
                        <?php
                        $newUser=new Users();
                        $ftrans = $newUser->FindByAll('vehicle_transmission');
                        if($ftrans)
                        {
                            foreach ($ftrans as $ftran) 
                            {
                                echo '<option value="'.$ftran->id.'">'.$ftran->v_transmission.'</option>';
                            }
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group col-md-3">
                    <label for="gates">Number of Gate</label>
                    <select id="gates" name="gates" class="form-control" required="">
                        <option value="">Select Number of Gate</option>
                        <?php
                        for ($i=1; $i < 10; $i++) 
                        { 
                            echo '<option value="'.$i.'">'.$i.'</option>';
                        }
                        ?>  
                    </select>
                </div>

                <div class="form-group col-md-3">
                    <label for="passenger">Number of Passenger</label>
                    <select id="passenger" name="passenger" class="form-control" required="">
                        <option value="">Select Number of Passenger</option>
                        <?php
                        for ($i=1; $i < 100; $i++) 
                        { 
                            echo '<option value="'.$i.'">'.$i.'</option>';
                        }
                        ?>  
                    </select>
                </div>

                <div class="form-group col-md-12">
                    <label for="passenger">Write Description</label>
                    <textarea class="form-control" rows="10" name="desc" id="desc"></textarea>
                </div>

                <div class="form-group col-md-6">
                    <div class="uploader" onclick="$('#filePhoto').click()">
                        <center><i class="dripicons dripicons-cloud-upload" style="font-size: 140px;"></i></center>
                        <center><h4 style="color: #a6a9b7;">Select Featured image</h4></center>
                        <img id="fimageshow" style="display: none; object-fit:cover;" src=""/>
                        <input type="file" name="fimage"  id="filePhoto" />
                    </div>  
                </div>

                <div class="form-group col-md-6" >
                    <div onclick="$('#uploadedImages').click();" style="background:#f3f3f3; border:2px dashed #e8e8e8;">
                        <center><i class="dripicons dripicons-cloud-upload" style="font-size: 150px;"></i></center>
                        <center><h4 style="color: #a6a9b7;">Select Multiple Images For Image Gallery</h4></center>
                    </div>
                </div>
                                   
                <input style="display: none;" multiple="1" onchange="readURL(this);" id="uploadedImages" name="pictures[]" type="file">
            </div>

            <div id ="up_images" class="form-row"></div>            
                
            <div id="err" style="margin-bottom: 10px;"></div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
</div>

<style type="text/css">
.uploader {position:relative; overflow:hidden; width:100%; height:265px; background:#f3f3f3; border:2px dashed #e8e8e8;}

#filePhoto{
    position:absolute;
    width:100%;
    height:265px;
    top:-50px;
    left:0;
    z-index:2;
    opacity:0;
    cursor:pointer;
}

.uploader img{
    position:absolute;
    width:100%;
    height:266px;
    top:-1px;
    left:-1px;
    z-index:1;
    border:none;
}
</style>

<script type="text/javascript">
    $("#fimageshow").show();
    var imageLoader = document.getElementById('filePhoto');
    imageLoader.addEventListener('change', handleImage, false);

function handleImage(e) {
    var reader = new FileReader();
    reader.onload = function (event) {
        
        $('.uploader img').attr('src',event.target.result);
    }
    reader.readAsDataURL(e.target.files[0]);
}

var readURL = function(input) {
      $('#up_images').empty();   
      var number = 0;
      $.each(input.files, function(value) {
          var reader = new FileReader();
          reader.onload = function (e) {
              var id = (new Date).getTime();
              number++;
              $('#up_images').prepend('<div class="card col-md-4"><img id='+id+' src='+e.target.result+' class="card-img-top" data-index='+number+'/><div>')
          };
          reader.readAsDataURL(input.files[value]);
          }); 
    }
</script>

<script type="text/javascript">
$(document).ready(function (e) {
 $("#form_cardetails").on('submit',(function(e) {
  e.preventDefault();
  $.ajax({
         url: path+"Master/AddCarDetails",
   type: "POST",
   data:  new FormData(this),
   contentType: false,
         cache: false,
   processData:false,
   beforeSend : function()
   {
    $("#err").fadeOut();
    $("#err").fadeOut();
    $("#err").html('<div class="alert dark alert-info alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Authentication....</div>').fadeIn();
   },
   success: function(data)
      {
    if(data=='success')
    {
     // invalid file format.
     $("#err").html('<div class="alert dark alert-info alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Vender registered successfully.</div>').fadeIn();
     $("#form_cardetails")[0].reset(); 
     $("#fimageshow").hide();
     $('#up_images').empty();
     document.body.scrollTop = 0;
     document.documentElement.scrollTop = 0;
    }
    else
    {     
     
    }
      },
     error: function(e) 
      {
    $("#err").html(e).fadeIn();
      }          
    });
 }));
});
</script>