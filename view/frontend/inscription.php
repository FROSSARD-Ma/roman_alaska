<?php $title = 'Chapitre' ?>

<?php ob_start(); ?>


<article class="container-fluid ">

	<h2>Inscription</h2>

	<section class="container-fluid">

		<p>Ac ne quis a nobis hoc ita dici forte miretur, quod alia quaedam in hoc facultas sit ingeni, neque haec dicendi ratio aut disciplina, ne nos quidem huic uni studio penitus umquam dediti fuimus. Etenim omnes artes, quae ad humanitatem pertinent, habent quoddam commune vinculum, et quasi cognatione quadam inter se continentur.</p>

	</section>

	<section class="row justify-content-center">
		
		<form id="form-login">

			<div class="control-group">
		        <div class="form-group">
		          <label for="user_name">Nom</label>
		          <input type="text" class="form-control" placeholder="Nom" id="user_name" required>
		        </div>
		    </div>

		    <div class="control-group">
		        <div class="form-group">
		          <label for="user_firstname">Prénom</label>
		          <input type="text" class="form-control" placeholder="Prénom" id="user_firstname" required>
		        </div>
		    </div>

		    <div class="control-group">
		        <div class="form-group">
		          <label for="user_pseudo">Pseudo</label>
		          <input type="text" class="form-control" placeholder="Prénom" id="user_pseudo">
		        </div>
		    </div>

			<div class="form-group">
			    <label for="user_email">Adresse Email</label>
			    <input type="email" class="form-control" id="user_email" aria-describedby="emailHelp">
			</div>

			<button type="submit" class="btn btn-primary float-right">Je m'inscris</button>
		</form>

	</section>

</article>


<?php $content = ob_get_clean(); ?>

<?php include('view/frontend/template.php'); ?>