
		<h1>Residências - Editar</h1>
<div class="box box-primary">
  <!-- /.box-header -->
    <div class="box-body">

			<?php if(isset($error_msg) && !empty($error_msg)): ?>
			<div class="alert alert-danger alert-dismissible">
		        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		        <h4><i class="icon fa fa-ban"></i> Atenção! </h4>
		        <?php echo $error_msg ?></div>
		    <?php endif; ?>

			<form method="POST">

			<div class="form-group">
				<label for="endereco">Endereço</label><br>
				<input type="text" name="endereco" required class="form-control" value="<?php echo $residencias_info['endereco']; ?>">
				
				<label for="numero">Número</label><br>
		        <input type="text" name="numero" required class="form-control" value="<?php echo $residencias_info['numero']; ?>">
		   	</div>

			<button type="submit" value="Adicionar" class="btn btn-primary">Salvar</button>

		</form>
	</div>
</div>
