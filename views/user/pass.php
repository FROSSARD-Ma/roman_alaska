<?php $title = 'Demander un nouveau mot de passe | Billet pour l\'Alalska';?>

<article class="container-fluid ">

	<h2>Demander un nouveau mot de passe</h2>

	<section class="container-fluid">

		<p>Ac ne quis a nobis hoc ita dici forte miretur, quod alia quaedam in hoc facultas sit ingeni, neque haec dicendi ratio aut disciplina, ne nos quidem huic uni studio penitus umquam dediti fuimus. Etenim omnes artes, quae ad humanitatem pertinent, habent quoddam commune vinculum, et quasi cognatione quadam inter se continentur.</p>

	</section>

	<section class="row justify-content-center">
		
		<form action="index.php?page=creatPass" method="post" class="needs-validation" novalidate id="nxPassForm">
			<div class="form-group">
			    <label for="email">Adresse Email</label>
			    <input type="email" class="form-control" id="email" name="email" placeholder="Entrer votre adresse Email" aria-describedby="emailHelp">
			</div>

			<div>
				<p class="alert alert-danger" role="alert" id="error"></p>
		    </div>

			<button type="submit" id="connexion" class="btn btn-primary float-right">Recevoir mot de passe</button>
		</form>

	</section>

</article>