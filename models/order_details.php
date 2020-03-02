<?
include_once "../config/config.php";
include_once "../lib/db.class.php";
include_once "order.class.php";

if(isset($_POST)) :
	$order_id = $_POST['order_details'];?>
	
	<h3>Order N <?=$order_id?></h3>
	
	<? 
	$goods = Order::getOrdergoods($order_id);
	foreach($goods as $good): ?>
		<div class="cart-item" id="<?=$good['id'];?>">
			
		<div class="cart-item-name"><a href="index.php?page=product&id=<?=$good['id'];?>"><?=$good['name'];?></a></div>
		<div class="cart-item-count">
			<input type="number" name="count" value="<?=$good['quantity'];?>" readonly>
		</div>
		<div class="cart-item-price"><span><?=$good['price'];?></span>$</div>
		</div>
	<? endforeach;

endif; ?>