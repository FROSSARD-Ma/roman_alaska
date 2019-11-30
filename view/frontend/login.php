<?php $title = 'Login' ?>

<?php ob_start(); ?>


<article class="container-fluid ">

	<h2>Se connecter</h2>

	<section class="container-fluid">

		<p>Ac ne quis a nobis hoc ita dici forte miretur, quod alia quaedam in hoc facultas sit ingeni, neque haec dicendi ratio aut disciplina, ne nos quidem huic uni studio penitus umquam dediti fuimus. Etenim omnes artes, quae ad humanitatem pertinent, habent quoddam commune vinculum, et quasi cognatione quadam inter se continentur.</p>

	</section>

	<section class="row justify-content-center">
		
		<form id="form-login">
			<div class="form-group">
			    <label for="user_email">Adresse Email</label>
			    <input type="email" class="form-control" id="user_email" aria-describedby="emailHelp">
			    
			</div>

			<div class="form-group">
			    <label for="user_pass">Mot de passe</label>
			    <input type="password" class="form-control" id="user_pass">
			</div>

			<div class="form-group form-check">
			    <input type="checkbox" class="form-check-input" id="remember_me">
			    <label class="form-check-label" for="remember_me">Se rappeler de moi</label>
			</div>

			<button type="submit" class="btn btn-primary float-right">Se connecter</button>
		</form>

	</section>

</article>









<?php $content = ob_get_clean(); ?>

<?php include('view/frontend/template.php'); ?>