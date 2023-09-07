
<div class="col-12 col-lg-12">
    <div class="card card-statistics">
        <div class="card-header">
            <div class="card-heading">
                <h4 class="card-title">All Post Requirement</h4>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered mb-0">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Client Details</th>
                            <th scope="col">Car Details</th>
                            <th scope="col">Location</th>
                            <th scope="col">Journey dates</th>
                            <th scope="col">Budget</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $newUser=new Users();
                        $Posts = $newUser->FindByAll('post');
                      
                        if($Posts)
                        {
                            $n=0;
                            foreach ($Posts as $Post) 
                            {
                                $n++;
                                $cname='User Not Available';
                                $phone='User Not Available';
                                $ctype='';
                                $carname='';
                                $lname='';
                                $user = $newUser->FindByIDSigle('users',$Post->uid);
                                if($user)
                                {
                                    $cname = $user->fname;
                                    $phone = $user->phone;
                                }
                                $vehicle_type = $newUser->FindByIDSigle('vehicle_type',$Post->ctype);
                                if($vehicle_type)
                                {
                                    $ctype = $vehicle_type->vt_name;
                                }
                                $vehicle_name = $newUser->FindByIDSigle('vehicle_name',$Post->carname);
                                if($vehicle_name)
                                {
                                    $carname = $vehicle_name->vname;
                                }
                                $locationsadmin = $newUser->FindByIDSigle('locationsadmin',$Post->location);
                                if($locationsadmin)
                                {
                                    $lname = $locationsadmin->lname;
                                }
                                ?>
                                <tr id="row_<?php echo $Post->id; ?>">
                                    <th scope="row"><?php echo $n; ?></th>
                                    <td><?php echo $Post->title; ?></td>
                                    <td><b>Name : </b><?php echo $cname; ?><br><b>Phone : </b><?php echo $phone; ?></td>
                                    
                                    <td><?php echo $ctype.' - ( '.$carname.' )'; ?></td>
                                    <td><?php echo $lname; ?></td>
                                    <td><b>From : </b><?php echo date("d-m-Y", strtotime($Post->fromdate)); ?><br><b>To : </b><?php echo date("d-m-Y", strtotime($Post->todate)); ?></td>
                                    <td>€ <?php echo $Post->budget_min; ?> <b> To </b>€ <?php echo $Post->budget_max; ?></td>
                                    <td>
                                        <?php
                                        if($Post->status == 1)
                                        {
                                            echo '<span class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-dark">New Post</span>';
                                        }
                                        else
                                        {
                                            echo '<span class="mr-2 mb-2 mr-sm-0 mb-sm-0 badge badge-warning">De-Active</span>';
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <a href="javascript:void(0);" class="btn btn-icon btn-danger" id="deletequery" tbl="post" fdi="<?php echo $Post->id; ?>"><i class="fa fa-trash"></i></a>
                                        

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

