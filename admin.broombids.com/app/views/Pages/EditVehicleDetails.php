<?php
$mid = $_SESSION['edit_vehicle_id'];
$newUser=new Users();
$managev = $newUser->FindByIDSigle('vehiclemanage',$mid);
$vtypename='';                          
$vcname='';                          
$vname='';                          
$vfuel='';                          
$vtra=''; 
$vtype = $newUser->FindByIDSigle('vehicle_type',$managev->vtype);
if($vtype)
{
    $vtypename = $vtype->vt_name;
}  

$vcnameq = $newUser->FindByIDSigle('vehicle_company',$managev->cnompany);
if($vcnameq)
{
    $vcname = $vcnameq->v_company;
}  

$vcnameq1 = $newUser->FindByIDSigle('vehicle_name',$managev->vname);
if($vcnameq1)
{
    $vname = $vcnameq1->vname;
} 

$vcnameq2 = $newUser->FindByIDSigle('vehicle_fuel_type',$managev->vfule);
if($vcnameq2)
{
    $vfuel = $vcnameq2->fueltype;
} 

$vcnameq3 = $newUser->FindByIDSigle('vehicle_transmission',$managev->vtra);
if($vcnameq3)
{
    $vtra = $vcnameq3->v_transmission;
} 
?>
<div class="col-md-12">
<div class="card card-statistics">
    <div class="card-header">
        <div class="card-heading">
            <h4 class="card-title">Edit Vehicle Details</h4>           
        </div>
    </div>
    <div class="card-body">
        
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="vtype">Select Vehicle Type</label>
                    <select class="form-control" id="vtype" name="vtype" required="">
                        <option value="<?php echo $managev->vtype; ?>"><?php echo $vtypename; ?></option>
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
                        <option value="<?php echo $managev->cnompany; ?>"><?php echo $vcname; ?></option>
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="vname">Select Vehicle Name</label>
                    <select class="form-control" id="vname" name="vname" required="">
                        <option value="<?php echo $managev->vname; ?>"><?php echo $vname; ?></option>
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="ftype">Select Vehicle Fuel Type</label>
                    <select class="form-control" id="ftype" name="ftype" required="">
                        <option value="<?php echo $managev->vfule; ?>"><?php echo $vfuel; ?></option>
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
                        <option value="<?php echo $managev->vtra; ?>"><?php echo $vtra; ?></option>
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
                        <option value="<?php echo $managev->gate; ?>"><?php echo $managev->gate; ?></option>
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
                        <option value="<?php echo $managev->passenger_seat; ?>"><?php echo $managev->passenger_seat; ?></option>
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
                    <textarea class="form-control" rows="10" name="desc" id="desc">
                        <?php echo trim($managev->descreiption); ?>
                    </textarea>
                </div>                       
               
            </div>                     
                
            <div id="err" style="margin-bottom: 10px;"></div>
            <button type="button" id="editvehicledetails" class="btn btn-primary">Submit</button>
        
    </div>
</div>
</div>

<div class="col-md-12">
<div class="card card-statistics">
    <div class="card-header">
        <div class="card-heading" id="showfaq">
            <h4 class="card-title">Update Featured Image<i class="nav-icon ti ti-plus" style="float: right;"></i></h4>

        </div>
    </div>
    <div class="card-body" style="display: none;" id="faqbody">
        <form id="form_cardetails" action="ajaxupload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="futureimage" style="display: none;" id="futureimage">                               
             <div class="col-xl-3 col-md-4 col-sm-6">
                <div class="card card-statistics text-center">
                    <div class="card-body p-0">
                        <div class="portfolio-item">
                            <img src="<?php echo PROOT.$managev->img; ?>" alt="gallery-img">
                            <div class="portfolio-overlay">
                                <h4 class="text-white" id="select_fimage"><a href="javascript:void(0)" style="color:#fff;">Select Image</a></h4>
                            </div>
                            <!-- <a class="popup portfolio-img view" href="assets/img/widget/02.jpg"><i class="fa fa-arrows-alt"></i></a> -->
                        </div>
                    </div>
                </div>
            </div>   
            <div id="err_fimage" style="margin-bottom: 10px;"></div>
            <button type="button" id="changefutureimage" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
</div>

<div class="col-md-12">
<div class="card card-statistics">
    <div class="card-header">
        <div class="card-heading" id="showimagegaller">
            <h4 class="card-title">Image Gallery<i class="nav-icon ti ti-plus" style="float: right;"></i></h4>

        </div>
    </div>
    <div class="card-body" style="display: none;" id="imagegaller">
        <form method='post' action='' enctype="multipart/form-data">
            <div class="row" style="margin: 10px 0px;">
                <?php
                $gallerys = $newUser->FindByCID('car_gallary',$mid);
                if($gallerys)
                {
                    foreach ($gallerys as $gallery) 
                    {
                        ?>
                        <div class="col-xl-3 col-md-4 col-sm-6"> <div class="card card-statistics text-center"> <div class="card-body p-0"> <div class="portfolio-item"> <img src="<?php echo PROOT.$gallery->img; ?>" alt="gallery-img"> <div class="portfolio-overlay"> <h4 class="text-white"><a href="javascript:void(0)">Remove</a></h4> </div> </div></div></div></div>
                        <?php
                    }
                }
                ?>
            </div>  
        <input type="file" id='files' name="files[]" onchange="readURL(this);" multiple>                               
            <div id="up_images" class="row" style="margin: 10px 0px;"></div>   
            <div id="err_gimage" style="margin-bottom: 10px;"></div>
            <button type="button" id="changegallerimages" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
</div>


<script type="text/javascript">
$(document).on('click','#select_fimage',function(){
    $("#futureimage").click();
});



    $("#fimageshow").show();
    var imageLoader = document.getElementById('futureimage');
    imageLoader.addEventListener('change', handleImage, false);

function handleImage(e) {
    var reader = new FileReader();
    reader.onload = function (event) {
        
        $('.portfolio-item img').attr('src',event.target.result);
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
              //$('#up_images').prepend('<div class="card col-md-4"><img id='+id+' src='+e.target.result+' class="card-img-top" data-index='+number+'/><div>');
              $("#up_images").prepend('<div class="col-xl-3 col-md-4 col-sm-6"> <div class="card card-statistics text-center"> <div class="card-body p-0"> <div class="portfolio-item"> <img src="'+e.target.result+'" alt="gallery-img">  </div></div></div></div>');
          };
          reader.readAsDataURL(input.files[value]);
          }); 
    }
</script>
