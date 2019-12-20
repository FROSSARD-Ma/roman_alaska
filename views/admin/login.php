<?php $title = 'S\'identifier | Billet pour l\'Alalska';?>

<article class="container-fluid ">

	<h2>Se connecter</h2>

	<section class="container-fluid">

		<p>Ac ne quis a nobis hoc ita dici forte miretur, quod alia quaedam in hoc facultas sit ingeni, neque haec dicendi ratio aut disciplina, ne nos quidem huic uni studio penitus umquam dediti fuimus. Etenim omnes artes, quae ad humanitatem pertinent, habent quoddam commune vinculum, et quasi cognatione quadam inter se continentur.</p>

	</section>

	<section class="row justify-content-center">
		
		<form class="needs-validation" novalidate id="login_form">
			<div class="form-group">
			    <label for="login_email">Adresse Email</label>
			    <input type="email" class="form-control" id="login_email" name="login_email" aria-describedby="emailHelp">
			</div>

			<div class="form-group">
			    <label for="login_pass">Mot de passe</label>
			    <input type="password" class="form-control" id="login_pass" name="login_pass">
			</div>

			<div class="form-group form-check">
			    <input type="checkbox" class="form-check-input" id="login_remember" name="login_remember">
			    <label class="form-check-label" for="login_remember">Se rappeler de moi</label>
			</div>

			<div>
		        <p id="login_error">
		        </p>
		    </div>

			<button type="submit" id="login_connexion" name="login_connexion" class="btn btn-primary float-right">Se connecter</button>
		</form>

	</section>

</article>