<?php if (isset($_SESSION['role']) == 'admin')
{ 
	$title = 'Ajout d\'un Chapitres | Billet pour l\'Alalska';
	$idChapter = $chapter->getId();
	$titleChapter = $chapter->getTitle();
	$numChapter = $chapter->getNum();
	$contentChapter = $chapter->getContent();
	$imgChapter = $chapter->getImg();
	$imgAltChapter = $chapter->getImgAlt();
	$statutChapter = $chapter->getStatut();
?>

	<article class="container-fluid ">

		<h2>Modification d'un chapitre</h2>
		<section class="container-fluid">
			<p>Ac ne quis a nobis hoc ita dici forte miretur, quod alia quaedam in hoc facultas sit ingeni.</p>
		</section>

		<section class="container-fluid ">
                    																			
			<form action="index.php?page=updateChapter/id/<?=$idChapter?>" method="post" id="upchapter_form">

				<?php include('views/message.php');?>

				<img src="public/img/chapter/<?=$imgChapter?>" alt="<?=$imgAltChapter?>">

				<p class="warning"><strong>Chapitre créé le : </strong> <?=$chapter->getCreated();?></p>
				
				<div class="form-group">
					<label for="chapter_statut">Statut</label>
			        <select id="chapter_statut" name="statut">
			            <option selected value="<?=$statutChapter?>"><?=$statutChapter?></option>
			            <option value="Publié">Publier</option>
			            <option value="Brouillon">Brouillon</option>
			            <option value="Corbeille">Corbeille</option>
			        </select> 
				</div>

				<div class="form-group">
				    <label for="chapter_title">Titre<span class="required">*</span></label>
				    <input type="text" id="chapter_title" name="title" placeholder="Titre du chapitre" size="50%" value="<?=$titleChapter?>" required>
				</div>

				<div class="form-group">
				    <label for="chapter_num">Numéro</label>
				    <input type="number" id="chapter_num" name="num" size="20" min="1" max="100"  value="<?=$numChapter?>">
				</div>

				<div class="form-group">
				    <label for="chapter_img">Image</label>
				    <input type="hidden" name="imageSizeMax" value="2000000" />
				    <input type="file" id="chapter_img" name="image" accept=".jpg, .JPG, .jpeg, .JPEG, .png, .PNG, .gif, .GIF" value="<?=$imgChapter?>">
				</div>

				<div class="form-group">
				    <label for="chapter_imageAlt">Description image</label>
				    <input type="text" id="chapter_imageAlt" name="imageAlt" placeholder="Balise ALT" size="50%" value="<?=$imgAltChapter?>">
				</div>

				

				<br>
			    <hr> 
			    <div>
			        <label for="chapter_content">Texte du chapitre<span class="required">*</span></label>
			        <textarea id="chapter_content" name="texte" value="<?=$contentChapter?>"></textarea>
			    </div>

			    <p class="message erreur" id="chapter_error"></p>

				<button type="submit" id="chapter_btnForm">Ajouter le chapitre</button>
				<p><span class="required">*</span> Champs obligatoires</p>

			</form>
 
		</section>
	</article>

<?php } ?>