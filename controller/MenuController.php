<?php
namespace Alaska_Controller;

class MenuController
{
    // ---- MENU Manager -----------------------------------------------------
    public function about($params)
    {
        $nxView = new \Alaska_Model\View ('about');
        $nxView->getView();
    }

    public function home($params)
    {
		$chapterManager = new \Alaska_Model\ChapterManager; 
	    $chapters = $chapterManager->twoChapters();

        $nxView = new \Alaska_Model\View ('home');
        $nxView->getView(array ('chapters' => $chapters));
    }

    public function chapters($params)
    {
        $chapterManager = new \Alaska_Model\ChapterManager; 
        $chapters = $chapterManager->getChapters(); 

        $nxView = new \Alaska_Model\View ('book/chapters');
        $nxView->getView(array ('chapters' => $chapters)); // creat datas to View
    }

    public function contact($params)
    {
        $nxView = new \Alaska_Model\View ('contact');
        $nxView->getView();
    }

    public function inscription($params)
    {
        $nxView = new \Alaska_Model\View ('user/inscription');
        $nxView->getView();
    }

    public function admin($params)
    {
        $chapterManager = new \Alaska_Model\ChapterManager; 
        $chapters = $chapterManager->adminChapters();

        $signalManager = new \Alaska_Model\SignalManager; 
        $comments = $signalManager->getSignals();    
        
        $nxView = new \Alaska_Model\View ('admin/admin');
        $nxView->getView(array (
            'chapters' => $chapters,
            'comments'=> $comments));
    }

    public function login($params)
    {   
        $nxView = new \Alaska_Model\View ('user/login');
        $nxView->getView();
    }

    public function logout($params)
    {
        // Déconnexion Espace membre
        unset($_SESSION['user']); 
        unset($_SESSION['role']);

        $nxView = new \Alaska_Model\View();
        $nxView->redirect('home');
    }

    public function page404($params)
    {
        $nxView = new \Alaska_Model\View ('page404');
        $nxView->getView();
    }
}
