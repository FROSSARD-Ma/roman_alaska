<?php
namespace Alaska_Controller;

class UserController
{

	public function admin()
	{
		$chapterManager = new \Alaska_Model\ChapterManager; 
		$chapters = $chapterManager->adminChapters(); 

		$countComments = new \Alaska_Model\CommentManager;
		$count = $countComments->countComments();
		
        $nxView = new \Alaska_Model\View ('admin/admin');
        $nxView->getView(
        	array (
	        	'chapters' => $chapters, 
	        	'count'=> $count)
	    	); 
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

	    // $nxView = new \Alaska_Model\View ();
     // 	$nxView->redirect('home');
	}


	public function logout()
	{
        $nxView = new \Alaska_Model\View ('user/logout');
        $nxView->getView();
	}


}
