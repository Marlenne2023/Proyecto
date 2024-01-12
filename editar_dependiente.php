<?php include "includes/header.php" ?>
<?php
  //Validar si recibimos el id, se envía por GET
  if (isset($_GET["id"])) {
    $id= $_GET['id'];
  }

  //Obtener los datos de la nota por su id
  $query = "SELECT * FROM dependientes WHERE id=:id";
  $stmt = $conn->prepare($query);

  //Debemos pasar a bindParam las variables, no podemos pasar el dato directamente
  // sino que hacemos llamado por referencia
  $stmt->bindParam(":id", $id, PDO::PARAM_INT);
  $stmt->execute();

  $registro = $stmt->fetch(PDO::FETCH_OBJ);

  //Actualización de la nota
  if(isset($_POST["editar_dependiente"])){

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
      //Cambiamos la consulta a una actualización
      $query = "UPDATE dependientes SET nombre=:nombre, apellido_paterno=:apellido_paterno, apellido_materno=:apellido_materno, parentezco=:parentezco, telefono=:telefono
      WHERE id=:id";

    //   preparar y ejecutar la consulta
      $stmt = $conn->prepare($query); 

      $stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
      $stmt->bindParam(":apellido_paterno", $apellido_paterno, PDO::PARAM_STR);
      $stmt->bindParam(":apellido_materno", $apellido_materno, PDO::PARAM_STR);
      $stmt->bindParam(":parentezco", $parentezco, PDO::PARAM_STR);
      $stmt->bindParam(":telefono", $telefono, PDO::PARAM_STR);
      $stmt->bindParam(":id", $id, PDO::PARAM_INT);

      $resultado = $stmt->execute();

      if ($resultado) {
        $mensaje = "Dependiente editado correctamente";
      }else{
        $error = "Error, no se pudo editar al dependiente";  
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
                        <!-- cargamos el select -->
                        <input type="text" name="nombre" class="form-control" value="<?php if($registro) echo $registro->nombre; ?>">
                      </div>

                      <div class="mb-3">
                        <label for="descripcion" class="form-label">Apellido paterno</label>
                        <input class="form-control" name="apellido_paterno" value="<?php if($registro) echo $registro->apellido_paterno; ?>">
                      </div>  
                      <div class="mb-3">
                        <label for="descripcion" class="form-label">Apellido materno</label>
                        <input class="form-control" name="apellido_materno" value="<?php if($registro) echo $registro->apellido_materno; ?>">
                      </div>
                      <div class="mb-3">
                        <label for="titulo" class="form-label">Parentesco</label>
                        <input type="text" name="parentezco" class="form-control" value="<?php if($registro) echo $registro->parentezco; ?>">
                      </div>   
                      <div class="mb-3">
                        <label for="titulo" class="form-label">Teléfono</label>
                        <input type="text" name="telefono" class="form-control" value="<?php if($registro) echo $registro->telefono; ?>">
                      </div>    

                            <button type="submit" name="editar_dependiente" class="btn btn-primary"><i class="fas fa-cog"></i> Actualizar datos del dependiente</button>  

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
