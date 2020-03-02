<?

class User {

	protected $name, $login, $pass;

	// Проверяем, есть зарегестрированный пользователь с таким логином
	private function checkUser ($login) {
		$num = db::getInstance()->Query("SELECT * FROM users WHERE login='$login'")->rowCount();
		if(!$num)
			return false;
		return true;
		
	}

	// Добавляем пользователя
	// addUser ($uname, $login, $pass)
	private function addUser ($args) {
		$values = [];
		foreach ($args as $arg) {
			if($arg == 'null') {
				$values[] = 'null';
			} else {
				$values[] = "'$arg'";
			}
		}
		$values_s = implode(',',$values);
		$result = db::getInstance()->Query("INSERT INTO users (uname, login, password) VALUES ($values_s)")->rowCount();
		if(!$result)
			return false;
		return true;
	}

	// Находим пользователя по логину и паролю
	private function getUser ($login, $pass) {
		$sql = "SELECT*FROM users WHERE login = :login AND password = :pass";
		$result = db::getInstance()->selectOne($sql,['login'=>$login, 'pass' => $pass]);
		if(!$result)
			return false;
		return $result;
	}

	// Функция входа пользователя на сайт
	public static function login($l, $p) {
		$login = trim(strip_tags($l));
		$pass = md5(trim(strip_tags($p))).SALT;
		if(self::checkUser($login) == true) {
			$user  = self::getUser($login, $pass);
			if($user == false) {
				$message = "Incorrect password. Try again.";
			} else {
				$_SESSION['uname'] = $user['uname'];
				$_SESSION['uid'] = $user['id'];
				$_SESSION['login'] = $login;
		        $_SESSION['password'] = $pass;
		        $message = $user['uname'];
		        header("Refresh:0; url=index.php?page=profile");
			}
		} else {
			$message = "The login you entered may not be correct. Try again.";
		}
		return $message;
	}

	// Функция регистрации нового пользователя
	public static function regUser($name, $l, $p) {
		if (filter_var($l, FILTER_VALIDATE_EMAIL)) {
			$login = trim(strip_tags($l));

			if(self::checkUser($login) == false) {
			    $pass = md5(trim(strip_tags($p))).SALT;
				$uname = trim(strip_tags($name));
				$user = self::addUser([$uname, $login, $pass]);
				if ($user == true) {
					$message = "You are successfully registered!";
				} else {
					$message = "Sorry..Try again later.";
				}	
			} else {
				$message = "This login already exists!"; 
			}
		 } else {
	    	$message = "Invalid login";
	    }
		return $message;
	}

	// Функция выхода из аккаунта
	public static function logout() {
			unset($_SESSION['login']);
		    unset($_SESSION['password']);
		    unset($_SESSION['uid']);
		    session_destroy();
		    header("Refresh:0; url=index.php?page=login");
		    return "Bye";
	}

}





