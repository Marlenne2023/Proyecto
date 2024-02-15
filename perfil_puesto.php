<?php include "includes/header.php" ?>

<?php

$query = "SELECT * FROM mv_puesto WHERE usuario_id='$idUsuario'";
$stmt = $conn ->query($query);
$registros_puesto = $stmt->fetchAll(PDO::FETCH_OBJ)



















// if (isset($_POST["registrarDatos"])) {

//   //Obtener valores
//   $puesto = $_POST["puestoF"];
//   $empleado_rep = $_POST["empleado_repF"];
//   $org = $_POST["orgF"];
//   $num_exp = $_POST["num_expF"];
//   $nombramiento = $_POST["nombramientoF"];
//   $nivel = $_POST["nivelF"];
//   $categoria = $_POST["categoriaF"];
//   $regimen = $_POST["regimenF"];
//   $fecha_ingreso = $_POST["fecha_ingresoF"];
//   $c_a_uno = $_POST["c_a_unoF"];
//   $c_a_dos = $_POST["c_a_dosF"];
//   $c_a_tres = $_POST["c_a_tresF"];
//   $area_uno = $_POST["area_unoF"];
//   $area_dos = $_POST["area_dosF"];
//   $area_tres = $_POST["area_tresF"];
//   $funciones = $_POST["funcionesF"];

//   if 