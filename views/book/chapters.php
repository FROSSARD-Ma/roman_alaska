<?php $title = 'Liste des chapitres | Billet pour l\'Alalska'; ?>

<article class="container-fluid ">

	<h2>Décourez le nouveau Roman  "Un Billet pour l'Alaska" !</h2>

	<p>Découvrez l'intégralité des chapitres édités</p>

	<?php 
	foreach ($Chapters as $post)
	{ ?>		
		<section class="media">
		    <a href="index.php?action=chapter&amp;chapter_id=<?=$post->chapter_id?>"><img src="public/img/chapter/<?=$post->chapter_img?>" class="mr-3" alt="<?=$post->chapter_img_alt?>"></a>
		    <div class="media-body">
		      	<h4 class="mt-0 mb-1"> <?= htmlspecialchars($post->chapter_title) ?></h4>
				<p><?php if (htmlspecialchars($post->chapter_num)!=0) 
						{ echo 'Chapitre ' . htmlspecialchars($post->chapter_num).' - '; } ?>
					<em>le <?= $post->chapter_date ?></em>
					</p>
			    <p><?= nl2br(htmlspecialchars($post->chapter_extract)) ?> ...</p>
				<a href="index.php?action=chapter&amp;chapter_id=<?=$post->chapter_id?>" class="btn btn-primary btn-sm float-right" role="button">Découvrir le chapitre</a>
		    </div>
		</section>
		<hr>
		
	<?php  } ?>
		
</article>