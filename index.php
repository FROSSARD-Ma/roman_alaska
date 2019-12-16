<?php

require('controllers/romanController.php');
require('controllers/adminController.php');

// ====== upload AUTOMATIQUE CLASS ============
require_once 'vendor/autoload.php';

$router = new Alaska\Router();
$router->getRouter();

?>
