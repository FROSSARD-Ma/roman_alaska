<?php
namespace Alaska_Controller;

class BookController
{

   	// CHAPTERS ---------------------------------
	public function chapters()
	{
		$chapterManager = new \Alaska_Model\ManagerChapter; // Création Objet
		$Chapters = $chapterManager->listChapters(); // Liste des chapitres publiés
	    
	    //require VIEW.'book/chapters.php';
	    $nxView = new \Alaska_Model\View ('book/chapters');
        $nxView->getView($Chapters);
	}

	public function chapter()
	{	
		$chapterManager = new \Alaska_Model\ManagerChapter; // Création Objet
		// Timeline Chapters
		$Chapters = $chapterManager->listChapters(); // Liste chapitres publiés
		// Détails chapitre
	    $Chapter = $chapterManager->getChapter($_GET['chapter_id']); // Détails chapitre sélectionné

	    $commentManager = new ManagerComment; // Création Objet
	    $comments = $commentManager->listComments($_GET['chapter_id']); // chapitre sélectionné

	    // require VIEW.'book/chapter.php';
	    $nxView = new \Alaska_Model\View ('book/chapter');
        $nxView->getView($Chapters);
	    
	   	// $nxView = new View ('book/chapter');
     //    $nxView->getView($Chapter);
	}


	// COMMENTS ---------------------------------

	public function addComment($chapterId, $userId, $comment)
	{
	    $commentManager = new ManagerComment; // Création Objet
	    $postComment = $commentManager->postComment(); // Liste des chapitres
	}



}
