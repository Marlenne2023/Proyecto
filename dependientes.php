<?php
include("includes/header.php");

//Mostrar registros
$query = "SELECT * FROM dependientes WHERE usuario_id='$idUsuario'";
$stmt = $conn->query($query);
$registros = $stmt->fetchAll(PDO::FETCH_OBJ); // $registros va a contener toda la tabla en forma de objeto

?>

<br>

<div class="card-header">
  <div class="row">
    <div class="col-md-9">
      <h3 class="card-title">Dependientes economicos</h3>
    </div>
  </div>

<br>

<!-- 
    <a name="" id="" class="btn btn-primary" href="agregar_dependiente.php" role="button">
      <i class="material-icons"></i><b>Nuevo Usuario</b>
    </a>
    <a style="margin-left: 10px;" class="btn btn-success" role="button" data-bs-toggle="modal" data-bs-target="#formatoModal" data-bs-backdrop="static" data-bs-keyboard="false">
      <i class='material-icons bx bxs-file-export'></i><b>Exportar Datos</b>
    </a>
 
   -->

  <div class="container-fluid">
    <form class="d-flex">
      <input class="form-control me-2 light-table-flter" data-table="table_id type=" text" placeholder="Ingresa la condición de búsqueda">
      <hr>
    </form>
  </div>

  <?php

  $where = "";
  if (isset($_GET['enviar'])) {
    $busqueda = $_GET['busqueda'];

    if (isset($_GET['busqueda'])) {
      $where = "WHERE dependientes.id LIKE'%" . $busqueda . "%' OR nombre LIKE'%" . $busqueda . "%'
    OR apellido_paternp LIKE'%" . $busqueda . "%' OR apellido_materno LIKE'%" . $busqueda . "%'
    OR parentezco LIKE'%" . $busqueda . "%' OR telefono LIKE'%" . $busqueda . "%'";
    }
  }

  ?>


  <div class="card-body">
    <table class="table table-bordered table-striped table_id">
      <thead>
        <tr>
          <th>Id</th>
          <th>Nombre</th>
          <th>Apellido Paterno</th>
          <th>Apellido Materno</th>
          <th>Parentesco</th>
          <th>Teléfono</th>
        </tr>
      </thead>

      <tbody>




        <?php foreach ($registros as $fila) : ?>
          <tr>
            <td><?php echo $fila->id; ?></td>
            <td><?php echo $fila->nombre; ?></td>
            <td><?php echo $fila->apellido_paterno; ?></td>
            <td><?php echo $fila->apellido_materno; ?></td>
            <td><?php echo $fila->parentezco; ?></td>
            <td><?php echo $fila->telefono; ?></td>
            <td>
              <a href="editar_dependiente.php?id=<?php echo $fila->id; ?>" class="btn btn-warning"><i class="bi bi-pencil-fill"></i> <i class="fas fa-edit"></i> Editar</a>
              <a href="eliminar.php?id=<?php echo $fila->id; ?>" class="btn btn-danger" data-toggle="modal" data-target="#confirm-delete"><i class="bi bi-pencil-fill"></i> Eliminar</a>
          </tr>
        <?php endforeach; ?>

      </tbody>
    </table>
    <br>


    
    <div class="col-md-3">
      <a href="agregar_dependiente.php" type="button" class="btn btn-primary w-70">
        <i class="fa fa-plus"></i> Agregar dependiente
      </a>
    </div>
  </div>



  <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="myModalLabel">Eliminar Registro</h4>
					</div>
					
					<div class="modal-body">
						¿Desea eliminar este registro?
					</div>
					
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
						<a class="btn btn-danger btn-ok">Eliminar</a>
					</div>
				</div>
			</div>
		</div>
		
		<script>
			$('#confirm-delete').on('show.bs.modal', function(e) {
				$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
				
				$('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
			});
		</script>	

<?php include "includes/footer.php" ?>