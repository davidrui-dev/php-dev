<?php $this->setSiteTitle('Third Tools'); ?>

<?php $this->start('body');

?>
<style type="text/css">
	.Counter_cp
	{
		width: 90%;
		float: left;
		padding: 10px 5%;
		margin-top: 70px;
		background: #000033;
		border-radius: 10px;
	}
	.Counter_cp h1
	{
		color: #fff;
		text-align: center;
	}
</style>
<div class="Counter_cp">
	<h1></h1>
</div>
<script type="text/javascript">
	socket.on('OnlineCounter', function (data) 
	{
		// if(data > 0)
		// {
			$(".Counter_cp h1").html(data);
			//}
		
	});
</script>
<?php

//echo 'encode: '.EnCode('');
$this->end(); ?>