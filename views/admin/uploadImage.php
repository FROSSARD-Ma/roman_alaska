<?php
// --- TEST IMAGE -----------------------------------
$dossierImg = 'public/img/chapter/';
$img = $_FILES['image'];

// Testons si le fichier n'est pas trop gros        
if ($img['size'] <= 1000000) // 1Mo
{
    // Gestion Extentions
    $extension_upload = strtolower(substr($img['name'], -4)); // récupère l'extention et la place en minuscule.
    $extensions_autorise = array('.png', '.gif', '.jpg', '.jpeg');

    if (in_array($extension_upload, $extensions_autorise))
    {
        //On formate le nom du fichier - suppression des accents
        $fichier = strtr($img['name'],
              'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
              'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');

        // remplacer par expression rationnelle standard
        $nomImage = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier); 
        
        move_uploaded_file($img['tmp_name'], $dossierImg.$nomImage);
        
        // Message erreur
        $error_types = array(
        UPLOAD_ERR_FORM_SIZE=> "La taille de l'image téléchargée est trop importante.",
        UPLOAD_ERR_PARTIAL  => "L'image a partiellement été téléchargée",
        UPLOAD_ERR_NO_FILE  => "Pas d'image téléchargée"
        );
        $_SESSION['errorMessage'] = $error_types[$_FILES['image']['error']];
    }
    else
    {
        $_SESSION['errorMessage'] = 'Votre fichier n\'est pas une image';
    }
}
else
{ 
    $_SESSION['errorMessage'] = "Le fichier de l'image est trop gros. Maximum 1 Mo";
}
?>