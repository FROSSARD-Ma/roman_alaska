<?php  $title = 'Accueil | Billet pour l\'Alalska'; ?>

<article class="container-fluid ">

	<h2>Bienvenue <?php if(isset($_SESSION['user'])) echo $_SESSION['user'] ?> !</h2>

	<?php include('message.php');?>

	<section class="container-fluid">
		<p>Vous aimez lire ? Vous avez envie de découvrir l'Alaska ? Alors ce site est fait pour vous !</p>
		<p>Je m'appelle <strong>Jean Forteroche</strong>, <a href="index.php?page=about">auteur de roman d'aventure</a>, je vous propose de partir à la découverte de l'alaska à travers mon roman, "Un Billet pour l'Alaska".</p>
		<p>Vous pouvez vous inscrire afin d'être informé de la parution des nouveaux chapitres.</p>
		<p>Participer à l'aventure en laissant des commentaires sur chacune des parutions !</p>
		<p>Bon voyage !</p>

	</section>

	<section class="container-fluid">

		<h3>Les 2 dernières parutions...</h3>
		<?php require('book/infos-chapter.php');?>

	</section>

</article>