<?php include "includes/header.php" ?>

<?php

//Mostrar registros
$query = "SELECT * FROM dependientes WHERE usuario_id='$idUsuario'";
$stmt = $conn->query($query);
$registros = $stmt->fetchAll(PDO::FETCH_OBJ);

?>

<!-- //Vista de la tabla -->
<div class="card-header">
  <div class="row">
    <div class="col-md-9">
      <h3 class="card-title">Dependientes economicos</h3>
    </div>
    <div class="col-md-3">
      <a href="agregar_dependiente.php" type="button" class="btn btn-primary btn-xl pull-right w-100">
        <i class="fa fa-plus"></i> Agregar dependiente
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
        <th>Nombre</th>
        <th>Apellido Paterno</th>
        <th>Apellido Materno</th>
        <th>Parentesco</th>
        <th>Teléfono</th>
      </tr>
    </thead>

    <tbody>

      <!-- Contenido dinamico -->
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
            &nbsp;
            <a href="borrar_dependiente.php?id=<?php echo $fila->id; ?>" class="btn btn-danger "><i class="bi bi-pencil-fill"></i> <i class="fas fa-trash-alt"></i> Eliminar</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
<?php include "includes/footer.php" ?>