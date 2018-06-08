<h1>Controle - Adicionar</h1>
<div class="box box-primary">
  <!-- /.box-header -->
    <div class="box-body">

		<form method="POST">
			<label for="visitas_id">Visítas</label><br>
			<div class="form-group">
				<select name="visitas_id" class="form-control select2 select2-hidden-accessible" style="width: 100%" tabindex="-1" aria-hidden="true" require>
					<?php foreach($visitas_list as $vi): ?>
						<option value="<?php echo $vi['id']; ?>"><?php echo $vi['nome']; ?> - <?php echo $vi['cpf']; ?></option>
					<?php endforeach; ?>
				</select>	
			</div><br>

			<label for="veiculos_id">Veículos</label><br>
			<div class="form-group">
				<select id="veiculos_id" name="veiculos_id" class="form-control select2 select2-hidden-accessible" style="width: 100%" tabindex="-1" aria-hidden="true">
					<?php foreach($veiculos_list as $v): ?>
						<option value="<?php echo $v['id']; ?>"><?php echo $v['modelo']; ?> - <?php echo $v['placa']; ?></option>
					<?php endforeach; ?>	
				</select>	
			</div><br>

			<label for="residencias_id">Residências</label><br>
			<div class="form-group" >
				<select id="residencias_id" name="residencias_id" class="form-control select2 select2-hidden-accessible" style="width: 100%" tabindex="-1" aria-hidden="true" require>
					<?php foreach($residencias_list as $r): ?>
						<option value="<?php echo $r['id']; ?>"><?php echo $r['endereco']; ?> - <?php echo $r['numero']; ?></option>
					<?php endforeach; ?>	
				</select>	
			</div><br>

			<button type="submit" value="Adicionar" class="btn btn-primary">Adicionar</button>
			
		</form>
	</div>
</div>