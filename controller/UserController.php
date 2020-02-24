<?php
namespace Alaska_Controller;

class UserController
{
	// ---- USER  -----------------------------------------------------
	public function creatUser($params)
	{
		$nxView = new \Alaska_Model\View();

		// ====== Ajout d'un TOKEN au FORM inscription => faille CSRF ============
        $csrf = new \Alaska_Model\CsrfSecurite('inscription');
        $inscriptionToken = $csrf->verifToken('https://rbb0530.phpnet.org/roman_alaska/index.php?page=inscription');
		if ($inscriptionToken)
		{	
			$name 		= $_POST['name'];
			$firstname  = $_POST['firstname'];
			
			$email		= $_POST['email'];

			// Pseudo 
			if(empty($_POST['pseudo'])) 
			{
				$pseudo = $name.' '. ucfirst(substr($firstname,0,1));
			}
			else 
			{
				$pseudo = $_POST['pseudo'];
			}

			// Vérifier si USER existe déjà 
			$mailManager = new \Alaska_Model\UserManager; 
		    $mailExist = $mailManager->existUser($email);
		    if ($mailExist) 
		    {
				$_SESSION['errorMessage'] = "EMAIL déjà enregistré sur le Roman - Un Billet pour l'Alaska, connectez-vous ou demandez un nouveau mot de passe!";
				$nxView->redirect('login');
			}
			// Form verification
			else 
			{
				// Format hydratation
				$data = array(
					'id_user' 		=> NULL,
					'name_user' 	=> $name,
			    	'firstname_user'=> $firstname,
			    	'pseudo_user'	=> $pseudo,
			    	'email_user'	=> $email,
			    	'pass_user'		=> NULL,
			    	'role_user'		=> NULL
				);

				// CONTROL form fields -------------------------------------
				$erreur ="";
				$verifUser = new \Alaska_Model\User($data);
				$verifName = $verifUser->getName();

				if (!$verifName)
		    	{
		    		$erreur.= "Vous avez mal renseigné votre nom !<br>";
		    	}
				$verifFirstname = $verifUser->getFirstname();
				if (!$verifFirstname) 
		    	{
		    		$erreur.= "Vous avez mal renseigné votre prenom !<br>";
		    	}
		    	$verifpseudo = $verifUser->getPseudo();
				if (!$verifpseudo) 
		    	{
		    		$erreur.= "Vous avez mal renseigné votre pseudo !<br>";
		    	}
				$verifMail = $verifUser->getEmail();
				if (!$verifMail) 
		    	{
		    		$erreur.= "Vous avez mal renseigné votre Email !<br>";
		    	}

				// INVALID form fields -------------------------------------
				if ($erreur) 
				{
					$_SESSION['errorMessage'] = $erreur;
	        		$nxView->redirect('inscription');
	        	}

	        	// VALID form fields ---------------------------------------
		        else 
		        {
		        	// ADD new user
					$userManager = new \Alaska_Model\UserManager; 
				    $creatUser = $userManager->addUser($name, $firstname, $pseudo, $email);
					if ($creatUser) 
					{
						// Initialisation Mot de pass
						$passManager = new \Alaska_Model\UserManager; 
					    $creatPass = $passManager->addPass($_POST['email']);
					    if ($creatPass)
					    {
							// Récupère le mot de pass décrypté
					    	$nwPass = $_SESSION['nxPass'];

						    // Envoyer un MAIL confirmation inscription + identifiant -------------
				            $verif_mail = $_POST['email'];
				            $subject 	= "Identifiants - Roman, Un billet pour l'Alaska";
				            $message	= "
				            <html>
					            <h1>Bienvenue sur un Billet pour l'Alaska !</h1>
					            <p>Vous pouvez dès à présent vous connecter à votre compte avec les identifiants suivant :</p>
					           	<p>- Votre identifiant : $verif_mail
					           	<br>- Votre Mot de Passe : $nwPass</p>
					           	<br>
					           	<p>Accédez directement à votre espace de lecture à cette adresse : <a href='https://rbb0530.phpnet.org/roman_alaska/index.php?page=login'>Mon compte</a>
					           	<br>
					           	<p>A bientôt !</p>
					           	<p>Jean Forteroche</p>
				            </html>";
				            $headers = "From: Jean Forteroche - Auteur\n";
				        	$headers.= "MIME-Version: 1.0\n";
				        	$headers.= "Content-type: text/html; charset=utf-8\n";
				    
				            mail($verif_mail, $subject, $message, $headers) or $_SESSION['errorMessage']= "Problème d'envoi d'email";    

							$_SESSION['successMessage'] = "Félicitations !<br>Vous êtes inscrit, vous allez recevoir vos identifiants sur l'email : ".$verif_mail."<br>Mot de passe : ".$nwPass ;
				            unset($_SESSION["nxPass"]);

							$nxView->redirect('login');
					    }
					    else
					    {
					    	$_SESSION['successMessage'] = "Félicitation vous êtes bien inscrit !<br>Veuillez demander un mot de passe pour vous connecter !";
					        $nxView->redirect('nxPass');
					    }

				    	// Message d'info
			        	$_SESSION['successMessage'] = 'Vous êtes inscrit, vous allez recevoir votre mot de passe par email !';
			        	$nxView->redirect('home');
			        }
			        else // Echec ADD User
			        {
						$_SESSION['errorMessage'] = 'Votre inscription a échouée, veuillez recommencer !';
			        	$nxView->redirect('inscription');
			        }
			    }
		    }
		}
		else
		{
			$_SESSION['errorMessage'] = "Un controle sécurité a bloqué votre inscription !";
			$nxView->redirect('inscription');
		}
	}

