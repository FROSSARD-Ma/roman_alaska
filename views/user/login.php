<?php $title = 'S\'identifier | Billet pour l\'Alalska';?>

<article class="container-fluid ">

	<h2>Se connecter</h2>

	<section class="container-fluid">

		<p>Ac ne quis a nobis hoc ita dici forte miretur, quod alia quaedam in hoc facultas sit ingeni, neque haec dicendi ratio aut disciplina, ne nos quidem huic uni studio penitus umquam dediti fuimus. Etenim omnes artes, quae ad humanitatem pertinent, habent quoddam commune vinculum, et quasi cognatione quadam inter se continentur.</p>

	</section>

	<section class="row justify-content-center">
		
		<form action="index.php?page=loginUser" method="post" class="needs-validation" novalidate id="login_form">
			<div class="form-group">
			    <label for="email">Adresse Email</label>
			    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
			</div>

			<div class="form-group">
			    <label for="pass">Mot de passe</label>
			    <input type="password" class="form-control" id="pass" name="pass">
			</div>

			<div>
		        <p id="error">
		        </p>
		    </div>

			<button type="submit" id="connexion" class="btn btn-primary float-right">Se connecter</button>
		</form>

	</section>

</article>