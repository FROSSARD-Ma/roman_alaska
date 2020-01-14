<?php
namespace Alaska_Model;

class User extends Manager
{
	private $_id_user;
    private $_name_user;
    private $_firstname_user;
    private $_pseudo_user;
    private $_email_user;
    private $_pass_user;
    private $_role_user;

	public function __construct(array $dataSQL)
    {
        $this->hydrate($dataSQL);
    }

    // Un tableau de données (associatif) doit être passé à la fonction
    public function hydrate(array $dataSQL)
    {
        foreach ($dataSQL as $key => $value)
        {
            // Forcer Majuscule, supp '_user' = 5 caractères
            // On récupère le nom du setter correspondant à l'attribut
            $method = 'set' . ucfirst(substr($key,0,-5));
            if (method_exists($this, $method))
            {
                $this->$method(htmlspecialchars($value));
            }
        }
    }

     // Liste des GETTERS --------------------------------------
    public function getId()
    { 
        return $this->_id_user; 
    }
    public function getName()
    { 
        return $this->_name_user; 
    }
    public function getFirstname()
    { 
        return $this->_firstname_user; 
    }
    public function getPseudo()
    { 
        return $this->_pseudo_user;
    }
    public function getEmail()
    { 
        return $this->_email_user; 
    }
    public function getPass()
    {
        return $this->_pass_user;
    }
    public function getRole()
    {
        return $this->_role_user;
    }

    // Liste des SETTERS ---------------------------------------

  	public function setId($id)
	{
	    // On convertit l'argument en nombre entier.
	    $id = (int) $id;
	    
	    // Positif ?
	    if ($id > 0)
	    {
	      	// Si OK on assigne la valeur à l'attribut correspondant.
	      	$this->_id_user = $id;
	    }
	}
	  
	public function setName($name)
	{
	    // Chaîne de caractères ?
	    if (is_string($name))
	    {
	      	$this->_name_user = $name;
	    }
	}

	public function setFirstname($firstname)
	{
	    // chaîne de caractères ?
	    if (is_string($firstname))
	    {
	      $this->_firstname_user = $firstname;
	    }
	}

	public function setPseudo($pseudo)
	{
	    // chaîne de caractères ?
	    if (is_string($pseudo))
	    {
	      $this->_pseudo_user = $pseudo;
	    }
	}

	public function setEmail($email)
	{
	    // chaîne de caractères ?
	    if (is_string($email))
	    {
	      $this->_email_user = $email;
	    }
	}

	public function setPass($pass)
	{
	    

	    if (is_string($pass)) 
	    {
	    // Encoder

	      $this->_pass_user = $pass;

	    }
	}

	public function setRole($role)
	{
	    // chaîne de caractères ?
	    if (is_string($role))
	    {
	      $this->_role_user = $role;
	    }
	}

}