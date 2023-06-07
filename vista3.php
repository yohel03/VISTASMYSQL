<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Arial bold 15
    $this->SetFont('Arial','B',20);
    // Movernos a la derecha
    $this->Cell(65);
    // Título
    $this->Cell(70,10,'REPORTE DE VISTAS 3',0,0,'C');
    // Salto de línea
    $this->Ln(20);
    $this->SetFont('Arial','B',16);
    $this->cell(60,10, 'Matricula', 1, 1 ,'C',0);
}
// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
}
}
//formato general
//base de datos 
require'conexion.php';
//selectro de vista1
$consulta = "SELECT * FROM vista3";
$resultado = $mysqli-> query($consulta);
//pdf genrado 
$pdf = new PDF();
$pdf -> AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',16);

while($row = $resultado->fetch_assoc()){
    $pdf->cell(60,10, $row['matricula'], 1, 1 ,'C',0);
}
$pdf->Output();
?>

