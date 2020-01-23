<?php
namespace Alaska_Model;

class Signal extends Manager
{
    // Table SQL Comments
    private $_id_signal;
    private $_id_comment;
    private $_id_user;

    // JOIN Table SQL Users & Comments
    private $_pseudo_user;
    private $_comment;

    // Liste des GETTERS --------------------------------------
    public function getSignalId()
    { 
        return $this->_id_signal; 
    }
    public function getCommentId()
    { 
        return $this->_id_comment; 
    }
    public function getUserId()
    { 
        return $this->_id_user; 
    }
    public function getUserPseudo()
    {
        return $this->_pseudo_user;
    }
    public function getComment()
    {
        return $this->_comment;
    }
    
    // Liste des SETTERS ---------------------------------------

    public function setSignalId($id)
    {
        // convertit l'argument en nombre entier.
        $id = (int) $id;
        
        if ($id > 0)
        {
            $this->_id_signal = $id;
        }
    }
    public function setCommentId($id)
    {
        // convertit l'argument en nombre entier.
        $id = (int) $id;
        
        if ($id > 0)
        {
            $this->_id_comment = $id;
        }
    }
    public function setUserId($id)
    {
        // convertit l'argument en nombre entier.
        $id = (int) $id;
        
        if ($id > 0)
        {
            $this->_id_user = $id;
        }
    }
    public function setUserPseudo($pseudo)
    {
        // chaîne de caractères ?
        if (is_string($pseudo))
        {
          $this->_pseudo_user = $pseudo;
        }
    }
    public function setComment($content)
    {
        // chaîne de caractères ?
        if (is_string($content))
        {
          $this->_comment = $content;
        }
    }
}
?>