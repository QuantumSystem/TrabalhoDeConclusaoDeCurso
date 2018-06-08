
		<h1>Permissões - Editar Grupo de permissões</h1>
<div class="box box-primary">
  <!-- /.box-header -->
    <div class="box-body">

		<form method="POST">

			<label for="name">Nome do grupo de Permissões</label><br>
			<input type="text" name="name" class="form-control" value="<?php echo $group_info['name']; ?>"><br>

			<label>Permissões</label><br>
			<?php foreach ($permissions_list as $p): ?>
				<div class="p_item">
					<input type="checkbox" name="permissions[]" value="<?php echo $p['id']; ?>" id="p_<?php echo $p['id']; ?>" 
					<?php echo (in_array($p['id'], $group_info['params']))?'checked="checked"':''; ?> /><!-- if inline verifica
					se a permissão existe dentro do grupo se existir retorna checked se nao vazio -->
					<label for="p_<?php echo $p['id']; ?>"><?php echo $p['name']; ?></label>
				</div>
			<?php endforeach;?><br>
			<button type="submit" value="Editar" class="btn btn-primary">Editar</button>

		</form>
	</div>
</div>
