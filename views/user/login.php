<?php $title = 'S\'identifier | Billet pour l\'Alalska';?>

<article class="container-fluid ">

	<h2>Se connecter</h2>

	<section class="container-fluid">

		<p>Ac ne quis a nobis hoc ita dici forte miretur, quod alia quaedam in hoc facultas sit ingeni, neque haec dicendi ratio aut disciplina, ne nos quidem huic uni studio penitus umquam dediti fuimus. Etenim omnes artes, quae ad humanitatem pertinent, habent quoddam commune vinculum, et quasi cognatione quadam inter se continentur.</p>

	</section>

	<section class="row justify-content-center">
		
		<form action="index.php?page=loginUser" method="post" class="needs-validation" id="login_form" novalidate>
			<div class="form-group">
			    <label for="email">Adresse Email</label>
			    <input type="email" class="form-control" id="login_email" name="email" aria-describedby="emailHelp">
			</div>

			<div class="form-group">
			    <label for="pass">Mot de passe</label>
			    <input type="password" class="form-control" id="login_pass" name="pass">
			</div>

			<div>
				<p class="alert alert-danger" role="alert" id="login_error"></p>
		    </div>

	        <?php if(isset($_SESSION['erreur'])) { ?>
	         	<div class="alert alert-success" role="alert">
					<?php echo $_SESSION['erreur']; ?>
				</div>
			<?php } ?>
		    
			<div>
				<a href="index.php?page=nxPass">Mot de passe oublié ?</a>
			</div>
			
			<button type="submit" id="login_connexion" class="btn btn-primary float-right">Se connecter</button>
		</form>

	</section>

</article>