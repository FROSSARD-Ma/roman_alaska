<?php $title = 'Oups'; ?>

<?php ob_start(); ?>
<h1>Mon super blog !</h1>
<p><a href="index.php">Retour à la liste des billets</a></p>

<div class="news">
    <h3>
        Oups, une erreur s'est produite : 
        <em><?= $errorMessage ?></em>
    </h3>
    
</div>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
