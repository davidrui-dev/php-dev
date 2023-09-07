<div class="col-12 col-lg-12">
    <div class="card card-statistics">
        <div class="card-header">
            <div class="card-heading">
                <h4 class="card-title">All Register Vender Users</h4>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered mb-0">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Fullname</th>
                            <th scope="col">Email Address</th>
                            <th scope="col">Phone</th>
                            <th scope="col">USername</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $newUser=new Users();
                        $users = $newUser->FindByAllWithLimit('users','Vender',50);
                        if($users)
                        {
                            $n=0;
                            foreach ($users as $user) 
                            {
                                $n++;
                                ?>
                                <tr id="row_<?php echo $user->id; ?>">
                                    <th scope="row"><?php echo $n; ?></th>
                                    <td id="venderdetails" fdi="<?php echo $user->id; ?>"><?php echo $user->fname.' '.$user->surname; ?></td>
                                    <td id="venderdetails" fdi="<?php echo $user->id; ?>"><?php echo $user->email; ?></td>
                                    <td id="venderdetails" fdi="<?php echo $user->id; ?>"><?php echo $user->phone; ?></td>
                                    <td id="venderdetails" fdi="<?php echo $user->id; ?>"><?php echo $user->username; ?></td>
                                    <td id="status_<?php echo $user->id; ?>">
                                        <?php
                                        if($user->status == 1)
                                        {
                                            echo '<span class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-info">Active</span>';
                                        }

                                        else if($user->status == 2)
                                        {
                                            echo '<span class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-danger">Pending</span>';
                                        }
                                        else
                                        {
                                            echo '<span class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-warning">Close</span>';
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <a href="javascript:void(0);" class="btn btn-icon btn-danger" id="deleteadusercustomer" fdi="<?php echo $user->id; ?>"><i class="fa fa-trash"></i></a>

                                        <!-- <a href="javascript:void(0);" class="btn btn-icon btn-info" id="getcontroller_edit" fdi="<?php echo $user->id; ?>" controller="CustomerEdit"><i class="fa fa-edit"></i></a> -->
                                        <?php
                                        if($user->status == 1)
                                        {
                                        ?>
                                        <a href="javascript:void(0);" class="btn btn-icon btn-dark" id="blockuser" fdi="<?php echo $user->id; ?>"><i class="fa fa-lock"></i></a>
                                        <?php } else { ?>
                                        <a href="javascript:void(0);" class="btn btn-icon btn-success" id="unblockuser" fdi="<?php echo $user->id; ?>"><i class="fa fa-unlock"></i></a>
                                        <?php } ?>

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