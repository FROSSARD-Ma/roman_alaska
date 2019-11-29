<?php $title = 'Chapitre' ?>

<?php ob_start(); ?>

<section class="container-fluid ">

	<h2>CHAPITRE</h2>

	<section class="container-fluid">

		<p>Ac ne quis a nobis hoc ita dici forte miretur, quod alia quaedam in hoc facultas sit ingeni, neque haec dicendi ratio aut disciplina, ne nos quidem huic uni studio penitus umquam dediti fuimus. Etenim omnes artes, quae ad humanitatem pertinent, habent quoddam commune vinculum, et quasi cognatione quadam inter se continentur.</p>

	</section>

</section>


<?php $content = ob_get_clean(); ?>

<?php include('view/frontend/template.php'); ?>