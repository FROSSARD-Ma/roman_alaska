<?php $title = "Accueil" ?>

<?php ob_start(); ?>


<p>Page accueil</p>



<?php $content = ob_get_clean(); ?>

<?php include('view/template.php'); ?>
