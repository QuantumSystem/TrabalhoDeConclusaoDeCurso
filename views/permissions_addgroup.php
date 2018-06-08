
		<h1>Permissões - Adicionar Grupo de permissões</h1>
<div class="box box-primary">
  <!-- /.box-header -->
    <div class="box-body">

		<form method="POST">

			<div class="form-group">
	            <label>Nome do grupo de Permissões</label>
	            <input type="text" name="name" class="form-control" placeholder="Digite o nome do grupo">
	        </div>

			<h4>Permissões</h4>
			<?php foreach ($permissions_list as $p): ?>
				<div class="p_item">
					<input type="checkbox" name="permissions[]" value="<?php echo $p['id']; ?>" id="p_<?php echo $p['id']; ?>" />
					<label for="p_<?php echo $p['id']; ?>"><?php echo $p['name']; ?></label>
				</div>
			<?php endforeach;?>
			<br>

			<button type="submit" value="Adicionar" class="btn btn-primary">Adicionar</button>
		</form>
	</div>
</div>


