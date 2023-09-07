<?php
$amount=25;
if($amount >= 25 && $amount < 50){
	$count_wid=1;
}else if($amount >= 50 && $amount < 100){
	$count_wid=2;
}else if($amount >= 100 && $amount < 200){
	$count_wid=3;
}else if($amount >= 200 && $amount < 500){
	$count_wid=4;
}else if($amount >= 500 && $amount < 1000){
	$count_wid=5;
}else{
	$count_wid=6;
}

echo '<h1>'.$count_wid.'</h1>';
?>
