<?php $title = 'Chapitres | Billet pour l\'Alalska'; ?>

<?php 
$idChapter = $chapter->getId();
$img = $chapter->getImg();
$imgAlt = $chapter->getImgAlt();
?>

<!-- Affichage du chapitre -->
<section class="container">
	
	<h2><?=$chapter->getTitle();?></h2>
	<header class="media">
	    <a href="index.php?page=chapter/id/<?=$idChapter?>"><img src="public/img/chapter/<?=$img?>" alt="<?=$imgAlt?>"></a>
	    <div class="media-body">
			<p><?php if ($chapter->getNum()!=0) echo 'Chapitre ' . $chapter->getNum(); ?>
			<p>Edité le <?=$chapter->getCreated();?>
				<br>Dernière mise à jour le <?=$chapter->getModified();?>
			</p>
	      	<p><?=$chapter->getCountComment();?></p>
	    </div>
	</header>
	<article>
		<p><?=$chapter->getContent();?></p>
	</article>
</section>

<!-- navigation chapitre -->
<section>
	<?php $chapter->getPrevChapter();?> 
	<?php $chapter->getNextChapter();?>

</section>

<!-- Affichage des commentaires -->
<section class="container">
	<br><br>
	<hr>
	<h2><?php $chapter->getCountComment();?></h2>

	<?php if (isset($datas['comments'])) { ?>
		<?php foreach ($datas['comments'] as $comment) :?>
			<?php $idComment = $comment->getId();?>	
			<section>
				
		      	<p><strong><?=$comment->getUserPseudo();?></strong> le <?=$comment->getCreated();?>
		      	</p>
		      	
		      	<?php if (isset($_SESSION['user']))
				{ ?>
		      		<a href="index.php?page=creatSignal/id/<?=$idComment?>&amp;idChapter=<?=$idChapter?>" class="button" onclick="javascript: return confirm('Confirmer le signalement  d\'un commentaire inapproprié ?');" title="Signaler un contenu inapproprié" role="button">Signaler</a>
		      	<?php } ?>
		      	<p><?=$comment->getContent();?></p>
				
			</section>
			<hr>
		<?php endforeach?>
	<?php } ?>
</section>

<!-- AJOUT commentaire -->
<section class="container">
	<?php if(isset($_SESSION['user'])) { ?>

		<form id="comment_form" method="post" action="index.php?page=creatComment/id/<?=$idChapter?>" >
		 	<h2>Laissez un commentaire</h2>
			<p>Partagez le resssenti du chapitre...</p>
			<textarea rows="6" class="form-input" id="comment_content" name="content" placeholder="Laisser un commentaire" required></textarea>
			<button type="submit" id="contact_btnForm">Ajouter mon commentaire</button>
			<input type="hidden" name="chapterId" value="<?=$idChapter?>">
			<p><span class="required">*</span> Champs obligatoires</p>
		</form>

	<?php } else { ?>

	<a href="index.php?page=login" class="button" role="button">S'identifier pour laisser un commentaire</a>

	<? } ?> 
</section>