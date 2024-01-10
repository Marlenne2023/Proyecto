<?php include "includes/header.php" ?>

<?php

  if(isset($_POST["registrarDatos"])){

    //Obtener valores
    $nombres = $_POST["nombres"];
    $apellidoP = $_POST["apellidoP"];
    $apellidoM = $_POST["apellidoM"];
    $numExp = $_POST["numExp"];
    $puesto = $_POST["puesto"];
    $tipoC = $_POST["tipoC"];
    $fechNac = $_POST["fechNac"];
    $nacionalidad = $_POST["nacionalidad"];
    $sexo = $_POST["sexo"];
    $curp = $_POST["curp"];
    $nss= $_POST["nss"];
    $rfc = $_POST["rfc"];
    $H_rfc = $_POST["H_rfc"];
    $tel = $_POST["tel"];
    $correo = $_POST["correo"];

    //Validar si está vacío
    if (empty($nombres)) {
      $error = "Error, algunos campos obligatorios están vacíos";      
    }else{
      //Si entra por aqui es porque se puede ingresar el nuevo registro
     // $query = "INSERT INTO notas(titulo, descripcion, fecha, usuario_id)VALUES(:titulo, :descripcion, :fecha, :usuario_id)";
      $query = "INSERT INTO datosG (Nombres, Apellido_P, Apellido_M, NumeroExpediente, Puesto, TipoContrato ,FechaNacimiento, Nacionalidad, Sexo, CURP, NSS ,
      RFC,HomoclaveRFCF,Telefono,Correo_Inst,usuario_id ) vALUES
      (:nombres,:apellidoP, :apellidoM, :numExp, :puesto, :tipoC, :fechNac,:nacionalidad, :sexo,:curp,:nss,:rfc,:H_rfc,
      :tel,:correo, :usuario_id);";


      //$fechaActual = date('Y-m-d');

      $stmt = $conn->prepare($query);

      $stmt->bindParam(":nombres", $nombres, PDO::PARAM_STR);
      $stmt->bindParam(":apellidoP", $apellidoP, PDO::PARAM_STR);
      $stmt->bindParam(":apellidoM", $apellidoM, PDO::PARAM_STR);
      $stmt->bindParam(":numExp", $numExp, PDO::PARAM_INT);
      $stmt->bindParam(":puesto", $puesto, PDO::PARAM_INT);
      $stmt->bindParam(":tipoC", $tipoC, PDO::PARAM_INT);
      $stmt->bindParam(":fechNac", $fechNac, PDO::PARAM_INT);
      $stmt->bindParam(":nacionalidad", $nacionalidad, PDO::PARAM_INT);
      $stmt->bindParam(":sexo", $sexo, PDO::PARAM_INT);
      $stmt->bindParam(":curp", $curp, PDO::PARAM_INT);
      $stmt->bindParam(":nss", $nss, PDO::PARAM_INT);
      $stmt->bindParam(":rfc", $rfc, PDO::PARAM_INT);
      $stmt->bindParam(":H_rfc", $H_rfc, PDO::PARAM_INT);
      $stmt->bindParam(":tel", $tel, PDO::PARAM_INT);
      $stmt->bindParam(":correo", $correo, PDO::PARAM_INT);
      $stmt->bindParam(":usuario_id", $idUsuario, PDO::PARAM_INT);

      $resultado = $stmt->execute();

      if ($resultado) {
        $mensaje = "Registro de nota creado correctamente";
      }else{
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
    <?php if (isset($mensaje)): ?>
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
    <?php if (isset($error)): ?>
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
          <label for="titulo" class="form-label">Nombres:</label>
          <input type="text" name="nombres" class="form-control">
        </div>

        <div class="mb-3">
          <label for="titulo" class="form-label">Apellido Paterno:</label>
          <input type="text" name="apellidoP" class="form-control">
        </div>

        <div class="mb-3">
          <label for="titulo" class="form-label">Apellido Materno:</label>
          <input type="text" name="apellidoM" class="form-control">
        </div>

        <div class="mb-3">
          <label for="titulo" class="form-label">Numero de Expediente:</label>
          <input type="text" name="numExp" class="form-control">
        </div>

        <div class="mb-3">
          <label for="titulo" class="form-label">Puesto:</label>
          <input type="text" name="puesto" class="form-control">
        </div>

        <div class="mb-3">
          <label for="titulo" class="form-label">Tipo de Contrato:</label>
          <input type="text" name="tipoC" class="form-control">
        </div>

        <div class="mb-3">
          <label>Fecha de Nacimiento:</label>
            <div class="input-group date" id="reservationdate" data-target-input="nearest">
              <input type="text" name="fechNac" class="form-control datetimepicker-input"/>
                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                  </div>
                </div>
        </div>
        
          <div class="mb-3">
           <label>Nacionalidad:</label>
              <select name="nacionalidad" class="custom-select form-control-border" id="exampleSelectBorder">
                <option value="Mexicana">Mexicana</option>
                <option value="Estadounidense">Estadounidense</option>
                <option value="Otra...">Otra...</option>
              </select>
          </div>

          <div class="mb-3">
           <label>Sexo:</label>
              <select name="sexo" class="custom-select form-control-border" id="exampleSelectBorder">
                <option value="Femenino">Femenino</option>
                <option value="Masculino">Masculino</option>
                <option value="No especificar">No especificar</option>
              </select>
          </div>

          <div class="mb-3">
            <label for="titulo" class="form-label">CURP:</label>
            <input type="text" name="curp" class="form-control">
          </div>

          <div class="mb-3">
            <label for="titulo" class="form-label">NSS:</label>
            <input type="text" name="nss" class="form-control">
          </div>

          <div class="mb-3">
            <label for="titulo" class="form-label">RFC:</label>
            <input type="text" name="rfc" class="form-control">
          </div>

          <div class="mb-3">
            <label for="titulo" class="form-label">Homoclave RFC:</label>
            <input type="text" name="H_rfc" class="form-control">
          </div>

          <div class="mb-3">
            <label for="titulo" class="form-label">Telefono celular*:</label>
            <input type="text" name="tel" class="form-control">
          </div>

          <div class="mb-3">
            <label for="titulo" class="form-label">Correo institucional*:</label>
            <input type="text" name="correo" class="form-control">
          </div>


          <button type="submit" name="registrarDatos" class="btn btn-primary"><i class="fas fa-cog"></i> Guardar
            Registro</button>

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
  $(function () {
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