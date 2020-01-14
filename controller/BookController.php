<?php
namespace Alaska_Controller;

class BookController
{

   	// CHAPTERS ---------------------------------
	public function chapters()
	{
		$chapterManager = new \Alaska_Model\ChapterManager; 
		$chapters = $chapterManager->getChapters(); 

	    $nxView = new \Alaska_Model\View ('book/chapters');
        $nxView->getView(array ('chapters' => $chapters)); // creat datas to View
	}

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
	        	'comments'=> $comments)
	        ); // creat datas to View
	    }
	    else
	    {
            $chapter = new \Alaska_Model\Chapter();
        }     
	}

}
