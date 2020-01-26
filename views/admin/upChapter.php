<?php if (isset($_SESSION['role']) == 'admin')
{ 

	$title = 'Ajout d\'un Chapitres | Billet pour l\'Alalska'; ?>

	<article class="container-fluid ">

		<h2>Ajout d'un chapitre</h2>
		<section class="container-fluid">

			<p>Ac ne quis a nobis hoc ita dici forte miretur, quod alia quaedam in hoc facultas sit ingeni, neque haec dicendi ratio aut disciplina, ne nos quidem huic uni studio penitus umquam dediti fuimus. Etenim omnes artes, quae ad humanitatem pertinent, habent quoddam commune vinculum, et quasi cognatione quadam inter se continentur.</p>

		</section>

		<section class="container-fluid ">

			<form action="index.php?page=creatChapter" method="post" id="chapter_form">

				<div class="form-group">
				    <label for="chapter_title">Titre du chapitre<span class="required">*</span></label>
				    <input type="text" id="chapter_title" name="title" placeholder="Titre du chapitre" required>
				</div>

				<div class="form-group">
				    <label for="chapter_num">Numéro du chapitre</label>
				    <input type="number" id="chapter_num" name="num" min="1" max="50">
				</div>

				<div class="form-group">
				    <label for="chapter_img">Image</label>
				    <input type="hidden" name="imageSizeMax" value="2000000" />
				    <input type="file" id="chapter_img" name="image" accept=".jpg, .JPG, .jpeg, .JPEG, .png, .PNG, .gif, .GIF">
				</div>

				<div class="form-group">
				    <label for="chapter_imageAlt">Description ALT image</label>
				    <input type="text" id="chapter_imageAlt" name="imageAlt" placeholder="Balise ALT">
				</div>
				<br>
			    <hr>
			    <div>
			        <label for="chapter_content">Texte du chapitre<span class="required">*</span></label>
			        <textarea id="chapter_content" name="texte"></textarea>
			    </div>

			    <p class="message erreur" id="chapter_error"></p>

				<button type="submit" id="chapter_btnForm">Ajouter le chapitre</button>
				<p><span class="required">*</span> Champs obligatoires</p>

			</form>

		</section>
	</article>

<?php } ?>