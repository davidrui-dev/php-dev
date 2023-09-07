<?php $this->start('head');?>
<?php $this->setSiteTitle('Home Page');?>

<?php $this->end();?>

<?php $this->start('body');?>

<?php require_once(ROOT .DS. 'app' .DS. 'views' .DS. 'Pages' .DS. 'Dashboard.php'); ?>

<?php $this->end();?>