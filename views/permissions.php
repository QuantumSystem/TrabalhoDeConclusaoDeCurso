
	<h1>Permissões</h1>

	<ul class="nav nav-tabs">
		<li class="active"><a data-toggle="tab" href="#group">Grupos de permissões</a></li>
		<li><a data-toggle="tab" href="#permissions">Permissões</a></li>
	</ul>

	</ul>
	<div class="tab-content">

		<div id="group" class="tab-pane fade in active"><br>
			<a href="<?php echo BASE_URL; ?>/permissions/add_group" class="btn btn-primary" role="button">Adicionar Grupo de Permissões</a>
			<p></p>	
			<div class="box box-primary">
	            <!-- /.box-header -->
	            <div class="box-body">
	              <table id="tabela-pt" class="table table-striped table-bordered">
	                <thead>
		                <tr>
		                  <th style="background-color: #1c3b49; color:#fff">Nome do Grupo de Permissões</th>
		                  <th style="background-color: #1c3b49; color:#fff">Ações</th>
		                </tr>
	                </thead>
	                <tbody>
	                  	<?php foreach($permissions_groups_list as $p): ?>
		                <tr>
			                <td> <?php echo $p['name']; ?> </td>
			                <td scope="row" width="160">
			                <a href="<?php echo BASE_URL; ?>/permissions/edit_group/<?php echo $p['id']; ?>" class="btn btn-primary" role="button">Editar</a></button>

			                <a href="<?php echo BASE_URL; ?>/permissions/delete_group/<?php echo $p['id']; ?>" class="btn btn-danger" role="button" data-confirm='Tem certeza que deseja deletar?'>Excluir</a></button>
		                	</td>
	                	</tr>
	                	<?php endforeach; ?>
	                </tbody>
	              </table>
	            </div>
	            <!-- /.box-body -->
	  		</div>
		</div>
	
		<div id="permissions" class="tab-pane fade"><br>
			<a href="<?php echo BASE_URL; ?>/permissions/add" class="btn btn-primary" role="button">Adicionar Permissão</a></button>
		<p></p>
		<div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <table id="tabela-pts" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th style="background-color: #1c3b49; color:#fff">Nome da Permissão</th>
                    <th style="background-color: #1c3b49; color:#fff">Ações</th>
                  </tr>
                </thead>
                <tbody>
                   <?php foreach($permissions_list as $p): ?>
                  <tr>
                    <td> <?php echo $p['name']; ?> </td>
                    <td width="50"><a href="<?php echo BASE_URL; ?>/permissions/delete/<?php echo $p['id']; ?>" class="btn btn-danger" role="button" data-confirm='Tem certeza que deseja deletar?'>Excluir</a></div></td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
      </div>
		</div>
	</div>
