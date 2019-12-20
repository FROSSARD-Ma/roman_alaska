<?php 
namespace Alaska;
use \PDO;

class Manager {
  
    const BD_host='sql24.phpnet.org';
    const BD_name='rbb05303';
    const BD_user='rbb05303';
    const BD_pass='Wdy2YBH4ucC';

    private static $pdo;

    /* --------- CONNEXION BDD Manager ------------------------------------------ */
    public function getPDO() { // Retourne connexion BDD
        try {
            if ($this->pdo === null) {  // Permet 1 seule connexion à la BDD
                $pdo = new PDO('mysql:host='.Manager::BD_host.';dbname='.Manager::BD_name.';charset=UTF8', Manager::BD_user, Manager::BD_pass);
                $pdo-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->pdo = $pdo; 
            }
            return $this->pdo;
        }
        catch(PDOException $e) {
          echo "Echec de connexion à la base de donnée !";
        }
    }

    /* --------- REQUETES Manager ----------------------------------------------- */
    public function reqSQL($sql, $attributes = null, $one = false ) {
        
        // TYPE Requete
        if ($attributes == null) { 
            $req = $this->getPDO()->query($sql); // Requete QUERY
        } else {  
            $req = $this->getPDO()->prepare($sql); // Requete PREPARE
            $req->execute($attributes);
        }

        // FETCH Result
        $req->setFetchMode(PDO::FETCH_OBJ); // result 

        if ($one) { 
            $results = $req->fetch(); // one result
        } else {
            $results = $req->fetchall(); // all result
        }
        return $results;
    }

    /* --------- VIEW Page  Manager ----------------------------------------------- */
    public function view($view) {
       
       ob_start();
       require VIEW . '/' . $view. '.php';
       $content = ob_get_clean();
       require VIEW . '/' . 'template.php';

        /*-- REDIRECTION -- */ 
        // $_SERVER['REQUEST_URI']
        // $uri = $_SERVER['REQUEST_URI'];
        // if (!empty($uri) && $uri[-1]==="/") 
        // {
        //  header('location: '.substr($uri, 0,-1)); // Suppression du / final
        //  header('HTTP/1.1 301 Moved Permanently');
        //  exit();
        // }

    }


}