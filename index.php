
<?php
  session_start();

  //Validamos si la sesión está activa
  if (!empty($_SESSION['activo'])) {
    header("Location:panel.php");
  }
  //Incluir la conexión
  include_once("conexion_sqlserver.php");

  if (isset($_POST["ingresar"])) {
    
    $email = $_POST["email"];
    $pass = md5($_POST["password"]);

    if (!empty($email) && $email != "" && !empty($pass) && $pass != "") {
      $query = "SELECT id, email, nombre, telefono, password, es_admin FROM usuario WHERE email=:email AND password=:password";

      $stmt = $conn->prepare($query);
      $stmt->bindParam(":email", $email, PDO::PARAM_STR);
      $stmt->bindParam(":password", $pass, PDO::PARAM_STR);


      $resultado = $stmt->execute();
      $registro = $stmt->fetch(PDO::FETCH_ASSOC);

      if (!$registro) {
        $error = "Error, acceso inválido";
      }else{
        //Aquí creamos sesiones
        $_SESSION['activo'] = true;
        $_SESSION['idUsuario'] = $registro['id'];
        $_SESSION['nombre'] = $registro['nombre'];
        $_SESSION['email'] = $registro['email'];
        $_SESSION['esAdmin'] = $registro['es_admin'];

        //Después de crear las sesiones, redirigimos al panel.php
        header("Location:panel.php");
      }      
    }else{
      $error = "Error, algunos campos están vacíos";
    }
  }

?>

<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
		<!-- Tell the browser to be responsive to screen width -->
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
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
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Librerias DIF -->
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

  
    <link rel="stylesheet" type="text/css" href="css/app.css"> <!-- RUTA DE ESTILOS LOGIN -->
    <link rel="stylesheet" type="text/css" href="css/styleheader.css"> <!-- RUTA DE ESTILOS LOGIN -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"> <!-- ICONOS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"> <!-- ICONO OJO PASSWORD -->

		
    <title>SEDE DIF</title>
   <!-- header inner -->
   
   <header>
    <h1>Sistema de Expediente Digital de Empleados <img src="images/logo.png" alt="Logo DIF" style="width: 250px; height: 75px;float: right;"/></h1>
  </header>

  </head>
  <body class="hold-transition login-page">

  <div class="row">
    <div class="col-sm-12">
            <?php if(isset($error)) : ?>
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong><?php echo $error; ?></strong> 
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
          <?php endif; ?>      
    </div>
</div>

<div class="container-fluid">
    <div class="row no-gutter">
        <!-- The image half -->
        <div class="col-md-6 d-none d-md-flex bg-image"></div>


        <!-- The content half -->
        <div class="col-md-6 bg-light">
            <div class="login d-flex align-items-center py-5">

                <!-- Demo content-->
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 col-xl-7 mx-auto">
                          <div class="text-center mb-4">
                            <a href="#!">
                            <img src="./images/iconoDIF.ico" alt="LOGO_  DIF" width="57" height="57">
                            </a>
                          </div>
                            <h3 class="display-4">SEDE</h3>
                            <p class="text-muted mb-4">INICIO DE SESION EN EL SISTEMA DIGITAL DE EMPLEADOS</p>
                            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                                <div class="form-group mb-3">
                                <input type="email" class="form-control" name="email" placeholder="Ingresa el email">
                                </div>
                                <div class="form-group mb-3">
                                <input type="password" class="form-control" name="password" placeholder="Ingresa el password">
                                </div>
                                 <!-- /.col -->
                                <div class="col-sm-12">
                                  <button type="submit" name="ingresar" class="btn btn-primary d-block w-100" style="background-color: #BC955B; border-color: #BC955B;"><i class="fas fa-user"></i> Ingresar</button>
                            
                                </div>
                            </form>
                        </div>
                    </div>
                </div><!-- End -->

            </div>
        </div><!-- End -->

    </div>
</div>

<footer>
     <p> **En cumplimiento del principio de calidad de los datos personales, expresado en los lineamientos de la
      Institución, el usuario se <br>compromete a facilitar datos verdaderos, exactos, completos y actualizados, de
      forma que respondan con veracidad a la situación de este.</p>
   
   </footer>

<!-- REQUIRED SCRIPTS -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- date-range-picker -->
<script src="plugins/daterangepicker/daterangepicker.js"></script>

<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

</body>
</html>