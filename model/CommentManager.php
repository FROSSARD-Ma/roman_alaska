<?php
namespace Alaska_Model;

class CommentManager extends Manager
{
    //========= CRUD Commentaire ======== */

    /*---  LISTE Commentaires  ---- */
    public function getComments($id)
    {
        $idChapter = (int)$id;

        $sql ='SELECT alaska_comments.*, alaska_users.pseudo_user
            FROM alaska_comments 
                JOIN alaska_users
                ON alaska_comments.userId_comment=alaska_users.id_user
            WHERE chapterId_comment = ?';
        $datas = $this->reqSQL($sql, array ($idChapter));

        // Mise en session nombre de commentaire 
        $_SESSION['nbComments'] = count($datas);

        // Création des objets commentaire
        foreach ($datas as $data ) {
            $result = new \Alaska_Model\Comment($data);
            $results[] = $result; // Tableau d'objet
        }
        return $results;
    }

    /*---  DETAILS Commentaire     ---- */

   
    /*---  INSERT Commentaire     ---- */


    /* ----  MODIF Commentaire ---- */


}