<?php  $title = 'Accueil | Billet pour l\'Alalska'; ?>

<article class="container-fluid ">

	<h2>Bienvenue !</h2>

	<section class="container-fluid">

		<p>Vous aimez lire ? Vous avez envie de découvrir l'Alaska ? Alors ce site est fait pour vous !</p>
		<p>Je m'appelle <strong>Jean Forteroche</strong>, <a href="index.php?action=about">auteur de roman d'aventure</a>, je vous propose de partir à la découverte de l'alaska à travers mon roman, "Un Billet pour l'Alaska".</p>
		<p>Vous pouvez vous inscrire afin d'être informé de la parution des nouveaux chapitres.</p>
		<p>Participer à l'aventure en laissant des commentaires sur chacune des parutions !</p>
		<p>Bon voyage !</p>

	</section>

	<section class="container-fluid">

		<h3>Les 2 dernières parutions...</h3>
		
		<?php foreach ($home2Chapters as $post) 
		{ ?>
			<article class="media">
			    <a href="index.php?action=chapter&amp;chapter_id=<?=$post->chapter_id;?>"><img src="public/img/chapter/<?=$post->chapter_img?>" class="mr-3" alt="<?=$post->chapter_img_alt?>"></a>
			    <div class="media-body">
			      	<h4 class="mt-0 mb-1"> <?= htmlspecialchars($post->chapter_title)?></h4>

					<p><?php if (htmlspecialchars($post->chapter_num)!=0) 
						{ echo 'Chapitre ' . htmlspecialchars($post->chapter_num).' - '; } ?>
					<em>le <?= $post->chapter_date ?></em>
					</p>

			      	<p><?= nl2br(htmlspecialchars($post->chapter_extract)) ?> ...</p>
					<a href="index.php?action=chapter&amp;chapter_id=<?=$post->chapter_id; ?>" class="btn btn-primary btn-sm float-right" role="button">Découvrir le chapitre</a>
			    </div>
			</article>
			<hr>
		
		<?php } ?>
		
	</section>
</article>