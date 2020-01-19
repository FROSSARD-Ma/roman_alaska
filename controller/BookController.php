<?php
namespace Alaska_Controller;

class BookController
{
   	// ---- CHAPTERS Manager -----------------------------------------------------
	public function chapter()
	{	
		if (isset($_GET['id']))
		{
			$chapterManager = new \Alaska_Model\ChapterManager; 
		    $chapter = $chapterManager->getChapter($_GET['id']);

		    $commentManager = new \Alaska_Model\CommentManager;
		    $comments = $commentManager->getComments($_GET['id']);

		    $nxView = new \Alaska_Model\View ('book/chapter');
	        $nxView->getView(array (
	        	'chapter' => $chapter, 
	        	'comments'=> $comments));
	    }
	    else
	    {
            $chapter = new \Alaska_Model\Chapter();
        }     
	}

	public function addChapter()
	{
        $nxView = new \Alaska_Model\View ('admin/addChapter');
        $nxView->getView();
	}

	public function updateChapter()
	{
	}
	
	// ---- COMMENTS Manager -----------------------------------------------------

}
