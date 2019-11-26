<?php $title = 'Chapitre' ?>

<?php ob_start(); ?>


<p>Page Chapitres</p>





<?php $content = ob_get_clean(); ?>

<?php include('view/template.php'); ?>