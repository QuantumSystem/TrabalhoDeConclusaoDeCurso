
  <h1>Saídas</h1>

  <p></p>
  <div class="box box-primary">
          <!-- /.box-header -->
            <div class="box-body">
              <table id="tabela-pt" class="table table-responsive table-bordered">
                <thead>
                  <tr>
                    <th style="background-color: #1c3b49; color:#fff">Nome da Visita</th>
                    <th style="background-color: #1c3b49; color:#fff">Veículo</th>
                    <th style="background-color: #1c3b49; color:#fff">Placa</th>
                    <th style="background-color: #1c3b49; color:#fff">Endereço</th>
                    <th style="background-color: #1c3b49; color:#fff">Residências</th>
                    <th style="background-color: #1c3b49; color:#fff">Entrada</th>
                    <th style="background-color: #1c3b49; color:#fff">Saída</th>
                    <th style="background-color: #1c3b49; color:#fff">Ações</th>
                  </tr>
                </thead>
                <tbody>
                   <?php foreach($controle_list as $c): ?>
                  <tr>
                    <td><?php echo $c['nome']; ?></td>
                    <td><?php echo $c['modelo']; ?></td>
                    <td><?php echo $c['placa']; ?></td>
                    <td><?php echo $c['endereco']; ?></td>
                    <td><?php echo $c['numero']; ?></td>
                    <td><?php echo $c['entrada']; ?></td>
                    <td><?php echo $c['saida']; ?></td>
                    <td width="160">
                      <a href="<?php echo BASE_URL; ?>/controle/saida/<?php echo $c['id']; ?>" class="btn btn-warning" role="button" data-saida='Tem certeza que deseja salvar a saída?'>Saída</a>

                      <a href="<?php echo BASE_URL; ?>/controle/delete/<?php echo $c['id']; ?>" class="btn btn-danger" role="button" data-confirm='Tem certeza que deseja deletar?'>Excluir</a>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
  </div>