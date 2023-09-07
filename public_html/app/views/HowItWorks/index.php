<?php
$newUser=new Users();
?>
<?php $this->start('head');?>
<?php $this->setSiteTitle('How It Works | Broombids');?>
<style type="text/css">
    .animate-ball .ball
    {
        background: #2cc1d64f !important;
    }
  
</style>
<?php $this->end();?>

<?php $this->start('body');?>
<section class="page-banner">
    <div class="container">
        <div class="page-title-wrapper">
            <h1 class="page-title">HOW IT WORKS</h1>
            <ul class="bradcurmed">
                <li><a href="<?=PROOT?>" rel="noopener noreferrer">Home</a></li>
                <li>Customer</li>
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
        <div class="section-title text-center">
            <h3 class="sub-title wow pixFadeUp">CUSTOMER</h3>
            <h2 class="title wow pixFadeUp" data-wow-delay="0.3s">Follow this easy process to use broombids as customer.</h2>
        </div>
        <div class="row justify-content-center">
           
            <div class="col-lg-4 col-md-6">
                <div class="saaspik-icon-box-wrapper style-four wow pixFadeLeft" data-wow-delay="0.6s" style="height: 460px;">
                    <div class="saaspik-icon-box-icon"><center> <img src="<?=PROOT?>images/w_login.svg" alt="" style="width: 40%; margin-top: -45px;" /></center></div>
                    <div class="pixsass-icon-box-content">
                        <h3 class="pixsass-icon-box-title" style="text-align: center;"><a href="javascript:void(0);">CREATE YOUR ACCOUNT</a></h3>
                        <ul>
                            <li>Register( link ) for free to create your account.</li>
                            <li>Confirm your e-mail.</li>
                            <li>Ready to place an add. </li>
                        </ul>
                        
                    </div>
                    
                </div>
            </div>
             <div class="col-lg-4 col-md-6">
                <div class="saaspik-icon-box-wrapper style-four wow pixFadeLeft" data-wow-delay="0.5s" style="height: 460px;">
                    <div class="saaspik-icon-box-icon"><center> <img src="<?=PROOT?>images/w_content.svg" alt="" style="width: 40%; margin-top: -45px;" /></center></div>
                    <div class="pixsass-icon-box-content">
                        <h3 class="pixsass-icon-box-title" style="text-align: center;"><a href="javascript:void(0);">POST FREE ADD</a></h3>
                        <ul>
                            <li>Add  the location and dates you wish to rent a car.</li>
                            <li>Choose category and set willing price.</li>
                            <li>Post your add and wait for Offers.</li>                           
                        </ul>
                        
                        
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="saaspik-icon-box-wrapper style-four wow pixFadeLeft" data-wow-delay="0.9s" style="height: 460px;">
                    <div class="saaspik-icon-box-icon">
                       <center> <img src="<?=PROOT?>images/w_support.svg" alt="" style="width: 40%; margin-top: -45px;" /></center>
                    </div>
                    <div class="pixsass-icon-box-content">
                        <h3 class="pixsass-icon-box-title" style="text-align: center;"><a href="javascript:void(0);">DEAL DONE</a></h3>
                        <ul>
                            <li>Check final Offer.</li>
                            <li>Select the vendor as you wish.</li>
                            <li>Get details for communication.</li>
                        </ul>
                        
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>




<?php $this->end();?>

