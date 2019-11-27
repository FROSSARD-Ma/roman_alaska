<?php
namespace SWFram;
use \PDO;

class Connexion
{
  private $pdo, $db_host, $db_user, $db_pass, $db_name;
  
  public function __construct($db_host, $db_user, $db_pass, $db_name)
  {
    $this->db_host = $db_host;
    $this->db_user = $db_user;
    $this->db_pass = $db_pass;
    $this->db_name = $db_name;
    
    $this->getPDO();
  }
  
  private function getPDO()
  {
    if ($this->pdo === null) {
        
      if (isset($this->db_name,$this->db_host,$this->db_user,$this->db_pass))
      {
        $pdo = new PDO('mysql:host='.$this->db_host.';dbname='.$this->db_name, $this->db_user, $this->db_pass);
        $pdo-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo = $pdo;
      }
    }
    return $this->pdo;
  }

}