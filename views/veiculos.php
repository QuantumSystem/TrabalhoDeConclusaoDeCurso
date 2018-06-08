
	<h1>Veículos</h1>

	<p></p>
	<div class="box box-primary">
      <!-- /.box-header -->
        <div class="box-body">
          <table id="tabela-pt" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th style="background-color: #1c3b49; color:#fff">Modelo</th>
                <th style="background-color: #1c3b49; color:#fff">Placa</th>
                <th style="background-color: #1c3b49; color:#fff">Cor</th>
                <th style="background-color: #1c3b49; color:#fff">Ações</th>
              </tr>
            </thead>
            <tbody>
               <?php foreach($veiculos_list as $v): ?>
              <tr>
                <td><?php echo $v['modelo']; ?></td>
                <td width="50"><?php echo $v['placa']; ?></td>
                <td width="80"><?php echo $v['cor']; ?></td>
                <td width="160">
                <a href="<?php echo BASE_URL; ?>/veiculos/edit/<?php echo $v['id']; ?>" class="btn btn-primary" role="button">Editar</a>

                <a href="<?php echo BASE_URL; ?>/veiculos/delete/<?php echo $v['id']; ?>" class="btn btn-danger" role="button" data-confirm='Tem certeza que deseja deletar?'>Excluir</a>
                </td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
   	</div>