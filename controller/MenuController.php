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
        $countChaptersPublished = $chapterManager->countChapters('Publié');
        $_SESSION['countChapters'] = $countChaptersPublished;

        $nxView = new \Alaska_Model\View ('book/chapters');
        $nxView->getView(array ('chapters' => $chapters));

        unset($_SESSION["countChapters"]);
    }
    
    public function upChapter($params)
    {
        extract($params); // recup $id dans url

        $chapterManager = new \Alaska_Model\ChapterManager();
        $chapter = $chapterManager->getChapter($id);

        $nxView = new \Alaska_Model\View('admin/upChapter');
        $nxView->getView(array ('chapter' => $chapter));
    } 

    public function upComment($params)
    {
        extract($params); // recup $id dans url

        $commentManager = new \Alaska_Model\CommentManager();
        $comment = $commentManager->getComment($id);

        $nxView = new \Alaska_Model\View('admin/upComment');
        $nxView->getView(array ('comment' => $comment));
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
        $countChapters = $chapterManager->countChapters('all');
        $_SESSION['countChapters'] = $countChapters;

        $signalManager = new \Alaska_Model\SignalManager; 
        $signals = $signalManager->getSignals(); 
        
        $nxView = new \Alaska_Model\View ('admin/admin');
        $nxView->getView(array (
            'chapters' => $chapters,
            'signals'=> $signals));
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

        $_SESSION['successMessage'] = 'Vous êtes déconnecté !';

        $nxView = new \Alaska_Model\View();
        $nxView->redirect('home');
    }

    public function page404($params)
    {
        $nxView = new \Alaska_Model\View ('page404');
        $nxView->getView();
    }


}
