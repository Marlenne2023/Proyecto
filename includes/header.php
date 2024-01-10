<?php
  session_start();

  //Validamos si la sesión está activa
  if (!$_SESSION['activo']) {
    header("Location:panel.php");
  }

  //Configurar zona horaria
  date_default_timezone_set('America/Bogota');

  //Obtener demás variables de sesión
  $idUsuario = $_SESSION['idUsuario'];
  $nombre = $_SESSION['nombre'];
  $email = $_SESSION['email'];

  //Incluir la conexión y queda de manera global para todos los archivos
  include_once("conexion_sqlserver.php");

?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>SEDE</title>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" type="text/css" href="css/styleheader.css"> <!-- RUTA DE ESTILOS LOGIN -->
 
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<scrip class="hold-transition sidebar-mini">
<div class="wrapper">


<header>
    <h1><a data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars" style="color: #fff; height: 40px; width: 40px;"></i></a>Sistema de Expediente Digital de Empleados <img src="images/logo.png" alt="Logo DIF" style="width: 400px; height: 75px;float: right;"/></h1>
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>    
</ul>
</header>  

    
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar elevation-4" style= "background-color: #BC955B;">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="images/iconoDIF.ico" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text" style="color: #fff;">SEDE</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/images.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">         
          <p class="text-white"><?php echo $nombre; ?></p>
          <p class="text-white"><?php echo $email; ?></p>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         
          <li class="nav-item">
            <a href="panel.php" class="nav-link" style="color: #fff">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Nombre del Servidor        
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="lista_notas.php" class="nav-link">
              <i class="nav-icon fas fa-user-cog"></i>
              <p>
                Lista de Notas     
              </p>
            </a>
          </li>
          <?php if(isset($_SESSION['activo']) && $_SESSION['esAdmin'] == 1) : ?>
            <li class="nav-item">
              <a href="lista_usuarios.php" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Lista de Usuarios      
                </p>
              </a>
            </li>
            <?php endif; ?>
            
          <li class="nav-item">
            <a href="salir.php" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Salir      
              </p>
            </a>
          </li>        
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  
  <div class="content-wrapper"style="padding-top: 75px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">          
            <div class="card">