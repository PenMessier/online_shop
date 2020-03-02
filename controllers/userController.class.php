
<?

class UserController {

	public $login;
	public $pass;
	public $uname;
	public $action;


	public function getAction() {
		$action = '';
		if(isset($_GET['action']) && $_GET['action'] == 'logout') {
			$action = 'logout';
		}
		if(isset($_POST)) {
			foreach ($_POST as $key => $value) {
				if($key == 'enter') {
					$action = 'enter';
					break;
				}
				if($key == 'submit') {
					$action = 'submit';
					break;
				}
			}
		}
		return $action;
	}

	public function control() {

		$act = $this->getAction();
		$message = '';

		switch ($act) {

			case 'enter':
				$login = $_POST['login'];
				$pass = $_POST['pass'];
				$message = User::login($login, $pass);
			break;

			case 'submit':
				$login = $_POST['login'];
				$pass = $_POST['pass'];
				$uname = $_POST['uname'];
				$message = User::regUser($uname, $login, $pass);
			break;

			case 'logout':
				$message = User::logout();
			break;

			default:
			break;
		}
		return $message;
	}

}



