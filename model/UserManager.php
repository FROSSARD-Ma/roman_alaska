<?php
namespace Alaska_Model;
use \PDO;

class UserManager extends Manager
{

	public function creatUser($name, $firstname, $pseudo, $email)
	{
		$sql ='INSERT INTO alaska_users(name_user, firstname_user, pseudo_user, email_user) 
            VALUES(:name,:firstname,:pseudo,:email)';

        $req = $this->getPDO()->prepare($sql); // Requete PREPARE

        // On lie les variables aux paramètres de la requête préparée
	    $req->bindValue(':name',   		$name, PDO::PARAM_STR);
	    $req->bindValue(':firstname', 	$firstname, PDO::PARAM_STR);
	    $req->bindValue(':pseudo',    	$pseudo, PDO::PARAM_STR);  
	    $req->bindValue(':email',     	$email, PDO::PARAM_STR); 
        $req->execute();
	}

	public function login($email, $pass)
	{
 		//  Récupération de l'utilisateur 
		$sql ='SELECT *
            FROM alaska_users 
            WHERE email_user = ?';
        $datas = $this->reqSQL($sql, array ($email), $one = true);

		if ($datas)
		{
			$nxUser = new \Alaska_Model\User($datas);
			// Comparaison du pass envoyé via le formulaire avec la base
			$PassCorrect = password_verify($pass, $nxUser->getPass());
			if ($PassCorrect) {
				$_SESSION['user'] = $nxUser->getPseudo();
		        $_SESSION['role'] = $nxUser->getRole();
		    }
		    else {
		        $_SESSION['message'] = 'Mauvais mot de passe !';
		    }
		}
		else
		{
		    $_SESSION['message'] = 'Mauvais email';
		}
	}

	public function nxPass($email)
	{
		//  Récupération de l'utilisateur 
		$sql ='SELECT *
            FROM alaska_users 
            WHERE email_user = ?';
        $datas = $this->reqSQL($sql, array ($email), $one = true);

		if ($datas)
		{
            // Génération d'une chaine aléatoire ------------------
            function pass_aleatoire($nb_car, $chaine = 'azertyuiopqsdfghjklmwxcvbn123456789')
            {
                $nb_lettres = strlen($chaine) - 1;
                $generation = '';
                for($i=0; $i < $nb_car; $i++)
                {
                    $pos = mt_rand(0, $nb_lettres);
                    $car = $chaine[$pos];
                    $generation .= $car;
                }
                return $generation;
            }

            // Nouveau mot de passe
            $passAleatoire = pass_aleatoire(8);  // Generer
            /**
			 * Hacher MDP en utiliant l'algorithme par défaut = BCRYPT, chaîne 60 caractères
			 * caractères d'une longueur de 60 caractères.
			*/
            $pass_crypte = password_hash($passAleatoire, PASSWORD_DEFAULT);

            // Update Pass dans BDD User
            $sql ='UPDATE alaska_users SET pass_user = :pass_crypte WHERE email_user = :email';
        	$req = $this->getPDO()->prepare($sql);
		    $req->bindValue(':pass_crypte',$pass_crypte, PDO::PARAM_STR);
		    $req->bindValue(':email',$email, PDO::PARAM_STR);
	        $req->execute();

		    $nb = $req->rowCount();
		    if($nb == 1) 
		    {
			    // Envoyer un MAIL avec le nouv eau mot de passe ------------
	            $verif_mail = $email;
	            $subject 	= "Mot de passe - Roman, Un billet pour l'Alaska";
	            $message	= "
	            <html>
	            <p align='left'><font color='#3E3E7D' size='3' face='Arial, Helvetica, sans-serif'>
	            <blockquote >Votre mot de passe pour l'acc&egrave;der au Roman en ligne 'un Billet pour l'Alaska' est : <br><br>
	            	<b>Votre Mot de Passe</b> : $passAleatoire
	            </blockquote>
	            </font></p>
	            </html>";
	            $headers = "From: Jean Forteroche - Auteur\n";
	        	$headers.= "MIME-Version: 1.0\n";
	        	$headers.= "Content-type: text/html; charset=utf-8\n";
	    
	            mail($verif_mail, $subject, $message, $headers) or $_SESSION['message']= "Problème d'envoi d'email";    
			}
		}
	}

	public function getUser($id)
	{
	}
	public function delete($id)
	{
	}
}