<div class="col-md-12">
<div class="card card-statistics">
    <div class="card-header">
        <div class="card-heading" id="showfaq">
            <h4 class="card-title">Create New FAQ Question And Answer<i class="nav-icon ti ti-plus" style="float: right;"></i></h4>

        </div>
    </div>
    <div class="card-body" style="display: none;" id="faqbody">
        <form id="adminform">
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="fname">For Which user </label>
                    <select class="form-control" id="whichuser" name="whichuser">
                        <option value="">For Which user</option>
                        <option value="Vendor">Vendor</option>
                        <option value="User">User</option>
                    </select>
                </div>
                <div class="form-group col-md-12">
                    <label for="fname">Enter Question</label>
                    <input type="text" class="form-control" id="question" placeholder="Enter Question">
                </div>
                <div class="form-group col-md-12">
                    <label for="phone">Enter Answer</label>
                    <textarea class="form-control" id="answer" rows="6"></textarea>
                </div>
            </div>                      
                
            <div id="err" style="margin-bottom: 10px;"></div>
            <button type="button" id="addfaq" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
</div>

<div class="col-12 col-lg-12">
    <div class="card card-statistics">
        <div class="card-header">
            <div class="card-heading">
                <h4 class="card-title">FAQ's to answer all your basic questions For (Vendors)</h4>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered mb-0">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Question</th>
                            <th scope="col">Answer</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $newUser=new Users();
                        $users = $newUser->FindFaqbyType('Vendor');
                        if($users)
                        {
                            $n=0;
                            foreach ($users as $user) 
                            {
                                $n++;
                                ?>
                                <tr id="row_<?php echo $user->id; ?>">
                                    <th scope="row"><?php echo $n; ?></th>
                                    <td><?php echo $user->question; ?></td>
                                    <td style="white-space: inherit;"><?php echo $user->answer; ?></td>
                                    
                                    <td>
                                        <a href="javascript:void(0);" class="btn btn-icon btn-danger" id="deletequery" tbl="faq" fdi="<?php echo $user->id; ?>"><i class="fa fa-trash"></i></a>

                                        <a href="javascript:void(0);" class="btn btn-icon btn-info" id="Editfaq" tbl="faq" fdi="<?php echo $user->id; ?>" data-toggle="modal" data-target="#loginModal"><i class="fa fa-edit"></i></a>
                                        

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

<div class="col-12 col-lg-12">
    <div class="card card-statistics">
        <div class="card-header">
            <div class="card-heading">
                <h4 class="card-title">FAQ's to answer all your basic questions For (User)</h4>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered mb-0">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Question</th>
                            <th scope="col">Answer</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $newUser=new Users();
                        $users = $newUser->FindFaqbyType('User');
                        if($users)
                        {
                            $n=0;
                            foreach ($users as $user) 
                            {
                                $n++;
                                ?>
                                <tr id="row_<?php echo $user->id; ?>">
                                    <th scope="row"><?php echo $n; ?></th>
                                    <td><?php echo $user->question; ?></td>
                                    <td style="white-space: inherit;"><?php echo $user->answer; ?></td>
                                    
                                    <td>
                                        <a href="javascript:void(0);" class="btn btn-icon btn-danger" id="deletequery" tbl="faq" fdi="<?php echo $user->id; ?>"><i class="fa fa-trash"></i></a>

                                        <a href="javascript:void(0);" class="btn btn-icon btn-info" id="Editfaq" tbl="faq" fdi="<?php echo $user->id; ?>" data-toggle="modal" data-target="#loginModal"><i class="fa fa-edit"></i></a>
                                        

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
                <h5 class="modal-title">Edit FAQ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="close_ed_faq">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body" id="faq_form">
                
            </div>
        </div>
    </div>
</div>