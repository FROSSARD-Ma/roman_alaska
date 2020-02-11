<?php
session_start(); 

// ====== upload AUTOMATIQUE CLASS ============
require_once 'vendor/autoload.php';


//== CONFIG chemin relatif / absolute =========
$root = $_SERVER['DOCUMENT_ROOT'];
$host = $_SERVER['HTTP_HOST'];

define('HOST', 'https://'.$host.'/roman_alaska/'); // model/View.php
define('ROOT', $root . '/roman_alaska/');
define('VIEW', ROOT.'views/'); // model/View.php


//== Appel CONTROLLER =========================
$page= $_GET['page']; // index.php?page

$router = new Alaska_Model\Router($page);
$router->getController();

?>