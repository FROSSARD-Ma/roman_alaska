<?php
namespace Alaska_Controller;

class FrontController
{
    /* Menu ----------------------------------- */
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

    public function contact($params)
    {
        $csrf = new \Alaska_Model\CsrfSecurite('pass');
        $token = $csrf->getToken();

        $nxView = new \Alaska_Model\View ('contact');
        $nxView->getView(array ('token' => $token));
    }

    public function inscription($params)
    {
        $csrf = new \Alaska_Model\CsrfSecurite('inscription');
        $token = $csrf->getToken();

        $nxView = new \Alaska_Model\View ('user/inscription');
        $nxView->getView(array ('token' => $token));
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
        $csrf = new \Alaska_Model\CsrfSecurite('login');
        $token = $csrf->getToken();

        $nxView = new \Alaska_Model\View ('user/login');
        $nxView->getView(array ('token' => $token));
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

    /* Link Button ----------------------------*/
    public function nxPass($params)
    {
        $csrf = new \Alaska_Model\CsrfSecurite('pass');
        $token = $csrf->getToken();

        $nxView = new \Alaska_Model\View ('user/pass');
        $nxView->getView(array ('token' => $token));
    }

    public function chapter($params)
    {   
        extract($params); // recup $id dans url

        $chapterManager = new \Alaska_Model\ChapterManager; 
        $chapter = $chapterManager->getChapter($id);

        // Création des objets commentaire
        $commentManager = new \Alaska_Model\CommentManager;
        $dataComments = $commentManager->getComments($id);
        foreach ($dataComments as $data )
        {
            $comment = new \Alaska_Model\Comment($data);
            $comments[] = $comment; // Tableau d'objet
        }

        $nxView = new \Alaska_Model\View ('book/chapter');
        $nxView->getView(array (
            'chapter' => $chapter, 
            'comments'=> $comments));
    }

    public function addChapter($params)
    {
        $csrf = new \Alaska_Model\CsrfSecurite('addChapter');
        $token = $csrf->getToken();

        $nxView = new \Alaska_Model\View ('admin/addChapter');
        $nxView->getView(array ('token' => $token));
    }
    
    public function upChapter($params)
    {
        extract($params); // recup $id dans url

        $chapterManager = new \Alaska_Model\ChapterManager();
        $chapter = $chapterManager->getChapter($id);

        $nxView = new \Alaska_Model\View('admin/upChapter');
        $nxView->getView(array ('chapter' => $chapter));
    }

    /* Erreur 404  ----------------------------*/
    public function page404($params)
    {
        $nxView = new \Alaska_Model\View ('page404');
        $nxView->getView();
    }
}