<!DOCTYPE html>
<html>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $title ?></title>
  
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
 
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">  
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/jQueryUI/jquery-ui.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">  
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/alertify/alertify.core.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/alertify/alertify.default.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/file/fileinput.css"/>

  <!-- PyEndes icons -->
  <link rel="icon" href="<?php echo base_url(); ?>assets/dist/img/endes_logo.png" type="image/png">  
  <!-- PyEndes css -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/content/css/loading.css">

<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <input type="hidden" id="clave" name="clave" value="<?php  if(isset($_SESSION['session_user'])) { echo ($this->session->userdata['session_user']['usuario']); }  ?>">
  <header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>INEI</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>INEI</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url(); ?>assets/dist/img/endes_logo.jpg" class="user-image" alt="User Image">
            <span class="hidden-xs"><?php if(isset($_SESSION['session_user'])) { echo utf8_encode($this->session->userdata['session_user']['area']); } ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url(); ?>assets/dist/img/endes_logo.jpg" class="img-circle" alt="User Image">
                <p>
                 <?php if(isset($_SESSION['session_user'])) { echo ($this->session->userdata['session_user']['nombre'].' '.$this->session->userdata['session_user']['apellidos']); } ?>  
                 <small>Fecha de Acceso: <?= date("d-m-Y") ?></small>
                </p>
              </li>

              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="<?php echo base_url(); ?>Usuario/signout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>

        </ul>
      </div>
    </nav>
  </header>