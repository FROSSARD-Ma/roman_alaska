<?php
namespace Alaska_Model;
use \PDO;

class UserManager extends Manager
{
	public function addUser($name, $firstname, $pseudo, $email)
	{
		$sql ='INSERT INTO alaska_users(name_user, firstname_user, pseudo_user, email_user) 
	            VALUES(:name,:firstname,:pseudo,:email)';

        $datas = $this->getPDO()->prepare($sql); // Requete PREPARE

        // On lie les variables aux paramètres de la requête préparée
	    $datas->bindValue(':name',   	$name, PDO::PARAM_STR);
	    $datas->bindValue(':firstname', $firstname, PDO::PARAM_STR);
	    $datas->bindValue(':pseudo',	$pseudo, PDO::PARAM_STR);  
	    $datas->bindValue(':email',		$email, PDO::PARAM_STR); 
        $datas->execute();

		return $datas;
	}

	public function addPass($email)
	{
		// Génération d'un mot de passe aléatoire  de 8 caractères  
		$chaine = 'azertyuiopqsdfghjklmwxcvbn123456789';
        $nb_lettres = strlen($chaine) - 1;
        $nwPass = '';
        for($i=0; $i < 8 ; $i++) // 8 caractères
        {
            $pos = mt_rand(0, $nb_lettres); 
            $car = $chaine[$pos]; 
            $nwPass .= $car;
        }
        // cryptage Nouveau mot de passe
       	$nxPassCrypt = password_hash($nwPass, PASSWORD_DEFAULT);

 		// Update dans la BDD
	    $sql ='UPDATE alaska_users SET pass_user = :pass_crypte WHERE email_user = :email';
		$data = $this->getPDO()->prepare($sql);
	    $data->bindValue(':pass_crypte',$nxPassCrypt, PDO::PARAM_STR);
	    $data->bindValue(':email',$email, PDO::PARAM_STR);
	    $data->execute();
	    return $data;
	}

	public function getUser($id)
	{
	}

	public function delete($id)
	{
	}
}