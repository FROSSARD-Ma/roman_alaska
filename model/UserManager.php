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

		if (!$datas)
		{
		    echo 'Mauvais identifiant Email !';
		}
		else
		{
			$nxUser = new \Alaska_Model\User($datas);
			// Comparaison du pass envoyé via le formulaire avec la base
			//$PassCorrect = password_verify($pass, $nxUser->getPass());
			$PassCorrect = $nxUser->getPass();

			if ($PassCorrect) {
				$_SESSION['user'] = $nxUser->getPseudo();
		        $_SESSION['role'] = $nxUser->getRole();
		    }
		    else {
		        echo 'Mauvais identifiant ou mot de passe !';
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