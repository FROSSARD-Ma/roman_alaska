<?php
namespace Alaska_Controller;

class BookController
{
	// ---- CONTACT Manager -----------------------------------------------------
	public function creatContact($params)
	{	
		$name 		= $_POST['name'];
		$email		= $_POST['email'];
		$contact     = $_POST['message'];

		$nxView = new \Alaska_Model\View();

		// Envoyer un MAIL de contact -------------
        $verif_mail = "marie@spotsweb.fr";
        $subject 	= "Message - Roman, Un billet pour l'Alaska";
        $message	= "
        <html>
            <h1>Message sur un Billet pour l'Alaska !</h1>
            <p>Vous avez reçu un message du lecteur, $name</p>
           	<p>Message :<br>
           	$contact</p>
           	<hr>
           	<p><a href='mailto:$email'>Répondre au lecteur</a></p>
           	<br>
           	<p>Roman - Un Billet pour l'Alaska<br>Jean Forteroche</p>
        </html>";
        $headers = "From: Jean Forteroche - Lecteur\n";
    	$headers.= "MIME-Version: 1.0\n";
    	$headers.= "Content-type: text/html; charset=utf-8\n";

        mail($verif_mail, $subject, $message, $headers) or $_SESSION['erreur']= "Problème d'envoi d'email";    

		$_SESSION['message'] = "Votre message a bien été envoyé à l'auteur";
		$nxView->redirect('home');
	}

   	// ---- CHAPTERS Manager -----------------------------------------------------
	public function chapter($params)
	{	
		if (isset($_GET['id']))
		{
			$chapterManager = new \Alaska_Model\ChapterManager; 
		    $chapter = $chapterManager->getChapter($_GET['id']);

		    $commentManager = new \Alaska_Model\CommentManager;
		    $dataComments = $commentManager->getComments($_GET['id']);
	    	if (!$dataComments)
			{
			    $nxView = new \Alaska_Model\View ('book/chapter');
		        $nxView->getView(array (
		        	'chapter' => $chapter));
		    }
		    else
		    {
		    	// Création des objets commentaire
		        foreach ($dataComments as $data ) {
		            $comment = new \Alaska_Model\Comment($data);
		            $comments[] = $comment; // Tableau d'objet
		        }
		        $_SESSION['nbComments'] = count($comments);

			    $nxView = new \Alaska_Model\View ('book/chapter');
		        $nxView->getView(array (
		        	'chapter' => $chapter, 
		        	'comments'=> $comments));
		    }
		}
	    else
	    {
	    	$nxView = new \Alaska_Model\View();
            $nxView->redirect('chapters');
        }
	}

	public function addChapter($params)
	{
        $nxView = new \Alaska_Model\View ('admin/addChapter');
        $nxView->getView();
	}

	public function creatChapter($params)
	{
        var_dump($_POST);
	}

	public function updateChapter($params)
	{
	}
	
	// ---- COMMENTS Manager -----------------------------------------------------
	public function creatComment($params)
	{
		if (isset($_SESSION['userId']))
		{
			$chapterId 	= $_POST['chapterId'];
			$content    = $_POST['content'];

			// Ajout du commentaire 
			$commentManager = new \Alaska_Model\CommentManager();
			$nxComment = $commentManager->addComment($chapterId, $content);
			if ($nxComment) 
		    {
				$_SESSION['message'] = "Merci pour votre commentaire !";
			}
			else 
			{
				$_SESSION['erreur'] = "ERREUR : Votre commentaire n'a pas été enregistré. Veuillez recommencer !";
			}

			// Affichage de la page avec résultat de lenregistrement du commentaire
			$chapterManager = new \Alaska_Model\ChapterManager; 
		    $chapter = $chapterManager->getChapter($chapterId);

		    $commentManager = new \Alaska_Model\CommentManager;
		    $comments = $commentManager->getComments($chapterId);

		    $nxView = new \Alaska_Model\View ('book/chapter');
	        $nxView->getView(array (
	        	'chapter' => $chapter, 
	        	'comments'=> $comments));
		}
		else 
		{
			$_SESSION['erreur'] = "Seul les lecteurs enregistrés peuvent ajouter un commentaire !<br>Identifiez-vous";
			$nxView = new \Alaska_Model\View();
			$nxView->redirect('login');
		}
	}

	public function updateComment($params)
	{
		
	}

	public function delComment($params)
	{
		$nxView = new \Alaska_Model\View();

		if (isset($_GET['id']))
		{
			$commentId 	= $_GET['id'];
			$commentManager = new \Alaska_Model\CommentManager;
		    $delComment = $commentManager->deleteComment($commentId);
    
		    if ($delComment) 
		    {
				$_SESSION['message'] = "Le commentaire a bien été supprimé !";
				$nxView->redirect('admin');
			}
			// Form verification
			else 
			{
				$_SESSION['erreur'] = "ECHEC : le commentaire n'a pas été supprimé !";
			}
		}
		else
	    {
	    	$_SESSION['erreur'] = "ECHEC : le commentaire n'est pas identifié !";
        }
	}

	/* ---- SIGNALS Manager ------------------------------------------------- */

	public function creatSignal($params)
	{
		extract($params); // recup $id dans url
		
		$signalManager = new \Alaska_Model\SignalManager;
	    $signalComment = $signalManager->addSignal($id);

		$nxView = new \Alaska_Model\View();
		$nxView->redirect('chapters');

	}

	public function delSignal($params)
	{
		extract($params); // recup $id dans url

		$signalManager = new \Alaska_Model\SignalManager;
	    $delSignal = $signalManager->deleteSignal($id);
	   
		$nxView = new \Alaska_Model\View();
		$nxView->redirect('admin/admin');
	}		
	

}
