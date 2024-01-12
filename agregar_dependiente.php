<?php include "includes/header.php" ?>

<?php

// Cuando el boton este presionado
  if(isset($_POST["guardar_dependiente"])){

    //Obtener valores
    $nombre = $_POST["nombre"];
    $apellido_paterno = $_POST["apellido_paterno"];
    $apellido_materno = $_POST["apellido_materno"];
    $parentezco = $_POST["parentezco"];
    $telefono = $_POST["telefono"];
    


    // Condicional para validar si está vacío
    if (empty($nombre) || empty($apellido_paterno) || empty($apellido_materno) || empty($parentezco) || empty($telefono)) {
      $error = "Error, algunos campos obligatorios están vacíos";      
    }else{
      //Si entra por aqui es porque se puede ingresar el nuevo registro
      $query = "INSERT INTO dependientes (nombre, apellido_paterno, apellido_materno, parentezco, telefono, usuario_id) 
      VALUES(:nombre, :apellido_paterno, :apellido_materno, :parentezco, :telefono, :usuario_id)";

    //   preparar y ejecutar la consulta
      $stmt = $conn->prepare($query); 

      $stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
      $stmt->bindParam(":apellido_paterno", $apellido_paterno, PDO::PARAM_STR);
      $stmt->bindParam(":apellido_materno", $apellido_materno, PDO::PARAM_STR);
      $stmt->bindParam(":parentezco", $parentezco, PDO::PARAM_STR);
      $stmt->bindParam(":telefono", $telefono, PDO::PARAM_STR);
      $stmt->bindParam(":usuario_id", $idUsuario, PDO::PARAM_INT);

      $resultado = $stmt->execute();

      if ($resultado) {
        $mensaje = "Dependiente registrado correctamente";
      }else{
        $error = "Error, no se pudo registrar al dependiente";  
      }
    }
  }

?>

<!-- Mensaje de registro -->
<div class="row">
    <div class="col-sm-12">
            <?php if(isset($mensaje)) : ?>
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



              <div class="card-header">               
                <div class="row">
                  <div class="col-md-9">
                    <h3 class="card-title">Agregar nuevo dependiente economico</h3>
                  </div>                 
              </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-12">
                  <form role="form" method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">            

                      <div class="mb-3">
                        <label for="titulo" class="form-label">Nombre</label>
                        <input type="text" name="nombre" class="form-control">
                      </div>

                      <div class="mb-3">
                        <label for="descripcion" class="form-label">Apellido paterno</label>
                        <input class="form-control" name="apellido_paterno" rows="3"></input>
                      </div>  
                      <div class="mb-3">
                        <label for="descripcion" class="form-label">Apellido materno</label>
                        <input class="form-control" name="apellido_materno" rows="3"></input>
                      </div>
                      <div class="mb-3">
                        <label for="titulo" class="form-label">Parentesco</label>
                        <input type="text" name="parentezco" class="form-control">
                      </div>   
                      <div class="mb-3">
                        <label for="titulo" class="form-label">Teléfono</label>
                        <input type="text" name="telefono" class="form-control">
                      </div>    

                            <button type="submit" name="guardar_dependiente" class="btn btn-primary"><i class="fas fa-cog"></i> Guardar dependiente</button>  

                        </div>
                      </form>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->


<?php include "includes/footer.php" ?>

<!-- page script -->
<script>
  $(function () {   
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
