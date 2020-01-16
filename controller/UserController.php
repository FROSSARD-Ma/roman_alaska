<?php
namespace Alaska_Controller;

class UserController
{
	public function admin()
	{
		$chapterManager = new \Alaska_Model\ChapterManager; 
		$chapters = $chapterManager->adminChapters(); 

        $nxView = new \Alaska_Model\View ('admin/admin');
        $nxView->getView(array ('chapters' => $chapters)); 
		}

	public function addChapter()
	{
        $nxView = new \Alaska_Model\View ('admin/addChapter');
        $nxView->getView();
	}

	public function users()
	{
		$userManager = new \Alaska_Model\UserManager; 
		$chapters = $userManager->getUsers();

        $nxView = new \Alaska_Model\View ('admin/users');
        $nxView->getView(array ('users' => $users));
	}

	public function addUser()
	{
		$name 		= $_POST['name'];
		$firstname  = $_POST['firstname'];
		$pseudo     = $_POST['pseudo'];
		$email		= $_POST['email'];

		$userManager = new \Alaska_Model\UserManager; 
	    $user = $userManager->creatUser($name, $firstname, $pseudo, $email);

	    $nxView = new \Alaska_Model\View ('user/login');
     	$nxView->getView();
	}

	public function inscription()
	{
        $nxView = new \Alaska_Model\View ('user/inscription');
        $nxView->getView();
	}

	public function login()
	{	
        $nxView = new \Alaska_Model\View ('user/login');
        $nxView->getView();
	}

	public function loginUser()
	{
		$email	= $_POST['email'];
		$pass   = $_POST['pass'];

		$loginManager = new \Alaska_Model\UserManager; 
	    $user = $loginManager->login($email, $pass);

	    if ($_SESSION['message'])
	    {
	    	$nxView = new \Alaska_Model\View ('user/login');
        	$nxView->getView();
	    }
	    else 
	    {
			$chapterManager = new \Alaska_Model\ChapterManager; 
		    $chapters = $chapterManager->twoChapters();

	        $nxView = new \Alaska_Model\View ('home');
	        $nxView->getView(array ('chapters' => $chapters));
	    }
	}

	public function logout()
	{
		// Déconnexion Espace membre
		unset($_SESSION['user']); 
		unset($_SESSION['role']);

		// Affichage page HOME
        $chapterManager = new \Alaska_Model\ChapterManager; 
	    $chapters = $chapterManager->twoChapters();

        $nxView = new \Alaska_Model\View ('home');
        $nxView->getView(array ('chapters' => $chapters));
	}

	public function nxPass()
	{
		$nxView = new \Alaska_Model\View ('user/pass');
        $nxView->getView();
	}

	public function creatPass()
	{
		$email	= $_POST['email'];

		$loginManager = new \Alaska_Model\UserManager; 
	    $user = $loginManager->nxPass($email);

	    $nxView = new \Alaska_Model\View ('user/login');
        $nxView->getView();




	}
}
