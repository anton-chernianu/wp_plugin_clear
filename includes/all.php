<div class="conci">
	<div class="conci__container">
		<a class="conci-btn" href="<?=$_SERVER['PHP_SELF']?>?page=conci_slideshow_page&c=add">Add New Item</a>

		<?php 
			include_once('m/function.php');
			$slide_all = slide_all();
		?>
		<h2 class="conci__title">Image List</h2>
		<p>Use this ShortCode: <input type="text" value="[conci-slideshow]"></p>
		<ul class="conci__list">
		<?php foreach ($slide_all as $value): ?>
			<li class="conci__item">
				<a class="conci__item-link" href="<?=$_SERVER['PHP_SELF']?>?page=conci_slideshow_page&c=edit&id=<?=$value['id_conci']?>">
					<div style="background-image: url('<?=$value['img']?>');" class="conci__img"></div>
					<div class="conci__desc">
						<?=$value['text']?>
					</div>
				</a>
			</li>
		<?php endforeach ?>
		</ul>
	</div>
</div>