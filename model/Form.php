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
    	return $this->_verifyPass = password_verify($passForm, $passBDD);
    }


}