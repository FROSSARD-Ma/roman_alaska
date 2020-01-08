<?php
namespace Alaska_Model;
use \PDO;

class ManagerChapter extends Manager
{
    //========= CRUD Chapitre ======== */

    /*---  LISTE de tous les Chapitres  ------- */
    public function allChapters()
    {
        $sql = 'SELECT *
            FROM alaska_chapters
            WHERE statut_chapter="published" 
            ORDER BY num_chapter ASC';
        
        $data = $this->reqSQL($sql);
        $count = count($data);
        for ($i=0; $i<$count; $i++)
        {   
            $Chapter.$i = new \Alaska_Model\Chapter($data[$i]);
        }
    }
   
    /*---  DETAILS un Chapitre  ------- */
    public function oneChapter($Id)
    {
        $idChapter = (int)$Id;
        $sql ='SELECT *
            FROM alaska_chapters 
            WHERE id_chapter = ?';

        $oneChapter = $this->reqSQL($sql, array ($idChapter), $one = true);
        return $oneChapter;
    }

     /*---  Home 2 Chapitres  ------- */
    public function twoChapters()
    {
        $sql = 'SELECT *
        FROM alaska_chapters
        WHERE statut_chapter ="published" 
        ORDER BY num_chapter DESC
        LIMIT 0,2';
        
        // $twoChapters = $this->reqSQL($sql);
        // $count = count($twoChapters);
        // for ($i=0; $i<$count; $i++)
        // {   
        //     // $data = implode($twoChapters[$i]);

        //     $Chapter.$i = new \Alaska_Model\Chapter($twoChapters[$i]); 
        // }

        $req = $this->getPDO()->query($sql);
        while ($data = $req->fetchall(PDO::FETCH_ASSOC)) // Chaque entrée placée dans array / tableau associatif
        {
            $chapter = new \Alaska_Model\Chapter();

            $chapter->setId($data['id_chapter']);
            $chapter->setCreated($data['created_chapter']);
            $chapter->setModified($data['modified_chapter']);
            $chapter->setNum($data['num_chapter']);
            $chapter->setTitle($data['title_chapter']);
            $chapter->setContent($data['content_chapter']);
            $chapter->setImg($data['img_chapter']);
            $chapter->setImgAlt($data['imgAlt_chapter']);
            $chapter->setStatut($data['statut_chapter']);

            $chapters[] = $chapter; // Tableau d'objet

            var_dump($data);
        }
        return $chapters;

    }

    /*---  URL Chapitre  ------- */
    public function urlChapter($Id)
    {
        $idChapter = (int)$Id; 
    }
}