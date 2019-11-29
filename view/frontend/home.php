<?php 

$title = "Accueil";

ob_start(); 

// Connexion Base de donnée
$pdo = SWFram\Connexion::getPDO();
?>

<article class="container-fluid ">

	<h2>ACCUEIL</h2>

	<section class="container-fluid">

		<header>
			<h3>Dernier chapitre publié</h3>
		</header>

		<p>Ac ne quis a nobis hoc ita dici forte miretur, quod alia quaedam in hoc facultas sit ingeni, neque haec dicendi ratio aut disciplina, ne nos quidem huic uni studio penitus umquam dediti fuimus. Etenim omnes artes, quae ad humanitatem pertinent, habent quoddam commune vinculum, et quasi cognatione quadam inter se continentur.</p>

	</section>

	<section class="container-fluid">

		<header>
			<h3>Liste des chapitres</h3>
		</header>
		
		<?php foreach ($pdo->query('SELECT * FROM alaska_chapters') as $post): ?>
			<section>
				<h4><?=$post->chapter_title;?></h4>
				<p><?=$post->chapter_content;?></p>
			</section>
		<?php endforeach; ?>

	</section>

</article>


<?php $content = ob_get_clean(); ?>

<?php include('view/frontend/template.php'); ?>