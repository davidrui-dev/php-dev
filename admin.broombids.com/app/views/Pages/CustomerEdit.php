<?php 
if(isset($_SESSION['edit_id']))
{
    $id = $_SESSION['edit_id'];
    $newUser=new Users();
    $user = $newUser->FindByIDSigle('users',$id); 
    if($user)
    {

    }
    else
    {

    }
}
else
{

}


?>
<div class="col-md-12">
<div class="card card-statistics">
    <div class="card-header">
        <div class="card-heading">
            <h4 class="card-title">Edit Customer User</h4>
        </div>
    </div>
    <div class="card-body">
        <form id="adminform">
            <div class="form-row">

                <div class="form-group col-md-6">
                    <label for="fname">Fullname</label>
                    <input type="text" class="form-control" id="fname" placeholder="Enter User Fullname" value="<?php echo $user->fname; ?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="phone">Contact Number</label>
                    <input type="text" class="form-control" id="phone" placeholder="Enter User Phone Number" value="<?php echo $user->phone; ?>">
                </div>
            </div>            

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="email">Email Address</label>
                    <input type="text" class="form-control" id="email" placeholder="Enter User Email Address" value="<?php echo $user->email; ?>">
                </div>                                
            </div>
                
            <div id="err" style="margin-bottom: 10px;"></div>
            <button type="button" id="editcustomer" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
</div>