<?php
namespace Alaska_Controller;

class WebsiteController
{
    public function home()
    {
		$chapterManager = new \Alaska_Model\ManagerChapter; // Créer Objet
	    $home2Chapters = $chapterManager->home2Chapters(); // 2 Extraits 
    	
        //require VIEW.'home.php';
        $nxView = new \Alaska_Model\View ('home');
        $nxView->getView($home2Chapters);
    }

    public function about()
    {
		//require VIEW.'about.php';
        $nxView = new \Alaska_Model\View ('about');
        $nxView->getView();
    }

    public function contact()
    {
		//require VIEW.'contact';
        $nxView = new \Alaska_Model\View ('contact');
        $nxView->getView();
    }

    public function page404()
    {
		//require VIEW.'page404.php';
        $nxView = new \Alaska_Model\View ('page404');
        $nxView->getView();
    }
}
