<?php
if($_GET['id']){
	$id = (int)($_GET['id']);
	$good = Goods::getItem($id);
	$message = '';
}
?>
<div class="page-container">
	<div class="cat-wrap">
		<form class="edit_form" method="post" action="../controllers/admin.php" enctype="multipart/form-data">
			<h2>Edit good</h2>
			<input type="hidden" name="edit_good" value="<?=$good['id'];?>">
			<h3>Good name:</h3>
			<input type="text" name="name" value="<?=$good['name'];?>">
			
			<div class="item" style="background-image:url(../public/images/<?=$good['picture'];?>)"></div>
			<h3>Upload new picture (.jpg, .png, .gif):</h3>
			<input type="file" name="img" accept="image/jpeg,image/png,image/gif" value="<?=$good['picture'];?>">

			<h3>Short description:</h3>
			<textarea type="text" name="desc-short"><?=$good['desc-short'];?></textarea>
			<h3>Description continue:</h3>
			<textarea type="text" name="desc-full"><?=$good['desc-full'];?></textarea>
			<h3>Price:</h3>
			<input type="number" name="price" value="<?=$good['price'];?>">
			<h3>Health benefits (optional):</h3>
			<input type="text" name="health" value="<?=$good['health'];?>">
			<h3>Taste (optional):</h3>
			<input type="text" name="taste" value="<?=$good['taste'];?>">
			<h3>Aroma (optional):</h3>
			<input type="text" name="aroma" value="<?=$good['aroma'];?>">
			<h3>Mouth (optional):</h3>
			<input type="text" name="mouth" value="<?=$good['mouth'];?>"><br>
			<input class="trigger" type="submit" name="submit" value="Submit">
			<span><?=$message;?></span>
		</form>
	</div>
</div>

