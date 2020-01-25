<?php $title = 'Chapitres | Billet pour l\'Alalska'; ?>

<?php 
$idChapter = $chapter->getId();
$img = $chapter->getImg();
$imgAlt = $chapter->getImgAlt();

$after =  $idChapter+1;
?>

<!-- Affichage du chapitre -->
<section class="container-fluid ">
	
	<h2><?=$chapter->getTitle();?></h2>
	<header class="media">
	    <a href="index.php?page=chapter/id/<?=$idChapter?>"><img src="public/img/chapter/<?=$img?>" alt="<?=$imgAlt?>"></a>
	    <div class="media-body">
			<p><?php if ($chapter->getNum()!=0) echo 'Chapitre ' . $chapter->getNum(); ?>
			<p>Edité le <?=$chapter->getCreated();?>
				<br>Dernière mise à jour le <?= $chapter->getModified();?>
			</p>
	      	<p>
	      		<?php echo $_SESSION['nbComments']; 
				if (isset($_SESSION['nbComments'])) { echo $_SESSION['nbComments'] > 1 ? ' commentaires' : ' commentaire'; } ?>
			</p>
	    </div>
	</header>

	<article>
		<p><?= nl2br($chapter->getContent());?></p>
	</article>
	
	<a href="index.php?page=chapter/id/<?=$after?>" class="button">Chapitre suivant</a>

</section>

<!-- Affichage des commentaires -->
<section class="container-fluid">
	<hr>
	<h2>
		<?=$_SESSION['nbComments']; 
		if (isset($_SESSION['nbComments'])) { echo $_SESSION['nbComments'] > 1 ? ' commentaires' : ' commentaire'; } ?>	
	</h2>

	<?php foreach ($datas['comments'] as $comment) :?>
		<?php $idComment = $comment->getId();?>	
		<section>
			
	      	<p><strong><?=$comment->getUserPseudo();?></strong> le <?=$comment->getCreated();?>

	      	</p>
	      	
	      	<p>	      	<?php if (isset($_SESSION['user']))
			{ ?>
	      		<a href="index.php?page=creatSignal/id/<?=$idComment?>&amp;idChapter=<?=$idChapter?>" class="button" onclick="javascript: return confirm('Confirmer le signalement  d\'un commentaire inapproprié ?');" title="Signaler un contenu inapproprié">Signaler</a>
	      	<?php } ?><?=$comment->getContent();?></p>
		</section>
		<hr>
	<?php endforeach ?>
</section>

<!-- AJOUT commentaire -->
<section class="container-fluid">

	<?php /*if(isset($_SESSION['erreur'])) { ?>
     	<div class="message erreur">
			<?php echo $_SESSION['erreur']; ?>
		</div>
	<?php } ?>

	<?php if(isset($_SESSION['message'])) { ?>
     	<div class="message success">
			<?php echo $_SESSION['message']; ?>
		</div>
	<?php }  */?>

	<?php if(isset($_SESSION['user'])) { ?>

		<?php require('form-add-comment.php');?>

	<?php } else { ?>

	<button type="button" id="contact_btnForm"><a href="index.php?page=login" role="button">S'identifier pour laisser un commentaire</a></button>

	<? } ?> 
</section>