<?
class Order {

	public static function createOrder($user_id, $date_reg, $order_price, $order_status, $cart_goods) {
		
		$info = db::getInstance()->Query("INSERT INTO order_info (user_id, date_reg, order_price, order_status) VALUES (:user_id, :date_reg, :order_price, :order_status)", [':user_id' => $user_id, ':date_reg' => $date_reg, ':order_price' => $order_price, ':order_status' => $order_status])->rowCount();
		if (!$info) {
			$message = "Wrong info";
		} else {
			$sql = db::getInstance()->selectOne("SELECT order_id FROM order_info WHERE user_id = :user_id", ['user_id'=>$user_id]);
			$order_id = (int)$sql['order_id'];
			if (!$order_id) {
				$message = "Wrong order id";
			} else {
				foreach ($cart_goods as $good):
					$good_id = $good['id'];
					$quantity = $good['quantity'];
					db::getInstance()->Query("INSERT INTO order_goods (order_id, good_id, quantity) VALUES ($order_id, $good_id, $quantity)");
					db::getInstance()->Query("DELETE FROM temp_orders WHERE user_id = $user_id");
				endforeach;
				$message = "Your order has been sent";
			}
		}
		header("Refresh:0; url=index.php?page=cart");
		return $message;
	}

	public static function getOrders() {

		$sql = "SELECT i.order_id, i.date_reg, i.date_complete, i.order_price, i.order_status, u.login 
				FROM order_info i
				INNER JOIN users u ON i.user_id = u.id";

		$orders = db::getInstance()->Select($sql);

		return $orders;
	}

	public static function getOrdergoods($order_id) {
		$sql = "SELECT g.quantity, goods.name, goods.price, goods.picture, goods.id 
				FROM order_goods g
				INNER JOIN goods ON g.good_id = goods.id
				WHERE g.order_id = $order_id";

		$goods = db::getInstance()->Select($sql);

		return $goods;
	}


	public static function editOrder($order_id, $date_complete, $order_status) {
		$result =  db::getInstance()->Query(
			"UPDATE order_info
			 SET date_complete = :date_complete, order_status = :order_status 
			 WHERE order_id = :order_id", 
			 ['date_complete' => $date_complete, 'order_status' => $order_status, 
			 'order_id' => $order_id] 
		)->rowCount();
		if(!$result) 
			return false;
		return true;
	}
}









