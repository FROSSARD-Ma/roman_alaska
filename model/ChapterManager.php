<?php
namespace Alaska_Model;
use \PDO;

class ChapterManager extends Manager
{
    //========= CRUD Chapitre ======== */

    /*---  LISTE de tous les Chapitres  ------- */
    public function getChapters()
    {
        $sql = 'SELECT *
            FROM alaska_chapters
            WHERE statut_chapter="published" 
            ORDER BY num_chapter ASC';

        $datas = $this->reqSQL($sql);
        foreach ($datas as $data ) {
            $chapter = new \Alaska_Model\Chapter($data);
            $chapters[] = $chapter; // Tableau d'objet
        }
        return $chapters;
    }
   
    /*---  DETAILS un Chapitre  ------- */
    public function getChapter($id)
    {
        $idChapter = (int)$id;

        $sql ='SELECT *
            FROM alaska_chapters 
            WHERE id_chapter = ?';

        $datas = $this->reqSQL($sql, array ($idChapter), $one = true);
        $chapter = new \Alaska_Model\Chapter($datas);
        return $chapter;
    }

     /*---  Home 2 Chapitres  ------- */
    public function twoChapters($limit = 2)
    {
        $sql = 'SELECT *
        FROM alaska_chapters
        WHERE statut_chapter ="published" 
        ORDER BY num_chapter DESC
        LIMIT 0,'.$limit;
        
        $datas = $this->reqSQL($sql);
        foreach ($datas as $data ) {
            $chapter = new \Alaska_Model\Chapter($data);
            $chapters[] = $chapter; // Tableau d'objet
        }
        return $chapters;
    }

    /*---  URL Chapitre  ------- */
    // public function urlChapter($Id)
    // {
    //     $idChapter = (int)$Id; 
    // }
}