<?php include "includes/header.php" ?>

<?php

// Cuando se realice alguna acción sobre "guardar_dep" va a enviar 
  if(isset($_POST["guardar_dependienteformulario"])){

    //Obtener valores del formulario
    $nombre = $_POST["nombreformulario"];
    $apellido_paterno = $_POST["apellido_paternoformulario"];
    $apellido_materno = $_POST["apellido_maternoformulario"];
    $parentezco = $_POST["parentezcoformulario"];
    $telefono = $_POST["telefonoformulario"];
    


    // Condicional para validar si está vacío
    if (empty($nombre) || empty($apellido_paterno) || empty($apellido_materno) || empty($parentezco) || empty($telefono)) {
      $error = "Error, algunos campos obligatorios están vacíos";      
    }else{
      //Si entra por aqui es porque se puede ingresar el nuevo registro
      // En la variable query se almacena la consulta de insersion
      $query = "INSERT INTO dependientes (nombre, apellido_paterno, apellido_materno, parentezco, telefono, usuario_id) 
      VALUES(:nombre, :apellido_paterno, :apellido_materno, :parentezco, :telefono, :usuario_id)";

    //   preparar y ejecutar la consulta
      $stmt = $conn->prepare($query); 

      // Unifica los parametros y unifica la consulta
    //La variable :nombre de sql va a vincular los valores que tenga la viariable $nombre de php
      $stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
      $stmt->bindParam(":apellido_paterno", $apellido_paterno, PDO::PARAM_STR);
      $stmt->bindParam(":apellido_materno", $apellido_materno, PDO::PARAM_STR);
      $stmt->bindParam(":parentezco", $parentezco, PDO::PARAM_STR);
      $stmt->bindParam(":telefono", $telefono, PDO::PARAM_STR);
      $stmt->bindParam(":usuario_id", $idUsuario, PDO::PARAM_INT);

      //cuando se cumplan todos los campos ejecuta la consulta y duvuelve un resultado y esa resultado se almacena en la variable resultado
      $resultado = $stmt->execute();

      // Si se cumple la condicion entonces arroja el msj
      //Si se hace la insersion entonces arroja el registro exitoso
      if ($resultado) {
        $mensaje = "Dependiente registrado correctamente";

        //si no es exitoso envia el mensaje de error
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
                    <h3 class="card-title">Agregar dependiente economico</h3>
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
                        <input type="text" name="nombreformulario" class="form-control">
                      </div>

                      <div class="mb-3">
                        <label for="descripcion" class="form-label">Apellido paterno</label>
                        <input class="form-control" name="apellido_paternoformulario" rows="3"></input>
                      </div>  
                      <div class="mb-3">
                        <label for="descripcion" class="form-label">Apellido materno</label>
                        <input class="form-control" name="apellido_maternoformulario" rows="3"></input>
                      </div>
                      <div class="mb-3">
                        <label for="titulo" class="form-label">Parentesco</label>
                        <input type="text" name="parentezcoformulario" class="form-control">
                      </div>   
                      <div class="mb-3">
                        <label for="titulo" class="form-label">Teléfono</label>
                        <input type="text" name="telefonoformulario" class="form-control">
                      </div>    

                            <button type="submit" name="guardar_dependienteformulario" class="btn btn-primary"><i class="fas fa-cog"></i> Guardar dependiente</button>  

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
