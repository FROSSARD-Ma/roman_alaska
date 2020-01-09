<?php foreach ($datas['chapters'] as $chapter) : ?>

<?php 
$id = $chapter->getId();
$img = $chapter->getImg();
$imgAlt = $chapter->getImgAlt();
?>
	<article class="media">
	    <a href="index.php?page=chapter&amp;id=<?=$id?>"><img src="public/img/chapter/<?=$img?>" class="mr-3" alt="<?=$imgAlt?>"></a>
	    <div class="media-body">
	      	<h4 class="mt-0 mb-1"> <?=$chapter->getTitle();?></h4>
			<p>
				<?php if ($chapter->getNum()!=0) echo 'Chapitre ' . $chapter->getNum().' - '; ?>
				<em>le <?=$chapter->getCreated();?></em>
			</p>
	      	<p><?=$chapter->getExtract();?></p>
			<a href="index.php?page=chapter&amp;id=<?=$id?>" class="btn btn-primary btn-sm float-right" role="button">Découvrir le chapitre</a>
	    </div>
	</article>
	<hr>

<?php endforeach ?>