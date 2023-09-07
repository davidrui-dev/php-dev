<?php $this->start('head'); ?>
<?php $this->setSiteTitle('404'); ?>
<link rel="stylesheet" type="text/css" href="<?=PROOT?>css/main.css?<?=VERSION_NO?>">  
<?php $this->end(); ?>

<?php $this->start('body'); ?>
<section class="page-banner">
    <div class="container">
        <div class="page-title-wrapper">
            <h1 class="page-title">Page Not Found</h1>
            <ul class="bradcurmed">
                <!-- <li><a href="<?=PROOT?>" rel="noopener noreferrer"></a></li> -->
                <li>What you are searching for is not Available?</li>
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
    <div class="globalNotFound">        
        <div class="bgColorDiv"></div>
        <div class="logo">
            <img src="images/404/logo.png" alt="">
        </div>
        <div class="artwork">
            <img src="images/404/artwork.png" alt="">
        </div>
        <center>
        <h1>Error 404:</h1>
        <p>We can’t find this page. But we can help you find new opportunities.</p>
        <br>
        <p>Quick Links</p>
        <hr>
                <input type="text" id="deletetablename" hidden/>
        <a href="#" id="DeleteAllBidAccount" class="pxs-btn banner-btn color-two wow pixFadeUp" data-wow-delay="0.6s" hidden>Post dfefe</a>
        <?php if(isset($_SESSION['master_id']))
        {
        ?>
        <a href="<?=PROOT?>home">Home</a>&nbsp;|&nbsp;<a href="<?=PROOT?>dashboard">Dashboard</a>&nbsp;|&nbsp;<a href="<?=PROOT?>blog">Blog</a>&nbsp;|&nbsp;<a href="<?=PROOT?>Contact">Contact Us</a>&nbsp;|&nbsp;<a href="<?=PROOT?>About">About</a>
        <?php 
        }
        else {
        ?>
           <a href="<?=PROOT?>home">Home</a>&nbsp;|&nbsp;
           <a href="<?=PROOT?>blog">Blog</a>&nbsp;|&nbsp;
           <a href="<?=PROOT?>Contact">Contact Us</a>&nbsp;|&nbsp;
           <a href="<?=PROOT?>About">About</a>

           <!-- <div class="loginContainer">
                <a href="<?=PROOT?>Home" class="loginBtn">Log in</a>
                <a href="<?=PROOT?>Home" class="signupBtn">Sign up</a>
            </div> -->
         <?php  }   ?>
        </center>
    </div>
<?php $this->end(); ?>