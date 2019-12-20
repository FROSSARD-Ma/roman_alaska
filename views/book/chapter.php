<?php 

$title = 'Chapitres | Billet pour l\'Alalska';
$nb_Comments = count($comments);

?>

<?php // include 'chapters-timeline.php'; ?>

<!-- Affichage du chapitre -->
<section class="container-fluid ">
	
	<h2><?=htmlspecialchars($Chapter->chapter_title);?></h2>
	<header class="media">
	    <a href="index.php?action=chapter&amp;chapter_id=<?=$Chapter->chapter_id?>"><img src="public/img/chapter/<?=$Chapter->chapter_img?>" class="mr-3" alt="<?=$Chapter->chapter_img_alt?>"></a>
	    <div class="media-body">
			<p><?php if (htmlspecialchars($Chapter->chapter_num)!=0) 
				{ echo 'Chapitre ' . htmlspecialchars($Chapter->chapter_num); } ?>
			<br>
			Edité le <?= $Chapter->chapter_date_creat ?><br>
			Dernière mise à jour le <?= $Chapter->chapter_date_edit ?>
			</p>
	      	<p><?= $nb_Comments,' ',$nb_Comments > 1 ? 'commentaires' : 'commentaire';?></p>
	    </div>
	</header>

	<article>
	
	<p><?= nl2br(htmlspecialchars($Chapter->chapter_content)) ?></p>
	</article>

	<a href="index.php?action=chapter&amp;chapter_id=<?=$after?>" class="btn btn-primary btn-sm float-right" role="button">J'ai lu ce chapitre, je passe au suivant</a>

</section>

<!-- Affichage des commentaires -->
<section class="container-fluid">
	<hr>
	<h2><?= $nb_Comments,' ',$nb_Comments > 1 ? 'Commentaires' : 'Commentaire';?></h2>

	<?php foreach ($comments as $comment)
	{ ?>		
		<section>
	      	<p><strong><?=htmlspecialchars($comment->user_pseudo);?></strong> le <?=$comment->comment_date_fr?></p>
	      	<p><?=htmlspecialchars($comment->comment_content);?></p>
		</section>
		<hr>
	<?php  } ?>
</section>

<!-- AJOUT commentaire -->
<section class="container-fluid">
	<?php if(!empty($_SESSION['adminUser'])) {  ?>

		<form action="index.php?action=postComment&amp;idChapter=<?=$Chapter->chapter_id?>" method="post">
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