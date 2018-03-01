<?php 
	include_once('m/function.php');

	$id = (int)$_GET['id'];

	if($id == 0) {
		die('Error ID');
	}

	if (!empty($_POST)) {

		if(isset($_POST['save'])){
			if(slide_edit($id, $_POST['title'],$_POST['content'])){
				// redirect
			}
		}elseif(isset($_POST['delete'])){
			if(slide_delete($id)){
				// redirect
			}
		}


			$title = $_POST['title'];
			$content = $_POST['content'];
			$error = true;
	}
	else {
		$slide_item = slide_get($id);
		// var_dump($slide_item);
		$title = $slide_item['name'];
		$content = $slide_item['text'];
		$error = false;
	}
?>

<p>Edit</p>
<?php if ($error): ?>
	<p>ERROR ERROR ERROR</p>
<?php endif ?>

<form method="post" action="">
	<input type="text" name="title" value="<?=$title?>"><br>
	<textarea name="content"><?=$content?></textarea><br>
	<input type="submit" name="save" value="Save">
	<input type="submit" name="delete" value="Delete">
</form>