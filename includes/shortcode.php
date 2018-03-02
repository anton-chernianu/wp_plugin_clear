<?php 
	include_once('m/function.php');
	$slide_all = slide_all();
	// var_dump($slide_all);
 ?>

<div class="conci-slider">
 <?php foreach ($slide_all as $value): ?>
	<div class="conci-slider__item" style="
		background-image:url('<?=$value['img']?>');
	">
	<div class="conci-slider__desc"><?=$value['text']?></div>
	</div>
 <?php endforeach ?>
</div>

 <script>
var slider = tns({
	container: '.conci-slider',
	items: 1,
	controls: false,
	nav: false,
	autoplayButtonOutput: false,
	autoplay: true
});
 </script>