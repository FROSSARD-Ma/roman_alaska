<?php
namespace Alaska_Controller;

class MenuController
{
    // ---- MENU Manager -----------------------------------------------------
    public function about()
    {
        $nxView = new \Alaska_Model\View ('about');
        $nxView->getView();
    }

    public function home()
    {
		$chapterManager = new \Alaska_Model\ChapterManager; 
	    $chapters = $chapterManager->twoChapters();

        $nxView = new \Alaska_Model\View ('home');
        $nxView->getView(array ('chapters' => $chapters));
    }

    public function chapters()
    {
        $chapterManager = new \Alaska_Model\ChapterManager; 
        $chapters = $chapterManager->getChapters(); 

        $nxView = new \Alaska_Model\View ('book/chapters');
        $nxView->getView(array ('chapters' => $chapters)); // creat datas to View
    }

    public function contact()
    {
        $nxView = new \Alaska_Model\View ('contact');
        $nxView->getView();
    }

    public function inscription()
    {
        $nxView = new \Alaska_Model\View ('user/inscription');
        $nxView->getView();
    }

    public function admin()
    {
        $chapterManager = new \Alaska_Model\ChapterManager; 
        $chapters = $chapterManager->adminChapters(); 

        $nxView = new \Alaska_Model\View ('admin/admin');
        $nxView->getView(array ('chapters' => $chapters)); 
    }

    public function login()
    {   
        $nxView = new \Alaska_Model\View ('user/login');
        $nxView->getView();
    }

    public function logout()
    {
        // Déconnexion Espace membre
        unset($_SESSION['user']); 
        unset($_SESSION['role']);

        $nxView = new \Alaska_Model\View();
        $nxView->redirect('home');
    }

    public function page404()
    {
        $nxView = new \Alaska_Model\View ('page404');
        $nxView->getView();
    }
}
