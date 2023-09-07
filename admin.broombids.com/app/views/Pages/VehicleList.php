<div class="col-12 col-lg-12">
    <div class="card card-statistics">
        <div class="card-header">
            <div class="card-heading">
                <h4 class="card-title">All Vehicle Details</h4>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered mb-0">
                    <thead>
                        <tr>
                            <th scope="col">IMG</th>
                            <th scope="col">Vehicle Type</th>
                            <th scope="col">Vehicle Company</th>
                            <th scope="col">Vehicle Name</th>
                            <th scope="col">Vehicle Fuel</th>
                            <th scope="col">Vehicle Transmission</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $newUser=new Users();
                        $users = $newUser->FindByAll('vehiclemanage');
                        if($users)
                        {  
                            $vtypename='';                          
                            $vcname='';                          
                            $vname='';                          
                            $vfuel='';                          
                            $vtra='';                          
                            foreach ($users as $user) 
                            {
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
                                <tr id="row_<?php echo $user->id; ?>">
                                    <th id="getcardetails" controller="VehicleDetails" fdi="<?php echo $user->id; ?>" scope="row"><img style="width: 100px; height: 60px;" src="<?php echo PROOT.$user->img; ?>" /></th>
                                    <td id="getcardetails" controller="VehicleDetails" fdi="<?php echo $user->id; ?>"><?php echo $vtypename; ?></td>
                                    <td id="getcardetails" controller="VehicleDetails" fdi="<?php echo $user->id; ?>"><?php echo $vcname; ?></td>
                                    <td id="getcardetails" controller="VehicleDetails" fdi="<?php echo $user->id; ?>"><?php echo $vname; ?></td>
                                    <td id="getcardetails" controller="VehicleDetails" fdi="<?php echo $user->id; ?>"><?php echo $vfuel; ?></td>
                                    <td id="getcardetails" controller="VehicleDetails" fdi="<?php echo $user->id; ?>"><?php echo $vtra; ?></td>
                                    
                                    <td>
                                        <a href="javascript:void(0);" class="btn btn-icon btn-danger" id="deleteVehicle" fdi="<?php echo $user->id; ?>"><i class="fa fa-trash"></i></a> 

                                        <a href="javascript:void(0);" class="btn btn-icon btn-info" id="getcontroller_edit" fdi="<?php echo $user->id; ?>" controller="EditVehicleDetails"><i class="fa fa-edit"></i></a>   

                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        ?>                      
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>