<?php
namespace Alaska_Model;

class Router {

	private $_page;
	private $routes = [ 

		// WEB SITE ---------------------------------------------------------
		"home" => ['controller'=> '\Alaska_Controller\WebsiteController', 'method'=>'home' ],
		"about" => ['controller'=> '\Alaska_Controller\WebsiteController', 'method'=>'about' ],
		"contact" => ['controller'=> '\Alaska_Controller\WebsiteController', 'method'=>'contact' ],

		// BOOK ------------------------------------------------------------------
		"chapters" => ['controller'=> '\Alaska_Controller\BookController', 'method'=>'chapters' ],
		"chapter" => ['controller'=> '\Alaska_Controller\BookController', 'method'=>'chapter' ],

		// ADMIN => UserController ----------------------------------------------------
		"inscription" => ['controller'=> '\Alaska_Controller\UserController', 'method'=>'inscription'],
		"login" => ['controller'=> '\Alaska_Controller\UserController', 'method'=>'login'],
		"logout" => ['controller'=> '\Alaska_Controller\UserController', 'method'=>'logout']
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
			echo '404';
		}


	}

}