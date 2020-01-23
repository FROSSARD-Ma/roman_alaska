<?php
namespace Alaska_Controller;

class UserController
{
	// ---- USER Manager -----------------------------------------------------
	public function creatUser($params)
	{
		$name 		= $_POST['name'];
		$firstname  = $_POST['firstname'];
		$pseudo     = $_POST['pseudo'];
		$email		= $_POST['email'];

		$nxView = new \Alaska_Model\View();

		// Vérifier si USER existe déjà 
		$mailManager = new \Alaska_Model\UserManager; 
	    $mailExist = $mailManager->existUser($email);
	    if ($mailExist) 
	    {
			$_SESSION['message'] = "EMAIL déjà enregistré sur le Roman - Un Billet pour l'Alaska, connectez-vous ou demandez un nouveau mot de passe!";
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
	    	$verifpseudo = $verifUser->getFirstname();
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
				$_SESSION['erreur'] = $erreur;
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
			    
			            mail($verif_mail, $subject, $message, $headers) or $_SESSION['erreur']= "Problème d'envoi d'email";    

						$_SESSION['message'] = "Félicitations !<br>Vous êtes inscrit, vous allez recevoir vos identifiants sur l'email : ".$verif_mail."<br>Mot de passe : ".$nwPass ;
			            unset($_SESSION["nxPass"]);
						$nxView->redirect('login');
				    }
				    else
				    {
				    	$_SESSION['message'] = "Félicitation vous êtes bien inscrit !<br>Veuillez demander un mot de passe pour vous connecter !";
				        $nxView->redirect('nxPass');
				    }

			    	// Message d'info
		        	$_SESSION['message'] = 'Vous êtes inscrit, vous allez recevoir votre mot de passe par email !';
		        	$nxView->redirect('home');
		        }
		        else // Echec ADD User
		        {
					$_SESSION['erreur'] = 'Votre inscription a échouée, veuillez recommencer !';
		        	$nxView->redirect('inscription');
		        }
		    }
	    }
	}

	public function users($params)
	{
		$userManager = new \Alaska_Model\UserManager; 
		$chapters = $userManager->getUsers();

        $nxView = new \Alaska_Model\View ('admin/users');
        $nxView->getView(array ('users' => $users));
	}

	// ---- LOGIN Manager ----------------------------------------------------
	public function loginUser($params)
	{
		$nxView = new \Alaska_Model\View();

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
		        $_SESSION['erreur'] = 'ERREUR : Le mot de passe ne correspond pas.';
		        $nxView->redirect('login');
		    }
	    }
	    else
	    {
	    	$_SESSION['erreur'] = "ERREUR : Cet Email n'est pas enregistré sur Roman - Un billet pour l'Alaska.";
	    	$nxView->redirect('login');
	    }
	}

	// ---- PASS Manager -----------------------------------------------------
	public function nxPass($params)
	{
		$nxView = new \Alaska_Model\View ('user/pass');
        $nxView->getView();
	}

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
	    
	            mail($verif_mail, $subject, $message, $headers) or $_SESSION['erreur']= "Problème d'envoi d'email";    

				$_SESSION['message'] = "Vous allez recevoir votre nouveau mot de passe sur votre email : ".$verif_mail."<br>Mot de passe : ".$nwPass ;
	            unset($_SESSION["nxPass"]);
				$nxView->redirect('login');
		    }
		    else
		    {
		    	$_SESSION['erreur'] = "ECHEC sur l'enregistrement du nouveau mot de passe n'a pas, veuillez en demander un nouveau ";
		        $nxView->redirect('nxPass');
		    }
	   	}
	   	else
	   	{
	   		$_SESSION['erreur'] = "ERREUR : Cet Email n'est pas enregistré sur Roman - Un billet pour l'Alaska.";
	    	$nxView->redirect('nxPass');
	   	}  
	}
}
