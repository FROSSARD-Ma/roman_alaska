<?php $title = 'Page Admin' ?>

<?php ob_start(); ?>

<h1>Page ADMIN</h1>




<?php $content = ob_get_clean(); ?>

<?php include('view/backend/template.php'); ?>