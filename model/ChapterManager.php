<?php
namespace Alaska_Model;
use \PDO;

class ChapterManager extends Manager
{
    //========= CRUD Chapitre ======== */

    /*---  CREAT -------------------------------------------------------- */
    public function addChapter($title, $texte)
    {
        $sql ='INSERT INTO alaska_chapters(title_chapter, content_chapter) 
            VALUES(:title, :texte)';
        $datas = $this->getPDO()->prepare($sql);
        // On lie les variables aux paramètres de la requête préparée
        $datas->bindValue(':title', $title, PDO::PARAM_STR);
        $datas->bindValue(':texte', $texte, PDO::PARAM_STR);  
        $datas->execute();
        return $datas;
    }

    /*---  READ ---------------------------------------------------------- */

    /*--- LISTE Chapitres -- */
    public function getChapters()
    {
        $sql = 'SELECT *
            FROM alaska_chapters
            WHERE statut_chapter="Publié" 
            ORDER BY num_chapter ASC';

        $datas = $this->reqSQL($sql);
        foreach ($datas as $data ) {
            $chapter = new \Alaska_Model\Chapter($data);
            $chapters[] = $chapter; // Tableau d'objet
        }
        return $chapters;
    }
   
    /*--- DETAILS un Chapitre ---- */
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

     /*--- Home 2 Chapitres --- */
    public function twoChapters($limit = 2)
    {
        $sql = 'SELECT *
        FROM alaska_chapters
        WHERE statut_chapter ="Publié" 
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
            ORDER BY id_chapter ASC';
        $datas = $this->reqSQL($sql);

        // Chapters List
        foreach ($datas as $data ) {
            $chapter = new \Alaska_Model\Chapter($data);
            $chapters[] = $chapter; // Tableau d'objet
        }
        return $chapters;
    }

    public function prevChapter($id)
    {
        $prevChapter = $id-1;
        $sql ='SELECT id_chapter
            FROM alaska_chapters 
            WHERE id_chapter = ? AND statut_chapter="Publié"';
        $data = $this->reqSQL($sql, array ($prevChapter), $one = true);
        if ($data) {
            $idChapter = implode($data);
            echo '<a href="index.php?page=chapter/id/'.$idChapter.'" class="button left"><i class="fas fa-arrow-alt-circle-left"></i> Chapitre précedent</a>';
        }
    }

    public function nextChapter($num)
    {
        $nextChapter = $num+1;
        $sql ='SELECT id_chapter
            FROM alaska_chapters 
            WHERE num_chapter = ? AND statut_chapter="Publié"';
        $data = $this->reqSQL($sql, array ($nextChapter), $one = true);
        if ($data) {
            $idChapter = implode($data);
            if ($idChapter>=0)
            {
                echo '<a href="index.php?page=chapter/id/'.$idChapter.'" class="button right">Chapitre suivant <i class="fas fa-arrow-alt-circle-right"></i></a>';
            }
        }
    }

    /*---  UPDATE -------------------------------------------------------- */
    public function updateChapter($id)
    {
        $idChapter = (int)$id;
        $sql ='UPDATE alaska_chapters 
            SET modified_chapter = now(), num_chapter = :num, title_chapter=:title, content_chapter=:texte, img_chapter=:image, imgAlt_chapter=:imgAlt, statut_chapter=:statut 
            WHERE  id_chapter = :idChapter';
        $datas = $this->getPDO()->prepare($sql);
        $datas->bindValue(':num', $_POST['num'], PDO::PARAM_INT); 
        $datas->bindValue(':title', $_POST['title'], PDO::PARAM_STR);
        $datas->bindValue(':texte', $_POST['texte'], PDO::PARAM_STR);
        $datas->bindValue(':image', $_POST['image'], PDO::PARAM_STR);
        $datas->bindValue(':imgAlt', $_POST['imgAlt'], PDO::PARAM_STR);
        $datas->bindValue(':statut', $_POST['statut'], PDO::PARAM_STR);
        $datas->bindValue(':idChapter', $idChapter, PDO::PARAM_STR); 
        $datas->execute();  
        return $datas;
    }

    /*---  DELETE -------------------------------------------------------- */
    public function deleteChapter($id)
    {
        $idChapter = (int)$id;
        $sql ='DELETE FROM alaska_chapters WHERE id_chapter = :idChapter';
        $data = $this->getPDO()->prepare($sql);
        $data->bindValue(':idChapter', $idChapter, PDO::PARAM_STR);  
        $data->execute();
        return $data;
    }

}