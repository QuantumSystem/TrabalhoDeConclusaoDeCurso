
<h1>Visitas - Editar</h1>
			<?php if(isset($error_msg) && !empty($error_msg)): ?>
			<div class="alert alert-danger alert-dismissible">
		        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		        <h4><i class="icon fa fa-ban"></i> Atenção! </h4>
		        <?php echo $error_msg ?>
		    </div>
		    <?php endif; ?>
<div class="box box-primary">
  <!-- /.box-header -->
    <div class="box-body">
			<form method="POST">

			<div class="form-group">
				<label for="nome">Nome</label><br>
				<input type="text" name="nome" required class="form-control" value="<?php echo $visitas_info['nome']; ?>">

				<label for="cpf">CPF</label><br>
				<input type="text" name="cpf" required class="form-control" value="<?php echo $visitas_info['cpf']; ?>">
		   	</div>

			<button type="submit" value="Adicionar" class="btn btn-primary">Salvar</button>
		</form>
	</div>
</div>
