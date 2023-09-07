<?php
$newUser=new Users();
?>
<?php $this->start('head');?>
<?php $this->setSiteTitle('Blog | Broombids');?>
<style type="text/css">
    .animate-ball .ball
    {
        background: #2cc1d64f !important;
    }
  
</style>
<?php $this->end();?>

<?php $this->start('body');
$newUser=new Common();
$blogs = $newUser->CustomeQuery("SELECT * FROM `blog` ORDER BY id DESC");
if (isset($_GET['id'])) {
    $blog_id = $_GET['id'];
    $selected_blog = $newUser->CustomeQuery("SELECT * FROM `blog` WHERE id=".$blog_id."");
}
function custom_echo($x, $length)
{
  if(strlen($x)<=$length)
  {
    echo $x;
  }
  else
  {
    $y=substr($x,0,$length) . '...';
    echo $y;
  }
}
?>
<section class="page-banner">
    <div class="container">
        <div class="page-title-wrapper">
            <h1 class="page-title">Blog</h1>
            <ul class="bradcurmed">
                <li><a href="<?=PROOT?>" rel="noopener noreferrer">Home</a></li>
                <li>blog</li>
            </ul>
        </div>
    </div>
    
    <ul class="animate-ball">
        <li class="ball"></li>
        <li class="ball"></li>
        <li class="ball"></li>
        <li class="ball"></li>
        <li class="ball"></li>
    </ul>
</section>

<section class="featured-four-ab" style="padding-top: 50px;">
    <div class="container">
        
        <div class="row justify-content-center">
            <?php 
            if($blogs)
            {
                if (isset($_GET['id'])) {
                    $token = $_GET['id'];
                // Get the user's profile information
                    echo '<center style="margin:5%;"> <img src="https://admin.broombids.com/'.$selected_blog[0]->img.'" alt="" style="width: 55%; margin-top: -50px;" /></center>';
                    echo '<div style="width: 100%; margin:50px;">'.$selected_blog[0]->desci.'</div>';
                    echo '<div><a href="'. PROOT.'blog" class="pix-btn color-two wow pixFadeUp" data-wow-delay="0.3s" id="login_btn" style="width:100%; visibility: visible; float: right; margin: auto; margin-bottom 25px;">Back to Blogs</a></div>';
                }
                else
                {
                foreach ($blogs as $value) 
                {
                    ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="saaspik-icon-box-wrapper style-four wow pixFadeLeft" data-wow-delay="0.6s" style="height: 460px;">
                            <div class="saaspik-icon-box-icon"><center> <img src="https://admin.broombids.com/<?php echo $value->img; ?>" alt="" style="width: 55%; margin-top: -50px;" /></center></div>
                            <div class="pixsass-icon-box-content">
                                <h3 class="pixsass-icon-box-title" style="text-align: center;"><a href="<?php echo PROOT; ?>blog?id=<?php echo $value->id; ?>"><?php echo $value->title; ?></a></h3>
                                <center><?php custom_echo(strip_tags($value->desci), 100); ?></center>
                                <center><a href="<?php echo PROOT; ?>blog?id=<?php echo $value->id; ?>">Read More</a></center>
                            </div>
                            
                        </div>
                    </div>
                    <?php
                    }
                }
            }
            ?>             
        </div>
    </div>
</section>




<?php $this->end();?>

