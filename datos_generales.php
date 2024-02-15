<?php include "includes/header.php" ?>

<?php

if (isset($_POST["registrarDatos"])) {

  //Obtener valores
  $nombre = $_POST["nombreF"];
  $apellido_p = $_POST["apellido_pF"];
  $apellido_m = $_POST["apellido_mF"];
  $num_exp = $_POST["num_expF"];
  $puesto = $_POST["puestoF"];
  $fecha_nacimiento = $_POST["fecha_nacimientoF"];
  $sexo = $_POST["sexoF"];
  $tipo_contrato = $_POST["tipo_contratoF"];
  $nacionalidad = $_POST["nacionalidadF"];
  $curp = $_POST["curpF"];
  $nss = $_POST["nssF"];
  $rfc = $_POST["rfcF"];
  $homoclave = $_POST["homoclaveF"];
  $telefono = $_POST["telefonoF"];
  $correo_inst = $_POST["correo_instF"];
  $cedula_prof = $_POST["cedula_profF"];
  $cartilla_militar = $_POST["cartilla_militarF"];
  $pasaporte = $_POST["pasaporteF"];
  $licencia_manejo = $_POST["licencia_manejoF"];
  $estado_civil = $_POST["estado_civilF"];
  $tel_casa = $_POST["tel_casaF"];
  $correo_per = $_POST["correo_perF"];

  //Validar si está vacío
  if (empty($nombre)) {
    $error = "Error, algunos campos obligatorios están vacíos";
  } else {
    $query = "INSERT INTO datosG (nombre, apellido_p, apellido_m, num_exp, puesto, fecha_nacimiento, sexo, tipo_contrato, nacionalidad, 
      curp, nss, rfc, homoclave, telefono, correo_inst, cedula_profesional, cartilla_militar, pasaporte, licencia_manejo, estado_civil, 
      tel_casa, correo_per, usuario_id)
      VALUES (:nombre, :apellido_p, :apellido_m, :num_exp, :puesto, :fecha_nacimiento, :sexo, :tipo_contrato, :nacionalidad, :curp, :nss, :rfc, 
      :homoclave, :telefono, :correo_inst, :cedula_profesional, :cartilla_militar, :pasaporte, :licencia_manejo, :estado_civil, :tel_casa, 
      :correo_per, :usuario_id);";


    //$fechaActual = date('Y-m-d');

    $stmt = $conn->prepare($query);

    $stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
    $stmt->bindParam(":apellido_p", $apellido_p, PDO::PARAM_STR);
    $stmt->bindParam(":apellido_m", $apellido_m, PDO::PARAM_STR);
    $stmt->bindParam(":num_exp", $num_exp, PDO::PARAM_STR);
    $stmt->bindParam(":puesto", $puesto, PDO::PARAM_STR);
    $stmt->bindParam(":fecha_nacimiento", $fecha_nacimiento, PDO::PARAM_STR);
    $stmt->bindParam(":sexo", $sexo, PDO::PARAM_STR);
    $stmt->bindParam(":tipo_contrato", $tipo_contrato, PDO::PARAM_STR);
    $stmt->bindParam(":nacionalidad", $nacionalidad, PDO::PARAM_STR);
    $stmt->bindParam(":curp", $curp, PDO::PARAM_STR);
    $stmt->bindParam(":nss", $nss, PDO::PARAM_STR);
    $stmt->bindParam(":rfc", $rfc, PDO::PARAM_STR);
    $stmt->bindParam(":homoclave", $homoclave, PDO::PARAM_STR);
    $stmt->bindParam(":telefono", $telefono, PDO::PARAM_STR);
    $stmt->bindParam(":correo_inst", $correo_inst, PDO::PARAM_STR);
    $stmt->bindParam(":cedula_profesional", $cedula_prof, PDO::PARAM_STR);
    $stmt->bindParam(":cartilla_militar", $cartilla_militar, PDO::PARAM_STR);
    $stmt->bindParam(":pasaporte", $pasaporte, PDO::PARAM_STR);
    $stmt->bindParam(":licencia_manejo", $licencia_manejo, PDO::PARAM_STR);
    $stmt->bindParam(":estado_civil", $estado_civil, PDO::PARAM_STR);
    $stmt->bindParam(":tel_casa", $tel_casa, PDO::PARAM_STR);
    $stmt->bindParam(":correo_per", $correo_per, PDO::PARAM_STR);
    $stmt->bindParam(":usuario_id", $idUsuario, PDO::PARAM_INT);

    $resultado = $stmt->execute();

    if ($resultado) {
      $mensaje = "Registro de nota creado correctamente";
    } else {
      $error = "Error, no se pudo crear la nota";
    }
  }
}

?>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="../../plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../../plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="../../plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="../../plugins/bs-stepper/css/bs-stepper.min.css">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="../../plugins/dropzone/min/dropzone.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>


<div class="row">
  <div class="col-sm-12">
    <?php if (isset($mensaje)) : ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>
          <?php echo $mensaje; ?>
        </strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php endif; ?>
  </div>
</div>

<div class="row">
  <div class="col-sm-12">
    <?php if (isset($error)) : ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>
          <?php echo $error; ?>
        </strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php endif; ?>
  </div>
</div>



<div class="card-header">
  <div class="row">
    <div class="col-md-9">
      <h3 class="card-title">Datos Generales</h3>
    </div>
  </div>
