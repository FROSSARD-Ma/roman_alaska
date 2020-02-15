<?php
namespace Alaska_Model;
use \PDO;

class CommentManager extends Manager
{
    //========= CRUD Commentaire ======== */

    /*---  CREAT -------------------------------------------------------- */
    public function addComment($chapterId, $content)
    {
        $idChapter = (int)$chapterId;
        $sql ='INSERT INTO alaska_comments(chapterId_comment, userID_comment, content_comment) 
                VALUES(:chapter,:user,:content)';

        $datas = $this->getPDO()->prepare($sql); // Requete PREPARE
        // On lie les variables aux paramètres de la requête préparée
        $datas->bindValue(':chapter', htmlspecialchars($idChapter), PDO::PARAM_STR);
        $datas->bindValue(':user', $_SESSION['userId'], PDO::PARAM_STR);
        $datas->bindValue(':content', htmlspecialchars($content), PDO::PARAM_STR);  
        $datas->execute();
        return $datas;
    }
    /*---  READ ---------------------------------------------------------- */
     public function getComment($id)
    {
       $idComment = (int)$id;
        $sql ='SELECT alaska_comments.*, alaska_users.pseudo_user, alaska_chapters.num_chapter,alaska_chapters.title_chapter
            FROM alaska_comments 
                JOIN alaska_users
                ON alaska_comments.userID_comment=alaska_users.id_user
                JOIN alaska_chapters
                ON alaska_comments.chapterId_comment=alaska_chapters.id_chapter
            WHERE id_comment = ?';
        $datas = $this->reqSQL($sql, array ($idComment), $one = true);
        $comment = new \Alaska_Model\Comment($datas);
        return $comment;
    }
    public function getComments($id)
    {
       $idChapter = (int)$id;

        $sql ='SELECT alaska_comments.*, alaska_users.pseudo_user
            FROM alaska_comments 
                JOIN alaska_users
                ON alaska_comments.userID_comment=alaska_users.id_user
            WHERE chapterId_comment = ?';
        $datas = $this->reqSQL($sql, array ($idChapter));
        return $datas;
    }
    public function countComments($id)
    {
        $idChapter = (int)$id;

        $sql ='SELECT COUNT(*)
            FROM alaska_comments 
            WHERE chapterId_comment = ?';
            
        $count = $this->reqSQL($sql, array ($idChapter), $one = true);
        $countComments = implode($count);
        return $countComments;
    }

    /*---  UPDATE -------------------------------------------------------- */
    public function updateComment($id)
    {
        // Ajout de l'information de modération du commentaire
        $comparaison = substr_compare($_POST['content'], "Commentaire modéré", 0, 19);


        if ($comparaison > 0) // comparaison chaine
        {
            $content = "Commentaire modéré par l'administrateur : ". $_POST['content'];
        }
        else 
        {
            $content = $_POST['content'];
        }

        $idComment = (int)$id;
        $sql ='UPDATE alaska_comments SET content_comment = :contentComment WHERE  id_comment = :idComment';
        $data = $this->getPDO()->prepare($sql);
        $data->bindValue(':idComment', $idComment, PDO::PARAM_STR); 
        $data->bindValue(':contentComment', $content, PDO::PARAM_STR);
        $data->execute();  

        return $data;
    }

    /*---  DELETE -------------------------------------------------------- */
    public function deleteComment($id)
    {
        $idComment = (int)$id;
        $sql ='DELETE FROM alaska_comments WHERE id_comment = :idComment';
        $data = $this->getPDO()->prepare($sql);
        $data->bindValue(':idComment', $idComment, PDO::PARAM_STR);  
        $data->execute();
        return $data;
    }
}