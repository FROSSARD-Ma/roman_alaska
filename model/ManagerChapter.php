<?php
namespace Alaska_Model;
use \PDO;

class ManagerChapter extends Manager
{
    //========= CRUD Chapitre ======== */

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

    /*---  LISTE de tous les Chapitres  ------- */
    public function allChapters()
    {
        $sql = 'SELECT *
            FROM alaska_chapters
            WHERE statut_chapter="published" 
            ORDER BY num_chapter ASC';

        $req = $this->getPDO()->query($sql);
        while ($data = $req->fetchall(PDO::FETCH_ASSOC)) // array
        {
          $Chapter = new \Alaska_Model\Chapter($data);
        }
    }

    /*---  Home 2 Chapitres  ------- */
    public function twoChapters()
    {
        $sql = 'SELECT *
        FROM alaska_chapters
        WHERE statut_chapter ="published" 
        ORDER BY num_chapter DESC
        LIMIT 0,2';
        
        $twoChapters = $this->reqSQL($sql);
        $count = count($twoChapters);

        for ($i=0; $i<$count; $i++)
        {   
            $Chapter.$i = new \Alaska_Model\Chapter($twoChapters[$i]);
        }
    }

    /*---  URL Chapitre  ------- */
    public function urlChapter($Id)
    {
        $idChapter = (int)$Id; 
    }
}