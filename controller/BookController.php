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
		
		$nxView->redirect('contact');
	}

   	// ---- CHAPTERS Manager -----------------------------------------------------
	public function chapter($params)
	{	
		extract($params); // recup $id dans url

		$chapterManager = new \Alaska_Model\ChapterManager; 
	    $chapter = $chapterManager->getChapter($id);

	    $commentManager = new \Alaska_Model\CommentManager;
	    $dataComments = $commentManager->getComments($id);
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

			$nxView = new \Alaska_Model\View();
        	$nxView->redirect('chapter/id/'.$chapterId);
		}
		else 
		{
			// Redirection vers la page identification
			$nxView = new \Alaska_Model\View();
			$nxView->redirect('login');
		}
	}

	public function updateComment($params)
	{
		if (isset($_SESSION['userId']))
		{
			// recup $id du commentaire dans url
			extract($params); 
			// Modification du commentaire 
			$commentManager = new \Alaska_Model\CommentManager();
			$upComment = $commentManager->updateComment($id);
			if ($upComment)
			{
				// Retour page admin
		        $nxView = new \Alaska_Model\View();
	        	$nxView->redirect('admin');
			}
			else 
			{
				// Erreur : retour sur modif commentaire
				$nxView = new \Alaska_Model\View();
				$nxView->redirect('upComment/id/'.$id);
			}
		}
		else 
		{
			// Redirection vers la page identification
			$nxView = new \Alaska_Model\View();
			$nxView->redirect('login');
		}

	}

	public function delComment($params)
	{
		extract($params); // recup $id dans url

		$commentManager = new \Alaska_Model\CommentManager;
	    $delComment = $commentManager->deleteComment($id);

		$nxView = new \Alaska_Model\View();
        $nxView->redirect('admin/admin');
	}

	/* ---- SIGNALS Manager ------------------------------------------------- */

	public function creatSignal($params)
	{
		extract($params); // recup $id des commentaires dans url
		
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
