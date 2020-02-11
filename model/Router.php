<?php
namespace Alaska_Model;

class Router {

	private $_page;
	private $_routes = [ 

		// ---- FRONT Controller -----------------------------------------------------
		"about" 		=> ['controller'=> '\Alaska_Controller\FrontController', 'method'=>'about'],
		"home" 			=> ['controller'=> '\Alaska_Controller\FrontController', 'method'=>'home'],
		"chapters" 		=> ['controller'=> '\Alaska_Controller\FrontController', 'method'=>'chapters' ],
		"contact" 		=> ['controller'=> '\Alaska_Controller\FrontController', 'method'=>'contact'],
		"inscription" 	=> ['controller'=> '\Alaska_Controller\FrontController', 'method'=>'inscription'],
		"admin" 		=> ['controller'=> '\Alaska_Controller\FrontController', 'method'=>'admin'],
		"login" 		=> ['controller'=> '\Alaska_Controller\FrontController', 'method'=>'login'],
		"logout" 		=> ['controller'=> '\Alaska_Controller\FrontController', 'method'=>'logout'],
		"page404" 		=> ['controller'=> '\Alaska_Controller\FrontController', 'method'=>'page404'],
		"upComment" 	=> ['controller'=> '\Alaska_Controller\FrontController', 'method'=>'upComment'],
		"upChapter" 	=> ['controller'=> '\Alaska_Controller\FrontController', 'method'=>'upChapter'],

		// ---- USER Controller -----------------------------------------------------
		"creatUser" 	=> ['controller'=> '\Alaska_Controller\UserController', 'method'=>'creatUser'],
		"users" 		=> ['controller'=> '\Alaska_Controller\UserController', 'method'=>'users'],
		"loginUser" 	=> ['controller'=> '\Alaska_Controller\UserController', 'method'=>'loginUser'],
		"nxPass" 		=> ['controller'=> '\Alaska_Controller\UserController', 'method'=>'nxPass'],
		"creatPass" 	=> ['controller'=> '\Alaska_Controller\UserController', 'method'=>'creatPass'],

		// ---- BOOK Controller -----------------------------------------------------
		/* Contact */
		"creatContact" 	=> ['controller'=> '\Alaska_Controller\BookController', 'method'=>'creatContact'],

		/* Chapters */
		"chapter" 		=> ['controller'=> '\Alaska_Controller\BookController', 'method'=>'chapter'],
		"addChapter" 	=> ['controller'=> '\Alaska_Controller\BookController', 'method'=>'addChapter'],
		"creatChapter" 	=> ['controller'=> '\Alaska_Controller\BookController', 'method'=>'creatChapter'],
		"updateChapter" => ['controller'=> '\Alaska_Controller\BookController', 'method'=>'updateChapter'],
		"delChapter" 	=> ['controller'=> '\Alaska_Controller\BookController', 'method'=>'delChapter'],

		/* Comments */
		"creatComment" 	=> ['controller'=> '\Alaska_Controller\BookController', 'method'=>'creatComment'],
		"updateComment" => ['controller'=> '\Alaska_Controller\BookController', 'method'=>'updateComment'],
		"delComment" 	=> ['controller'=> '\Alaska_Controller\BookController', 'method'=>'delComment'],

		/* Signalements */
		"creatSignal" => ['controller'=> '\Alaska_Controller\BookController', 'method'=>'creatSignal'],
		"delSignal" => ['controller'=> '\Alaska_Controller\BookController', 'method'=>'delSignal']
	];


	public function __construct($page)
	{
		$this->_page = $page;
	}

	public function getRoute()
	{
		$elements = explode('/', $this->_page); // crée un chemin sous format tableau
		return $elements[0] ; // page = premier élément de la route
	}

	public function getParams()
	{	
		$elements = explode('/', $this->_page); // tableau
		// suppression du premier element (page) dans le tableau
		unset($elements[0]); 
		// récupère les PARAMS
		for ($i=1; $i<count($elements); $i++)
		{
			$params[$elements[$i]] = $elements[$i+1];
			$i++;
		}
		// si pas de PARAMS, instancier PARAMS à null
		if (!isset($params)) $params = null;

		return $params;
	}	

	public function getController()
	{
		$route = $this->getRoute();
		$params = $this->getParams();

		if(!empty($route))
		{
			if (key_exists($route, $this->_routes))
			{
				$controller = $this->_routes[$route]['controller'];
				$method		= $this->_routes[$route]['method'];

				$currentController = new $controller();
				$currentController->$method($params);
			}
			else
			{
				$nxView = new \Alaska_Model\View ('page404');
	        	$nxView->getView();
			}
		}
		else
		{
			// Redirection page accueil
			$nxView = new \Alaska_Model\View();
        	$nxView->redirect('home');
		}
	}

}