<?
abstract class Controller {
	
	protected function Template($fileName, $vars=array()) {
		ob_start();
		include "$fileName";
		return ob_get_clean();	
	}
}