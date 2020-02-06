<?php $title = 'Chapitres | Billet pour l\'Alalska'; ?>

<?php 
$idChapter = htmlspecialchars($chapter->getId());
$img = htmlspecialchars($chapter->getImg());
$imgAlt = htmlspecialchars($chapter->getImgAlt());
?>

<!-- Affichage du chapitre -->
<section class="container">
	
	<h2><?=$chapter->getTitle();?></h2>
	<header class="media">
	    <a href="index.php?page=chapter/id/<?=$idChapter?>"><img src="public/img/chapter/<?=$img?>" alt="<?=$imgAlt?>"></a>
	    <div class="media-body">
			<p><?php if ($chapter->getNum()!=0) echo 'Chapitre ' . htmlspecialchars($chapter->getNum()); ?>
			<p>Edité le <?=htmlspecialchars($chapter->getCreated());?>
				<br>Dernière mise à jour le <?=htmlspecialchars($chapter->getModified());?>
			</p>
	      	<p><?=htmlspecialchars($chapter->getCountComment());?></p>
	    </div>
	</header>
	<article>
		<p><?=htmlspecialchars($chapter->getContent());?></p>
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
				
		      	<p><strong><?=htmlspecialchars($comment->getUserPseudo());?></strong> le <?=htmlspecialchars($comment->getCreated());?>
		      	</p>
		      	
		      	<?php if (isset($_SESSION['user']))
				{ ?>
		      		<a href="index.php?page=creatSignal/id/<?=$idComment?>&amp;idChapter=<?=$idChapter?>" class="button" onclick="javascript: return confirm('Confirmer le signalement  d\'un commentaire inapproprié ?');" title="Signaler un contenu inapproprié" role="button">Signaler</a>
		      	<?php } ?>
		      	<p><?=htmlspecialchars($comment->getContent());?></p>
				
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