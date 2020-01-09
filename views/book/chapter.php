<?php $title = 'Chapitres | Billet pour l\'Alalska'; ?>

<?php //$nb_Comments = count($comments);?>

<?php 
$id = $chapter->getId();
$img = $chapter->getImg();
$imgAlt = $chapter->getImgAlt();
?>

<!-- Affichage du chapitre -->
<section class="container-fluid ">
	
	<h2><?=$chapter->getTitle();?></h2>
	<header class="media">
	    <a href="index.php?page=chapter&amp;id=<?=$id?>"><img src="public/img/chapter/<?=$img?>" class="mr-3" alt="<?=$imgAlt?>"></a>
	    <div class="media-body">
			<p><?php if ($chapter->getNum()!=0) echo 'Chapitre ' . $chapter->getNum(); ?>
			<p>Edité le <?=$chapter->getCreated()?></p>
			<p>Dernière mise à jour le <?= $chapter->getModified()?></p>
	      	<p><? /*= $nb_Comments,' ',$nb_Comments > 1 ? 'commentaires' : 'commentaire'; */?></p>
	    </div>
	</header>

	<article>
		<p><?= nl2br($chapter->getContent());?></p>
	</article>

	<a href="index.php?page=chapter&amp;id=<?=$after?>" class="btn btn-primary btn-sm float-right" role="button">J'ai lu ce chapitre, je passe au suivant</a>

</section>

<!-- Affichage des commentaires -->
<section class="container-fluid">
	<hr>
	<h2><?= $nb_Comments,' ',$nb_Comments > 1 ? 'Commentaires' : 'Commentaire';?></h2>

	<?php /*foreach ($comments as $comment)
	{ ?>		
		<section>
	      	<p><strong><? =$comment->user_pseudo;?></strong> le <?=$comment->comment_date_fr?></p>
	      	<p><?=htmlspecialchars($comment->comment_content);?></p>
		</section>
		<hr>
	<?php  } */ ?>
</section>

<!-- AJOUT commentaire -->
<section class="container-fluid">
	<?php if(!empty($_SESSION['adminUser'])) {  ?>

		<form action="index.php?page=postComment&amp;idChapter=<?=$Chapter->chapter_id?>" method="post">
		    <div>
		        <label for="comment_content">Commentaire</label><br />
		        <textarea id="comment_content" name="comment_content"></textarea>
		    </div>
		    <div>
		        <input type="submit" class="btn btn-primary btn-sm float-right" value="Ajouter mon commentaire">
		    </div>
		</form>

	<?php } else { ?>

	<a href="#" class="btn btn-primary btn-sm float-left" role="button">S'identifier pour laisser un commentaire</a>

	<? } ?> 
</section>