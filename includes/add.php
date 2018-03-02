<?php 
	include_once('m/function.php');
	if (!empty($_POST)) {
		if(slide_add($_POST['title'],$_POST['content'])){
			die('<h2>Thanks for Upload</h2>');
		}
			$title = $_POST['title'];
			$content = $_POST['content'];
			$error = true;
	}
	else {
		$title = '';
		$content = '';
		$error = false;
	}
?>


<div class="conci">
	<div class="conci__container">

		<?php if ($error): ?>
			<h2>ERROR</h2>
		<?php endif ?>

		<div class="conci-btn conci__addimage">Add Image</div>

		<div class="conci__img conci-hide"></div>

		<form method="post" action="">
			<label for="conci__imglink">Url:</label><br>
			<input id="conci__imglink" class="conci__imglink" type="text" name="title" value="<?=$title?>">
			<label for="conci__textarea">Description:</label><br>
			<textarea class="conci__textarea" id="conci__desc" name="content"><?=$content?></textarea>
			<input class="conci-btn" type="submit" value="Submit">
		</form>

	</div>
</div>