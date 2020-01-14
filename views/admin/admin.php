<?php $title = 'Administration | Billet pour l\'Alalska'; ?>

<article class="container-fluid ">

	<h2>Administration du site</h2>

	<section class="container-fluid">

		<p>Ac ne quis a nobis hoc ita dici forte miretur, quod alia quaedam in hoc facultas sit ingeni, neque haec dicendi ratio aut disciplina, ne nos quidem huic uni studio penitus umquam dediti fuimus. Etenim omnes artes, quae ad humanitatem pertinent, habent quoddam commune vinculum, et quasi cognatione quadam inter se continentur.</p>

	</section>

	<section class="row justify-content-center">
		<!-- Default box -->
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
	                    <th style="width: 20%">
	                        Status
	                    </th>
	                    <th style="width: 20%">
	                    	Admin
	                    </th>
                  	</tr>
              	</thead>
            	<tbody>
            		<?php foreach ($datas['chapters'] as $chapter) : ?>

					<?php $id = $chapter->getId();?>

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
                      		<td>

                      			<?php if ($chapter->getStatut()=='remove') { ?>
                          			<span class="badge badge-danger">Corbeille</span>
                          		<?php } elseif ($chapter->getStatut()=='draft') { ?>
									<span class="badge badge-info">Brouillon</span>
                          		<?php } else { ?>
                          			<span class="badge badge-success">Publié</span>
                          		<?php } ?>
                      		</td>
                      		<td>
                      			<?=$count->countComments($id);?>
                      		</td>
                      		<td>
	                          	<a class="btn btn-primary btn-sm" href="index.php?page=chapter&amp;id=<?=$id?>">
	                              	<i class="fas fa-eye"></i>
	                          	</a>
	                          	<a class="btn btn-info btn-sm" href="#">
	                              	<i class="fas fa-pencil-alt"></i>
	                          	</a>
	                      	</td>
	                  	</tr>
                  <?php endforeach ?>
              	</tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
	</section>

</article>