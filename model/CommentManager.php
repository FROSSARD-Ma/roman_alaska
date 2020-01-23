<?php
namespace Alaska_Model;
use \PDO;

class CommentManager extends Manager
{
    //========= CRUD Commentaire ======== */

    /*---  CREAT -------------------------------------------------------- */
    public function addComment($chapterId, $content)
    {
        $sql ='INSERT INTO alaska_comments(chapterId_comment, userID_comment, content_comment) 
                VALUES(:chapter,:user,:content)';

        $datas = $this->getPDO()->prepare($sql); // Requete PREPARE
        // On lie les variables aux paramètres de la requête préparée
        $datas->bindValue(':chapter', $chapterId, PDO::PARAM_STR);
        $datas->bindValue(':user', $_SESSION['userId'], PDO::PARAM_STR);
        $datas->bindValue(':content', $content, PDO::PARAM_STR);  
        $datas->execute();
        return $datas;
    }
    /*---  READ ---------------------------------------------------------- */
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
        return $count;
    }

    /*---  UPDATE -------------------------------------------------------- */


    /*---  DELETE -------------------------------------------------------- */
    public function deleteComment($id)
    {
        $idComment = (int)$id;
        $sql ='DELETE FROM alaska_signals 
            WHERE id_signal = :idComment';
        $data = $this->getPDO()->prepare($sql);
        $data->bindValue(':idComment', $idComment, PDO::PARAM_STR);  
        $data->execute();
        return $data;
    }
}