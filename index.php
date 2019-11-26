<?php 

session_start();

require('controllers/frontendController.php');
require('controllers/backendController.php');

try
{
    if (isset($_GET['action'])) {

        if ($_GET['action'] == 'home') { // Page accueil
            home();
        }
        
        elseif ($_GET['action'] == 'chapter') { // Liste des chapitres
            chapter();
        }
        elseif ($_GET['action'] == 'about') { //  A propos de l'auteur
            about();
        }
        elseif ($_GET['action'] == 'contact') { // Contactez l'auteur
            contact();
        }


        // CONNEXION ------------------------------------------------
        elseif ($_GET['action'] == 'inscription') { // S'inscrire
            inscription();
        }
        elseif ($_GET['action'] == 'login') { // se connecter
            login();
        }
        elseif ($_GET['action'] == 'logout') { // Se déconnecter
            logout();
        }


        // ADMIN ----------------------------------------------------
        elseif ($_GET['action'] == 'adminUser') { // Gestion des Commentaires
            adminUser();
        }
        elseif ($_GET['action'] == 'adminChapter') { // Gestion des Chapitres
            adminChapter();
        }
        elseif ($_GET['action'] == 'adminComment') { // Gestion des Commentaires
            adminComment();
        }

    }
    else {
        home();
    }

}
catch(Exception $e) { // S'il y a eu une erreur, alors...
    echo 'Erreur : ' . $e->getMessage();
}