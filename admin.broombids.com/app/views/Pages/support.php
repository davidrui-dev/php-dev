

<div class="col-12 col-lg-12">
    <div class="card card-statistics">
        <div class="card-header">
            <div class="card-heading">
                <h4 class="card-title">Support Tickets</h4>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered mb-0">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">User</th>
                            <th scope="col">Subject</th>
                            <th scope="col">Message</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $newUser=new Users();
                        $supports = $newUser->FindByAll('support');
                        if($supports)
                        {                            
                            foreach ($supports as $support) 
                            {       
                            $user = $newUser->FindByIDSigle('users',$support->uid);
                            $uname='User Not Found';
                            if($user)
                            {
                                $uname =$user->fname.' '.$user->surname;
                            }                     
                                ?>
                                <tr id="row_<?php echo $support->id; ?>">
                                    <th scope="row"><?php echo $support->id; ?></th>
                                    <td><?php echo $uname; ?></td>
                                    <td><?php echo $support->subject; ?></td>
                                    <td style="white-space: inherit;"><?php echo $support->message; ?></td>
                                    <td>
                                        <?php
                                        if($support->status == 1)
                                        {
                                            echo '<span class="badge badge-pill badge-success">Active</span>';
                                        }
                                        else
                                        {
                                             echo '<span class="badge badge-pill badge-danger">Closed</span>';
                                        }
                                        ?>

                                    </td>
                                    <td>                                        
                                        <div class="btn-group btn-group-sm" style="float: none;">
                                            <button id="getcontroller_edit" fdi="<?php echo $support->id; ?>" controller="SingleTicket" type="button" class="tabledit-edit-button btn btn-sm btn-primary" style="float: none;"><span class="fa fa-folder"></span> &nbsp; VIEW</button>  
                                            <?php
                                            if($support->status == 1)
                                            {
                                                ?>
                                                <button type="button" class="tabledit-edit-button btn btn-sm btn-warning" style="float: none;"><span class="fa fa-pencil"></span> &nbsp; CLOSE</button>
                                                <?php
                                            }
                                            ?>                                       
                                            
                                            <button type="button" id="deletequery" tbl="support" fdi="<?php echo $support->id; ?>" class="tabledit-edit-button btn btn-sm btn-danger" style="float: none;"><span class="fa fa-trash"></span> &nbsp; DELETE</button>
                                        </div> 
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
