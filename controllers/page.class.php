<?
class Page extends Controller {

	protected $title;
	protected $content;	
	protected $fileName;
	protected $templName;

	function __construct()
	{		
		$this->title = Config::get('site_title');
		$this->content = '';
		$this->fileName = Config::get('path_templates');
		$this->templName ='';
	}

	protected function render($twig) {
		$template = $twig->loadTemplate($this->templName);
		$page = $template->render(array('title' => $this->title, 'content' => $this->content));
		print_r($page);
	}


	/*protected function render1() {
		$vars = array('title' => $this->title, 'content' => $this->content);
		$page = $this->Template($this->fileName, $vars);				
		echo $page;
	}*/

	public function Index($twig) {
		$this->content = Main::getPostcontent();
		$this->templName = 'main.tmpl';
		$this->render($twig);		
	}

	public function Shop($twig) {
		$this->content = Goods::getGoods();
		$this->templName = 'shop.tmpl';
		$this->render($twig);
	}

	public function Product($id, $twig) {
		$this->content = Goods::getItem($id);
		$this->templName = 'product.tmpl';
		$this->render($twig);
	}

	public function Login($twig) {
		$user = new UserController;
		$this->content = $user->control();
		$this->templName = 'login.tmpl';
		$this->render($twig);
	}

	public function Profile($twig) {
		$user = new UserController;
		$this->content = $user->control();
		$this->templName = 'profile.tmpl';
		$this->render($twig);
	}

	public function Cart($twig) {
		$user_id = Cart::getUserid();
		$cart_goods = Cart::getCart($user_id);
		$cart = new CartController;
		$summ = $cart->getSumm($cart_goods);
		$message = $cart->control($user_id, $cart_goods);
		$this->content = ['cart_goods' => $cart_goods, 'user' => $user_id, 'summ' => $summ, 'message' => $message];
		$this->templName = 'cart.tmpl';
		$this->render($twig);
	}
	

}

