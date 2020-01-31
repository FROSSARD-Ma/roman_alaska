<?php foreach ($datas['chapters'] as $chapter) : ?>

<?php 
$id = $chapter->getId();
$img = $chapter->getImg();
$imgAlt = $chapter->getImgAlt();
?>
	<article class="media">
	    <a href="index.php?page=chapter/id/<?=$id?>"><img src="public/img/chapter/<?=$img?>" alt="<?=$imgAlt?>"></a>
	    <div class="media-body">
	      	<h4 class="mt-0 mb-1"> <?=$chapter->getTitle();?></h4>
			<p>
				<?php if ($chapter->getNum()!=0) echo 'Chapitre ' . $chapter->getNum().' - '; ?>
				<em>publié le <?=$chapter->getCreated();?></em>
				<br><?=$chapter->getCountComment();?>
			</p>
	      	<p><?=$chapter->getExtract();?></p>
			<a href="index.php?page=chapter/id/<?=$id?>" class="button right" role="button">Découvrir le chapitre</a>
	    </div>
	</article>
	<hr>

<?php endforeach ?>