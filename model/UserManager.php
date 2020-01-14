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

	public function update()
	{

	}

	public function delete()
	{

	}


	public function login($email, $pass, $remember)
	{
		$email = 
		$pass = 

        $sql ='SELECT alaska_users.email_user, alaska_users.pass_user
            FROM alaska_users 
            WHERE email_user = ? AND pass_user = ?';
        $datas = $this->reqSQL($sql, array ($email, $pass));


 // si ok génère objet

	}

	public function logged()
	{
		return isset($_SESSION['authentification']);
	}

	public function getUsers()
	{

	}
}