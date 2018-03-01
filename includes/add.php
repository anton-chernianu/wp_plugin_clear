<?php 

	include_once('m/function.php');

	if (!empty($_POST)) {
		if(slide_add($_POST['title'],$_POST['content'])){
			// redirect
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


<?php if ($error): ?>
	<p>ERROR ERROR ERROR</p>
<?php endif ?>

<form method="post" action="">
	<input class="conci__imglink" type="text" name="title" value="<?=$title?>"><br>
	<textarea name="content"><?=$content?></textarea><br>
	<input type="submit" value="Add Image">
</form>

<div class="conci__addimage">Add Image</div>
<!-- <img class="conci__image" src="" alt="Conci Image"> -->