<?php $title = 'Ajout d\'un Chapitres | Billet pour l\'Alalska'; ?>


<article class="container-fluid ">

	<h2>Ajout d'un chapitre</h2>
	<section class="container-fluid">

		<p>Ac ne quis a nobis hoc ita dici forte miretur, quod alia quaedam in hoc facultas sit ingeni, neque haec dicendi ratio aut disciplina, ne nos quidem huic uni studio penitus umquam dediti fuimus. Etenim omnes artes, quae ad humanitatem pertinent, habent quoddam commune vinculum, et quasi cognatione quadam inter se continentur.</p>

	</section>

	<section class="container-fluid ">

		<form action="index.php?page=admin" method="post">
			<div class="input-group mb-3">
			  	<div class="input-group-prepend">
			    	<span class="input-group-text" id="chapter_title">Titre</span>
			  	</div>
			  	<input type="text" class="form-control" placeholder="Titre du chapitre" aria-label="chapter_title" aria-describedby="chapter_title" required>
			</div>
		    <div class="input-group mb-3">
			  	<div class="input-group-prepend">
			    	<span class="input-group-text" id="inputGroupFileAddon01">Image</span>
			  	</div>
			  	<div class="custom-file">
			  		<input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
			    	<label class="custom-file-label" for="inputGroupFile01">Sélectionner Fichier</label>
			    	<input type="file" class="custom-file-input" id="image_pub" name="image_pub" accept=".jpg, .JPG, .jpeg, .JPEG, .png, .PNG, .gif, .GIF">
			  </div>
			</div>
			<div class="input-group mb-3">
			  	<div class="input-group-prepend">
			    	<span class="input-group-text" id="chapter_imgAlt">Texte ALT image</span>
			  	</div>
			  	<input type="text" class="form-control" placeholder="Texte ALT image" aria-label="chapter_title" aria-describedby="chapter_imgAlt" required>
			</div>
		    <hr>

		    <div>
		        <label for="chapter_content">Texte du chapitre</label><br />
		        <textarea id="chapter_content" name="chapter_content"></textarea>
		    </div>
		    <br>
		    <div>
		        <input type="submit" class="btn btn-primary btn-sm float-right" value="Ajouter le chapitre">
		    </div>
		</form>

	</section>
</article>