<?php 
namespace SWFram;
use \PDO;

class Connexion {
  
    const BD_host='sql24.phpnet.org';
    const BD_name='rbb05303';
    const BD_user='rbb05303';
    const BD_pass='Wdy2YBH4ucC';


    public function getPDO() { // Retourne la connexion
    
        try {
            $pdo = new PDO('mysql:host='.Connexion::BD_host.';dbname='.Connexion::BD_name, Connexion::BD_user, Connexion::BD_pass);
            $pdo-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        }
        catch(PDOException $e) {
          echo "Echec de connexion à la base de donnée !";
        }
    }

// Appel des méthodes de connection
// 2 méthodes à mettre en place en fonction de la présence de paramètre ou pas.

    public function query($sql) {
        $req = $this->getPDO()->query($sql);
        $datas = $req->fetchAll(PDO::FETCH_ASSOC);
        return $datas;
    }

    public function prepare($sql) {
        $req = $this->getPDO()->prepare($sql);
        


    }





}