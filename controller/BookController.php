<?php
namespace Alaska_Controller;

class BookController
{
	// ---- CONTACT Manager ------------------------------------ */
	public function creatContact($params)
	{	
		$nxMsg = new \Alaska_Model\Message();

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
				$nxMsg->newMsg('Votre message a bien été envoyé à l\'auteur', 'success');
	        }
	        else 
	        {
	        	$nxMsg->newMsg('Problème d\'envoi d\'email : votre message n\'a pas été envoyé', 'error');
	        }
		}
		else
		{	
	        $nxMsg->newMsg('Tous les champs doivent être renseignés', 'error');
		}

		$nxView = new \Alaska_Model\View();
		$nxView->redirect('contact');
	}

   	// ---- CHAPTERS Manager ------------------------------------ */
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
        // Initialisation message & view 
        $nxMsg = new \Alaska_Model\Message();
        $nxView = new \Alaska_Model\View();

        if (isset($_SESSION['userId']))
		{
			if ((!empty($_POST['title']))||(!empty($_POST['texte'])))
			{
				// Convertit tous les caractères éligibles en entités HTML + guillemets
				$title 	= htmlentities($_POST['title'], ENT_QUOTES);
				$texte 	= htmlentities($_POST['texte'], ENT_QUOTES);

				// Ajout du chapitre 
				$chapterManager = new \Alaska_Model\ChapterManager();
				$nxChapter = $chapterManager->addChapter($title, $texte);

				// Message d'info
				if($nxChapter)
				{
					$nxMsg->newMsg('Votre chapitre a bien été créé,<br>Vous pouvez dès à présent le modifier et paramétrer son status.', 'success');
				}
				else
				{
					$nxMsg->newMsg('ERREUR : votre chapitre n\'a pas été créé', 'error');
				}
				// Retour page Admin
	        	$nxView->redirect('admin');
			}
			else
			{	
		        $nxMsg->newMsg('Tous les champs doivent être renseignés', 'error');
			}
		}
		else 
		{
			// Redirection vers la page identification
			$nxView->redirect('login');
		}


	}
	public function updateChapter($params)
	{
	}
	
	/* ---- COMMENTS Manager ------------------------------------- */
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
		// recup $id du commentaire dans url
		extract($params);
		// Suppression du commentaire
		$commentManager = new \Alaska_Model\CommentManager;
	    $delComment = $commentManager->deleteComment($id);

		$nxView = new \Alaska_Model\View();
        $nxView->redirect('admin');
	}

	/* ---- SIGNALS Manager ------------------------------------- */
	public function creatSignal($params)
	{
		// recup $id des commentaires dans url
		extract($params); 
		// Ajout signalement
		$signalManager = new \Alaska_Model\SignalManager;
	    $signalComment = $signalManager->addSignal($id);

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
	   
		$nxView = new \Alaska_Model\View();
		$nxView->redirect('admin');
	}		
}
