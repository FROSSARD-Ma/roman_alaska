<?php $title = 'S\'identifier | Billet pour l\'Alalska';?>

<article class="container-fluid ">

	<h2>Se connecter</h2>

	<section class="container-fluid">

		<p>Ac ne quis a nobis hoc ita dici forte miretur, quod alia quaedam in hoc facultas sit ingeni, neque haec dicendi ratio aut disciplina, ne nos quidem huic uni studio penitus umquam dediti fuimus. Etenim omnes artes, quae ad humanitatem pertinent, habent quoddam commune vinculum, et quasi cognatione quadam inter se continentur.</p>

	</section>

	<section class="row justify-content-center">

		<?php include('views/message.php');?>
		
		<form method="post" action="index.php?page=loginUser" id="login_form">
			<div class="form-group">
			    <label for="login_email">Adresse Email<span class="required">*</span></label>
			    <input type="email" class="form-input" id="login_email" name="email"maxlength="50" required>
			</div>

			<div class="form-group">
			    <label for="login_pass">Mot de passe<span class="required">*</span></label>
			    <input type="password" class="form-input" id="login_pass" name="pass" minlength="8" maxlength="50" required>
			</div>

			<p class="errorMessage erreur"></p>
		    
			<p>
				<a href="index.php?page=nxPass" class="float-right">Mot de passe oublié ?</a>
				<span class="required">*</span> Champs obligatoires
			</p>
			
			<button type="submit" id="login_connexion">Se connecter</button>
		</form>

	</section>

</article>