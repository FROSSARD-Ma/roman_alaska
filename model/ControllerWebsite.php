<?php
namespace Alaska;

class ControllerWebsite extends Manager
{
    
    public function home()
    {
		$chapterManager = new ManagerChapter; // Création Objet
	    $home2Chapters = $chapterManager->home2Chapters(); // 2 Extraits 
    	//require VIEW.'home.php';
        $this->view('home');
    }

    public function about()
    {
		//require VIEW.'about.php';
        $this->view('about');
    }

    public function contact()
    {
		//require VIEW.'contact.php';
        $this->view('contact');
    }

    public function page404()
    {
		//require VIEW.'page404.php';
        $this->view('page404');
    }
}
