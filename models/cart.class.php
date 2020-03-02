 <?

class Cart {

	public static function getCart($user_id) {
		$goods = db::getInstance()->Select(
			"SELECT*FROM temp_orders 
			LEFT JOIN goods 
			ON temp_orders.good_id = goods.id
			WHERE temp_orders.user_id = '$user_id'"
		);
		return $goods;
	}

	public static function getCartitem($id, $user_id) {
		$result = db::getInstance()->selectOne("SELECT*FROM temp_orders WHERE good_id= :id AND user_id = :user_id", ['id' => $id, 'user_id' => $user_id]);
		if(!$result)
			return false;
		return $result;
	}

	public static function editOrder($quantity, $id, $user_id) {
		$result = db::getInstance()->Query("UPDATE temp_orders SET quantity = $quantity WHERE good_id = :id AND user_id=:user_id", ['id'=> $id, 'user_id' => $user_id])->rowCount();
		if(!$result)
			return false;
		return true;
	}

	public static function deleteItem($table, $cart_id) {
		$result = db::getInstance()->Query("DELETE FROM $table WHERE cart_id=:cart_id", ['cart_id'=>$cart_id])->rowCount();
		if(!$result)
			return false;
		return true;
	}

// addItem($user_id, $good_id, $quantity, $price)
	public static function addItem($args) {
		$values = [];
		foreach ($args as $arg) {
			if($arg == 'null') {
				$values[] = 'null';
			} else {
				$values[] = "'$arg'";
			}
		}
		$values_s = implode(',',$values);

		$result = db::getInstance()->Query("INSERT INTO temp_orders (user_id, good_id, quantity, price) VALUES ($values_s)")->rowCount();
		if(!$result)
			return false;
		return true;
	}


	public static function getUserid () {
		if (isset($_SESSION['login'])) {
			$user_id = $_SESSION['uid'];
		} else {
			$user_id = session_id();
		}
		return $user_id;
	}

	
}

