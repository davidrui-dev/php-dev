<?php $this->start('head');?>
<?php $this->setSiteTitle('Home Page');?>

<?php $this->end();?>

<?php $this->start('body');?>
<div class="col-md-3">
    <div class="card card-statistics">
        <button id="open_blog_form" class="btn btn-primary">Create New Blog</button>
    </div>
</div>
<div class="col-md-12" id="bog_form" style="display: none;">
    <div class="card card-statistics">
        <div class="card-header">
            <div class="card-heading">
                <h4 class="card-title">Create New Blog</h4>
            </div>
        </div>
        <div class="card-body">
            <form id="adminform">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="blog_title">Blog Title</label>
                        <input type="text" class="form-control" id="blog_title" placeholder="Enter blog title">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="blog_img">Blog Image</label>
                        <input type="file" class="form-control" id="blog_img" >
                    </div>
                    <div class="form-group col-md-12">
                        <label for="phone">Description</label>
                        <textarea id="blog_desc" name="blog_desc"></textarea>
                    </div>
                </div>                         
                    
                <div id="err" style="margin-bottom: 10px;"></div>
                <button type="button" id="submit_blog" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

<div class="col-12 col-lg-12">
    <div class="card card-statistics">
        <div class="card-header">
            <div class="card-heading">
                <h4 class="card-title">All Blog</h4>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered mb-0">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Img</th>
                            <th scope="col">Title</th>
                            <th scope="col">Date & time</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $newUser=new Users();
                        $users = $newUser->FindByAll('blog');
                        if($users)
                        {
                            $n=0;
                            foreach ($users as $user) 
                            {
                                $n++;
                                ?>
                                <tr id="row_<?php echo $user->id; ?>">
                                    <th scope="row"><?php echo $n; ?></th>
                                    <td><img src="<?php echo PROOT.$user->img; ?>" style="width: 50px;"></td>
                                    <td><?php echo $user->title; ?></td>
                                    <td><?php echo date("d-m-Y h:i A", strtotime($user->time)); ?></td>                                    
                                    <td>
                                        <a href="javascript:void(0);" class="btn btn-icon btn-danger" id="delete_blog" fdi="<?php echo $user->id; ?>"><i class="fa fa-trash"></i></a>

                                        <a href="<?php echo PROOT; ?>blog/edit?id=<?php echo $user->id; ?>" class="btn btn-icon btn-info" ><i class="fa fa-edit"></i></a>

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
<?php $this->end();?>
<script src="//cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.1/tinymce.min.js"></script>
<script>
    tinymce.init({ selector:'textarea' });
</script>