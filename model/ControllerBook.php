<?php
namespace Alaska;

class ControllerBook extends Manager
{

   	// CHAPTERS ---------------------------------
	public function chapters()
	{
		$chapterManager = new ManagerChapter; // Création Objet
		$Chapters = $chapterManager->listChapters(); // Liste des chapitres publiés
	    require VIEW.'book/chapters.php';
	}

	public function chapter()
	{	
		$chapterManager = new ManagerChapter; // Création Objet
		// Timeline Chapters
		$Chapters = $chapterManager->listChapters(); // Liste chapitres publiés
		// Détails chapitre
	    $Chapter = $chapterManager->getChapter($_GET['chapter_id']); // Détails chapitre sélectionné

	    $commentManager = new ManagerComment; // Création Objet
	    $comments = $commentManager->listComments($_GET['chapter_id']); // chapitre sélectionné

	    require VIEW.'book/chapter.php';
	}


	// COMMENTS ---------------------------------

	public function addComment($chapterId, $userId, $comment)
	{
	    $commentManager = new ManagerComment; // Création Objet
	    $postComment = $commentManager->postComment(); // Liste des chapitres
	}



}
