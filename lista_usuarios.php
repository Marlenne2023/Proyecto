<?php include "includes/header.php" ?>

<?php

//Mostrar registros
$query = "SELECT * FROM usuario";
$stmt = $conn->query($query);
$usuarios = $stmt->fetchAll(PDO::FETCH_OBJ);

//var_dump($registros);

?>

<div class="card-header">
  <div class="row">
    <div class="col-md-9">
      <h3 class="card-title">Usuarios registrados</h3>
    </div>
    <div class="col-md-3">
      <a href="crear_usuario.php" class="btn btn-primary btn-xl pull-right w-100"><i class="fa fa-plus"></i> Nuevo usuario</a>
    </div>
    <div class="col-md-3">
      <a href="imprimir.php" class="btn btn-success btn-xl pull-right w-100" ><i class="far fa-file"></i> Generar reporte</a>
    </div>
    <div class="col-md-3">
      <a href="pdf.php" class="btn btn-success btn-xl pull-right w-100" ><i class="far fa-file"></i> PDF General</a>
    </div>
    <div class="col-md-3">
      <a href="pdf_elegir.php" class="btn btn-success btn-xl pull-right w-100" ><i class="far fa-file"></i> PDF personalizado</a>
    </div>
  </div>
</div>
<!-- /.card-header -->
<div class="card-body">
  <table id="tblUsuarios" class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>Id</th>
        <th>Email</th>
        <th>Nombre</th>
        <th>Teléfono</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($usuarios as $fila) : ?>
        <tr>
          <td><?php echo $fila->id; ?></td>
          <td><?php echo $fila->email; ?></td>
          <td><?php echo $fila->nombre; ?></td>
          <td><?php echo $fila->telefono; ?></td>
          <td>
            <a href="pdf.php?id=<?php echo $fila->id; ?>" class="btn btn-danger"><i class="bi bi-pencil-fill"></i> <i class="fas fa-edit"></i> PDF</a>
          </td>
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