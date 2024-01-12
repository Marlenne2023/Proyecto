<?php
require_once("conexion_sqlserver.php"); //conexión con la bd
header("Content-Type: application/xls"); //libreria para que se descargue en xls
header("Content-Disposition: attachment; filename = usuarios_registrados.xls"); //el nombre con que se descarga el xls
?>

<?php include "includes/header.php" ?>

<?php

//Mostrar registros
$query = "SELECT * FROM usuario"; //Consulta
$stmt = $conn->query($query); //ejecuta la consulta
$usuarios = $stmt->fetchAll(PDO::FETCH_OBJ); //Extrae los datos de la consulta



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
    </div>

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
            
                <?php foreach ($usuarios as $fila) : ?> //Ciclo para imprimir los datos
                    <tr>
                        <td><?php echo $fila->id; ?></td>
                        <td><?php echo $fila->nombre; ?></td>
                        <td><?php echo $fila->telefono; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script> //Hacer responsivo
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



            //Captura tiempo para acciones
            $('#timepicker').datetimepicker({
                format: 'HH:mm',
                enabledHours: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24],
                stepping: 30
            })

        });
    </script>

</html>