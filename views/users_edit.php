
<h1>Usuários - Editar</h1>
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
				<label for="email">E-mail</label><br>
				<input type="text" class="form-control" placeholder="<?php echo $user_info['email']; ?>" disabled="">

				<label for="nome">Nome</label><br>
				<input type="text" name="nome" required class="form-control" value="<?php echo $user_info['nome']; ?>">
				
				<label for="password">Senha</label><br>
			    <input type="password" name="password" required class="form-control" placeholder="Digite a senha">

			    <label for="telefone">Telefone</label><br>
				<input type="text" name="telefone" required class="form-control" value="<?php echo $user_info['telefone']; ?>">

				<label for="celular">Celular</label><br>
				<input type="text" name="celular" required class="form-control" value="<?php echo $user_info['celular']; ?>">
		   	</div>


			<label for="group">Grupo de Permissões</label>
			<div class="form-group">
				<select name="group" required class="form-control select2 select2-hidden-accessible" style="width: 100%" tabindex="-1" aria-hidden="true">
					<?php foreach($group_list as $g): ?>
						<option value="<?php echo $g['id']; ?>"<?php echo ($g['id']==$user_info['id_group'])?'selected="selected"':''; ?>><?php echo $g['name']; ?></option>
					<?php endforeach; ?>	
				</select><br>	
			</div>
			<label for="id_residencia">Residência</label>
			<div class="form-group">
				<select name="id_residencia" required class="form-control select2 select2-hidden-accessible" style="width: 100%" tabindex="-1" aria-hidden="true">
					<?php foreach($residencias_list as $r): ?>
						<option value="<?php echo $r['id']; ?>"<?php echo ($r['id']==$user_info['id_residencia'])?'selected="selected"':''; ?>>Endereço: <?php echo $r['endereco']; ?> - Número: <?php echo $r['numero']; ?></option>
					<?php endforeach; ?>	
				</select><br>	
			</div>

			<button type="submit" value="Adicionar" class="btn btn-primary">Adicionar</button>

		</form>
	</div>
</div>