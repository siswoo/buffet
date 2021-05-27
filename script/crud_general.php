<?php
//session_start();
include("conexion.php");
$fecha_creacion = date("Y-m-d");
//$responsable = $_SESSION["id"];
$condicion = $_POST["condicion"];

if($condicion=='registrar1'){
	$condicion2 = $_POST["condicion2"];
	$modal_condicion1 = $_POST["modal_condicion1"];
	$precio = $_POST["precio"];
	$concepto1 = $_POST["concepto1"];
	$cantidad1 = $_POST["cantidad1"];
	$valor1 = str_replace(",","",$_POST["valor1"]);
	$concepto2 = $_POST["concepto2"];
	$cantidad2 = $_POST["cantidad2"];
	$valor2 = str_replace(",","",$_POST["valor2"]);
	$concepto3 = $_POST["concepto3"];
	$cantidad3 = $_POST["cantidad3"];
	$valor3 = str_replace(",","",$_POST["valor3"]);
	$concepto4 = $_POST["concepto4"];
	$cantidad4 = $_POST["cantidad4"];
	$valor4 = str_replace(",","",$_POST["valor4"]);
	$concepto5 = $_POST["concepto5"];
	$cantidad5 = $_POST["cantidad5"];
	$valor5 = str_replace(",","",$_POST["valor5"]);

	if($valor1>=1){
		$total1 = $valor1*$cantidad1;
	}else{
		$total1 = 0;
	}
	if($valor2>=1){
		$total2 = $valor2*$cantidad2;
	}else{
		$total2 = 0;
	}
	if($valor3>=1){
		$total3 = $valor3*$cantidad3;
	}else{
		$total3 = 0;
	}
	if($valor4>=1){
		$total4 = $valor4*$cantidad4;
	}else{
		$total4 = 0;
	}
	if($valor5>=1){
		$total5 = $valor5*$cantidad5;
	}else{
		$total5 = 0;
	}

	$total_todo = $precio+$total1+$total2+$total3+$total4+$total5;

	if($condicion2=='efectivo'){
		$sql1 = "INSERT INTO efectivos (concepto1,cantidad1,valor1,concepto2,cantidad2,valor2,concepto3,cantidad3,valor3,concepto4,cantidad4,valor4,concepto5,cantidad5,valor5,total1,total2,total3,total4,total5,precio,total_todo,fecha_creacion) VALUES ('$concepto1','$cantidad1','$valor1','$concepto2','$cantidad2','$valor2','$concepto3','$cantidad3','$valor3','$concepto4','$cantidad4','$valor4','$concepto5','$cantidad5','$valor5','$total1','$total2','$total3','$total4','$total5','$precio','$total_todo','$fecha_creacion')";
		$proceso1 = mysqli_query($conexion,$sql1);
		if (!$proceso1) {
			$datos = [
				"estatus" => "error",
				"sql" => $sql1,
			];
			echo json_encode($datos);
		}else{
			require('../resources/fpdf/fpdf.php');
			class PDF extends FPDF{
				function Header(){}

				function Footer(){}
			}

			//$pdf = new PDF();
			$pdf = new FPDF($orientation='P',$unit='mm', array(45,400));
			$pdf->AliasNbPages();
			$pdf->AddPage();

			$pdf->SetFont('Helvetica','',12);
			$pdf->Cell(25,5,utf8_decode("Buffet Camaleón"),0,1,'C');
			$pdf->Cell(25,5,"-----------------------------------",0,1,'C');
			$pdf->Cell(25,5,$modal_condicion1,0,1,'C');
			$pdf->SetFont('Helvetica','',10);
			$pdf->Cell(25,5,"Precio: ".$precio,0,1,'C');
			$pdf->Cell(25,5,"-----------------------------------",0,1,'C');
			if($valor1>=1 or $valor2>=1 or $valor3>=1 or $valor4>=1 or $valor5>=1){
				$pdf->Cell(25,5,"Adicionales Agregados",0,1,'C');
			}
			$pdf->SetFont('Helvetica','',8);
			if($valor1>=1){
				$pdf->Cell(25,5,"-----------------------------------",0,1,'C');
				$pdf->Cell(25,5,"Concepto: ".utf8_decode($concepto1),0,1,'');
				$pdf->Cell(25,5,"Cantidad: ".$cantidad1,0,1,'');
				$pdf->Cell(25,5,"Valor: ".$valor1,0,1,'');
				$pdf->Cell(25,5,"Sub-Total: ".$total1,0,1,'');
				$pdf->Ln(5);
			}
			if($valor2>=1){
				$pdf->Cell(25,5,"-----------------------------------",0,1,'C');
				$pdf->Cell(25,5,"Concepto: ".utf8_decode($concepto2),0,1,'');
				$pdf->Cell(25,5,"Cantidad: ".$cantidad2,0,1,'');
				$pdf->Cell(25,5,"Valor: ".$valor2,0,1,'');
				$pdf->Cell(25,5,"Sub-Total: ".$total2,0,1,'');
				$pdf->Ln(5);
			}
			if($valor3>=1){
				$pdf->Cell(25,5,"-----------------------------------",0,1,'C');
				$pdf->Cell(25,5,"Concepto: ".utf8_decode($concepto3),0,1,'');
				$pdf->Cell(25,5,"Cantidad: ".$cantidad3,0,1,'');
				$pdf->Cell(25,5,"Valor: ".$valor3,0,1,'');
				$pdf->Cell(25,5,"Sub-Total: ".$total3,0,1,'');
				$pdf->Ln(5);
			}
			if($valor4>=1){
				$pdf->Cell(25,5,"-----------------------------------",0,1,'C');
				$pdf->Cell(25,5,"Concepto: ".utf8_decode($concepto4),0,1,'');
				$pdf->Cell(25,5,"Cantidad: ".$cantidad4,0,1,'');
				$pdf->Cell(25,5,"Valor: ".$valor4,0,1,'');
				$pdf->Cell(25,5,"Sub-Total: ".$total4,0,1,'');
				$pdf->Ln(5);
			}
			if($valor5>=1){
				$pdf->Cell(25,5,"-----------------------------------",0,1,'C');
				$pdf->Cell(25,5,"Concepto: ".utf8_decode($concepto5),0,1,'');
				$pdf->Cell(25,5,"Cantidad: ".$cantidad5,0,1,'');
				$pdf->Cell(25,5,"Valor: ".$valor5,0,1,'');
				$pdf->Cell(25,5,"Sub-Total: ".$total5,0,1,'');
				$pdf->Ln(5);
			}

			$pdf->SetFont('Helvetica','',10);
			$pdf->Cell(25,5,"-----------------------------------",0,1,'C');
			$pdf->Cell(25,5,"Total: ". $total_todo,0,1,'');

			$pdf->Output('F', '../ticket.pdf');

			$datos = [
				"estatus" => "ok",
				"sql" => $sql1,
			];
			echo json_encode($datos);
		}
	}
}
