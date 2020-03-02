<?
class Logger {
	public static function writeLog ($message) {
		$string = date('Y-m-d H:i:s') . $message . "\n";
		file_put_contents(Config::get('path_logs').'/log.txt ', $string, FILE_APPEND);
		echo $message;
	}
}
