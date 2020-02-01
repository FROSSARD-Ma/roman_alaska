<?php if (isset($_SESSION['role']) == 'admin')
{ 
	$title = 'Modification Commentaire | Billet pour l\'Alalska';
	$idComment = $comment->getId();
	$contentComment = $comment->getContent();
?>
	<article class="container-fluid ">

		<h2>Modification d'un commentaire</h2>
		<section class="container-fluid">

			<p>Ac ne quis a nobis hoc ita dici forte miretur, quod alia quaedam in hoc facultas sit ingeni, neque haec dicendi ratio aut disciplina</p>

		</section>

		<section class="container-fluid ">

			<form action="index.php?page=updateComment/id/<?=$idComment?>" method="post" id="upComment_form">

				<?php include('views/message.php');?>

				<p><strong>Chapitre n°</strong> <?=$comment->getNumChapter();?> : 
					<?=$comment->getTitleChapter();?></p>
				<div class="form-group">
				    <p>Commentaire créé par <?=$comment->getUserPseudo();?> le <?=$comment->getCreated();?></p>
				    <textarea rows="6" class="form-input" id="upComment_comment" name="content" placeholder="Laisser un commentaire" value="<?=$contentComment?>"required><?=$contentComment?></textarea>
				</div>

			    <p class="message erreur" id="upComment_error"></p>

				<button type="submit" id="upComment_btnForm">Modifier le commentaire</button>
				<p><span class="required">*</span> Champs obligatoires</p>

			</form>

		</section>
	</article>

<?php } ?>