<?php         
$id = $_SESSION['carid'];               	
$newUser=new Users();
$user = $newUser->FindByIDSigle('vehiclemanage',$id);
$vtypename='';                          
$vcname='';                          
$vname='';                          
$vfuel='';                          
$vtra='';

$vtype = $newUser->FindByIDSigle('vehicle_type',$user->vtype);
if($vtype)
{
    $vtypename = $vtype->vt_name;
}  

$vcnameq = $newUser->FindByIDSigle('vehicle_company',$user->cnompany);
if($vcnameq)
{
    $vcname = $vcnameq->v_company;
}  

$vcnameq1 = $newUser->FindByIDSigle('vehicle_name',$user->vname);
if($vcnameq1)
{
    $vname = $vcnameq1->vname;
} 

$vcnameq2 = $newUser->FindByIDSigle('vehicle_fuel_type',$user->vfule);
if($vcnameq2)
{
    $vfuel = $vcnameq2->fueltype;
} 

$vcnameq3 = $newUser->FindByIDSigle('vehicle_transmission',$user->vtra);
if($vcnameq3)
{
    $vtra = $vcnameq3->v_transmission;
} 
?>
<div class="row">
	<div class="col-xxl-8 mb-30">
	 <a href="javascript:void(0);" class="btn btn-round btn-outline-info" id="getcontroller" controller="VehicleList">Back To Car List</a>
	</div>
	<div class="col-md-12">
        <div class="card card-statistics ">
            <img class="card-img-top" src="<?php echo PROOT.$user->img; ?>" style="object-fit:cover; height: 350px;">
            <div class="card-body">
                <h4 class="card-title">Description</h4>
                <p class="card-text"><?php echo $user->descreiption; ?></p>                
            </div>
        </div>
    </div>
	
	<div class="col-xxl-8 mb-30">
        <div class="card card-statistics h-100 mb-0">
            <div class="card-header">
                <h4 class="card-title">Vehicle Details</h4>               
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-borderless mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th>Vehicle Type</th>
                                <th>Vehicle Company</th>
                                <th>Vehicle Name</th>
                                <th>Vehicle Fuel</th>
                                <th>Vehicle Transmission</th>                                
                                <th>Vehicle Doors</th>
                                <th>Vehicle Passenger Seats</th>
                            </tr>
                        </thead>
                        <tbody class="text-muted mb-0">

                            <tr>
                                <td><?php echo $vtypename; ?></td>
                                <td><?php echo $vcname; ?></td>
                                <td><?php echo $vname; ?></td>
                                <td><?php echo $vfuel; ?></td>
                                <td><?php echo $vtra; ?></td> 
                                <td><?php echo $user->gate ; ?></td>                               
                                <td><?php echo $user->passenger_seat ; ?></td>                               
                            </tr>                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    

    <div class="col-md-12 card-columns">
    	<?php
    	$imgs = $newUser->FindByCID('car_gallary',$user->id);
    	if($imgs)
    	{
    		foreach ($imgs as $img) 
    		{
    			?>
    			<div class="card">
		            <img class="card-img" src="<?php echo PROOT.$img->img; ?>" style="object-fit:cover;">
		        </div> 
    			<?php
    		}
    	}
    	?> 

    </div>
</div>