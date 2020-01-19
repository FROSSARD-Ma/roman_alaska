<?php
namespace Alaska_Model;

class Router {

	private $_page;
	private $routes = [ 

		// ---- MENU Controller -----------------------------------------------------
		"about" 		=> ['controller'=> '\Alaska_Controller\MenuController', 'method'=>'about'],
		"home" 			=> ['controller'=> '\Alaska_Controller\MenuController', 'method'=>'home'],
		"chapters" 		=> ['controller'=> '\Alaska_Controller\MenuController', 'method'=>'chapters' ],
		"contact" 		=> ['controller'=> '\Alaska_Controller\MenuController', 'method'=>'contact'],
		"inscription" 	=> ['controller'=> '\Alaska_Controller\MenuController', 'method'=>'inscription'],
		"admin" 		=> ['controller'=> '\Alaska_Controller\MenuController', 'method'=>'admin'],
		"login" 		=> ['controller'=> '\Alaska_Controller\MenuController', 'method'=>'login'],
		"logout" 		=> ['controller'=> '\Alaska_Controller\MenuController', 'method'=>'logout'],
		"page404" 		=> ['controller'=> '\Alaska_Controller\MenuController', 'method'=>'page404'],

		// ---- USER Controller -----------------------------------------------------
		"creatUser" 	=> ['controller'=> '\Alaska_Controller\UserController', 'method'=>'creatUser'],
		"users" 		=> ['controller'=> '\Alaska_Controller\UserController', 'method'=>'users'],
		"loginUser" 	=> ['controller'=> '\Alaska_Controller\UserController', 'method'=>'loginUser'],
		"nxPass" 		=> ['controller'=> '\Alaska_Controller\UserController', 'method'=>'nxPass'],
		"creatPass" 	=> ['controller'=> '\Alaska_Controller\UserController', 'method'=>'creatPass'],

		// ---- BOOK Controller -----------------------------------------------------
		"chapter" 		=> ['controller'=> '\Alaska_Controller\BookController', 'method'=>'chapter' ],
		"addChapter" 	=> ['controller'=> '\Alaska_Controller\UserController', 'method'=>'addChapter'],
		"updateChapter" => ['controller'=> '\Alaska_Controller\UserController', 'method'=>'updateChapter']
	];


	public function __construct($page)
	{
		$this->_page = $page;
	}

	public function getController()
	{
		$_page = $this->_page;

		if (key_exists($_page, $this->routes))
		{
			$controller = $this->routes[$_page]['controller'];
			$method		= $this->routes[$_page] ['method'];

			$currentController = new $controller();
			$currentController->$method();
		}
		else
		{
			$nxView = new \Alaska_Model\View ('page404');
        	$nxView->getView();
		}


	}

}