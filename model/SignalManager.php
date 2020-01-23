<?php
namespace Alaska_Model;
use \PDO;

class SignalManager extends Manager
{
    //========= CRUD Signalement ======== */

    /*---  CREAT -------------------------------------------------------- */
    public function addSignal($idComment)
    {
        $sql ='INSERT INTO alaska_signals(id_comment, id_user) 
                VALUES(:idComment,:idUser)';

        $datas = $this->getPDO()->prepare($sql); // Requete PREPARE
        // On lie les variables aux paramètres de la requête préparée
        $datas->bindValue(':idComment', $idComment, PDO::PARAM_STR);
        $datas->bindValue(':idUser', $_SESSION['userId'], PDO::PARAM_STR);
        $datas->execute();
        return $datas;
    }

    /*---  READ -------------------------------------------------------- */
    public function getSignals()
    {
        $sql ='SELECT alaska_comments.*, alaska_users.pseudo_user
            FROM alaska_comments
                JOIN alaska_signals
                ON alaska_signals.id_comment = alaska_comments.id_comment
                JOIN alaska_users
                ON alaska_users.id_user=alaska_signals.id_user';
        $datas = $this->reqSQL($sql);
        foreach ($datas as $data ) {
            $comment = new \Alaska_Model\Comment($data);
            $comments[] = $comment; // Tableau d'objet
        }
        return $comments;
    }
    public function countSignals($id)
    {
        $idComment = (int)$id;
        $sql ='SELECT COUNT(*)
            FROM alaska_signals 
            WHERE id_comment = ?';
        $count = $this->reqSQL($sql, array ($idComment), $one = true);
        return $count;
    }

    /*---  UPDATE -------------------------------------------------------- */


    /*---  DELETE -------------------------------------------------------- */
    public function deleteSignal($id)
    {
        $idSignal = (int)$id;
        $sql ='DELETE FROM alaska_signals 
            WHERE id_signal = ?';
        $data = $this->reqSQL($sql, array ($idSignal), $one = true);
        return $data;
    }

}