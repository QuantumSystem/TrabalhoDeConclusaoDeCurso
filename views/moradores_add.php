	<h1>Moradores - Adicionar</h1>
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
    			<label for="nome">Nome</label><br>
                <input type="text" name="nome" required class="form-control" placeholder="Digite o nome">
            </div>

    		<div class="form-group">
                <label>Telefone</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-phone"></i>
                  </div>
                  <input type="text" name="telefone" class="form-control" data-inputmask='"mask": "(99) 9999-9999"' data-mask="">
                </div>
            </div>
    			
    		<div class="form-group">
                <label>Celular</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-phone"></i>
                  </div>
                  <input type="text" name="celular" class="form-control" data-inputmask='"mask": "(99) 99999-9999"' data-mask="">
                </div>
            </div>

    		<button type="submit" value="Adicionar" class="btn btn-primary">Adicionar</button>
    	</form>
    </div>
  </div>