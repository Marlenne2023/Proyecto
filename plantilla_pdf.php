<?php
require('fpdf/fpdf.php');
include ("C:/xampp/htdocs/PROYECTO/conexion_sqlserver.php");
 

class PDF extends FPDF
{
    function Header()
    {
        $this->SetFont('Helvetica', '', 20);
        $this->Image('images/Logo_Oficios.png', 150, 15, 55);
        $this->Cell(300, 25, '', '', 'C');
        $this->Cell(0, 15, utf8_decode('Reporte'), 0, 0, 'C');
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

$query = "SELECT id, email, nombre, telefono, es_admin FROM usuario";
$resultado = $conn->query($query);

ob_start();

$pdf = new PDF();
$pdf->AddPage('P', 'Letter');
$pdf->SetY(25);
$pdf->SetFont('Helvetica', '', 9);


$pdf->Ln(); //Salto de linea

$pdf->SetFillColor(232, 232, 232);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(20, 6, 'ID', 1, 0, 'C', 1);
$pdf->Cell(20, 6, 'Correo', 1, 0, 'C', 1);
$pdf->Cell(20, 6, 'Nombre', 1, 0, 'C', 1);
$pdf->Cell(20, 6, 'Teléfono', 1, 0, 'C', 1);
$pdf->Cell(20, 6, 'Administrador', 1, 0, 'C', 1);

$pdf->Ln();

$pdf->AliasNbPages();
$pdf->Output();

ob_end_flush();
