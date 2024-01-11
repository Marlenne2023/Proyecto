<?php include "includes/header.php" ?>

<?php

//Mostrar registros
$query = "SELECT * FROM usuario";
$stmt = $conn->query($query);
$usuarios = $stmt->fetchAll(PDO::FETCH_OBJ);

//var_dump($registros);

?>
<!doctype html>
<html lang="es">

<head>
  <link rel="stylesheet" type="text/css" href="css/stylesimprimir.css" media="print">

</head>

<div class="card-header">
  <div class="row">
    <div class="col-md-9">
      <h3 class="card-title">Usuarios registrados</h3>
    </div>
    <div class="col-md-3">
      <a href="lista_usuarios.php" class="btn btn-dark boton-imprimir"></i> Regresar</a>
    </div>
    <div class="col-md-3">
      <a href="imprimir.php" class="btn btn-success boton-imprimir" onclick="window.print()"> Imprimir</a>
    </div>
    <div>
      <a href="GenerarExcel.php" class="btn btn-warning" >Generar excel</a>
    </div>
  </div>
</div>
<!-- /.card-header -->
<div class="card-body">
  <table id="tblUsuarios" class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>Id</th>

        <th>Nombre</th>
        <th>Teléfono</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($usuarios as $fila) : ?>
        <tr>
          <td><?php echo $fila->id; ?></td>

          <td><?php echo $fila->nombre; ?></td>
          <td><?php echo $fila->telefono; ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
<!-- /.card-body -->

<?php include "includes/footer.php" ?>

<!-- page script -->
<script>
  $(function() {
    $('#tblUsuarios').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });



    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'HH:mm',
      enabledHours: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24],
      stepping: 30
    })

  });
</script>

</html>