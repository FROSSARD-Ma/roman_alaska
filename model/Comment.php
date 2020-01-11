<?php
namespace Alaska_Model;
use \DateTime;

class Comment extends Manager
{
    private $_id_comment;
    private $_chapterId_comment;
    private $_userID_comment;
    private $_created_comment;
    private $_content_comment;
    private $_signal_comment;
    private $_read_comment;
    private $_pseudo_user;

    public function __construct(array $dataSQL)
    {
        $this->hydrate($dataSQL);
    }

    // Un tableau de données (associatif) doit être passé à la fonction
    public function hydrate(array $dataSQL)
    {
        foreach ($dataSQL as $key => $value)
        {
            // Forcer Majuscule, supp '_comment' = 8 caractères
            // On récupère le nom du setter correspondant à l'attribut
            $method = 'set' . ucfirst(substr($key,0,-8));
            if (method_exists($this, $method))
            {
                $this->$method(htmlspecialchars($value));
            }
        }
    }

    // Liste des GETTERS --------------------------------------
    public function getId()
    { 
        return $this->_id_comment; 
    }
    public function getchapterId()
    { 
        return $this->_chapterId_comment; 
    }
    public function getUserID()
    { 
        return $this->_userID_comment; 
    }
    public function getCreated()
    { 
        return $this->_created_comment;
    }
    public function getContent()
    { 
        return $this->_content_comment; 
    }
    public function getSignal()
    {
        return $this->_signal_comment;
    }
    public function getRead()
    {
        return $this->_read_comment;
    }

    public function getUserPseudo()
    {
        return $this->_pseudo_user;
    }
    
    // Liste des SETTERS ---------------------------------------

    public function setId($id)
    {
        // convertit l'argument en nombre entier.
        $id = (int) $id;
        
        if ($id > 0)
        {
            $this->_id_comment = $id;
        }
    }
    public function setChapterId($id)
    {
        // convertit l'argument en nombre entier.
        $id = (int) $id;
        
        if ($id > 0)
        {
            $this->_chapterId_comment = $id;
        }
    }
    public function setUserID($id)
    {
        // convertit l'argument en nombre entier.
        $id = (int) $id;
        
        if ($id > 0)
        {
            $this->_userID_comment = $id;
        }
    }
    public function setCreated($dateCreated)
    {
        $date = new DateTime($dateCreated);
        $this->_created_comment = $date->format('d-m-Y');
    }

    public function setContent($content)
    {
        // chaîne de caractères ?
        if (is_string($content))
        {
          $this->_content_comment = $content;
        }
    }
    public function setSignal($signal)
    {
        // chaîne de caractères ?
        if (is_string($signal))
        {
          $this->_signal_comment = $img;
        }
    }
    public function setRead($read)
    {
        // chaîne de caractères ?
        if (is_string($read))
        {
          $this->_read_comment = $read;
        }
    }
    public function setPse($pseudo)
    {
        // chaîne de caractères ?
        if (is_string($pseudo))
        {
          $this->_pseudo_user = $pseudo;
        }
    }
}
?>