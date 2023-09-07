<?php $this->start('head');?>
<?php $this->setSiteTitle('Home Page');?>

<?php $this->end();?>

<?php $this->start('body');
$newUser=new Users();
$id = $_GET['id'];
$blog = $newUser->FindByID('blog',$id);
?>

<div class="col-md-12">
    <div class="card card-statistics">
        <div class="card-header">
            <div class="card-heading">
                <h4 class="card-title">Edit Blog</h4>
            </div>
        </div>
        <div class="card-body">
            <form id="adminform">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="blog_title">Blog Title</label>
                        <input type="text" class="form-control" id="blog_title" placeholder="Enter blog title" value="<?php echo $blog->title; ?>">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="blog_img">Blog Image</label>
                        <input type="file" class="form-control" id="blog_img" >
                    </div>
                    <div class="form-group col-md-12">
                        <label for="phone">Description</label>
                        <textarea id="blog_desc" name="desci"><?php echo $blog->desci; ?></textarea>
                    </div>
                </div>                         
                    
                <div id="err" style="margin-bottom: 10px;"></div>
                <button type="button" id="update_submit_blog" class="btn btn-primary" fdi="<?php echo $blog->id; ?>">Submit</button>
            </form>
        </div>
    </div>
</div>

<?php $this->end();?>
<script src="//cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.1/tinymce.min.js"></script>
<script>
    tinymce.init({ selector:'textarea' });
</script>