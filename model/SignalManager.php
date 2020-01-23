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
        $sql ='SELECT alaska_signals.*, alaska_comments.content_comment,alaska_comments.chapterId_comment
            FROM alaska_signals
                JOIN alaska_comments
                ON alaska_comments.id_comment = alaska_signals.id_comment
            GROUP BY alaska_comments.id_comment';
        $datas = $this->getPDO()->query($sql);
        $datas->execute();
        while ($data = $datas->fetch(PDO::FETCH_ASSOC))
        {
            $countSignal = implode($this->countSignals($data['id_comment']));
            $signal = new \Alaska_Model\Signal();

            $signal->setSignalId($data['id_signal']);
            $signal->setCommentId($data['id_comment']);
            $signal->setUserId($data['id_user']);
            $signal->setChapterId($data['chapterId_comment']);
            $signal->setComment($data['content_comment']);
            $signal->setCountSignal($countSignal);
            $signals[] = $signal; // tableau d'objet
        }
        return $signals;
    }

    public function countSignals($id)
    {
        $idComment = (int)$id;
        $sql ='SELECT COUNT(*)
            FROM alaska_signals 
            WHERE id_comment = ?';
        $countSignals = $this->reqSQL($sql, array ($idComment), $one = true);
        
        return $countSignals;
    }

    /*---  DELETE -------------------------------------------------------- */
    public function deleteSignal($id)
    {
        $idComment = (int)$id;
        $sql ='DELETE FROM alaska_signals
            WHERE id_comment = :idComment';
        $datas = $this->getPDO()->prepare($sql);
        $datas->bindValue(':idComment', $idComment, PDO::PARAM_STR);
        $datas->execute();
        return $datas;
    }

}