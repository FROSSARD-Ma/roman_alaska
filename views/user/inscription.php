<?php $title = 'Inscription | Billet pour l\'Alalska'; ?>

<article class="container-fluid ">

	<h2>Inscription</h2>

	<section class="container-fluid">

		<p>Ac ne quis a nobis hoc ita dici forte miretur, quod alia quaedam in hoc facultas sit ingeni, neque haec dicendi ratio aut disciplina, ne nos quidem huic uni studio penitus umquam dediti fuimus. Etenim omnes artes, quae ad humanitatem pertinent, habent quoddam commune vinculum, et quasi cognatione quadam inter se continentur.</p>

	</section>

	<section class="row justify-content-center">
		
		<form method="post" action="index.php?page=creatUser" id="inscription_form" novalidate>

			<?php if(isset($_SESSION['erreur'])) { ?>
	         	<div class="alert alert-warning" role="alert">
					<?php echo $_SESSION['erreur']; ?>
				</div>
			<?php } ?>

			<div class="control-group">
		        <div class="form-group">
		          	<label for="inscription_name">Nom</label>
		          	<input type="text" class="form-control" placeholder="Nom" id="inscription_name" name="name"required>
		        </div>
		    </div>

		    <div class="control-group">
		        <div class="form-group">
		          <label for="inscription_firstname">Prénom</label>
		          <input type="text" class="form-control" placeholder="Prénom" id="inscription_firstname" name="firstname"required>
		        </div>
		    </div>

		    <div class="control-group">
		        <div class="form-group">
		          <label for="inscription_pseudo">Pseudo</label>
		          <input type="text" class="form-control" placeholder="Pseudo" id="inscription_pseudo" name="pseudo"required>
		        </div>
		    </div>

			<div class="form-group">
			    <label for="inscription_email">Adresse Email</label>
			    <input type="email" class="form-control" placeholder="Email" id="inscription_email" name="email"required>
			</div>

			<div>
				<p class="alert alert-danger" role="alert" id="inscription_error"></p>
		    </div>

			<button type="submit" id="inscription_btnForm" class="btn btn-primary btn-sm float-right">Je m'inscris</button>
		</form>

	</section>

</article>