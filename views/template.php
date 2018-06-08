<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dashboard | <?php echo $viewData['user_name']; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport"> 
  <link href="<?php echo BASE_URL.'/bower_components/bootstrap/dist/css/bootstrap.min.css'; ?>" rel="stylesheet">  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo BASE_URL.'/bower_components/font-awesome/css/font-awesome.min.css'; ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo BASE_URL.'/assets/css/ionicons.min.css'; ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo BASE_URL.'/assets/css/AdminLTE.min.css'; ?>">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="<?php echo BASE_URL.'/assets/css/skins/skin-blue.min.css'; ?>">
  <link rel="stylesheet" href="<?php echo BASE_URL.'/assets/css/skins/jquery-ui.min.css'; ?>">

  <link type="text/css" rel="stylesheet" href="<?php echo BASE_URL.'/plugins/datatables/dataTables.bootstrap.css'; ?>"/>

  <!-- PDF -->
  <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL.'/assets/css/all.min.css'; ?> "/>
 
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="<?php echo BASE_URL.'/assets/css/googlefonts.css'; ?>">
  <link rel="stylesheet" href="<?php echo BASE_URL.'/assets/css/select2.min.css'; ?>">
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Q</b>s</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Quantum</b>System</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          
          <!-- /.messages-menu -->

          <!-- Notifications Menu -->
          
          <!-- Tasks Menu -->
          
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="<?php echo BASE_URL.'/assets/img/avatar5.png'; ?>" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"></span>
              <!-- <span class="hidden-xs"><?php echo $viewData['company_name']; ?></span> -->
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="<?php echo BASE_URL.'/assets/img/avatar5.png'; ?>" class="img-circle" alt="User Image">

                <p>
                  <?php echo $viewData['user_name']; ?>
                  <small><?php echo $viewData['user_email']; ?></small>
                </p>
              </li>
              <!-- Menu Body -->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="<?php echo BASE_URL.'/login/logout'; ?>" class="btn btn-default btn-flat">Sair</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo BASE_URL.'/assets/img/avatar5.png'; ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <h6><p class="text-success"><?php echo $viewData['user_name']; ?></p></h6>
          <!-- <p><?php echo $viewData['user_email']; ?></p>-->
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <!-- Optionally, you can add icons to the links -->
        <br>
        <?php
          $user = new Users();
          $user->setLoggedUser();
        ?>
        <li class="active"><a href="<?php echo BASE_URL; ?>"><i class="fa fa-home"></i> <span>Home</span></a></li>
        <?php if($user->hasPermission('entradas_view')): ?>
            <li class="header">Admin</li>
            <li><a href="<?php echo BASE_URL; ?>/entradas"><i class="fa fa-arrow-right"></i> <span>Entradas</span></a></li>
        <?php endif; ?>
        <?php if($user->hasPermission('controle_view')): ?>
            <li><a href="<?php echo BASE_URL; ?>/controle"><i class="fa fa-arrow-left"></i> <span>Saídas</span></a></li>
        <?php endif; ?>
        <?php if($user->hasPermission('permissions_view')): ?>
          <li class="treeview active">
            <a href="#">
              <i class="fa fa-edit"></i>
              <span>Gerenciar</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
          <ul class="treeview-menu" style="display: none;">
            <li><a href="<?php echo BASE_URL; ?>/permissions"><i class="fa  fa-unlock-alt"></i> <span>Permissões</span></a></li>
        <?php endif; ?>
            <?php if($user->hasPermission('users_view')): ?>
                <li><a href="<?php echo BASE_URL; ?>/users"><i class="fa fa-user-plus"></i> <span>Usuários</span></a></li>
            <?php endif; ?>
            <?php if($user->hasPermission('residencias_view')): ?>
                <li><a href="<?php echo BASE_URL; ?>/residencias"><i class="fa fa-home"></i> <span>Residências</span></a></li>
            <?php endif; ?>
            <?php if($user->hasPermission('veiculos_view')): ?>
                <li><a href="<?php echo BASE_URL; ?>/veiculos"><i class="fa fa-car"></i> <span>Veículos</span></a></li>
            <?php endif; ?>
            <?php if($user->hasPermission('visitas_view')): ?>
                <li><a href="<?php echo BASE_URL; ?>/visitas"><i class="fa fa-user-plus"></i> <span>Visitas</span></a></li>
            <?php endif; ?>
          </ul>
        </li>
        <?php if($user->hasPermission('relatorios_view')): ?>
          <li class="header">Users</li>
          <li><a href="<?php echo BASE_URL; ?>/relatorios"><i class="fa fa-print"></i> <span>Relatórios</span></a></li>
        <?php endif; ?>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
  
    <!-- Main content -->
    <section class="content container-fluid">
      <?php $this->loadViewInTemplate($viewName, $viewData) ?>      
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane active" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="pull-right-container">
                    <span class="label label-danger pull-right">70%</span>
                  </span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

  <!-- REQUIRED JS SCRIPTS -->

  <!-- jQuery 3 -->
  <script src="<?php echo BASE_URL.'/assets/js/jquery.min.js'; ?>"></script>

  
  <!-- Bootstrap 3.3.7 -->
  <script src="<?php echo BASE_URL.'/assets/js/bootstrap.min.js'; ?>"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo BASE_URL.'/assets/js/adminlte.min.js'; ?>"></script>

   <!-- Data Table JS -->
  <script src="<?php echo BASE_URL.'/assets/js/tabela-pt.js'; ?>"></script>
  <script src="<?php echo BASE_URL.'/assets/js/tabela-pts.js'; ?>"></script>
  <script src="<?php echo BASE_URL.'/assets/js/jquery.dataTables.min.js'; ?>"></script> 
  <script src="<?php echo BASE_URL.'/assets/js/dataTables.bootstrap.min.js'; ?>"></script>
  <script src="<?php echo BASE_URL.'/plugins/datatables/jquery.dataTables.js'; ?>"></script>
  <script src="<?php echo BASE_URL.'/plugins/datatables/dataTables.bootstrap.js'; ?>"></script>
  <!-- Data Table CSS -->
  <script src="<?php echo BASE_URL.'/assets/css/jquery.dataTables.min.css'; ?>"></script>
  <script src="<?php echo BASE_URL.'/assets/css/dataTables.bootstrap.min.css'; ?>"></script>
  <!-- Modal -->
  <script src="<?php echo BASE_URL.'/assets/js/modal-excluir.js'; ?>"></script>
  <script src="<?php echo BASE_URL.'/assets/js/modal-saida.js'; ?>"></script>
  <!-- Input Mask -->
  <script src="<?php echo BASE_URL.'/plugins/input-mask/jquery.inputmask.js'; ?>"></script>
  <script src="<?php echo BASE_URL.'/plugins/input-mask/jquery.inputmask.date.extensions.js'; ?>"></script>
  <script src="<?php echo BASE_URL.'/plugins/input-mask/jquery.inputmask.extensions.js'; ?>"></script>
  <script src="<?php echo BASE_URL.'/plugins/input-mask/jquery.inputmask.phone.extensions.js'; ?>"></script>
  
  <!-- Select 2 -->
  <script src="<?php echo BASE_URL.'/assets/js/select2.min.js'; ?>"></script>


  <!-- Bootstrap Export Data Table -->
  <script src="<?php echo BASE_URL.'/assets/js/pdfmake.min.js'; ?>"></script>
  <script src="<?php echo BASE_URL.'/assets/js/buttons.print.min.js'; ?>"></script>
  <script src="<?php echo BASE_URL.'/assets/js/dataTables.buttons.min.js'; ?>"></script>
  <script src="<?php echo BASE_URL.'/assets/js/buttons.flash.min.js'; ?>"></script>
  <script src="<?php echo BASE_URL.'/assets/js/vfs_fonts.js'; ?>"></script>
  <script src="<?php echo BASE_URL.'/assets/js/buttons.html5.min.js'; ?>"></script>
  <script src="<?php echo BASE_URL.'/assets/js/buttons.bootstrap.min.js'; ?>"></script>
  <script src="<?php echo BASE_URL.'/assets/js/buttons.colVis.min.js'; ?>"></script>
  <script src="<?php echo BASE_URL.'/assets/js/jszip.min.js'; ?>"></script>
  <script src="<?php echo BASE_URL.'/assets/js/jquery-ui.min'; ?>"></script>
  
  <!-- POPULA CONTROLE -->
  <script src="<?php echo BASE_URL.'/assets/js/controle.js'; ?>"></script>

  <script>
    $(document).ready(function() {
        $('.select2-hidden-accessible').select2({

        });
    });
  </script>
  
  <script type="text/javascript">
    $(document).ready(function() {
    var table = $('#tabela-relatorios').DataTable( {
        lengthChange: false,
        buttons: [ 'copy', 'pdf', 'print', 'colvis' ]
    } );
 
    table.buttons().container()
        .appendTo( '#tabela-relatorios_wrapper .col-sm-6:eq(0)' );
} );
  </script>

  <!-- teste andre -->
<script type="text/javascript">
  $(document).ready(function() {  
    $("#visitas_id").change(function(){
      $.get( "/portaria/entradas/getveiculos/" + $(this).find("option:selected").attr('value') , function( dataJSON ) {
        var sel = $("#veiculos_id");
        sel.empty();
        var data = JSON.parse(dataJSON);
        console.log(data);
        for (var i=0; i<data.length; i++) {
          sel.append('<option value="' + data[i].id + '">' + data[i].modelo + " - " + data[i].placa + '</option>');
    }
      });
      });
    });
</script>

  <!-- teste andre -->


<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>