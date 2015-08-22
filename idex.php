<?php
include("CONFIGURATIONS/FPDF/fpdf.php");
$pdf= new FPDF('P','mm','A4');
$pdf->AddPage();
$pdf->SetFont('Arial','B',11);
$pdf->Cell(40,10,'CAYDEESOFT',0,1);
$pdf->Cell(40,10,"SOLUTIONS",0,3);
$pdf->Output();
$pdf->Open();

?>