<?php
namespace Alaska;
/**
 * Class Router
 *
 * Créer les routes 
 * Trouver les controlleurs
 */

class Router {

	private $request_url;
	// private $routes = [ 

		// 	// WEB SITE ---------------------------------------------------------
		// 	"home.php" => ['controller'=> 'webSiteController', 'method'=>'home' ],
		// 	"about.php" => ['controller'=> 'webSiteController', 'method'=>'about' ],
		// 	"contact.php" => ['controller'=> 'webSiteController', 'method'=>'contact' ],

		// 	// BOOK ------------------------------------------------------------------
		// 	"chapters.php" => ['controller'=> 'bookController', 'method'=>'chapters' ],
		// 	"chapter.php" => ['controller'=> 'bookController', 'method'=>'chapter' ],

		// 	// ADMIN => userController ----------------------------------------------------
		// 	"inscription.php" => ['controller'=> 'userController', 'method'=>'inscription'],
		// 	"login.php" => ['controller'=> 'userController', 'method'=>'login'],
		// 	"logout.php" => ['controller'=> 'userController', 'method'=>'logout']
	// ];

	public function __constructor($request_url)
	{  
		$this->request_url = $request_url;
	}

	public function getRouter()
	{

		$request_url = 
echo $this->request_url;

echo '<pre>';
var_dump($this->request_url);
echo '</pre>';
exit();

		// if($this->request_url=='home')
		// {
		// 	echo 'Home';
		// }
		// else
		// {
		// 	echo '404';
		// }
	}

/* =================== */
		// $request_url = $this->request_url;

		// if (key_exists($request_url, $this->routes))
		// {
		// 	$controller = $this->routes[$request_url]['controller'];
		// 	$method		= $this->routes[$request_url] ['method'];

		// 	$currentController = new $controller();
		// 	$currentController->$method();
		// }
		// else
		// {
		// 	echo '404';
		// }


/* =================== */
		// try
		// {
		//     switch ($_GET['action'])
		//     {
		//     	// WEB SITE ---------------------------------------------
		//     	case 'home':$webSiteController->home();break;
		//         case 'about':$webSiteController->about();break;
		//         case 'contact':$webSiteController->contact();break;
		//         case 'contact':$webSiteController->contact();break;

		//         // ADMIN ------------------------------------------------



 	// 			// BOOK -------------------------------------------------
		//         case 'chapters':$bookController->chapters();break;
		//         case 'chapter':
		//             if (isset($_GET['chapter_id']) && $_GET['chapter_id'] > 0) {
		//                 $bookController->chapter();
		//             } else {
		//                 throw new Exception('Aucun identifiant de chapitre envoyé');
		//             }
		//         break;


		//         // DEFAUT -----------------------------------------------
		//         case 'page404':$webSiteController->page404();break;
		//         default :$webSiteController->home();break;
		//     }
		// }
		// catch(Exception $e)
		// {
		//     echo 'Erreur : ' . $e->getMessage();
		// }
}