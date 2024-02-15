<?php include "includes/header.php" ?>

<?php

//Mostrar registros
$query = "SELECT * FROM mv_formacion_profesional WHERE usuario_id='$idUsuario'";
$stmt = $conn->query($query);
$registros = $stmt->fetchAll(PDO::FETCH_OBJ);

?>

<!-- //Vista de la tabla -->
<div class="card-header">
  <div class="row">
    <div class="col-md-9">
      <h3 class="card-title">Formación profesional</h3>
    </div>
    <div class="col-md-3">
      <a href="agregar_profesion.php" type="button" class="btn btn-primary btn-xl pull-right w-100">
        <i class="fa fa-plus"></i> Agregar profesión
      </a>
    </div>
  </div>
</div>
<!-- /.card-header -->
<div class="card-body">
  <table id="tblRegistros" class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>Id</th>
        <th>Nivel escolar</th>
        <th>Estatus</th>
        <th>Título</th>
        <th>Carrera</th>
        <th>Documento obtenido</th>
      </tr>
    </thead>

    <tbody>

      <!-- Contenido dinamico -->
      <?php foreach ($registros as $fila) : ?>
        <tr>
          <td><?php echo $fila->id; ?></td>
          <td><?php echo $fila->nivel_escolar; ?></td>
          <td><?php echo $fila->estatus; ?></td>
          <td><?php echo $fila->titulo; ?></td>
          <td><?php echo $fila->carrera; ?></td>
          <td><?php echo $fila->documento_obtenido; ?></td>
          <td>
            <a href="editar_profesion.php?id=<?php echo $fila->id; ?>" class="btn btn-warning"><i class="bi bi-pencil-fill"></i> <i class="fas fa-edit"></i> Editar</a>
            &nbsp;
            <a href="borrar_profesion.php?id=<?php echo $fila->id; ?>" class="btn btn-danger "><i class="bi bi-pencil-fill"></i> <i class="fas fa-trash-alt"></i> Eliminar</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
<?php include "includes/footer.php" ?>