
<h1>Visitas - Adicionar</h1>
		<?php if(isset($error_msg) && !empty($error_msg)): ?>
		<div class="alert alert-danger alert-dismissible">
	        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	        <h4><i class="icon fa fa-ban"></i> Atenção! </h4>
	        <?php echo $error_msg ?></div>
	    <?php endif; ?>
<div class="box box-primary">
  <!-- /.box-header -->
    <div class="box-body">
		<form method="POST">
			<div class="form-group">
				<label for="nome">Nome</label><br>
		      	<input type="text" name="nome" required class="form-control" placeholder="Digite o nome">

		      	<label for="cpf">CPF</label><br>
		      	<input type="text" name="cpf" required class="form-control" placeholder="Digite o cpf">
		    </div>
		   	<label for="group">Veiculos</label><br>
			<div class="form-group">
				<select name="id_veiculo" class="form-control select2 select2-hidden-accessible" style="width: 100%" tabindex="-1" aria-hidden="true" required>
					<?php foreach($veiculos_list as $g): ?>
						<option value="<?php echo $g['id']; ?>">Modelo: <?php echo $g['modelo']; ?> - Placa: <?php echo $g['placa']; ?></option>
					<?php endforeach; ?>	
				</select><br>	
			</div>

			<button type="submit" value="Adicionar" class="btn btn-primary">Adicionar</button>
		</form>
	</div>
</div>