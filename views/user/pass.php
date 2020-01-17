<?php $title = 'Demander un nouveau mot de passe | Billet pour l\'Alalska';?>

<article class="container-fluid ">

	<h2>Demander un nouveau mot de passe</h2>

	<section class="container-fluid">

		<p>Ac ne quis a nobis hoc ita dici forte miretur, quod alia quaedam in hoc facultas sit ingeni, neque haec dicendi ratio aut disciplina, ne nos quidem huic uni studio penitus umquam dediti fuimus. Etenim omnes artes, quae ad humanitatem pertinent, habent quoddam commune vinculum, et quasi cognatione quadam inter se continentur.</p>

	</section>

	<section class="row justify-content-center">
		
		<form action="index.php?page=creatPass" method="post" class="needs-validation" novalidate id="nxPass_form">
			<div class="form-group">
			    <label for="nxPass_email">Adresse Email</label>
			    <input type="email" class="form-control" id="nxPass_email" name="email" placeholder="Entrer votre adresse Email" aria-describedby="emailHelp">
			</div>

			<div>
				<p class="alert alert-danger" role="alert" id="nxPass_error"></p>
		    </div>

	        <?php if(isset($_SESSION['erreur'])) { ?>
	         	<div class="alert alert-success" role="alert">
					<?php echo $_SESSION['erreur']; ?>
				</div>
			<?php } ?>

			<button type="submit" id="nxPass_btnForm" class="btn btn-primary float-right">Recevoir mot de passe</button>
		</form>

	</section>

</article>