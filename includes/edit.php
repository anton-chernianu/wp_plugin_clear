<?php 
	include_once('m/function.php');

	$id = (int)$_GET['id'];

	if($id == 0) {
		die('Error ID');
	}

	if (!empty($_POST)) {

		if(isset($_POST['save'])){
			if(slide_edit($id, $_POST['title'],$_POST['content'])){
				die('<h2>Thanks for Edit</h2>');
			}
		}elseif(isset($_POST['delete'])){
			if(slide_delete($id)){
				die('<h2>You Item Delete</h2>');
			}
		}


			$title = $_POST['title'];
			$content = $_POST['content'];
			$error = true;
	}
	else {
		$slide_item = slide_get($id);
		// var_dump($slide_item);
		$title = $slide_item['img'];
		$content = $slide_item['text'];
		$error = false;
	}
?>

<div class="conci">
	<div class="conci__container">
		<?php if ($error): ?>
			<p>ERROR ERROR ERROR</p>
		<?php endif ?>
		<h2 class="conci__title">Edit Item</h2>
		<div class="conci-btn conci__addimage">Add Image</div>
		<div class="conci__img" style="background-image:url('<?=$title?>');"></div>

		<form method="post" action="">
			<label for="conci__imglink">Url:</label><br>
			<input id="conci__imglink" class="conci__imglink" type="text" name="title" value="<?=$title?>">
			<label for="conci__textarea">Description:</label><br>
			<textarea class="conci__textarea" id="conci__desc" name="content"><?=$content?></textarea>
			<input type="submit" class="conci-btn conci-btn--small" name="save" value="Save">
			<input type="submit" class="conci-btn conci-btn--small" name="delete" value="Delete">
		</form>

	</div>
</div>