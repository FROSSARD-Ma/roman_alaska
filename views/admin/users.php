<?php $title = 'Liste des lecteurs | Billet pour l\'Alalska'; ?>

<article class="container-fluid ">

	<h2>Liste des lecteurs pour le Roman "Un Billet pour l'Alaska" !</h2>

	    <table class="table table-striped projects">
            <thead>
                <tr>
                      <th style="width: 1%">
                          #
                      </th>
                      <th style="width: 20%">
                          Project Name
                      </th>
                      <th style="width: 30%">
                          Team Members
                      </th>
                      <th>
                          Project Progress
                      </th>
                      <th style="width: 8%" class="text-center">
                          Status
                      </th>
                      <th style="width: 20%">
                      </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                  	<td>
                      #
                  	</td>
                  	<td>
	                    <a>
	                        AdminLTE v3
	                    </a>
	                    <br/>
	                    <small>
	                        Created 01.01.2019
	                    </small>
                  	</td>
                    <td class="project_progress">
                          <div class="progress progress-sm">
                              <div class="progress-bar bg-green" role="progressbar" aria-volumenow="57" aria-volumemin="0" aria-volumemax="100" style="width: 57%">
                              </div>
                          </div>
                          <small>
                              57% Complete
                          </small>
                    </td>
                    <td class="project-state">
                          <span class="badge badge-success">Success</span>
                    </td>
                    <td class="project-actions text-right">
                          <a class="btn btn-primary btn-sm" href="#">
                              <i class="fas fa-folder">
                              </i>
                              View
                          </a>
                          <a class="btn btn-info btn-sm" href="#">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                          <a class="btn btn-danger btn-sm" href="#">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </a>
                    </td>
                </tr>
            </tbody>
          </table>

	<?php foreach ($datas['users'] as $user) : ?>

		<?php $id = $user->getId(); ?>

	<?php endforeach ?>

</article>