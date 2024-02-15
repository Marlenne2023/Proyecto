<?php include "includes/header.php" ?>
<?php

$query = "SELECT * FROM mv_info_hijos WHERE usuario_id= '$idUsuario'";
$stmt = $conn->query($query);
$registros = $stmt->fetchAll(PDO::FETCH_OBJ); 

?>

<div class="card-header">
    <div class="row">
        <div class="col-md-9">
            <h3 class="card-title">Datos adicionales</h3>
        </div>
    </div>
</div>
<!-- /.card-header -->
<div class="card-body">
    <table id="tblRegistros" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Cédula profesional</th>
                <th>Cartilla militar</th>
                <th>Licencia de conducir</th>
                <th>Pasaporte</th>
                <th>Teléfono de casa</th>
                <th>Correo personal </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($registros as $fila) : ?>
                <tr>
                    <td><?php echo $fila->cedula_profesional; ?></td>
                    <td><?php echo $fila->cartilla_militar; ?></td>
                    <td><?php echo $fila->licencia_conducir; ?></td>
                    <td><?php echo $fila->pasaporte; ?></td>
                    <td><?php echo $fila->tel_casa; ?></td>
                    <td><?php echo $fila->correo_per; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>


<?php

$query = "SELECT * FROM mv_info_hijos WHERE usuario_id= '$idUsuario'";
$stmt = $conn->query($query);
$registros_hijos = $stmt->fetchAll(PDO::FETCH_OBJ); 

?>
<div class="card-header">
    <div class="row">
        <div class="col-md-9">
            <h3 class="card-title">Hijos</h3>
        </div>
    </div>
</div>
<!-- /.card-header -->
<div class="card-body">
    <table id="tblRegistros" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido paterno</th>
                <th>Apellido materno</th>
                <th>Fecha de nacimiento</th>
                <th>Sexo</th>
                <th>Talla de ropa</th>
                <th>Talla de calzado</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($registros_hijos as $fila) : ?>
                <tr>
                    <td><?php echo $fila->nombre_hijo; ?></td>
                    <td><?php echo $fila->apellido_p; ?></td>
                    <td><?php echo $fila->apellido_m; ?></td>
                    <td><?php echo $fila->fecha_nacimiento; ?></td>
                    <td><?php echo $fila->sexo; ?></td>
                    <td><?php echo $fila->talla_ropa; ?></td>
                    <td><?php echo $fila->talla_calzado; ?></td>
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