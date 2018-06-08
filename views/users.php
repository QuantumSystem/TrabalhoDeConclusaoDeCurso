	<h1>Usuários</h1>
  <?php if(isset($error_msg) && !empty($error_msg)): ?>
    <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-ban"></i> Atenção! </h4>
          <?php echo $error_msg ?>
    </div>
  <?php endif; ?>

	<a href="<?php echo BASE_URL; ?>/users/add" class="btn btn-primary" role="button">Adicionar Usuários</a><br>
	<p></p>

    	 <div class="box box-primary">
                <!-- /.box-header -->
          <div class="box-body">
            <table id="tabela-pt" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th style="background-color: #1c3b49; color:#fff">Nome</th>
                  <th style="background-color: #1c3b49; color:#fff">E-mail</th>
                  <th style="background-color: #1c3b49; color:#fff">Telefone</th>
                  <th style="background-color: #1c3b49; color:#fff">Celular</th>
                  <th style="background-color: #1c3b49; color:#fff">Grupo de Permissões</th>
                  <th style="background-color: #1c3b49; color:#fff">Ações</th>
                </tr>
              </thead>
              <tbody>
                 <?php foreach($user_list as $us): ?>
                <tr>
                  <td><?php echo $us['nome']; ?></td>
                  <td><?php echo $us['email']; ?></td>
                  <td><?php echo $us['telefone']; ?></td>
                  <td><?php echo $us['celular']; ?></td>
                  <td><?php echo $us['name']; ?></td>
                  <td width="160">
                  <a href="<?php echo BASE_URL; ?>/users/edit/<?php echo $us['id']; ?>" class="btn btn-primary" role="button">Editar</a>

                  <a href="<?php echo BASE_URL; ?>/users/delete/<?php echo $us['id']; ?>" class="btn btn-danger" role="button" 
                    data-confirm='Tem certeza que deseja deletar?'>Excluir</a>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
                <!-- /.box-body -->
        </div>