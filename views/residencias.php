
	<h1>Residências</h1>

	<a href="<?php echo BASE_URL; ?>/residencias/add" class="btn btn-primary" role="button">Adicionar Residências</a>
	<p></p>
    	<div class="box box-primary">
          <!-- /.box-header -->
            <div class="box-body">
              <table id="tabela-pt" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th style="background-color: #1c3b49; color:#fff">Endereço</th>
                    <th style="background-color: #1c3b49; color:#fff">Número</th>
                    <th style="background-color: #1c3b49; color:#fff">Ações</th>
                  </tr>
                </thead>
                <tbody>
                   <?php foreach($residencias_list as $r): ?>
                  <tr>
                    <td><?php echo $r['endereco']; ?></td>
                    <td width="50"><?php echo $r['numero']; ?></td>
                    <td width="160">
                    <a href="<?php echo BASE_URL; ?>/residencias/edit/<?php echo $r['id']; ?>" class="btn btn-primary" role="button">Editar</a>

                    <a href="<?php echo BASE_URL; ?>/residencias/delete/<?php echo $r['id']; ?>" class="btn btn-danger" role="button" data-confirm='Tem certeza que deseja deletar?'>Excluir</a>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
      </div>