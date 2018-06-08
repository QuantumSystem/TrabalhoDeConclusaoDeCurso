<h1>Entradas</h1>
		<?php if(isset($success_msg) && !empty($success_msg)): ?>
		<div class="alert alert-success alert-dismissible">
	        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	        <h4><i class="fa fa-check"></i> Salvo! </h4>
	        <?php echo $success_msg ?></div>
	    <?php endif; ?>
	    <p></p>
		<?php if(isset($error_msg) && !empty($error_msg)): ?>
		<div class="alert alert-danger alert-dismissible">
	        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	        <h4><i class="icon fa fa-ban"></i> Atenção! </h4>
	        <?php echo $error_msg ?></div>
	    <?php endif; ?>

	<ul class="nav nav-tabs">
		<li class="active"><a data-toggle="tab" href="#adicionar">Adicionar Visita</a></li>
		<li><a data-toggle="tab" href="#destino">Salvar Destino</a></li>
	</ul>

	<form method="POST">
	<!-- Adiciona Veículos -->
	<div class="tab-content">
		<div id="adicionar" class="tab-pane fade in active"><br>
			<div class="row">
		    	<div class="col-md-6">
		      		<div class="box box-primary">
			            <div class="box-header with-border">
			              <i class="fa fa-car"></i>
		          		<h3 class="box-title">Informações do Veiculo</h3>
		        		</div>
		          		<!-- /.box-header -->
		            	<div class="box-body">
							<div class="form-group" name="id_veicles">
								<label for="placa">Placa</label>
					            <input type="text" name="placa" class="form-control" placeholder="Digite a placa do veículo"><br>

								<label for="modelo">Modelo</label>
					            <input type="text" name="modelo" class="form-control" placeholder="Digite o modelo do veículo"><br>

								<label for="cor">Cor</label>
					            <input type="text" name="cor" class="form-control" placeholder="Digite a cor do veíclo"><br>
					   		</div>
						</div>
					</div>
				</div>
			<!-- Adiciona Visitas -->
		    	<div class="col-md-6">
		      		<div class="box box-primary">
			            <div class="box-header with-border">
			              <i class="fa fa-user-plus"></i>
		          		<h3 class="box-title">Informações da Visita</h3>
		        		</div>
		          		<!-- /.box-header -->
		            	<div class="box-body">
							<div class="form-group" name="id_visitors">
								<label for="nome">Nome</label>
				      			<input type="text" name="nome" class="form-control" placeholder="Digite o nome"><br>

				      			<label for="cpf">CPF</label>
				      			<input type="text" require name="cpf" class="form-control" placeholder="Digite o cpf">
				      			<br><br><br><br><br>
					   		</div>
						</div>
					</div>
				</div>
			</div>
			<button type="submit" value="Adicionar" class="btn btn-primary">Adicionar</button>
		</div>
	</form>
	<!-- Adiciona um Destino -->
		<div id="destino" class="tab-pane fade"><br>
			<form method="POST">
			<div class="box box-primary">
	            <div class="box-header with-border">
	              <i class="fa fa-home"></i>
	      		<h3 class="box-title">Informações do Destino</h3>
	    		</div>
	    		<!-- /.box-header -->
		        <div class="box-body">
		        	
		        	<label for="visitas_id">Visítas</label><br>
						<div class="form-group">
							<select id="visitas_id" name="visitas_id" class="form-control select2 select2-hidden-accessible" style="width: 100%" tabindex="-1" aria-hidden="true" require>
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
					
				</div>
	    	</div>
	    	<button type="submit" value="Adicionar" class="btn btn-primary">Adicionar</button>
	    	</form>
		</div>
	</div>
