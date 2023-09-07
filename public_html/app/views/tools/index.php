<?php $this->setSiteTitle('Tools Index'); ?>

<?php  $this->start('body'); ?>
<h1>Friend Suggetion</h1>

<?php
$new = new Newsfeeds();

$data = $new->getFriendSuggestions(31);
echo '<pre>';
print_r($data)

?>
<?php $this->end(); ?>