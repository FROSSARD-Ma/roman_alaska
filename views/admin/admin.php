<?php $title = 'Administration | Billet pour l\'Alalska'; ?>

<article class="container-fluid ">

	<h2>Administration du site</h2>

	<section class="container-fluid">

		<p>Ac ne quis a nobis hoc ita dici forte miretur, quod alia quaedam in hoc facultas sit ingeni, neque haec dicendi ratio aut disciplina, ne nos quidem huic uni studio penitus umquam dediti fuimus. Etenim omnes artes, quae ad humanitatem pertinent, habent quoddam commune vinculum, et quasi cognatione quadam inter se continentur.</p>

		<?php if(isset($_SESSION['erreur'])) { ?>
         	<div class="message success">
				<?php echo $_SESSION['erreur']; ?>
			</div>
		<?php } ?>

	</section>

	<!-- Chapter Management -->
	<section class="admin">
	    <div class="card">
	        <div class="card-header">
	          	<h3 class="card-title">Chapitres</h3>
	          	<a class="btn btn-primary btn-sm float-right" href="index.php?page=addChapter">
	          		<i class="fas fa-plus"></i> Ajouter un chapitre
		        </a>
	        </div>
	        <div class="card-body p-0">
			    <table class="table table-striped">
	              	<thead>
	                  	<tr>
		                    <th style="width: 1%">
		                        #
		                    </th>
		                    <th style="width: 30%">
		                        Titre
		                    </th>
		                    <th style="width: 28%">
		                        Parution
		                    </th>
		                    <th style="width: 15%" class="center">
		                        Status
		                    </th>
		                    <th style="width: 15%" class="center">
		                        Commentaires
		                    </th>
		                    <th style="width: 10%" class="center">
		                    	Gestion
		                    </th>
	                  	</tr>
	              	</thead>
	            	<tbody>
	            		<?php foreach ($datas['chapters'] as $chapter) : ?>
						<?php $id = $chapter->getId(); ?>
		                  	<tr>
		                      	<td>
		                          	<?php if ($chapter->getNum()!=0) echo $chapter->getNum();?>
		                      	</td>
		                      	<td>
		                          	<a href="index.php?page=chapter&amp;id=<?=$id?>"><?=$chapter->getTitle();?></a>
		                      	</td>
		                      	<td>
									<?=$chapter->getCreated();?>	
		                      		<br/>
	                          		<small>modifié le <?=$chapter->getModified();?></small>
	                      		</td>
	                      		<td class="center">

	                      			<?php if ($chapter->getStatut()=='remove') { ?>
	                          			<span class="badge badge-danger">Corbeille</span>
	                          		<?php } elseif ($chapter->getStatut()=='draft') { ?>
										<span class="badge badge-info">Brouillon</span>
	                          		<?php } else { ?>
	                          			<span class="badge badge-success">Publié</span>
	                          		<?php } ?>
	                      		</td>
	                      		<td class="center">
	                      			<?php if ($count > 0) echo $count; ?>
	                      		</td>
	                      		<td class="center">
		                          	<a class="icon icon-edit" href="index.php?page=chapter&amp;id=<?=$id?>" title="Voir le chapitre">
		                              	<i class="fas fa-eye"></i>
		                          	</a>
		                          	<a class="icon icon-edit" href="#" title="Editer le chapitre">
		                              	<i class="fas fa-pencil-alt"></i>
		                          	</a>
		                      	</td>
		                  	</tr>
	                  <?php endforeach ?>
	              	</tbody>
	          </table>
	        </div>
	    </div>
	</section>

	
	<!-- Comment Management -->
	<section class="admin">
	    <div class="card">
	        <div class="card-header">
	          	<h3 class="card-title">Signalement des commentaires inappropriés</h3>
	        </div>
	        <div class="card-body p-0">
			    <table class="table table-striped">
	              	<thead>
	                  	<tr>
	                  		<th style="width: 10%" class="center">
		                        Signalement
		                    </th>
		                    <th style="width: 5%" class="center">
		                        Nb
		                    </th>
		                    <th style="width: 5%" class="center">
		                    	Chapitre
		                    </th>
		                    <th style="width: 78%">
		                        Commentaire
		                    </th>
		                    <th style="width: 10%" class="center">
		                    	Commentaire
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
	                              	<i class="fas fa-trash"></i> <?=$signal->getCountSignal();?>
	                          	</a>
                      		</td>
	                  		<td class="center">
                      			<?=$signal->getCountSignal();?>
                      		</td>
	                      	<td class="center">
	                          	<a href="index.php?page=chapter/id/<?=$id?>"><?=$signal->getChapterId();?></a>
	                      	</td>                  		
	                      	<td>
								<?=$signal->getComment();?>	
                      		</td>
                      		<td class="center">
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
	        </div>
	    </div>
	</section>

</article>