<? 
session_start();
require_once '../autoload.php';

$controller = new Page();
if (!isset($_GET['page'])) {
	$controller->Index($twig);
} else {
	switch($_GET['page']){
	case 'shop':
		$controller->Shop($twig);
		break;
	case 'product':
		$id = (int)$_GET['id'];
		$controller->Product($id, $twig);
		break;
	case 'login':
		$controller->Login($twig);
		break;
	case 'cart':
		$controller->Cart($twig);
		break;
	case 'profile':
		$controller->Profile($twig);
		break;
	}
}
?>
