
	<h1>Visitas</h1>

	<p></p>
	<div class="box box-primary">
      <!-- /.box-header -->
        <div class="box-body">
          <table id="tabela-pt" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th style="background-color: #1c3b49; color:#fff">Nome</th>
                <th style="background-color: #1c3b49; color:#fff">CPF</th>
                <th style="background-color: #1c3b49; color:#fff">Ações</th>
              </tr>
            </thead>
            <tbody>
               <?php foreach($visitas_list as $v): ?>
              <tr>
                <td><?php echo $v['nome']; ?></td>
                <td width="40"><?php echo $v['cpf']; ?></td>
                <td width="160">
                <a href="<?php echo BASE_URL; ?>/visitas/edit/<?php echo $v['id']; ?>" class="btn btn-primary" role="button">Editar</a>

                <a href="<?php echo BASE_URL; ?>/visitas/delete/<?php echo $v['id']; ?>" class="btn btn-danger" role="button" data-confirm='Tem certeza que deseja deletar?'>Excluir</a>
                </td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
   	</div>