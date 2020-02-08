<?php
namespace Alaska_Model;
use \PDO;

class ChapterManager extends Manager
{
    //========= CRUD Chapitre ======== */

    /*---  CREAT -------------------------------------------------------- */
    public function addChapter()
    {
        if (!empty($_FILES['image']['name']))
        {
            // Controle du chargement de l'imag
            include 'views/admin/uploadImage.php';
        } 
        else 
        {
            $nomImage = 'introduction-billet-pour-alaska.jpg';
        }

        $sql ='INSERT INTO alaska_chapters(title_chapter, num_chapter, img_chapter, imgAlt_chapter, content_chapter)
            VALUES(:title, :num, :image, :imgAlt, :content)';
        $datas = $this->getPDO()->prepare($sql);
        $datas->bindValue(':title',     htmlspecialchars($_POST['title']), PDO::PARAM_STR);
        $datas->bindValue(':num',       htmlspecialchars($_POST['num']), PDO::PARAM_INT); 
        $datas->bindValue(':image',     htmlspecialchars($nomImage), PDO::PARAM_STR);
        $datas->bindValue(':imgAlt',    htmlspecialchars($_POST['imgAlt']), PDO::PARAM_STR);
        $datas->bindValue(':content',   htmlspecialchars($_POST['content']), PDO::PARAM_STR);
        $datas->execute();  

        return $datas;
    }

    /*---  READ ---------------------------------------------------------- */

    /*--- LISTE Chapitres -- */
    public function getChapters()
    {
        // Pagination
        if (isset($_GET['paging']) AND !empty($_GET['paging']) AND $_GET['paging']>0 AND $_GET['paging'] = intval($_GET['paging']))
        {
            $currentPage = intval($_GET['paging']);
        }
        else 
        {
            $currentPage = 1;
        }

        $nbChapterPage = 5;
        $debut = ($currentPage-1)*$nbChapterPage;

        $sql = 'SELECT *
            FROM alaska_chapters
            WHERE statut_chapter="Publié" 
            ORDER BY num_chapter ASC LIMIT :debut, :nbChapterPage';

        $datas = $this->getPDO()->prepare($sql);
        $datas->bindValue(':debut', intval($debut), PDO::PARAM_INT);
        $datas->bindValue(':nbChapterPage', intval($nbChapterPage), PDO::PARAM_INT);
        $datas->execute(); 

        foreach ($datas as $data ) {
            $chapter = new \Alaska_Model\Chapter($data);
            $idChapter = $chapter->getId();

            // Count Comment du chapitre
            $commentManager = new \Alaska_Model\CommentManager;
            $countComment = $commentManager->countComments($idChapter);
            $chapter->setCountComment($countComment);

            $chapters[] = $chapter; // Tableau d'objet
        }
        
        return $chapters;
    }

    public function countChapters($statut)
    {
        if ($statut = 'all')
        {
            $sql = 'SELECT COUNT(*) FROM alaska_chapters';
        }
        else 
        {
            $sql = 'SELECT COUNT(*) FROM alaska_chapters WHERE statut_chapter= ?';
            
        }
        $count = $this->reqSQL($sql, array ($statut), $one = true);
        $countChapters = implode($count);
        return $countChapters;
    }

    /*--- DETAILS un Chapitre ---- */
    public function getChapter($id)
    {
        $idChapter = (int)$id;

        $sql ='SELECT *
            FROM alaska_chapters 
            WHERE id_chapter = ?';
        $datas = $this->reqSQL($sql, array ($idChapter), $one = true);

        // ID chapitre SUIVANT - PRECEDENT
        $prevID = $this->prevChapter($idChapter);
        $nextID = $this->nextChapter($idChapter);
        // Count Comment du chapitre
        $commentManager = new \Alaska_Model\CommentManager;
        $countComment = $commentManager->countComments($idChapter);

        $chapter = new \Alaska_Model\Chapter($datas);
        // hydratation avec datas + 
        $chapter->setPrevChapter($prevID);
        $chapter->setNextChapter($nextID);
        $chapter->setCountComment($countComment);
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
        // Two Chapters List
        foreach ($datas as $data ) {
            $chapter = new \Alaska_Model\Chapter($data);
            $idChapter = $chapter->getId();

            // Count Comment du chapitre
            $commentManager = new \Alaska_Model\CommentManager;
            $countComment = $commentManager->countComments($idChapter);
            $chapter->setCountComment($countComment);

            $chapters[] = $chapter; // Tableau d'objet
        }
        return $chapters;
    }

