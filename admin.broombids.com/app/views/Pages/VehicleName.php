<div class="card-body">
    <button class="btn btn-primary" data-toggle="modal" data-target="#VehicleType">Add Vehicle Name</button>
</div>

<div class="col-12 col-lg-12">
    <div class="card card-statistics">
        <div class="card-header">
            <div class="card-heading">
                <h4 class="card-title">Vehicle Name List</h4>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered mb-0">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Company Name</th>
                            <th scope="col">Vehicle Name</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $newUser=new Users();
                        $users = $newUser->FindByAll('vehicle_name');
                        if($users)
                        {
                            $n=0;
                            foreach ($users as $user) 
                            {
                                $n++;
                                $comname='';
                                $cname = $newUser->FindByIDSigle('vehicle_company',$user->cid);
                                if($cname)
                                {
                                    $comname = $cname->v_company;
                                }
                                ?>
                                <tr id="row_<?php echo $user->id; ?>">
                                    <th scope="row"><?php echo $n; ?></th>
                                    <td><?php echo $comname; ?></td>
                                    <td><?php echo $user->vname; ?></td>
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
                                        <a href="javascript:void(0);" class="btn btn-icon btn-danger" id="deletequery" tbl="vehicle_name" fdi="<?php echo $user->id; ?>"><i class="fa fa-trash"></i></a>
                                        <a href="javascript:void(0);" class="btn btn-icon btn-info" id="vehicle_name_edit" fdi="<?php echo $user->id; ?>" cid="<?php echo $user->cid; ?>" vname="<?php echo $user->vname; ?>"><i class="fa fa-pencil"></i></a>
                                        

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
                <h5 class="modal-title">Add Vehicle Name</h5>
                <button type="button" class="close" id="closelocationmedel" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="modelemail">Select Vehicle Company</label>
                        <select class="form-control" id="vcom">
                            <option>Select Company Name</option>
                             <?php
                            $newUser=new Users();
                            $companys = $newUser->FindByAll('vehicle_company');
                            if($companys)
                            {
                                foreach ($companys as $value) 
                                {
                                    echo '<option value="'.$value->id.'">'.$value->v_company.'</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="modelemail">Vehicle Name</label>
                        <input type="text" class="form-control" id="vname" placeholder="Enter Enter Vehicle Model Name">
                    </div>                    
                    
                    <button type="button" id="addVehicleName" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="edit_vname_modal" tabindex="-1" role="dialog" aria-labelledby="VehicleType" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Vehicle Name</h5>
                <button type="button" class="close" id="closelocationmedel" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="modelemail">Select Vehicle Company</label>
                        <select class="form-control" id="ed_vcom">
                            <option>Select Company Name</option>
                             <?php
                            $newUser=new Users();
                            $companys = $newUser->FindByAll('vehicle_company');
                            if($companys)
                            {
                                foreach ($companys as $value) 
                                {
                                    echo '<option value="'.$value->id.'">'.$value->v_company.'</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="modelemail">Vehicle Name</label>
                        <input type="text" class="form-control" id="ed_vname" placeholder="Enter Enter Vehicle Model Name">
                    </div>                    
                    
                    <button type="button" id="edit_vehicle_name_submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>