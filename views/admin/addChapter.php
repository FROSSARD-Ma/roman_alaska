<?php if (isset($_SESSION['role']) == 'admin')
{ 

	$title = 'Ajout d\'un Chapitres | Billet pour l\'Alalska'; ?>

	<article class="container">

		<h2>Ajout d'un chapitre</h2>
		<section>

			<p>Ac ne quis a nobis hoc ita dici forte miretur, quod alia quaedam in hoc facultas sit ingeni, neque haec dicendi ratio aut disciplina, ne nos quidem huic uni studio penitus umquam dediti fuimus. Etenim omnes artes, quae ad humanitatem pertinent, habent quoddam commune vinculum, et quasi cognatione quadam inter se continentur.</p>

		</section>

		<section>

			<form method="post" action="index.php?page=creatChapter"  id="chapter_form" enctype="multipart/form-data">

				<?php include('views/message.php');?>

				<div class="form-group">
				    <label for="chapter_title">Titre du chapitre<span class="required">*</span></label>
				    <input type="text" id="chapter_title" name="title" placeholder="Titre du chapitre" maxlength="50" size="50%" required>
				</div>

				<div class="form-group">
				    <label for="chapter_num">Numéro</label>
				    <input type="number" id="chapter_num" name="num" min="1" max="100">
				</div>

				<div class="form-group">
				    <label for="chapter_img">Image<br><span class="right" >Fichier (jgp, png) - Max 1Mo</span></label>
					<input type="file" id="chapter_img" name="image" accept=".jpg, .jpeg, .png">
				</div>
				
				<div class="form-group">
				    <label for="chapter_imageAlt">Description image</label>
				    <input type="text" id="chapter_imageAlt" name="imgAlt" placeholder="Balise ALT" size="50%">
				</div>
				<br>
			    <hr> 
			    <div>
			        <label for="chapter_content">Texte du chapitre</label>
			        <textarea id="chapter_content" name="content" minlength="2"></textarea>
			    </div>

			    <p class="errorMessage erreur"></p>

				<button type="submit" id="chapter_btnForm">Ajouter le chapitre</button>
				<p><span class="required">*</span> Champs obligatoires</p>

			</form>

		</section>
	</article>

<?php } ?>