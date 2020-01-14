<?php
namespace Alaska_Model;

class ChapterManager extends Manager
{
    //========= CRUD Chapitre ======== */

    /*---  AJOUT Chapitre  ------------------- */
    public function addChapter($chapterNum, $chapterTitle, $chapterContent, $chapterImg, $chapterImgAlt, $chapterStatut)
    {
        $sql ='INSERT INTO alaska_chapters($num_chapter, $title_chapter, $content_chapter, $img_chapter, $imgAlt_chapter, $statut_chapter) 
            VALUES(?,?,?,?,?,?)';

        $datas = $this->reqSQL($sql, array ($chapterNum, $chapterTitle, $chapterContent, $chapterImg, $chapterImgAlt, $chapterStatut), $one = true);
        $chapter = new \Alaska_Model\Chapter($datas);
        return $chapter;
    }

    /*---  MODIFICATION Chapitre  ------------------- */
    public function updateChapter()
    {
        $sql = ' UPDATE alaska_chapters
            SET 
                chapter_date_edit=NOW(),
                chapter_num=?,
                chapter_title=?, 
                chapter_content=?, 
                chapter_img=?, 
                chapter_img_alt=?,
                chapter_statut=?) 
            VALUES(?, ?, ?, ?, ?, ?)';

    }


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

    public function adminChapters()
    {
        $sql ='SELECT *
            FROM alaska_chapters
            ORDER BY num_chapter ASC';
        $datas = $this->reqSQL($sql);

        foreach ($datas as $data ) {
            $chapter = new \Alaska_Model\Chapter($data);
            $chapters[] = $chapter; // Tableau d'objet
        }
        return $chapters;
    }

}