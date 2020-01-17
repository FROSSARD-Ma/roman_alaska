<?php
namespace Alaska_Model;

class FormManager extends Manager
{
	public function existUser($email)
	{
 		// Récupération de l'utilisation l'EMAIl utilisateur 
		$sql ='SELECT *
            FROM alaska_users 
            WHERE email_user = ?';
        $datas = $this->reqSQL($sql, array ($email), $one = true);
       	return $datas;
	}

}