<?php
namespace Alaska_Controller;

class BookController
{
	// ---- CONTACT ------------------------------------ */
	public function creatContact($params)
	{	
		if ((!empty($_POST['name']))||(!empty($_POST['email']))||(!empty($_POST['message'])))
		{
			$name = $_POST['name'];
			$email = $_POST['email'];
			$contact = $_POST['message'];

			// Envoyer un MAIL de contact -------------
	        $to = "marie@spotsweb.fr";
	        $subject 	= "Contact - Roman, Un billet pour l'Alaska";
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
	        
	    	$headers[] = "MIME-Version: 1.0";
	    	$headers[] = "Content-type: text/html; charset=utf-8";
			$headers[] = "From: Jean Forteroche - Lecteur";

	        if (mail($to, $subject, $message, implode("\r\n", $headers)))
	        {
				$_SESSION['successMessage'] = 'Votre message a bien été envoyé à l\'auteur';
	        }
	        else 
	        {
	        	$_SESSION['errorMessage'] = 'Problème d\'envoi d\'email : votre message n\'a pas été envoyé';
	        }
		}
		else
		{	
			$_SESSION['errorMessage'] = 'Tous les champs doivent être renseignés'; 
		}

		$nxView = new \Alaska_Model\View();
		$nxView->redirect('contact');
	}

   	// ---- CHAPTERS ------------------------------------ */
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
        $nxView = new \Alaska_Model\View ('admin/addChapter');
        $nxView->getView();
	}
	public function creatChapter($params)
	{
        if (isset($_SESSION['userId']))
		{
			if ((!empty($_POST['title']))||(!empty($_POST['texte'])))
			{
				// Ajout du chapitre 
				$chapterManager = new \Alaska_Model\ChapterManager();
				$nxChapter = $chapterManager->addChapter();

				// Message d'info
				if($nxChapter)
				{
					$_SESSION['successMessage'] = 'Le chapitre a bien été créé,<br>Vous pouvez dès à présent le modifier et paramétrer son status.';
				}
				else
				{
					$_SESSION['errorMessage'] = 'ERREUR : le chapitre n\'a pas été créé';
				}
				// Retour page Admin
				$nxView = new \Alaska_Model\View();
	        	$nxView->redirect('admin');
			}
			else
			{	
		        $_SESSION['errorMessage'] = 'ERREUR : Tous les champs doivent être renseignés';
			}
		}
		else 
		{
			$_SESSION['errorMessage'] = 'ERREUR : vous devez vous identifier pour créer un chapitre !';
			// Redirection vers la page identification
			$nxView = new \Alaska_Model\View();
			$nxView->redirect('login');
		}
	}
	public function updateChapter($params)
	{
		if (isset($_SESSION['userId']))
		{
			// recup $id du chapitre dans url
			extract($params); 

			// Modification du chapitre 
			$chapterManager = new \Alaska_Model\ChapterManager();
			$upChapter = $chapterManager->updateChapter($id);
			if ($upChapter)
			{
				$_SESSION['successMessage'] = 'Le chapitre a bien été mis à jour.';
				// Retour page admin
		        $nxView = new \Alaska_Model\View();
	        	$nxView->redirect('admin');
			}
			else 
			{
				$_SESSION['errorMessage'] = 'ERREUR : le chapitre n\'a pas été mis à jour.';
				// Erreur : retour sur modif chapitre
				$nxView = new \Alaska_Model\View();
				$nxView->redirect('upChapter/id/'.$id);
			}
		}
		else 
		{
			$_SESSION['errorMessage'] = 'ERREUR : vous devez vous identifier pour modifier un chapitre !';
			// Redirection vers la page identification
			$nxView = new \Alaska_Model\View();
			$nxView->redirect('login');
		}
	}
	public function delChapter($params)
	{
		// recup $id du commentaire dans url
		extract($params);
		// Suppression du commentaire
		$chapterManager = new \Alaska_Model\ChapterManager;
	    $delChapter = $chapterManager->deleteChapter($id);
	    if ($delChapter)
	    {
	    	 $_SESSION['successMessage'] = 'Le chapitre a bien été supprimé !';
	    }
	    else
	    {
	    	$_SESSION['errorMessage'] = 'ERREUR : le chapitre n\'a pas été supprimé';
	    }

		$nxView = new \Alaska_Model\View();
        $nxView->redirect('admin');
	}
	
	/* ---- COMMENTS  ----------------------------------- */
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
		    	 $_SESSION['successMessage'] = 'Le commentaire a bien été ajouté !';
		    }

			$nxView = new \Alaska_Model\View();
        	$nxView->redirect('chapter/id/'.$chapterId);
		}
		else 
		{
			$_SESSION['errorMessage'] = 'Vous devez vous identifer pour ajouter un commentaire a bien été ajouté !';
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
				$_SESSION['successMessage'] = 'Le commentaire a bien été mis à jour !';
				// Retour page admin
		        $nxView = new \Alaska_Model\View();
	        	$nxView->redirect('admin');
			}
			else 
			{
				$_SESSION['errorMessage'] = 'ERREUR : lors de la mise à jour du commentaire';
				// Erreur : retour sur modif commentaire
				$nxView = new \Alaska_Model\View();
				$nxView->redirect('upComment/id/'.$id);
			}
		}
		else 
		{
			$_SESSION['errorMessage'] = 'Vous devez vous identifer pour modifier un commentaire !';
			// Redirection vers la page identification
			$nxView = new \Alaska_Model\View();
			$nxView->redirect('login');
		}
	}
	public function delComment($params)
	{
		// recup $id du commentaire dans url
		extract($params);
		// Suppression du commentaire
		$commentManager = new \Alaska_Model\CommentManager;
	    $delComment = $commentManager->deleteComment($id);
	    if ($delComment)
	    {
	    	 $_SESSION['successMessage'] = 'Le commentaire a bien été supprimé !';
	    }
	    else
	    {
	    	$_SESSION['errorMessage'] = 'ERREUR : le commentaire n\'a pas été supprimé';
	    }

		$nxView = new \Alaska_Model\View();
        $nxView->redirect('admin');
	}

	/* ---- SIGNALS ------------------------------------- */
	public function creatSignal($params)
	{
		// recup $id des commentaires dans url
		extract($params); 
		// Ajout signalement
		$signalManager = new \Alaska_Model\SignalManager;
	    $signalComment = $signalManager->addSignal($id);
	    if ($signalComment)
	    {
	    	 $_SESSION['successMessage'] = 'Le signalement a bien été enregistré !';
	    }
	    else
	    {
	    	$_SESSION['errorMessage'] = 'ERREUR : le signalement n\'a pas été pris en compte.';
	    }

		// recup GET idchapter pour retour page
		$idChapter = $_GET['idChapter'];
		$nxView = new \Alaska_Model\View();
		$nxView->redirect('chapter/id/'.$idChapter);
	}
	public function delSignal($params)
	{
		extract($params); // recup $id dans url

		$signalManager = new \Alaska_Model\SignalManager;
	    $delSignal = $signalManager->deleteSignal($id);
	    if ($delSignal)
	    {
	    	 $_SESSION['successMessage'] = 'Le signalement a bien été supprimé !';
	    }
	    else
	    {
	    	$_SESSION['errorMessage'] = 'ERREUR : le signalement n\'a pas été supprimé.';
	    }
	   
		$nxView = new \Alaska_Model\View();
		$nxView->redirect('admin');
	}		
}
