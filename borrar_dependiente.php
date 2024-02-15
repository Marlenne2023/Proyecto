<?php include "includes/header.php" ?>
<?php
  //Validar si recibimos el id, se envía por GET
  if (isset($_GET["id"])) {
    $id= $_GET['id'];
  }

  //Obtener los datos del dependienre por id del empleado
  $query = "SELECT * FROM dependientes WHERE id=:id";
  $stmt = $conn->prepare($query);

  //Debemos pasar a bindParam las variables, no podemos pasar el dato directamente
  // sino que hacemos llamado por referencia
  $stmt->bindParam(":id", $id, PDO::PARAM_INT);
  $stmt->execute();


// Obtiene el resultado de la ejecucion(stmt)
  $registro = $stmt->fetch(PDO::FETCH_OBJ);

  //si da clic en el botn borrar_dependiente entra
  if(isset($_POST["borrar_dependiente"])){


      //declara la consulta
      $query = "DELETE dependientes  WHERE id=:id";

    //   prepara la consulta
      $stmt = $conn->prepare($query); 

      // Obtiene parametro id 
      $stmt->bindParam(":id", $id, PDO::PARAM_INT);

      //ejecuta la consulta y lo alamacena en la variable resultado
      $resultado = $stmt->execute();

// Si la consulta es exitosa arroja mensaje 
      if ($resultado) {
        $mensaje = "Dependiente eliminado correctamente";
      }else{
        $error = "Error, no se pudo eliminar al dependiente";  
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
                    <h3 class="card-title">Eliminar dependiente economico</h3>
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
                        <input type="text" name="nombre" class="form-control" value="<?php if($registro) echo $registro->nombre; ?>" readonly>
                      </div>

                      <div class="mb-3">
                        <label for="descripcion" class="form-label">Apellido paterno</label>
                        <input class="form-control" name="apellido_paterno" value="<?php if($registro) echo $registro->apellido_paterno; ?>" readonly>
                      </div>  
                      <div class="mb-3">
                        <label for="descripcion" class="form-label">Apellido materno</label>
                        <input class="form-control" name="apellido_materno" value="<?php if($registro) echo $registro->apellido_materno; ?>" readonly>
                      </div>
                      <div class="mb-3">
                        <label for="titulo" class="form-label">Parentesco</label>
                        <input type="text" name="parentezco" class="form-control" value="<?php if($registro) echo $registro->parentezco; ?>" readonly>
                      </div>   
                      <div class="mb-3">
                        <label for="titulo" class="form-label">Teléfono</label>
                        <input type="text" name="telefono" class="form-control" value="<?php if($registro) echo $registro->telefono; ?>" readonly>
                      </div>    

                            <button type="submit" name="borrar_dependiente" class="btn btn-primary btn-danger"> Eliminar dependiente</button>  

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
