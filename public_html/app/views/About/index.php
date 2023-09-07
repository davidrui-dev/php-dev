<?php
$newUser=new Users();
?>
<?php $this->start('head');?>
<?php $this->setSiteTitle('Home Page');?>
<style type="text/css">
    .animate-ball .ball
    {
        background: #2cc1d64f !important;
    }
  
</style>
<?php $this->end();?>

<?php $this->start('body');?>
<!-- Breadcrumb Section Start -->
<section class="page-banner">
    <div class="container">
        <div class="page-title-wrapper">
            <h1 class="page-title">ABOUT US</h1>
            <ul class="bradcurmed">
                <li><a href="<?=PROOT?>" rel="noopener noreferrer">Home</a></li>
                <li>About Us</li>
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

<section class="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="about-content">                   
                    <p class="description wow pixFadeUp" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: i;">
                       Broombids started out as an idea a few years ago. After research, studies and studies, we concluded that what is missing from the market is the possibility of flexible rental, especially in the area of the car, where the oversupply blocks and confuses both customers and professionals.
                    </p>

                    <p class="description wow pixFadeUp" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: i;">
                      This is how we made broombids the first platform in the world where the customer-caregiver can create his own competition with his own peculiarities and adapt to his own needs and seek the best demand-supply ratio.
                    </p>

                    <p class="description wow pixFadeUp" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: i;">
                      At broombids, anyone who is interested in renting a car for their vacation can easily create a contest with 3-4 clicks and wait to receive the best offers live from the Vendors that are certified on our platform.
                    </p>
                    
                </div>
            </div>
            <div class="col-lg-4">
                <div class="about-thumb wow pixFadeRight" data-wow-delay="0.6s" style="visibility: visible; animation-delay: 0.6s; animation-name: l;"><img src="<?=PROOT?>images/About-us.svg" alt="about" /></div>
            </div>

            
        </div>
    </div>
</section>

<section class="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="about-thumb wow pixFadeRight" data-wow-delay="0.6s" style="visibility: visible; animation-delay: 0.6s; animation-name: l;"><img src="<?=PROOT?>images/About-us-page-amico.svg" alt="about" /></div>
            </div>
            <div class="col-lg-8">
                <div class="about-content">                   
                    <p class="description wow pixFadeUp" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: i;">
                       With a little patience he will see the price go down and the offer go up until he reaches the point where he will be satisfied.
                    </p>

                    <p class="description wow pixFadeUp" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: i;">
                     Vendor on the other hand will constantly find in our portfolio new searches for rentals and will be able to find new customers that he probably would not have before, while our fully updated database will make his job easier.
                    </p>

                    <p class="description wow pixFadeUp" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: i;">
                      He can "upload" his offer and wait by watching the offers of other vendors. Can make new offers at more competitive prices and win the customer.
                    </p>

                    <p class="description wow pixFadeUp" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: i;">
                        The broombids team consists of young people full of appetite for work but also experienced in the field of business people who together we have built a platform unique in its kind on a global scale.
                    </p>
                    
                </div>
            </div>

            <div class="col-lg-12">
                <p class="description wow pixFadeUp" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: i;">
                      With a lot of hard work we managed in a relatively short period of time to calculate this project and offer it to the market.
                </p>
                <p class="description wow pixFadeUp" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: i;">
                      Our goal is for all of your customers and vendors to have a serious, reliable and functional tool that on the one hand for your customers will make your search for your vacation easier and cheaper while on the other hand for you vendors will increase your work and your income.
                </p>
                <p class="description wow pixFadeUp" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: i;">
                      Our ambition is to make broombids a global tool that will satisfy everyone and will be 100% reliable so that we have recurring and new customers and constant-growing partners.
                </p>
                <p class="description wow pixFadeUp" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: i;">
                    Now that broombids are in the "air" our work does not stop. On the contrary, we continue to improve our platform for the common good.
                </p>
                <p class="description wow pixFadeUp" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: i;">
                    We are not afraid of the hard work or the difficulties we face in order to make this dream come true for us and all of you, our customers and partners.
                </p>
            </div>
            
        </div>
    </div>
</section>

<?php $this->end();?>