    public function adminChapters()
    {
        // Pagination
        if (isset($_GET['paging']) AND !empty($_GET['paging']) AND $_GET['paging']>0 AND $_GET['paging'] = intval($_GET['paging']))
        {
            $currentPage = intval($_GET['paging']);
        }
        else 
        {
            $currentPage = 1;
        }

        $nbChapterPage = 5;
        $debut = ($currentPage-1)*$nbChapterPage;

        $sql = 'SELECT *
            FROM alaska_chapters
            /*WHERE statut_chapter="Publié" */
            ORDER BY id_chapter DESC LIMIT :debut, :nbChapterPage';

        $datas = $this->getPDO()->prepare($sql);
        $datas->bindValue(':debut', intval($debut), PDO::PARAM_INT);
        $datas->bindValue(':nbChapterPage', intval($nbChapterPage), PDO::PARAM_INT);
        $datas->execute(); 

        // Chapters List
        foreach ($datas as $data ) {
            $chapter = new \Alaska_Model\Chapter($data);
            $idChapter = $chapter->getId();

            // Count Comment du chapitre
            $commentManager = new \Alaska_Model\CommentManager;
            $countComment = $commentManager->countComments($idChapter);
            $chapter->setCountComment($countComment);

            $chapters[] = $chapter; // Tableau d'objet
        }
        return $chapters;
    }

    public function prevChapter($id)
    {
        $sql ='SELECT id_chapter
            FROM alaska_chapters 
            WHERE id_chapter < ? AND statut_chapter="Publié"
            ORDER BY id_chapter DESC 
            LIMIT 1';
        $data = $this->reqSQL($sql, array ($id), $one = true);
        if ($data)
        {
            $idChapter = implode($data);
            return $idChapter;
        }
    }

    public function nextChapter($id)
    {
        $sql ='SELECT id_chapter
            FROM alaska_chapters 
            WHERE id_chapter > ? AND statut_chapter="Publié"
            ORDER BY id_chapter ASC 
            LIMIT 1';
        $data = $this->reqSQL($sql, array ($id), $one = true);
        if ($data)
        {
            $idChapter = implode($data);
            return $idChapter;
        }
    }



    /*---  UPDATE -------------------------------------------------------- */
    public function updateChapter($id)
    {
        if (!empty($_FILES['image']['name']))
        {
            // Controle du chargement de l'imag
            include 'views/admin/uploadImage.php';
        } 
        elseif (!empty($_POST['image2']))
        {
            $nomImage = $_POST['image2'];
        }
        else 
        {
             $nomImage = 'introduction-billet-pour-alaska.jpg';
        }

        // Mise à jour Chapitre
        $idChapter = (int)$id;
        $sql ='UPDATE alaska_chapters 
            SET modified_chapter = now(), num_chapter = :num, title_chapter=:title, content_chapter=:content, img_chapter=:image, imgAlt_chapter=:imgAlt, statut_chapter=:statut 
            WHERE  id_chapter = :idChapter';
        $datas = $this->getPDO()->prepare($sql);
        $datas->bindValue(':num',       $_POST['num'], PDO::PARAM_INT); 
        $datas->bindValue(':title',     $_POST['title'], PDO::PARAM_STR);
        $datas->bindValue(':content',   $_POST['content'], PDO::PARAM_STR);
        $datas->bindValue(':image',     $nomImage, PDO::PARAM_STR);
        $datas->bindValue(':imgAlt',    $_POST['imgAlt'], PDO::PARAM_STR);
        $datas->bindValue(':statut',    $_POST['statut'], PDO::PARAM_STR);
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