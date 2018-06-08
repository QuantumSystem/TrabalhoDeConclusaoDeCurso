
	<h1>Moradores</h1>

	<a href="<?php echo BASE_URL; ?>/moradores/add" class="btn btn-primary" role="button">Adicionar Moradores</a>
	<p></p>
	<div class="box box-primary">
      <!-- /.box-header -->
        <div class="box-body">
          <table id="tabela-pt" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th style="background-color: #1c3b49; color:#fff">Nome</th>
                <th style="background-color: #1c3b49; color:#fff">Telefone</th>
                <th style="background-color: #1c3b49; color:#fff">Celular</th>
                <th style="background-color: #1c3b49; color:#fff">Ações</th>
              </tr>
            </thead>
            <tbody>
               <?php foreach($moradores_list as $m): ?>
              <tr>
                <td><?php echo $m['nome']; ?></td>
                <td width="40"><?php echo $m['telefone']; ?></td>
                <td width="40"><?php echo $m['celular']; ?></td>
                <td width="160">
                <a href="<?php echo BASE_URL; ?>/moradores/edit/<?php echo $m['id']; ?>" class="btn btn-primary" role="button">Editar</a>

                <a href="<?php echo BASE_URL; ?>/moradores/delete/<?php echo $m['id']; ?>" class="btn btn-danger" role="button" data-confirm='Tem certeza que deseja deletar?'>Excluir</a>
                </td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
   	</div>