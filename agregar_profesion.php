<?php include "includes/header.php" ?>

<?php

// Cuando el boton este presionado va a enviar los datos 
if (isset($_POST["guardar_profesionformulario"])) {

    //Obtener valores del formulario
    $nivel_escolar = $_POST["nivel_escolar_formulario"];
    $estatus = $_POST["estatus_formulario"];
    $titulo = $_POST["titulo_formulario"];
    $carrera = $_POST["carrera_formulario"];
    $documento_obtenido = $_POST["documento_obtenido_formulario"];



    // Condicional para validar si está vacío
    if (empty($nivel_escolar) || empty($estatus) || empty($titulo) || empty($carrera) || empty($documento_obtenido)) {
        $error = "Error, algunos campos obligatorios están vacíos";
    } else {
        //Si entra por aqui es porque se puede ingresar el nuevo registro
        $query = "INSERT INTO mv_formacion_profesional (nivel_escolar, estatus, titulo, carrera, documento_obtenido, usuario_id) 
      VALUES(:nivel_escolar, :estatus, :titulo, :carrera, :documento_obtenido, :usuario_id)";

        //   preparar y ejecutar la consulta
        $stmt = $conn->prepare($query);

        // Unifica los parametros y unifica la consulta
        $stmt->bindParam(":nivel_escolar", $nivel_escolar, PDO::PARAM_STR);
        $stmt->bindParam(":estatus", $estatus, PDO::PARAM_STR);
        $stmt->bindParam(":titulo", $titulo, PDO::PARAM_STR);
        $stmt->bindParam(":carrera", $carrera, PDO::PARAM_STR);
        $stmt->bindParam(":documento_obtenido", $documento_obtenido, PDO::PARAM_STR);
        $stmt->bindParam(":usuario_id", $idUsuario, PDO::PARAM_INT);

        $resultado = $stmt->execute();

        // Si se cumple la condicion entonces arroja el msj
        if ($resultado) {
            $mensaje = "Profesión registrada correctamente";
        } else {
            $error = "Error, no se pudo registrar la profesión";
        }
    }
}

?>

<!-- Mensaje de registro -->
<div class="row">
    <div class="col-sm-12">
        <?php if (isset($mensaje)) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong><?php echo $mensaje; ?></strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>
    </div>
</div>

<!-- Mensaje de error -->
<div class="row">
    <div class="col-sm-12">
        <?php if (isset($error)) : ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong><?php echo $error; ?></strong>
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
            <h3 class="card-title">Agregar profesión</h3>
        </div>
    </div>
</div>
<!-- /.card-header -->
<div class="card-body">
    <div class="row">
        <div class="col-12">
            <form role="form" method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">

                <div class="mb-3">
                    <label for="titulo" class="form-label">Nivel escolar</label>
                    <input type="text" name="nivel_escolar_formulario" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="descripcion" class="form-label">Estatus</label>
                    <input class="form-control" name="estatus_formulario" rows="3"></input>
                </div>
                <div class="mb-3">
                    <label for="descripcion" class="form-label">Título</label>
                    <input class="form-control" name="titulo_formulario" rows="3"></input>
                </div>
                <div class="mb-3">
                    <label for="titulo" class="form-label">Carrera</label>
                    <input type="text" name="carrera_formulario" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="titulo" class="form-label">Documento obtenido</label>
                    <input type="text" name="documento_obtenido_formulario" class="form-control">
                </div>

                <button type="submit" name="guardar_profesionformulario" class="btn btn-primary"><i class="fas fa-cog"></i> Guardar profesión</button>

        </div>
        </form>
    </div>
</div>
</div>
<!-- /.card-body -->


<?php include "includes/footer.php" ?>

<!-- page script -->
<script>
    $(function() {
        $('#tblRegistros').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>