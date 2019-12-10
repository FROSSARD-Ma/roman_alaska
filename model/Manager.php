<?php 
namespace Alaska;
use \PDO;

class Manager {
  
    const BD_host='sql24.phpnet.org';
    const BD_name='rbb05303';
    const BD_user='rbb05303';
    const BD_pass='Wdy2YBH4ucC';

    public function getPDO() { // Retourne connexion BDD
        if ($this->pdo === null) {
            try {
            $pdo = new PDO('mysql:host='.Manager::BD_host.';dbname='.Manager::BD_name, Manager::BD_user, Manager::BD_pass);
            $pdo-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
            return $this->pdo;
            }
            catch(PDOException $e) {
              echo "Echec de connexion à la base de donnée !";
            }
        }
        return $this->pdo;
    }

    protected function reqSQL($sql, $parametres = null) {
        // Requete QUERY
        if ($parametres == null) { 
            $req = $this->getPDO()->query($sql);
            $req->execute();
        }
        // Requete PREPARE
        else 
        {
            $req = $this->getPDO()->prepare($sql);
            $req->execute($parametres);
        }
        $donnees = $req->fetchall(PDO::FETCH_ASSOC);
        return $donnees;
    }
}