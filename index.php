<?php

// ====== upload AUTOMATIQUE CLASS ============
require_once 'vendor/autoload.php';


//== CONFIG chemin relatif / absolute =========
$root = $_SERVER['DOCUMENT_ROOT'];
define('ROOT', $root . '/roman_alaska/');
define('CONTOLLER', ROOT.'controller/');
define('VIEW', ROOT.'views/');
define('MODEL', ROOT.'model/');


//== Appel CONTROLLER =========================
$page= $_GET['page']; // index.php?page

$router = new Alaska_Model\Router($page);
$router->getController();

?>