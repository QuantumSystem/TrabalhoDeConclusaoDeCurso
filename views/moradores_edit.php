
<h1>Moradores - Editar</h1>

	<?php if(isset($error_msg) && !empty($error_msg)): ?>
	<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-ban"></i> Atenção! </h4>
        <?php echo $error_msg ?></div>
    <?php endif; ?>

	<form method="POST">

	<div class="form-group">
		<label for="nome">Nome</label><br>
		<input type="text" name="nome" required class="form-control" value="<?php echo $moradores_info['nome']; ?>">

		<label for="telefone">Telefone</label><br>
		<input type="text" name="telefone" required class="form-control" value="<?php echo $moradores_info['telefone']; ?>">
		
		<label for="numero">Celular</label><br>
        <input type="text" name="celular" required class="form-control" value="<?php echo $moradores_info['celular']; ?>">
   	</div>

	<button type="submit" value="Adicionar" class="btn btn-primary">Salvar</button>

</form>
