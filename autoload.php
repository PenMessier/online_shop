<?
require_once 'lib/Twig/Autoloader.php';
Twig_Autoloader::register();

$loader = new Twig_Loader_Filesystem('views');
$twig = new Twig_Environment($loader);
$twig->addGlobal('session', $_SESSION);
$twig->addGlobal('get', $_GET);


spl_autoload_register("autoload");

function autoload($className) {

	$dirs = ['controllers', 'models', 'lib'];

	$found = false;
	foreach($dirs as $dir) {
		$filename = __DIR__.'/'.$dir.'/'.$className.'.class.php';
		if(is_file($filename)) {
			require($filename);
			$found = true;
		}
	}
	if (!$found) {
        throw new Exception('Unable to load ' . $className);
    }
    return true;

}



