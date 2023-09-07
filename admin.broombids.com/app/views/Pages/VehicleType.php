<div class="card-body">
    <button class="btn btn-primary" data-toggle="modal" data-target="#VehicleType">Add Vehicle Type</button>
</div>

<div class="col-12 col-lg-12">
    <div class="card card-statistics">
        <div class="card-header">
            <div class="card-heading">
                <h4 class="card-title">All List</h4>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered mb-0">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Location Name</th>
                            <th scope="col">Assign Company</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $newUser=new Users();
                        $users = $newUser->FindByAll('vehicle_type');
                        if($users)
                        {
                            $n=0;
                            foreach ($users as $user) 
                            {
                                $n++;
                                ?>
                                <tr id="row_<?php echo $user->id; ?>">
                                    <th scope="row"><?php echo $n; ?></th>
                                    <td><?php echo $user->vt_name; ?></td>
                                    <td><a href="javascript:void(0);" id="assigncompany" fdi="<?php echo $user->id; ?>" class="btn btn-block btn-round btn-dark" data-toggle="modal" data-target="#Vehiclecompany">View & Edit Company</a></td>
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
                                        <a href="javascript:void(0);" class="btn btn-icon btn-primary" id="edit_vehicle" vname="<?php echo $user->vt_name; ?>" fdi="<?php echo $user->id; ?>"><i class="fa fa-pencil"></i></a>

                                        <a href="javascript:void(0);" class="btn btn-icon btn-danger" id="deletequery" tbl="vehicle_type" fdi="<?php echo $user->id; ?>"><i class="fa fa-trash"></i></a>
                                        

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
                <h5 class="modal-title">Add Vehicle Type</h5>
                <button type="button" class="close" id="closelocationmedel" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="modelemail">Enter Vehicle Type</label>
                        <input type="text" class="form-control" id="vtype" placeholder="Enter Enter Vehicle Type Name">
                    </div>                    
                    
                    <button type="button" id="addVehicleType" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="edit_vehicle_modal" tabindex="-1" role="dialog" aria-labelledby="VehicleType" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Vehicle type</h5>
                <button type="button" class="close" id="closelocationmedel" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="ed_vtype">Enter Vehicle Type</label>
                        <input type="text" class="form-control" id="ed_vtype" placeholder="Enter Enter Vehicle Type Name">
                    </div>

                    <div class="form-group">
                        <label for="ed_img">Vehicle icon</label>
                        <input type="file" name="ed_img" class="form-control" id="ed_img">
                    </div>                    
                    
                    <button type="button" id="ed_vehicle_submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade show" id="Vehiclecompany" tabindex="-1" role="dialog" aria-labelledby="Vehiclecompany" aria-modal="true" style="display: none;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Assign Vehicle Company</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body" id="vehiclecompanylist">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success" id="assigncompanytotype">Save changes</button>
            </div>
        </div>
    </div>
</div>