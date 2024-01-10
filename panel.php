<?php include "includes/header.php" ?>

<?php  

 $query = "SELECT * FROM datosG WHERE usuario_id='$idUsuario'";
 
 $stmt = $conn->query($query);
 
  $registros = $stmt->fetchAll(PDO::FETCH_OBJ);

  foreach($registros as $fila) : 
  endforeach;

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
    <div class="col-md-3">
                    <a href="datos_generales.php" type="button" class="btn btn-primary btn-xl pull-right w-100">
                      <i class="fa fa-plus"></i> Ingresa tus datos
                    </a>
                 </div>
  </div>
</div>
<!-- /.card-header -->
<div class="card-body">
  <div class="row">
    <div class="col-12">
      <form role="form" method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">

        <div class="picture-container">
          <div class="picture">
            <img src="assets/img/default-avatar.png" class="picture-src" id="wizardPicturePreview" title=""/>
              <input type="file" id="wizard-picture">
          </div>
            <h6>Choose Picture</h6>
          </div>

        <div class="mb-3">
          <label for="nombres" class="form-label">Nombres:</label>
          <input type="text" name="nombres" class="form-control" value="<?php if (empty($fila)) {
          echo "";} else{ echo $fila->Nombres;} ?>" /disabled>
        </div>

        <div class="mb-3">
          <label for="titulo" class="form-label">Apellido Paterno:</label>
          <input type="text" name="apellidoP" class="form-control"value="<?php if (empty($fila)) {
          echo "";} else{ echo $fila->Apellido_P;} ?>" /disabled>
        </div>

        <div class="mb-3">
          <label for="titulo" class="form-label">Apellido Materno:</label>
          <input type="text" name="apellidoM" class="form-control"value="<?php if (empty($fila)) {
          echo "";} else{ echo $fila->Apellido_M;} ?>" /disabled>
        </div>

        <div class="mb-3">
          <label for="titulo" class="form-label">Numero de Expediente:</label>
          <input type="text" name="numExp" class="form-control"value="<?php if (empty($fila)) {
          echo "";} else{ echo $fila->NumeroExpediente;} ?>" /disabled>
        </div>

        <div class="mb-3">
          <label for="titulo" class="form-label">Puesto:</label>
          <input type="text" name="puesto" class="form-control"value="<?php if (empty($fila)) {
          echo "";} else{ echo $fila->Puesto;} ?>" /disabled>
        </div>

        <div class="mb-3">
          <label for="titulo" class="form-label">Tipo de Contrato:</label>
          <input type="text" name="tipoC" class="form-control" value="<?php if (empty($fila)) {
          echo "";} else{ echo $fila->TipoContrato;} ?>" /disabled>
        </div>

        <div class="mb-3">
          <label for="titulo" class="form-label">Fecha de Nacimiento:</label>
          <input type="text" name="tipoC" class="form-control" value="<?php if (empty($fila)) {
          echo "";} else{ echo $fila->FechaNacimiento;} ?>" /disabled>
        </div>
        
        <div class="mb-3">
          <label for="titulo" class="form-label">Nacionalidad:</label>
          <input type="text" name="tipoC" class="form-control" value="<?php if (empty($fila)) {
          echo "";} else{ echo $fila->Nacionalidad;} ?>" /disabled>
        </div>

        <div class="mb-3">
          <label for="titulo" class="form-label">Sexo:</label>
          <input type="text" name="tipoC" class="form-control" value="<?php if (empty($fila)) {
          echo "";} else{ echo $fila->Sexo;} ?>" /disabled>
        </div>

          <div class="mb-3">
            <label for="titulo" class="form-label">CURP:</label>
            <input type="text" name="curp" class="form-control" value="<?php if (empty($fila)) {
          echo "";} else{ echo $fila->CURP;} ?>" /disabled>
          </div>

          <div class="mb-3">
            <label for="titulo" class="form-label">NSS:</label>
            <input type="text" name="nss" class="form-control" value="<?php if (empty($fila)) {
          echo "";} else{ echo $fila->NSS;} ?>" /disabled>
          </div>

          <div class="mb-3">
            <label for="titulo" class="form-label">RFC:</label>
            <input type="text" name="rfc" class="form-control" value="<?php if (empty($fila)) {
          echo "";} else{ echo $fila->RFC;} ?>" /disabled>
          </div>

          <div class="mb-3">
            <label for="titulo" class="form-label">Homoclave RFC:</label>
            <input type="text" name="H_rfc" class="form-control" value="<?php if (empty($fila)) {
          echo "";} else{ echo $fila->HomoclaveRFCF;} ?>" /disabled>
          </div>

          <div class="mb-3">
            <label for="titulo" class="form-label">Telefono celular*:</label>
            <input type="text" name="tel" class="form-control" value="<?php if (empty($fila)) {
          echo "";} else{ echo $fila->Telefono;} ?>" /disabled>
          </div>

          <div class="mb-3">
            <label for="titulo" class="form-label">Correo institucional*:</label>
            <input type="text" name="correo" class="form-control" value="<?php if (empty($fila)) {
          echo "";} else{ echo $fila->Correo_Inst;} ?>" /disabled>
          </div>


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