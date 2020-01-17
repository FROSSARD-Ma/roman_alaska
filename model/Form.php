<?php
namespace Alaska_Model;

class Form extends Manager
{
	
	public 	$_text;
    public 	$_mail;

    public 	$_creatPass;
    public 	$_verifyPass;


	public function verifText($text)
	{
	    // Chaîne de caractères ?
	    if (is_string($text))
	    {
	      	$this->_text = $text;
	    }
	}

	public function verifMail($mail)
	{
		// Adresse Email avec ...... @ ... . ...
		if (isset($mail))
        {
            if (!preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $mail))
            {
            	$_SESSION['erreur'] = "L\'adresse email n\'est pas valide, veuillez recommencer !";
            }
            else 
            {
            	return $this->_email = $email;
            }
        }
        else
        {
        	$_SESSION['erreur'] = "Vous n\'avez pas renseigné votre email !<br />";
        } 
	}

    public function verifyPass($passForm, $passBDD)
    {
    	/**
		* Hacher MDP en utiliant l'algorithme par défaut = BCRYPT, chaîne 60 caractères
		* caractères d'une longueur de 60 caractères.
		*/
    	return $this->_verifyPass = password_verify($passForm, $passBDD);
    }

	// public function creatPass($chaine = 'azertyuiopqsdfghjklmwxcvbn123456789')
 //    {
 //    	// Génération d'une chaine aléatoire ------------------ 
 //        $nb_lettres = strlen($chaine) - 1; // Calcule la taille d'une chaîne
 //        $nwPass = '';
 //        for($i=0; $i < 8 ; $i++) // 8 caractères
 //        {
 //        	// Génère valeur aléatoire de 8 caractères
 //            $pos = mt_rand(0, $nb_lettres); 
 //            $car = $chaine[$pos]; 
 //            $nwPass .= $car;
 //        }

 //        // cryptage Nouveau mot de passe
 //        return $this->_creatPass = password_hash($nwPass, PASSWORD_DEFAULT);
 //    }



}