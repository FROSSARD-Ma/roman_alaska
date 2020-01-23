<?php
namespace Alaska_Model;

class Signal extends Manager
{
    // Table SQL Comments
    private $_id_signal;
    private $_id_comment;
    private $_id_user;

    // JOIN Table SQL Users & Chapter & Comments
    private $_id_chapter;
    private $_comment;

    // COUNT Signal
    private $_countSignal;

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
    public function getChapterId()
    {
        return $this->_id_chapter;
    }
    public function getComment()
    {
        return $this->_comment;
    }
    public function getCountSignal()
    {
        return $this->_countSignal;
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
    public function setChapterId($id)
    {
        // convertit l'argument en nombre entier.
        $id = (int) $id;
        
        if ($id > 0)
        {
            $this->_id_chapter = $id;
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
    public function setCountSignal($count)
    {
        // convertit l'argument en nombre entier.
        $count = (int) $count;
        
        if ($count > 0)
        {
            $this->_countSignal = $count;
        }
    }
}
?>