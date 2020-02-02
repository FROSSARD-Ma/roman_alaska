<?php $title = 'Demander un nouveau mot de passe | Billet pour l\'Alalska';?>

<article class="container-fluid ">

	<h2>Demander un nouveau mot de passe</h2>

	<section class="container-fluid">

		<p>Ac ne quis a nobis hoc ita dici forte miretur, quod alia quaedam in hoc facultas sit ingeni, neque haec dicendi ratio aut disciplina, ne nos quidem huic uni studio penitus umquam dediti fuimus. Etenim omnes artes, quae ad humanitatem pertinent, habent quoddam commune vinculum, et quasi cognatione quadam inter se continentur.</p>

	</section>

	<section class="row justify-content-center">
		
		<form method="post" action="index.php?page=creatPass" id="nxPass_form">

			<?php include('views/message.php');?>

			<div class="form-group">
			    <label for="nxPass_email">Adresse Email<span class="required">*</span></label>
			    <input type="email" id="nxPass_email" name="email" placeholder="Entrez votre adresse Email" size="50" maxlength="50" required>
			</div>

			<p class="errorMessage erreur"></p>

			<button type="submit" id="nxPass_btnForm">Recevoir mot de passe</button>
			<p><span class="required">*</span> Champs obligatoires</p>

		</form>

	</section>

</article>