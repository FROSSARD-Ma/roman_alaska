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
$request_url = $_GET['page']; // index.php?page

$router = new Alaska\Router($request_url);
$router->getRouter();


?>