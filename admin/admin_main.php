<div class="cat-wrap">
	<? 
	$goods = Goods::getGoods();
	$i=0;
	$max = $i + 8;

	if ($goods) {
		for ($i; $i <= $max; $i++) : ?>
			<div class="item item-<?=$goods[$i]['id'];?>" 
				style="background-image:url(../public/images/<?=$goods[$i]['picture'];?>)">
				<a href="index.php?page=product&id=<?=$goods[$i]['id'];?>" class="tea-more">
					<h3 class="tea-name"><?=$goods[$i]['name'];?></h3>
				</a>
				<a href="index.php?page=edit&id=<?=$goods[$i]['id'];?>" class="trigger">Edit</a>
				<a href="delete_goods.php?id=<?=$goods[$i]['id'];?>" class="trigger">Delete</a>
			</div>
		<? endfor; 
	}
	?>
</div>
<input type="submit" id="load-more-trigger" value="Load more">