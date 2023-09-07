<?php
$newUser=new Users();
?>
<?php $this->start('head');?>
<?php $this->setSiteTitle('Home Page');?>

<?php $this->end();?>

<?php $this->start('body');?>
<!-- Breadcrumb Section Start -->
<div class="breadcrumb-section section bg_color--5 pt-60 pt-sm-50 pt-xs-40 pb-60 pb-sm-50 pb-xs-40">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="page-breadcrumb-content">
                    <ul class="page-breadcrumb">
                        <li><a href="<?=PROOT?>">Home</a></li>
                        <li>Vendors</li>
                    </ul>
                    <h1>Vendors</h1>
                </div>
            </div>
        </div>
    </div>
</div>



<?php $this->end();?>

