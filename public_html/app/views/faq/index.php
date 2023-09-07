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
            <h1 class="page-title">Frequently Asked Questions</h1>
            <ul class="bradcurmed">
                <li><a href="<?=PROOT?>" rel="noopener noreferrer">Home</a></li>
                <li>FAQ</li>
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

<section class="faq-section">
<div class="container">
  <div class="row">                   
    <div class="col-md-12">
        <div class="faq" id="accordion">
        <?php 
        $newUser=new Users();
        $faqs = $newUser->FindCarType('faq','User');
        if($faqs)
        {
            $n=0;
            foreach ($faqs as $faq) 
            { $n++;?>
            <div class="card">
                <div class="card-header" id="faqHeading-<?php echo $n; ?>">
                    <div class="mb-0">
                        <h5 class="faq-title" data-toggle="collapse" data-target="#faqCollapse-<?php echo $n; ?>" data-aria-expanded="true" data-aria-controls="faqCollapse-<?php echo $n; ?>">
                            <span class="badge"><?php echo $n; ?></span><?php echo $faq->question; ?>
                        </h5>
                    </div>
                </div>
                <div id="faqCollapse-<?php echo $n; ?>" class="collapse" aria-labelledby="faqHeading-<?php echo $n; ?>" data-parent="#accordion">
                    <div class="card-body">
                        <p><?php echo $faq->answer; ?></p>
                    </div>
                </div>
            </div>
            <?php } } ?>
        </div>
    </div>
  </div>
</div>
</section>

<section class="faq-section">
<div class="container">
  <div class="row">                   
    <div class="col-md-12">
        <div class="faq" id="accordion">
        <?php 
        $newUser=new Users();
        $faqs = $newUser->FindCarType('faq','Vendor');
        if($faqs)
        {
            $n=0;
            foreach ($faqs as $faq) 
            { $n++;?>
            <div class="card">
                <div class="card-header" id="faqHeading-<?php echo $n; ?>1">
                    <div class="mb-0">
                        <h5 class="faq-title" data-toggle="collapse" data-target="#faqCollapse-<?php echo $n; ?>1" data-aria-expanded="true" data-aria-controls="faqCollapse-<?php echo $n; ?>1">
                            <span class="badge"><?php echo $n; ?></span><?php echo $faq->question; ?>
                        </h5>
                    </div>
                </div>
                <div id="faqCollapse-<?php echo $n; ?>1" class="collapse" aria-labelledby="faqHeading-<?php echo $n; ?>1" data-parent="#accordion">
                    <div class="card-body">
                        <p><?php echo $faq->answer; ?></p>
                    </div>
                </div>
            </div>
            <?php } } ?>
        </div>
    </div>
  </div>
</div>
</section>


<?php $this->end();?>

