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
                            <th scope="col">Email</th>
                            <th scope="col">Time</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $newUser=new Users();
                        $users = $newUser->FindByAll('subscribers');
                        if($users)
                        {
                            $n=0;
                            foreach ($users as $user) 
                            {
                                $n++;
                                ?>
                                <tr id="row_<?php echo $user->id; ?>">
                                    <th scope="row"><?php echo $n; ?></th>
                                    <td><?php echo $user->email; ?></td>
                                    <td><?php echo $user->time; ?></td>
                                    
                                    <td>
                                        <a href="javascript:void(0);" class="btn btn-icon btn-danger" id="deletelocation" fdi="<?php echo $user->id; ?>"><i class="fa fa-trash"></i></a>
                                        

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


<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Location</h5>
                <button type="button" class="close" id="closelocationmedel" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="modelemail">Enter Location Name</label>
                        <input type="text" class="form-control" id="lname">
                    </div>                    
                    
                    <button type="button" id="addlocation" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>