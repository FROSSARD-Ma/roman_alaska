<?php if (isset($_SESSION['role']) == 'admin')
{ 

	$title = 'Ajout d\'un Chapitres | Billet pour l\'Alalska'; ?>

	<article class="container-fluid ">

		<h2>Ajout d'un chapitre</h2>
		<section class="container-fluid">

			<p>Ac ne quis a nobis hoc ita dici forte miretur, quod alia quaedam in hoc facultas sit ingeni, neque haec dicendi ratio aut disciplina, ne nos quidem huic uni studio penitus umquam dediti fuimus. Etenim omnes artes, quae ad humanitatem pertinent, habent quoddam commune vinculum, et quasi cognatione quadam inter se continentur.</p>

		</section>

		<?php include('views/message.php');?>

		<section class="container-fluid ">

			<form action="index.php?page=creatChapter" method="post" id="chapter_form">

				<div class="form-group">
				    <label for="chapter_title">Titre du chapitre<span class="required">*</span></label>
				    <input type="text" id="chapter_title" name="title" placeholder="Titre du chapitre" maxlength="50" size="50%" required>
				</div>
				
			    <div>
			        <label for="chapter_content">Texte du chapitre<span class="required">*</span></label>
			        <textarea id="chapter_content" name="texte" minlength="2" required></textarea>
			    </div>

			    <p class="errorMessage erreur"></p>

				<button type="submit" id="chapter_btnForm">Ajouter le chapitre</button>
				<p><span class="required">*</span> Champs obligatoires</p>

			</form>

		</section>
	</article>

<?php } ?>