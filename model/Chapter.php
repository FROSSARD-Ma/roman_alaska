<?php
namespace Alaska_Model;

class Chapter extends Manager
{
    private $_id_chapter;
    private $_created_chapter;
    private $_modified_chapter;
    private $_num_chapter;
    private $_title_chapter;
    private $_content_chapter;
    private $_img_chapter;
    private $_imgAlt_chapter;
    private $_statut_chapter;

    // public function __construct(array $dataSQL)
    // {
    //     $this->hydrate($dataSQL);
    // }

    // // Un tableau de données (associatif) doit être passé à la fonction
    // public function hydrate(array $dataSQL)
    // {
    //     foreach ($dataSQL as $key => $value)
    //     {
    //         // Forcer Majuscule, supp '_chapter' = 8 caractères
    //         // On récupère le nom du setter correspondant à l'attribut
    //         $method = 'set' . ucfirst(substr($key,0,-8));
    //         if (method_exists($this, $method))
    //         {
    //             $this->$method($value);
    //         }
    //     }
    // }

    // Liste des GETTERS --------------------------------------
    public function getId()        { return $this->_id_chapter; }
    public function getCreated()   { return $this->_created_chapter; }
    public function getModified()  { return $this->_modified_chapter; }
    public function getNum()       { return $this->_num_chapter; }
    public function getTitle()     { return $this->_title_chapter; }
    public function getContent()   { return $this->_content_chapter; }
    public function getImg()       { return $this->_img_chapter; }
    public function getImgAlt()    { return $this->_imgAlt_chapter; }
    public function getStatut()    { return $this->_statut_chapter; }


    // Liste des SETTERS ---------------------------------------

    public function setId($id)
    {
        // convertit l'argument en nombre entier.
        $id = (int) $id;
        
        // Positif ?
        if ($id > 0)
        {
            // Si OK on assigne la valeur à l'attribut correspondant.
            $this->_id_chapter = $id;
        }
    }
      
    public function setCreated($dateCreat)
    {
        // Date ?
        if (is_string($dateCreat))
        {
            $this->_created_chapter = $dateCreat;
        }
    }

    public function setModified($dateEdit)
    {
        // Date ?
        if (is_string($dateEdit))
        {
          $this->_modified_chapter = $dateEdit;
        }
    }

    public function setNum($num)
    {
        // convertit l'argument en nombre entier.
        $num = (int) $num;
        
        // Positif ?
        if ($num > 0)
        {
          $this->_num_chapter = $num;
        }
    }

    public function setTitle($title)
    {
        // chaîne de caractères ?
        if (is_string($title))
        {
          $this->_title_chapter = $title;
        }
    }

    public function setContent($content)
    {
        // chaîne de caractères ?
        if (is_string($content))
        {
          $this->_content_chapter = $content;
        }
    }

    public function setImg($img)
    {
        // chaîne de caractères ?
        if (is_string($img))
        {
          $this->_img_chapter = $img;
        }
    }

    public function setImgAlt($imgAlt)
    {
        // chaîne de caractères ?
        if (is_string($imgAlt))
        {
          $this->_imgAlt_chapter = $imgAlt;
        }
    }

    public function setStatut($statut)
    {
        // chaîne de caractères ?
        if ((is_string($statut)) && ($statut = 'draft' OR $statut = 'published'))
        {
          $this->_statut_chapter = $statut;
        }
    }
}
?>