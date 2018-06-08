
<h1>Veículos - Adicionar</h1>
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
				<label for="modelo">Modelo</label><br>
	            <input type="text" name="modelo" required class="form-control" placeholder="Digite o modelo do veículo"><br>

	            <label for="placa">Placa</label><br>
	            <input type="text" name="placa" required class="form-control" placeholder="Digite a placa do veículo"><br>
				
				<label for="cor">Cor</label><br>
	            <input type="text" name="cor" required class="form-control" placeholder="Digite a cor do veíclo"><br>
	   		</div>
			<button type="submit" value="Adicionar" class="btn btn-primary">Adicionar</button>
		</form>
		
	</div>
</div>