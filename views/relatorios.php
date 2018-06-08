
	<h1>Relatório</h1>

	<p></p>
  <div class="box box-primary">
  <!-- /.box-header -->
    <div class="box-body">
      <table id="tabela-relatorios" class="table table-responsive table-bordered">
        <thead>
          <tr>
            <th style="background-color: #1c3b49; color:#fff">Visitas</th>
            <th style="background-color: #1c3b49; color:#fff">Veículos</th>
            <th style="background-color: #1c3b49; color:#fff">Residências</th>
            <th style="background-color: #1c3b49; color:#fff">Entrada</th>
            <th style="background-color: #1c3b49; color:#fff">Saída</th>
          </tr>
        </thead>
        <tbody>
           <?php foreach($relatorios_list as $r): ?>
          <tr>
            <td><?php echo $r['visitas_id']; ?></td>
            <td><?php echo $r['veiculos_id']; ?></td>
            <td><?php echo $r['residencias_id']; ?></td>
            <td><?php echo $r['entrada']; ?></td>
            <td><?php echo $r['saida']; ?></td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>