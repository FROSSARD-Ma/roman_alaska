<?php $title = 'Inscription | Billet pour l\'Alalska'; ?>

<article class="container-fluid ">

	<h2>Inscription</h2>

	<section class="container-fluid">

		<p>Ac ne quis a nobis hoc ita dici forte miretur, quod alia quaedam in hoc facultas sit ingeni, neque haec dicendi ratio aut disciplina, ne nos quidem huic uni studio penitus umquam dediti fuimus. Etenim omnes artes, quae ad humanitatem pertinent, habent quoddam commune vinculum, et quasi cognatione quadam inter se continentur.</p>

	</section>

	<section class="row justify-content-center">
		
		<form method="post" action="index.php?page=addUser" id="form_inscription" novalidate>

			<div class="control-group">
		        <div class="form-group">
		          	<label for="name">Nom</label>
		          	<input type="text" class="form-control" placeholder="Nom" id="name" name="name"required>
		        </div>
		    </div>

		    <div class="control-group">
		        <div class="form-group">
		          <label for="firstname">Prénom</label>
		          <input type="text" class="form-control" placeholder="Prénom" id="firstname" name="firstname"required>
		        </div>
		    </div>

		    <div class="control-group">
		        <div class="form-group">
		          <label for="pseudo">Pseudo</label>
		          <input type="text" class="form-control" placeholder="Pseudo" id="pseudo" name="pseudo"required>
		        </div>
		    </div>

			<div class="form-group">
			    <label for="email">Adresse Email</label>
			    <input type="email" class="form-control" placeholder="Email" id="email" name="email"required>
			</div>

			<div>
				<p class="alert alert-danger" role="alert" id="error"></p>
		    </div>

			<button type="submit" id="btnForm" class="btn btn-primary float-right">Je m'inscris</button>
		</form>

	</section>

</article>