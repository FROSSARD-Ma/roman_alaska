<?php $title = 'Administration | Billet pour l\'Alalska'; ?>

<article class="container">

	<h2>Administration du site</h2>

	<section>
		<p>Ac ne quis a nobis hoc ita dici forte miretur, quod alia quaedam in hoc facultas sit ingeni, neque haec dicendi ratio aut disciplina, ne nos quidem huic uni studio penitus umquam dediti fuimus. Etenim omnes artes, quae ad humanitatem pertinent, habent quoddam commune vinculum, et quasi cognatione quadam inter se continentur.</p>
	</section>

	<?php include('views/message.php');?>

	<!-- Chapter Management -->
	<section class="card">
        <header class="card-header">
          	<h3>Chapitres</h3>
          	<a class="button" href="index.php?page=addChapter">
          		<i class="fas fa-plus"></i> Ajouter un chapitre
	        </a>
        </header>

		<table class="table-striped">
          	<thead>
              	<tr>
                    <th style="width: 8%">
                        Ch.
                    </th>
                    <th style="width: 25%">
                        Titre
                    </th>
                    <th style="width: 22%">
                        Parution
                    </th>
                    <th style="width: 10%">
                        Status
                    </th>
                    <th style="width: 21%" class="center">
                        Commentaires
                    </th>
                    <th style="width: 18%">
                    	Gestion
                    </th>
              	</tr>
          	</thead>
        	<tbody>
        		<?php foreach ($datas['chapters'] as $chapter) : ?>
					<?php $id = $chapter->getId(); ?>
                  	<tr>
                      	<td class="center">
                          	<?php if ($chapter->getNum()!=0) echo $chapter->getNum();?>
                      	</td>
                      	<td>
                          	<a href="index.php?page=chapter/id/<?=$id?>"><?=$chapter->getTitle();?></a>
                      	</td>
                      	<td>
							<?=$chapter->getCreated();?>	
                      		<br/>
                      		<small>modifié le <?=$chapter->getModified();?></small>
                  		</td>
                  		<td>
                  			<?php if ($chapter->getStatut()=='Corbeille') { ?>
                      			<span class="badge badge-danger">Corbeille</span>
                      		<?php } elseif ($chapter->getStatut()=='Brouillon') { ?>
								<span class="badge badge-info">Brouillon</span>
                      		<?php } else { ?>
                      			<span class="badge badge-success">Publié</span>
                      		<?php } ?>
                  		</td>
                  		<td class="center">
                  			<?php $chapter->getCountComment(); ?>
                  		</td>
                  		<td>
                          	<a class="icon icon-edit" href="index.php?page=chapter/id/<?=$id?>" title="Voir le chapitre">
                              	<i class="fas fa-eye"></i>
                          	</a>
                          	<a class="icon icon-edit" href="index.php?page=upChapter/id/<?=$id?>" title="Editer le chapitre">
                              	<i class="fas fa-pencil-alt"></i>
                          	</a>
                          	<?php if ($chapter->getStatut()=='Corbeille') { ?>
								<a class="icon icon-del" href="index.php?page=delChapter/id/<?=$id?>" title="supprimer DÉFINITIVEMENT le chapitre" onclick="javascript: return confirm('Supprimer DÉFINITIVEMENT le CHAPITRE ?');">
                          		<i class="fas fa-trash"></i>
                      			</a>
                          	<? } ?>
                      	</td>
                  	</tr>
              	<?php endforeach ?>
          	</tbody>
      	</table>

	</section>

	<!-- Signal Management -->
	<section class="card">
        <header class="card-header">
	        <h3>Signalement des commentaires inappropriés</h3>
	    </header>
	    <table class="table-striped">
          	<thead>
              	<tr>
              		<th style="width: 10%" class="center">
                    </th>
                    <th style="width: 10%" class="center">
                        Nb
                    </th>
                    <th style="width: 58%">
                        Commentaire
                    </th>
                    <th style="width: 20%" class="center">
                    	Gestion
                    </th>
              	</tr>
          	</thead>
        	<tbody>
        		<?php foreach ($datas['signals'] as $signal) :
					$idSignal = $signal->getSignalId();
					$idComment = $signal->getCommentId();
					$idChapter = $signal->getChapterId();
				?>
              	<tr>
					<td class="center">
              			<a class="icon icon-del" href="index.php?page=delSignal/id/<?=$idComment?>" title="supprimer le(s) signalement(s)" onclick="javascript: return confirm('Confirmez-vous la suppression du ou des signalement(s) ?');">
                          	<i class="fas fa-eraser"></i>
                      	</a>
              		</td>
              		<td class="center">
              			<?=$signal->getCountSignal();?>
              		</td>
                  	<td>
						<?=$signal->getComment();?>	
              		</td>
              		<td class="center">
              			<a class="icon icon-edit" href="index.php?page=chapter/id/<?=$idChapter?>" title="Voir le chapitre">
                              	<i class="fas fa-eye"></i>
                          	</a>
                      	<a class="icon icon-edit" href="index.php?page=upComment/id/<?=$idComment?>" title="modifier le commentaire">
                          	<i class="fas fa-pencil-alt"></i>
                      	</a>
                      	<a class="icon icon-del" href="index.php?page=delComment/id/<?=$idComment?>" title="supprimer le commentaire" onclick="javascript: return confirm('Confirmez-vous la suppression du COMMENTAIRE ?');">
                          	<i class="fas fa-trash"></i>
                      	</a>
                  	</td>
              	</tr>
              <?php endforeach ?>
          	</tbody>
      	</table>
	</section>

</article>