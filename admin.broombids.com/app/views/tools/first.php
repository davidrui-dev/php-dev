<?php $this->setSiteTitle('First Tools'); ?>

<?php $this->start('body'); ?>
<h1 class="text-center red"> This is the FIRST Tools  Page.</h1>

<?php
// $a= '[{ "2":
//     {
//         "Name": "Prakash",
//         "age": "26"
//     }
// },{ "1":
//     {
//         "Name": "Huma",
//         "age": "50"
//     }
// }]';

// $c='[{"2":{"userId":"2","thumbnail":"/thumbnail_869b1548848013c3a5.jpg","utype":"NI","connectTime":"2019-02-01T08:08:03.861Z","socketId":"DjGgLc_5P1jK4-hOAAAM"},"3":{"userId":"3","thumbnail":"/images/default_avatar.png","utype":"NI","connectTime":"2019-02-01T08:08:17.541Z","socketId":"Zxd5lUO2Kx2KfCOAAAAO"},"16":{"userId":"16","thumbnail":"/thumbnail_3fae15485256417060.jpg","utype":"NI","connectTime":"2019-02-01T08:08:07.022Z","socketId":"6-MgZHLTRUl2oTtVAAAN"},"29":{"userId":"29","thumbnail":"/images/default_avatar.png","utype":"NI","connectTime":"2019-02-01T08:08:54.375Z","socketId":"bVLDsciVMuRBqJwgAAAR"}}]';

// echo $a;
// $b=json_decode($a);

// $d=json_decode($c);
// echo '<pre>';
// print_r($d);

$str="Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Why do we use it?It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of ";
	echo strlen($str);

	?>

<?php $this->end(); ?>