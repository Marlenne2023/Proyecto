<?php
require('fpdf/fpdf.php');
include("C:/xampp/htdocs/PROYECTO/conexion_sqlserver.php");

class PDF extends FPDF
{
    function Header()
    {
        $this->SetFont('Helvetica', '', 20);
        $this->Image('images/Logo_Oficios.png', 150, 15, 55);
        $this->Cell(300, 25, '', '', 'C');
        $this->Cell(0, 12, utf8_decode('Reporte individual'), 0, 0, 'C');
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Helvetica', '', 8);
        $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo(), 0, 0, 'C');
        $this->SetX(10);
        $this->Cell(0, 10, utf8_decode('Fecha de Generación: ') . date('d/m/Y'), 0, 0, 'L');
        $this->SetY(-20);
        $this->SetX(-60);
        $this->Cell(0, 10, utf8_decode('Dirección Salazar No. 100 Col. Centro'));
        $this->SetX(-56);
        $this->Cell(0, 16, utf8_decode('Pachuca de Soto, Hgo. C.P. 42000'));
        $this->SetX(-54);
        $this->Cell(0, 23, utf8_decode('Tel.: 01 (771) 71 73100 ext. 3165'));
        $this->SetX(-38);
        $this->Cell(0, 29, utf8_decode('www.hidalgo.gob.mx'));
    }
}

// OBTENEMOS TODOS LOS USUARIOS DE LA BASE DE DATOS
$query = $conn->prepare("SELECT id, email, nombre, telefono, es_admin FROM usuarios");
$sentencia->execute();
$resultados= $sentencia->fetchAll(PDO::FETCH_ASSOC);

// OBTENEMOS LAS SELECCIONES DE LOS CHECKBOXES
$exportarID = isset($_POST['usuariosMasivo_exportarID']) ? $_POST['usuariosMasivo_exportarID'] : false;
$exportarUsuario = isset($_POST['usuariosMasivo_exportarUsuario']) ? $_POST['usuariosMasivo_exportarUsuario'] : false;
$exportarCorreo = isset($_POST['usuariosMasivo_exportarCorreo']) ? $_POST['usuariosMasivo_exportarCorreo'] : false;
$exportarPermisos = isset($_POST['usuariosMasivo_exportarPermisos']) ? $_POST['usuariosMasivo_exportarPermisos'] : false;

// INICIAMOS EL BÚFER DE SALIDA
ob_start();

$pdf = new PDF();
$pdf->AddPage('P', 'Letter');
$pdf->SetY(25);
$pdf->SetFont('Helvetica', '', 9);

// IMPRIMIR ENCABEZADO
$columns = [];
if ($exportarID) {
    $columns[] = 'ID';
}
if ($exportarUsuario) {
    $columns[] = 'Usuario';
}
if ($exportarCorreo) {
    $columns[] = 'Correo';
}
if ($exportarPermisos) {
    $columns[] = 'Permisos';
}

foreach ($columns as $column) {
    $ancho = ($column === 'ID') ? 25 : ($column === 'Usuario' ? 37 : ($column === 'Correo' ? 80 : 47));
    $pdf->Cell($ancho, 8, $column, 1);
}

$pdf->Ln();

// IMPRIMIR DATOS
foreach ($usuarios as $usuario) {
    $data = [];
    if ($exportarID) {
        $data[] = $usuario['id'];
    }
    if ($exportarUsuario) {
        $data[] = $usuario['usuario'];
    }
    if ($exportarCorreo) {
        $data[] = $usuario['correo'];
    }

    $sentenciaRol = $conexion->prepare("SELECT nombreRol FROM tbl_roles WHERE id = :rolID");
    $sentenciaRol->bindParam(":rolID", $usuario['idRol']);
    $sentenciaRol->execute();
    $rol = $sentenciaRol->fetch(PDO::FETCH_ASSOC);

    if ($exportarPermisos) {
        $data[] = $rol['nombreRol'];
    }

    foreach ($data as $index => $value) {
        $ancho = ($index === 0) ? 25 : ($index === 1 ? 37 : ($index === 2 ? 80 : 47));
        $pdf->Cell($ancho, 7, $value, 1);
    }

    $pdf->Ln();
}

$pdf->AliasNbPages();
$pdf->Output();

ob_end_flush();