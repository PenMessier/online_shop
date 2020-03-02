<?

class CartController {

	public $action;
	public $message;
	public $user_id; //= Cart::getUserid();
	public $cart_goods; //= Cart::getCart($user_id);

	protected function getAction() {
		$action = '';
		if (isset($_POST)) {
			foreach ($_POST as $key => $value) {
				if($key == 'buy_id') {
					$action = 'buy';
					break;
				}
				if($key == 'remove_id') {
					$action = 'remove';
					break;
				}
				if($key == 'cart_minus') {
					$action = 'decrease';
					break;
				}
				if($key == 'cart_plus') {
					$action = 'add';
					break;
				}
			}
		}
		if (isset($_GET['action'])){
			if($_GET['action'] == 'order') {
				$action = 'order';
			}
			
		} 

		return $action;
	}

	public function getSumm($cart_goods) {
		$summ = 0; 
		foreach ($cart_goods as $good) {
			$summ +=  $good['full_price'];
		}
		return $summ;
	} 

	public function control($user_id,$cart_goods) {
		$act = $this->getAction();
		$message = '';

		switch ($act) {

			case 'buy':
				$id = (int)$_POST['buy_id'];
				$cart_good = Cart::getCartitem($id, $user_id);
				if($cart_good){
					$quantity = $cart_good['quantity']+1;
					Cart::editOrder($quantity, $id, $user_id);
					//Logger::writeLog("item in cart");
				} else {
					$quantity = 1;
					$price = (int)$_POST['good_price'];
					Cart::addItem([$user_id, $id, $quantity, $price]);
					//Logger::writeLog("item added");
				}
			break;

			case 'remove':
				$id = (int)$_POST['cartgood_id'];
				if(Cart::getCartitem($id, $user_id)) {
					$cart_id = $_POST['remove_id'];
					Cart::deleteItem('temp_orders', $cart_id);
				}
			break;

			case 'decrease':
				$id = (int)$_POST['cart_minus'];
				$quantity = (int)$_POST['quantity'];
				if (Cart::getCartitem($id, $user_id)) {
					Cart::editOrder($quantity, $id, $user_id);
				}
			break;

			case 'add':
				$id = (int)$_POST['cart_plus'];
				$quantity = (int)$_POST['quantity'];
				if (Cart::getCartitem($id, $user_id)) {
					Cart::editOrder($quantity, $id, $user_id);
				}
			break;

			case 'order':
				$date = new DateTime('NOW');
				$date->setTimezone(new DateTimeZone('Europe/Moscow'));
				$date_reg = $date->getTimeStamp();
				$order_status = 'Active';
				$summ = $this->getSumm($cart_goods);
				$message = Order::createOrder($user_id, $date_reg, $summ, $order_status, $cart_goods);
			break;
		}

		return $message;
	}

}