</div>
<!-- /.card-header -->
<div class="card-body">
  <div class="row">
    <div class="col-12">
      <form role="form" method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">

        <div class="mb-3">
          <label for="titulo" class="form-label">Nombre:</label>
          <input type="text" name="nombreF" class="form-control">
        </div>

        <div class="mb-3">
          <label for="titulo" class="form-label">Apellido Paterno:</label>
          <input type="text" name="apellido_pF" class="form-control">
        </div>

        <div class="mb-3">
          <label for="titulo" class="form-label">Apellido Materno:</label>
          <input type="text" name="apellido_mF" class="form-control">
        </div>

        <div class="mb-3">
          <label for="titulo" class="form-label">Número de Expediente:</label>
          <input type="number" name="num_expF" class="form-control">
        </div>

        <div class="mb-3">
          <label for="titulo" class="form-label">Puesto:</label>
          <input type="text" name="puestoF" class="form-control">
        </div>

        <div class="mb-3">
          <label>Fecha de Nacimiento:</label>
          <div class="input-group date" id="reservationdate" data-target-input="nearest">
            <input type="text" name="fecha_nacimientoF" class="form-control datetimepicker-input" />
            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
            </div>
          </div>
        </div>

        <div class="mb-3">
          <label>Sexo:</label>
          <select name="sexoF" class="custom-select form-control-border" id="exampleSelectBorder">
            <option value="Femenino">Femenino</option>
            <option value="Masculino">Masculino</option>
            <option value="No especificar">No especificar</option>
          </select>
        </div>

        <div class="mb-3">
          <label>Tipo de contrato:</label>
          <select name="tipo_contratoF" class="custom-select form-control-border" id="exampleSelectBorder">
            <option value="Honorarios">Honorarios</option>
            <option value="Confianza">Confianza</option>
            <option value="Funcionario público">Funcionario público</option>
            <option value="Otra...">Otra...</option>
          </select>
        </div>

        <div class="mb-3">
          <label>Nacionalidad:</label>
          <select name="nacionalidadF" class="custom-select form-control-border" id="exampleSelectBorder">
            <option value="Mexicana">Mexicana</option>
            <option value="Extranjera">Extranjera</option>
            <option value="Otra...">Otra...</option>
          </select>
        </div>

        <div class="mb-3">
          <label for="titulo" class="form-label">CURP:</label>
          <input type="text" name="curpF" class="form-control">
        </div>

        <div class="mb-3">
          <label for="titulo" class="form-label">Número de Seguridad Social:</label>
          <input type="number" name="nssF" class="form-control">
        </div>

        <div class="mb-3">
          <label for="titulo" class="form-label">RFC:</label>
          <input type="text" name="rfcF" class="form-control">
        </div>

        <div class="mb-3">
          <label for="titulo" class="form-label">Homoclave RFC:</label>
          <input type="text" name="homoclaveF" class="form-control">
        </div>

        <div class="mb-3">
          <label for="titulo" class="form-label">Teléfono celular:</label>
          <input type="number" name="telefonoF" class="form-control">
        </div>

        <div class="mb-3">
          <label for="titulo" class="form-label">Correo institucional:</label>
          <input type="text" name="correo_instF" class="form-control">
        </div>

        <div class="mb-3">
          <label for="titulo" class="form-label">Cédula profesional:</label>
          <input type="text" name="cedula_profF" class="form-control">
        </div>

        <div class="mb-3">
          <label for="titulo" class="form-label">Cartilla militar:</label>
          <input type="text" name="cartilla_militarF" class="form-control">
        </div>

        <div class="mb-3">
          <label for="titulo" class="form-label">Pasaporte:</label>
          <input type="text" name="pasaporteF" class="form-control">
        </div>

        <div class="mb-3">
          <label for="titulo" class="form-label">Licencia de manejo:</label>
          <input type="text" name="licencia_manejoF" class="form-control">
        </div>

        <div class="mb-3">
          <label>Estado civil:</label>
          <select name="estado_civilF" class="custom-select form-control-border" id="exampleSelectBorder">
            <option value="Soltero">Soltero</option>
            <option value="Casado">Casado</option>
            <option value="Union libre">Unión libre</option>
            <option value="Concubinato">Concubinato</option>
            <option value="Divorciado">Divorciado</option>
            <option value="Viudo">Viudo</option>
            <option value="otro">otro</option>
          </select>
        </div>

        <div class="mb-3">
          <label for="titulo" class="form-label">Teléfono de casa:</label>
          <input type="number" name="tel_casaF" class="form-control">
        </div>

        <div class="mb-3">
          <label for="titulo" class="form-label">Correo personal:</label>
          <input type="text" name="correo_perF" class="form-control">
        </div>

        <button type="submit" name="registrarDatos" class="btn btn-primary"><i class="fas fa-cog"></i> Guardar Registro</button>



    </div>
    </form>
  </div>
</div>
</div>
<!-- /.card-body -->
<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="../../plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="../../plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="../../plugins/moment/moment.min.js"></script>
<script src="../../plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="../../plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="../../plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="../../plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->
<script src="../../plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="../../plugins/dropzone/min/dropzone.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function() {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
          theme: 'bootstrap4'
        })

        //Date picker
        $('#reservationdate').datetimepicker({
          format: 'L'
        });
</script>
<?php include "includes/footer.php" ?>