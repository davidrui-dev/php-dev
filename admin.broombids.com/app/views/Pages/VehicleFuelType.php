<div class="card-body">
    <button class="btn btn-primary" data-toggle="modal" data-target="#VehicleType">Add Vehicle Fuel Type</button>
</div>

<div class="col-12 col-lg-12">
    <div class="card card-statistics">
        <div class="card-header">
            <div class="card-heading">
                <h4 class="card-title">Vehicle Fuel Type List</h4>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered mb-0">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Vehicle Fuel Type</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $newUser=new Users();
                        $users = $newUser->FindByAll('vehicle_fuel_type');
                        if($users)
                        {
                            $n=0;
                            foreach ($users as $user) 
                            {
                                $n++;
                                ?>
                                <tr id="row_<?php echo $user->id; ?>">
                                    <th scope="row"><?php echo $n; ?></th>
                                    <td><?php echo $user->fueltype; ?></td>
                                    <td>
                                        <?php
                                        if($user->status == 1)
                                        {
                                            echo '<span class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-info">Active</span>';
                                        }
                                        else
                                        {
                                            echo '<span class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-warning">De-Active</span>';
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <a href="javascript:void(0);" class="btn btn-icon btn-danger" id="deletequery" tbl="vehicle_fuel_type" fdi="<?php echo $user->id; ?>"><i class="fa fa-trash"></i></a>

                                        <a href="javascript:void(0);" class="btn btn-icon btn-info" id="edit_fual_type" tbl="vehicle_fuel_type" fdi="<?php echo $user->id; ?>" name="<?php echo $user->fueltype; ?>"><i class="fa fa-pencil"></i></a>
                                        

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


<div class="modal fade" id="VehicleType" tabindex="-1" role="dialog" aria-labelledby="VehicleType" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Vehicle Fuel Type</h5>
                <button type="button" class="close" id="closelocationmedel" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="modelemail">Vehicle Fuel Type</label>
                        <input type="text" class="form-control" id="vf_type" placeholder="Enter Vehicle Fuel Type">
                    </div>                    
                    
                    <button type="button" id="addVehicleFuel" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="edit_modal_fula_type" tabindex="-1" role="dialog" aria-labelledby="VehicleType" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Vehicle Fuel Type</h5>
                <button type="button" class="close" id="closelocationmedel" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="modelemail">Vehicle Fuel Type</label>
                        <input type="text" class="form-control" id="ed_fual_type" placeholder="Enter Vehicle Fuel Type">
                    </div>                    
                    
                    <button type="button" id="submit_edit_fuil_type" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>