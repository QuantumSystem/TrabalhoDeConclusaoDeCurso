<h1>HOME</h1>
	<?php
          $user = new Users();
          $user->setLoggedUser();
    ?>
    <?php if($user->hasPermission('permissions_view')): ?><!-- ADMIN -->
	<div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
            	<?php $total = $residencias_list ?>
 				<h3><?php echo count($total); ?><h3>
              	<p>Residências</p>
            </div>
            <div class="icon">
              <i class="fa fa-home"></i>
            </div>
            <a href="<?php echo BASE_URL; ?>/relatorios" class="small-box-footer">
              Mais informações <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              	<?php $total = $users_list ?>
 				<h3><?php echo count($total); ?><h3>
              	<p>Usuários Cadastrados</p>
            </div>
            <div class="icon">
              <i class="fa fa-user"></i>
            </div>
            <a href="<?php echo BASE_URL; ?>/relatorios" class="small-box-footer">
              Mais informações <i class="fa fa-arrow-circle-right"></i>
            </a>
         </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
            	<?php $total = $veiculos_list ?>
 				<h3><?php echo count($total); ?><h3>
              	<p>Veiculos</p>
            </div>
            <div class="icon">
              <i class="fa fa-car"></i>
            </div>
            <a href="<?php echo BASE_URL; ?>/relatorios" class="small-box-footer">
              Mais informações <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              	<?php $total = $visitas_list ?>
 				<h3><?php echo count($total); ?><h3>
              	<p>Visitas</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="<?php echo BASE_URL; ?>/relatorios" class="small-box-footer">
              Mais informações <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
    </div>
    <?php endif; ?><!-- USUARIO -->

