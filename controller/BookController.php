<?php
namespace Alaska_Controller;

class BookController
{
	// ---- CONTACT ------------------------------------ */
	public function creatContact($params)
	{	
		// ====== Ajout d'un TOKEN au FORM inscription => faille CSRF ============
        $csrf = new \Alaska_Model\CsrfSecurite('contact');
        $contactToken = $csrf->verifToken('https://rbb0530.phpnet.org/roman_alaska/index.php?page=contact');
		if ($contactToken)
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
		}
		else
		{
			$_SESSION['errorMessage'] = "Un controle sécurité a bloqué l'envoi de votre message !";
			
		}

		$nxView = new \Alaska_Model\View();
		$nxView->redirect('contact');
	}

   	// ---- CHAPTERS ------------------------------------ */
	public function creatChapter($params)
	{
		$nxView = new \Alaska_Model\View();

		// ====== Ajout d'un TOKEN au FORM inscription => faille CSRF ============
        $csrf = new \Alaska_Model\CsrfSecurite('addChapter');
        $addChapterToken = $csrf->verifToken('https://rbb0530.phpnet.org/roman_alaska/index.php?page=addChapter');
		if ($addChapterToken)
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
				
				$nxView->redirect('login');
			}
		}
		else
		{
			$_SESSION['errorMessage'] = "Un controle sécurité a bloqué l'envoi de votre nouveau chapitre !";
			$nxView->redirect('addChapter');
		}

	}
	public function updateChapter($params)
	{
		$nxView = new \Alaska_Model\View();
		// recup $id du chapitre dans url
		extract($params); 

		// ====== Ajout d'un TOKEN au FORM inscription => faille CSRF ============
        $csrf = new \Alaska_Model\CsrfSecurite('upChapter');
        $upChapterToken = $csrf->verifToken('https://rbb0530.phpnet.org/roman_alaska/index.php?page=upChapter/id/'.$id);
		if ($upChapterToken)
		{
			if (isset($_SESSION['userId']))
			{
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
		else
		{
			$_SESSION['errorMessage'] = "Un controle sécurité a bloqué la mise à jour du chapitre !";
			$nxView->redirect('upChapter/id/'.$id);
		}
	}
	public function delChapter($params)
	{
		$csrf = new \Alaska_Model\CsrfSecurite('admin');
        $delChapterToken = $csrf->verifGetToken('https://rbb0530.phpnet.org/roman_alaska/index.php?page=admin');
		if ($delChapterToken)
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
		}
		else
		{
			$_SESSION['errorMessage'] = "Un controle sécurité a bloqué la suppression du chapitre !";
		}

		$nxView = new \Alaska_Model\View();
        $nxView->redirect('admin');
	}
	
	/* ---- COMMENTS  ----------------------------------- */
	public function creatComment($params)
	{
		$nxView = new \Alaska_Model\View();

		$chapterId 	= $_POST['chapterId'];

		// ====== Ajout d'un TOKEN au FORM addComment => faille CSRF ============
        $csrf = new \Alaska_Model\CsrfSecurite('chapter');
        $commentToken = $csrf->verifToken('https://rbb0530.phpnet.org/roman_alaska/index.php?page=chapter/id/'.$chapterId);
		if ($commentToken)
		{
			if (isset($_SESSION['userId']))
			{
				$content    = $_POST['content'];
				$commentManager = new \Alaska_Model\CommentManager();
				$nxComment = $commentManager->addComment($chapterId, $content);
				if ($nxComment)
			    {
			    	 $_SESSION['successMessage'] = 'Le commentaire a bien été ajouté !';
			    }
	        	$nxView->redirect('chapter/id/'.$chapterId);
			}
			else 
			{
				$_SESSION['errorMessage'] = 'Vous devez vous identifer pour ajouter un commentaire a bien été ajouté !';
				$nxView->redirect('login');
			}
		}
		else
		{
			$_SESSION['errorMessage'] = "Un controle sécurité a bloqué l'ajout de votre commentaire !";
			$nxView->redirect('chapter/id/'.$chapterId);
		}
	}
	public function delComment($params)
	{
		$csrf = new \Alaska_Model\CsrfSecurite('admin');
        $delCommentToken = $csrf->verifGetToken('https://rbb0530.phpnet.org/roman_alaska/index.php?page=admin');
		if ($delCommentToken)
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
		}
		else
		{
			$_SESSION['errorMessage'] = "Un controle sécurité a bloqué la suppression du commentaire !";
		}

		$nxView = new \Alaska_Model\View();
        $nxView->redirect('admin');
	}

	/* ---- SIGNALS ------------------------------------- */
	public function creatSignal($params)
	{
		$chapterId 	= $_POST['chapterId'];
		extract($params); 

		// ====== Ajout d'un TOKEN au FORM addComment => faille CSRF ============
        $csrf = new \Alaska_Model\CsrfSecurite('chapter');
        $signalToken = $csrf->verifToken('https://rbb0530.phpnet.org/roman_alaska/index.php?page=chapter/id/'.$chapterId);
		if ($signalToken)
		{
			// Ajout signalement
			$signalManager = new \Alaska_Model\SignalManager;
		    $signalComment = $signalManager->addSignal($id); // $id comment
		    if ($signalComment)
		    {
		    	 $_SESSION['successMessage'] = 'Le signalement a bien été enregistré !';
		    }
		    else
		    {
		    	$_SESSION['errorMessage'] = 'ERREUR : le signalement n\'a pas été pris en compte.';
		    }
		}
		else
		{
			$_SESSION['errorMessage'] = "Un controle sécurité a bloqué l'ajout de votre signalement !";
		}    

		$nxView = new \Alaska_Model\View();
		$nxView->redirect('chapter/id/'.$chapterId);
	}
	public function delSignal($params)
	{
		$csrf = new \Alaska_Model\CsrfSecurite('admin');
        $delSignalToken = $csrf->verifGetToken('https://rbb0530.phpnet.org/roman_alaska/index.php?page=admin');
		if ($delSignalToken)
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
	   	}
		else
		{
			$_SESSION['errorMessage'] = "Un controle sécurité a bloqué la suppression du signalement !";
		}

		$nxView = new \Alaska_Model\View();
		$nxView->redirect('admin');
	}		
}
