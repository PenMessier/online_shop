<?
class db {

	public static $values_s;
	private $db;

	private static $instance = null;

	public static function getInstance(){
		if(self::$instance == null){
			self::$instance = new db();
		}
		return self::$instance;
	}


	private function __construct() {}
  private function __sleep() {}
  private function __wakeup() {}
  private function __clone() {}
	
	public function Connect(){
		$connectString = 'mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=UTF8';

		$this->db = new PDO($connectString,DB_USER,DB_PASS,
			[
				PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // возвращать ассоциативные массивы
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // возвращать Exception в случае ошибки
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
			]
		);
		return $this->db;
	}
		

	public function Query($query,$params = array()) {
		$res = $this->Connect()->prepare($query);
		$res->execute($params);
		return $res;		
	}
	
	public function Select($query,$params = array()){
		$result = $this->Query($query,$params);
		if($result) {
			return $result->fetchAll();
		}
		return false;
	}
	public function selectOne($query,$params = array()){
		$result = $this->Query($query,$params);
		if($result) {
			return $result->fetch();
		}
		return false;
	}

}

?>
