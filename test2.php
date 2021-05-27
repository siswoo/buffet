<?php
require('resources/fpdf/fpdf.php');

class PDF extends FPDF{
	function Header(){
	    //
	}

	function Footer(){
	    //
	}
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

// CABECERA
$pdf->SetFont('Helvetica','',12);
$pdf->Cell(25,4,'Lacodigoteca.com',0,1,'C');
$pdf->SetFont('Helvetica','',8);
//$pdf->Output('F', 'ticket.pdf');
$pdf->Output('ticket.pdf','i');
?>