<a href="<?=$_SERVER['PHP_SELF']?>?page=conci_slideshow_page&c=add">ADD Image</a>

<?php 
	include_once('m/function.php');
	$slide_all = slide_all();
?>
<ul>
<?php foreach ($slide_all as $value): ?>
	<li>
		<a href="<?=$_SERVER['PHP_SELF']?>?page=conci_slideshow_page&c=edit&id=<?=$value['id_conci']?>"><?=$value['name']?></a>
	</li>
<?php endforeach ?>
</ul>