<?php
// --- TEST envoi IMAGE -----------------------------------


if (isset($_FILES['image_pub']) AND $_FILES['image_pub']['error'] == 0)
{


    // Testons si le fichier n'est pas trop gros        
    if ($_FILES['image_pub']['size'] <= 2000000)
    {

        // Testons si l'extension est autorisée
        $infosfichier_image_pub = pathinfo($_FILES['image_pub']['name']);
        $extension_upload = $infosfichier_image_pub['extension'];
        $extensions_autorisees = array('jpg', 'JPG', 'jpeg', 'JPEG','gif', 'GIF', 'png', 'PNG');

        if (in_array($extension_upload, $extensions_autorisees))
        {
            /* RECUPERATION Date sur chaque page initiale  ============== */
            // Ajout Actualité :    $annee_image1 = $_POST['Date_actu'];
            // Ajout Sortie club :  $annee_image1 = $_POST['date_debut'];
            // Ajout Matériel :     $annee_image1 = $_POST['Date_Achat'];
            // Ajout Controle EPI : $annee_image1 = $_POST['Date_Control'];

            
            /* RECUPERATION  Images / Dossier   ========================= */
            // Ajout Matériel :     $dossier = "/Materiel";
            // Ajout Contrôle EPI   $dossier = "/Materiel/EPI";
  
            if ($dossier=="") 
            {
                $dossier = date('Y', strtotime($annee_image1));
            }
         
            $nom_image_calendrier = "{$annee_image1}_".basename($_FILES['image_pub']['name']);

            $dossier_enregistrement = "{$dossier}/{$nom_image_calendrier}";

            // On peut valider le fichier et le stocker définitivement
            $resultat = move_uploaded_file($_FILES['image_pub']['tmp_name'], '../images/'.$dossier_enregistrement);

            if ($resultat) { $_SESSION['message2'] ="L'image a &eacute;t&eacute; enregistr&eacute;e";} else { $_SESSION['message2'] = "Erreur lors de la sauvegarde de l'image."; }
        }
    }
    else { $_SESSION['message2'] = "Le fichier de l'image est trop gros"; }
}
else {  
        $error_types = array(
            UPLOAD_ERR_FORM_SIZE=> "La taille de l'image téléchargée est trop importante.",
            UPLOAD_ERR_PARTIAL  => "L'image a partiellement été téléchargée",
            UPLOAD_ERR_NO_FILE  => "Pas d'image téléchargée");

        $_SESSION['erreur'] = $error_types[$_FILES['image_pub']['error']]; 
    }


?>