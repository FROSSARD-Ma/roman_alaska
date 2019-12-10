<?php
// ====== upload AUTOMATIQUE CLASS ============
require_once 'vendor/autoload.php';

session_start();

require('controllers/frontendController.php');
require('controllers/backendController.php');

try
{
    switch ($_GET['action']) {

        // NAV ------------------------------------------------
        case 'home':home();break;
        case 'about':about();break;
        case 'contact':contact();break;

        // ADMIN ----------------------------------------------
        case 'inscription':inscription();break;
        case 'login':login();break;
        case 'logout':logout();break;
        case 'adminUser':
            if (isset($_GET['user_id']) && $_GET['user_id']> 0) {
                adminUser();
            }
            else {
                 throw new Exception('Vous n\'êtes pas identifié !');
            }
        break;

        // CHAPTERS ---------------------------------------------
        case 'chapters':chapters();break;
        case 'chapter':
            if (isset($_GET['chapter_id']) && $_GET['chapter_id'] > 0) {
                chapter();
            } else {
                throw new Exception('Aucun identifiant de chapitre envoyé');
            }
        break;

        case 'addChapter':
            if (isset($_GET['user_id']) && $_GET['user_id'] > 0) {
                if (!empty($_POST['chapter_num']) && !empty($_POST['chapter_title']) && !empty($_POST['chapter_content']) && !empty($_POST['chapter_statut']))
                {
                    addChapter($_GET['chapter_num'], $_POST['chapter_title'], $_POST['chapter_content'], $_POST['chapter_statut']);
                }
                else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
            else {
                throw new Exception('Vous n\'êtes pas identifié !');
            }
        break;

        case 'updateChapter':
            if (isset($_GET['chapter_id']) && $_GET['chapter_id'] > 0) {
                if (!empty($_POST['chapter_num']) && !empty($_POST['chapter_title']) && !empty($_POST['chapter_content']) && !empty($_POST['chapter_statut']))
                {
                    updateChapter($_GET['chapter_id'], $_POST['chapter_num'], $_POST['chapter_title'], $_POST['chapter_content'], $_POST['chapter_statut']);
                }
                else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            } else {
                throw new Exception('Aucun identifiant de chapitre envoyé');
            }
        break;

        case 'deleteChapter':
            if (isset($_GET['chapter_id']) && $_GET['chapter_id'] > 0) {
                deleteChapter($_GET['chapter_id']);
            } else {
                throw new Exception('Aucun identifiant de chapitre envoyé');
            }
        break;


        // COMMENTS ---------------------------------------------------------------
        case 'addComment':
            if (isset($_GET['chapter_id']) && $_GET['chapter_id'] > 0) {
                if (!empty($_POST['comment_content']))
                {
                    addComment($_GET['chapter_id'], $_POST['user_id'], $_POST['comment_content']);
                }
                else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
            else {
                throw new Exception('Aucun identifiant de chapitre envoyé');
            }
        break;

        case 'updateComment':
            if (isset($_GET['comment_id']) && $_GET['comment_id'] > 0) {
                if (!empty($_POST['comment_content'])) 
                {
                    updateComment($_GET['comment_id'], $_POST['comment_content']);
                }
                else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
            else {
                throw new Exception('Aucun identifiant de commentaire envoyé');
            }

        break;

        case 'deleteComment':
            if (isset($_GET['comment_id']) && $_GET['comment_id'] > 0) {
                    deleteComment($_GET['comment_id']);
            } else {
                throw new Exception('Aucun identifiant de commentaire envoyé');
            }

        break;

        // DEFAUT ---------------------------------------------------------------  
        default : home();break;
    }
}
catch(Exception $e) { // S'il y a eu une erreur, alors...
    echo 'Erreur : ' . $e->getMessage();
}

?>