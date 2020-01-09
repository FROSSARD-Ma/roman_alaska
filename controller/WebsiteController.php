<?php
namespace Alaska_Controller;

class WebsiteController
{
    public function home()
    {
		$chapterManager = new \Alaska_Model\ChapterManager; 
	    $chapters = $chapterManager->twoChapters();

        $nxView = new \Alaska_Model\View ('home');
        $nxView->getView(array ('chapters' => $chapters));
    }

    public function about()
    {
        $nxView = new \Alaska_Model\View ('about');
        $nxView->getView();
    }

    public function contact()
    {
        $nxView = new \Alaska_Model\View ('contact');
        $nxView->getView();
    }

    public function page404()
    {
        $nxView = new \Alaska_Model\View ('page404');
        $nxView->getView();
    }
}
