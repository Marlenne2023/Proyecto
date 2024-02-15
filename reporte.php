<?php
require 'vendor/autoload.php';
require 'conexion_sqlserver.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;

$sql = "SELECT id, nombre, telefono FROM usuario";
$resultado = $mysqli->query($sql);

// $query = "SELECT * FROM usuario";
// $stmt = $conn->query($query);
// $usuarios = $stmt->fetchAll(PDO::FETCH_OBJ); 

$excel = new Spreadsheet();
$hojaActiva = $excel->getActiveSheet();
$hojaActiva->setTitle("Usuarios");

$hojaActiva->setCellValue('A1', 'id');
$hojaActiva->setCellValue('B1','nombre');
$hojaActiva->setCellValue('C1','telefono');

$fila = 2;

while($rows = $resultado->fetch_assoc()){
    $hojaActiva->setCellValue('A'.$fila, $rows['id']);
    $hojaActiva->setCellValue('B'.$fila, $rows['nombre']);
    $hojaActiva->setCellValue('A'.$fila, $rows['telefono']);
    $fila++;
}