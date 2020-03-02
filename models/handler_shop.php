<?
include_once "../config/config.php";
include_once "../lib/db.class.php";
include_once "goods.class.php";

if($_POST) {
	$i = $_POST['start'];
	$max = $i + 8;
	$goods = Goods::getGoods();

	for ($i; $i <= $max; $i++) : ?>
		<div class="item" data-id=<?=$goods[$i]['id'];?> 
			style="background-image:url(images/<?=$goods[$i]['picture'];?>)">
			<a href="index.php?page=product&id=<?=$goods[$i]['id'];?>" class="tea-more">
				<h3 class="tea-name"><?=$goods[$i]['name'];?></h3>
				<div class="overlay">
					<p class="tea-desc">
						<?=$goods[$i]['desc-short'];?>
					</p>
					<p>Price: <span class="price"><?=$goods[$i]['price'];?></span>$/oz.</p>
					<a href="javascript:void(0)" 
						class="trigger buyme" 
						id="<?=$goods[$i]['id'];?>">
						Buy
					</a>
				</div>
			</a>
		</div>
	<? endfor; 
}
