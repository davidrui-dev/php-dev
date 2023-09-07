<?php $this->start('head'); ?>
<?php $this->setSiteTitle('404'); ?>
<link rel="stylesheet" type="text/css" href="<?=PROOT?>css/main.css?<?=VERSION_NO?>">  
<?php $this->end(); ?>

<?php $this->start('body'); ?>

    <div class="globalNotFound">        
        <div class="bgColorDiv"></div>
        <div class="logo">
            <img src="images/404/logo.png" alt="">
        </div>
        <div class="artwork">
            <img src="images/404/artwork.png" alt="">
        </div>
        <h1>UNAVAILABLE</h1>
        <p>What you are searching for is not Available</p>
        <br>
        <p>Quick Links</p>
        <hr>
        <?php if(isset($_SESSION['master_id']))
        {
        ?>
        <a href="<?=PROOT?>Newsfeed">Home</a>&nbsp;|&nbsp;<a href="<?=PROOT?>Trending">Trending</a>&nbsp;|&nbsp;<a href="<?=PROOT?>Rewards">Ranking</a>&nbsp;|&nbsp;<a href="<?=PROOT?>Discover">Explore</a>&nbsp;|&nbsp;<a href="<?=PROOT?>About">About</a>
        <?php 
        }
        else {
        ?>
           <a href="<?=PROOT?>about">About</a>&nbsp;|&nbsp;
           <a href="<?=PROOT?>privacypolicy">Privacy</a>&nbsp;|&nbsp;
           <a href="<?=PROOT?>cookies">Cookies</a>&nbsp;|&nbsp;
           <a href="<?=PROOT?>informationandterms"> Terms</a>&nbsp;|&nbsp;
           <a href="<?=PROOT?>rules">Rules</a>&nbsp;|&nbsp;
           <a href="<?=PROOT?>career">Career</a>&nbsp;|&nbsp;
           <a href="<?=PROOT?>indexes">Indexes</a>&nbsp;|&nbsp;
           <a href="<?=PROOT?>contact">Contact Us</a>

           <div class="loginContainer">
                <a href="<?=PROOT?>Home" class="loginBtn">Log in</a>
                <a href="<?=PROOT?>Home" class="signupBtn">Sign up</a>
            </div>
         <?php  }   ?>
      
    </div>
<?php $this->end(); ?>