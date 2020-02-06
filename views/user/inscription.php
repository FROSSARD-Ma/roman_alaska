<?php $title = 'Inscription | Billet pour l\'Alalska'; ?>

<article class="container">

	<h2>Inscription</h2>

	<section>
		<p>Ac ne quis a nobis hoc ita dici forte miretur, quod alia quaedam in hoc facultas sit ingeni, neque haec dicendi ratio aut disciplina, ne nos quidem huic uni studio penitus umquam dediti fuimus. Etenim omnes artes, quae ad humanitatem pertinent, habent quoddam commune vinculum, et quasi cognatione quadam inter se continentur.</p>
	</section>
	
	<section>
		
		<form method="post" action="index.php?page=creatUser" id="inscription_form">

			<?php include('views/message.php');?>

	        <div class="form-group">
	          	<label for="inscription_name">Nom<span class="required">*</span></label>
	          	<input type="text" class="form-input" placeholder="Entrez votre nom" id="inscription_name" name="name" minlength="2" maxlength="50" required>
	        </div>

	        <div class="form-group">
	          <label for="inscription_firstname">Prénom<span class="required">*</span></label>
	          <input type="text" class="form-input" placeholder="Entrez votre prénom" id="inscription_firstname" name="firstname" minlength="2" maxlength="50" required>
	        </div>

	        <div class="form-group">
	          <label for="inscription_pseudo">Pseudo</label>
	          <input type="text" class="form-input" placeholder="Entrez votre pseudo" id="inscription_pseudo" name="pseudo" minlength="2" maxlength="50"><br><span class="required right">Par défaut, votre prénom suivi de la première lettre de votre nom</span>
	          <br>
	        </div>

			<div class="form-group">
			    <label for="inscription_email">Adresse Email<span class="required">*</span></label>
			    <input type="email" class="form-input" placeholder="Entrez votre Email" id="inscription_email" name="email" maxlength="50" required>
			</div>

			<p class="errorMessage erreur"></p>
		    
		    <p><span class="required">*</span> Champs obligatoires</p>

			<button type="submit" id="inscription_btnForm">Je m'inscris</button>
			
		</form>

	</section>

</article>