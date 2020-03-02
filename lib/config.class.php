<?

class Config {

	private static $configCache = [];

	public static function get($param) {
		if(!isset(self::getConfig()[$param])) {
			throw new Exception('Parameter ' . $param . ' does not exist');
		}
		return self::getConfig()[$param];
	}

	private static function getConfig() {
		if(empty(self::$configCache)) {
			$configFile = dirname(__DIR__,1).'/config/config.php';
			if(is_file($configFile)) {
				require_once $configFile;
			} else {
				throw new Exception('Unable to find configuration file');
			}
			if(!isset($config) || !is_array($config)) {
				throw new Exception('Unable to load configuration');
			}
			self::$configCache = $config;
		}
		return self::$configCache;
	}
}