	// ---- LOGIN ----------------------------------------------------
	public function loginUser($params)
	{
		$nxView = new \Alaska_Model\View();

		// ====== Ajout d'un TOKEN au FORM login => faille CSRF ============
        $csrf = new \Alaska_Model\CsrfSecurite('login');
        $loginToken = $csrf->verifToken('https://rbb0530.phpnet.org/roman_alaska/index.php?page=login');
		if ($loginToken)
		{	
			$mailManager = new \Alaska_Model\UserManager; 
		    $mailExist = $mailManager->existUser($_POST['email']);
		    if ($mailExist) 
		    {
		    	$nxUser = new \Alaska_Model\User($mailExist);
				// Comparaison du pass envoyé via le formulaire avec la base
				$PassCorrect = password_verify($_POST['pass'], $nxUser->getPass());
				
				if ($PassCorrect)
				{
					$_SESSION['user'] 	= $nxUser->getPseudo();
					$_SESSION['userId'] = $nxUser->getId();
			        $_SESSION['role'] 	= $nxUser->getRole();
			        $nxView->redirect('home');
			    }
			    else
			    {
			        $_SESSION['errorMessage'] = 'ERREUR : Le mot de passe ne correspond pas.';
			        $nxView->redirect('login');
			    }
		    }
		    else
		    {
		    	$_SESSION['errorMessage'] = "ERREUR : Cet Email n'est pas enregistré sur Roman - Un billet pour l'Alaska.";
		    	$nxView->redirect('login');
		    }
		    }
		else
		{
			$_SESSION['errorMessage'] = "Un controle sécurité a bloqué l'identification !";
			$nxView->redirect('login');
		}
	}

	// ---- PASS -----------------------------------------------------
	public function creatPass($params)
	{
		$nxView = new \Alaska_Model\View();

		$mailManager = new \Alaska_Model\UserManager; 
	    $mailExist = $mailManager->existUser($_POST['email']);
	    if ($mailExist) 
	    {
			$passManager = new \Alaska_Model\UserManager; 
		    $creatPass = $passManager->addPass($_POST['email']);
		    if ($creatPass)
		    {
		    	// Récupère le mot de pass décrypté
		    	$nwPass = $_SESSION['nxPass'];

		    	// Envoyer un MAIL avec nx pass --------------------------------------
	            $verif_mail = $_POST['email'];
	            $subject 	= "Mot de passe - Roman, Un billet pour l'Alaska";
	            $message	= "
	            <html>
			            <h1>Bienvenue sur un Billet pour l'Alaska !</h1>
			            <p>Vous pouvez dès à présent vous connecter à votre compte avec les identifiants suivant :</p>
			           	<p>- Votre identifiant : $verif_mail
			           	<br>- Votre Mot de Passe : $nwPass</p>
			           	<br>
			           	<p>Accédez directement à votre espace de lecture à cette adresse : <a href='https://rbb0530.phpnet.org/roman_alaska/index.php?page=login'>Mon compte</a>
			           	<br>
			           	<p>A bientôt !</p>
			           	<p>Jean Forteroche</p>
		            </html>";
	            $headers = "From: Jean Forteroche - Auteur\n";
	        	$headers.= "MIME-Version: 1.0\n";
	        	$headers.= "Content-type: text/html; charset=utf-8\n";
	    
	            mail($verif_mail, $subject, $message, $headers) or $_SESSION['errorMessage']= "Problème d'envoi d'email";    

				$_SESSION['successMessage'] = "Vous allez recevoir votre nouveau mot de passe sur votre email : ".$verif_mail."<br>Mot de passe : ".$nwPass ;
	            unset($_SESSION["nxPass"]);
				$nxView->redirect('login');
		    }
		    else
		    {
		    	$_SESSION['errorMessage'] = "ECHEC sur l'enregistrement du nouveau mot de passe n'a pas, veuillez en demander un nouveau ";
		        $nxView->redirect('nxPass');
		    }
	   	}
	   	else
	   	{
	   		$_SESSION['errorMessage'] = "ERREUR : Cet Email n'est pas enregistré sur Roman - Un billet pour l'Alaska.";
	    	$nxView->redirect('nxPass');
	   	}  
	}
}
