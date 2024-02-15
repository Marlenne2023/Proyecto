<?php
session_start();

//Validamos si la sesión está activa
//si la sesion esta activa y el header haya pasado por el panel.php realiza el resto del proceso
if (!$_SESSION['activo']) {
  header("Location:panel.php");
}


//enla variable $idUsuario se "mantiene" ($_SESSION) el idUsuario
$idUsuario = $_SESSION['idUsuario'];
$nombre = $_SESSION['nombre'];
$email = $_SESSION['email'];

//Incluir la conexión y queda de manera global para todos los archivos
include_once("conexion_sqlserver.php");

?>
<!DOCTYPE html>


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
      <h1><a data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars" style="color: #fff; height: 40px; width: 40px;"></i></a>Sistema de Expediente Digital de Empleados <img src="images/logo.png" alt="Logo DIF" style="width: 400px; height: 75px;float: right;" /></h1>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>
    </header>


    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar elevation-4" style="background-color: #BC955B;">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        
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
          </div>
          <br>
          <div class="info">
            <p class="text-white"><?php echo $idUsuario; ?></p>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-item">
              <a href="panel.php" class="nav-link" style="color: #fff">
              <i class='far fa-address-card' style='font-size:24px'></i>
                <p>
                  Datos generales
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="datos_adicionales.php" class="nav-link" style="color: #fff">
              <i class='fas fa-user-plus' style='font-size:24px'></i>
                <p>
                  Datos adicionales
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="dependientes.php" class="nav-link" style="color: #fff">
              <i class='fas fa-hand-holding-usd' style='font-size:24px'></i>
                <p>
                  Dependientes
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="panel.php" class="nav-link" style="color: #fff">
                <i class="fa fa-home" style="font-size:24px"></i>
                <p>
                  Domicilio
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="panel.php" class="nav-link" style="color: #fff">
              <i class='fas fa-user-tie' style='font-size:24px'></i>
                <p>
                  Perfil de puesto
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="panel.php" class="nav-link" style="color: #fff">
              <i class='fas fa-tools' style='font-size:24px'></i>
                <p>
                  Relaciones laborales
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="formacion_profesional.php" class="nav-link" style="color: #fff">
              <i class='fas fa-graduation-cap' style='font-size:24px'></i>
                <p>
                  Formación profesional
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="panel.php" class="nav-link" style="color: #fff">
              <i class='fas fa-book-medical' style='font-size:24px'></i>
                <p>
                   Aspectos clínicos
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="panel.php" class="nav-link" style="color: #fff">
              <i class='far fa-folder-open' style='font-size:24px'></i>
                <p>
                  Documentos
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="panel.php" class="nav-link" style="color: #fff">
              <i class='fas fa-file-invoice-dollar' style='font-size:24px'></i>
                <p>
                  Recibos de nómina
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="panel.php" class="nav-link" style="color: #fff">
              <i class='fas fa-key' style='font-size:24px'></i>
                <p>
                  Cambiar contraseña
                </p>
              </a>
            </li>

            <!-- //Si la sesion esta activa y en la base de datos en el campo esAdmin = 1 voy a mostrarle solamente al administrador
             en caso de ser diferente de 1 no lo muestra -->
            <?php if (isset($_SESSION['activo']) && $_SESSION['esAdmin'] == 1) : ?>
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


    <div class="content-wrapper" style="padding-top: 75px;">
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