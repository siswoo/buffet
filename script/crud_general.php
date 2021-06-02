<?php
//session_start();
include("conexion.php");
include("conexion2.php");
$fecha_creacion = date("Y-m-d");
$year = date('Y');
$mes = date('m')-1;
$dia = date('d')-1;
$trm = 3400; //Preguntado al jefe y erick el dia 01/06/21
//$responsable = $_SESSION["id"];
$condicion = $_POST["condicion"];
if($dia>=01 and $dia <= 15){
	$inicio = $year.'-'.$mes.'-01';
	$fin = $year.'-'.$mes.'-15';
}else{
	$inicio = $year.'-'.$mes.'-16';
	$fin = $year.'-'.$mes.'-31';
}

if($condicion=='registrar1'){
	$condicion2 = $_POST["condicion2"];
	$modal_condicion1 = $_POST["modal_condicion1"];
	if($modal_condicion1=='Desayuno'){
		$precio = 6000;
	}else if($modal_condicion1=='Almuerzo'){
		$precio = 9000;
	}else{
		$precio = 0;
	}
	$tipo = $modal_condicion1;
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
		$sql1 = "INSERT INTO efectivos (tipo,concepto1,cantidad1,valor1,concepto2,cantidad2,valor2,concepto3,cantidad3,valor3,concepto4,cantidad4,valor4,concepto5,cantidad5,valor5,total1,total2,total3,total4,total5,precio,total_todo,fecha_creacion) VALUES ('$tipo','$concepto1','$cantidad1','$valor1','$concepto2','$cantidad2','$valor2','$concepto3','$cantidad3','$valor3','$concepto4','$cantidad4','$valor4','$concepto5','$cantidad5','$valor5','$total1','$total2','$total3','$total4','$total5','$precio','$total_todo','$fecha_creacion')";
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

			if($modal_condicion1!='Otros'){
				$pdf->Cell(25,5,"-----------------------------------",0,1,'C');
				$pdf->Cell(25,5,$modal_condicion1,0,1,'C');
				$pdf->SetFont('Helvetica','',10);
				$pdf->Cell(25,5,"Precio: ".$precio,0,1,'C');
				$pdf->Cell(25,5,"-----------------------------------",0,1,'C');
				if($valor1>=1 or $valor2>=1 or $valor3>=1 or $valor4>=1 or $valor5>=1){
					$pdf->Cell(25,5,"Adicionales Agregados",0,1,'C');
				}
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

if($condicion=='busquedaGlobal1'){
	$value = $_POST["value"];
	$documento1 = $_POST["documento1"];
	$quien = $_POST["quien1"];
	$html1 = "";

	if($quien=='Modelo'){
		$sql1 = "SELECT * FROM modelos WHERE documento_numero LIKE '%".$documento1."%' and estatus = 'Activa'";
		$proceso1 = mysqli_query($conexion2,$sql1);
	}else if($quien=='Nomina'){
		$sql1 = "SELECT * FROM nomina WHERE documento_numero LIKE '%".$documento1."%' and estatus = 'Aceptado'";
		$proceso1 = mysqli_query($conexion2,$sql1);
	}
	$contador1 = mysqli_num_rows($proceso1);
	if($contador1 >= 1){
		while($row = mysqli_fetch_array($proceso1)) {
			if($quien=='Modelo'){
				$busqueda_id = $row["id"];
				$nombre = $row['nombre1']." ".$row['nombre2']." ".$row['apellido1']." ".$row['apellido2'];
				$documento_numero = $row['documento_numero'];
				$documento_tipo = $row['documento_tipo'];
			}else if($quien=="Nomina"){
				$busqueda_id = $row["id"];
				$nombre = $row['nombre']." ".$row['apellido'];
				$documento_numero = $row['documento_numero'];
				$documento_tipo = $row['documento_tipo'];
			}
			$html1 .= '
				<option value="'.$documento_numero.'">'.$nombre.'</option>
			';
		}
		$datos = [
			"contador1" => $contador1,
			"html" => $html1,
			"busqueda_nombre" => $nombre,
			"estatus" => "ok",
		];
		echo json_encode($datos);
		exit;
	}
}

if($condicion=='busquedaGlobal2'){
	$documento1 = $_POST["documento1"];
	$quien = $_POST["quien"];

	/************CALCULO**************/
	$modal_condicion1 = $_POST["modal_condicion1"];
	if($modal_condicion1=='Desayuno'){
		$precio = 6000;
	}else if($modal_condicion1=='Almuerzo'){
		$precio = 9000;
	}else{
		$precio = 0;
	}

	$cantidad_1 = $_POST["cantidad_1"];
	$cantidad_2 = $_POST["cantidad_2"];
	$cantidad_3 = $_POST["cantidad_3"];
	$cantidad_4 = $_POST["cantidad_4"];
	$cantidad_5 = $_POST["cantidad_5"];
	$valor_1 = $_POST["valor_1"];
	$valor_2 = $_POST["valor_2"];
	$valor_3 = $_POST["valor_3"];
	$valor_4 = $_POST["valor_4"];
	$valor_5 = $_POST["valor_5"];

	if($valor_1=='' or $cantidad_1==''){
		$valor_1 = 0;
		$cantidad_1 = 0;
	}else{
		$valor_1 = str_replace(",","",$valor_1);
		$cantidad_1 = str_replace(",","",$cantidad_1);
	}

	if($valor_2=='' or $cantidad_1==''){
		$valor_2 = 0;
		$cantidad_2 = 0;
	}else{
		$valor_2 = str_replace(",","",$valor_2);
		$cantidad_2 = str_replace(",","",$cantidad_2);
	}

	if($valor_3=='' or $cantidad_1==''){
		$valor_3 = 0;
		$cantidad_3 = 0;
	}else{
		$valor_3 = str_replace(",","",$valor_3);
		$cantidad_3 = str_replace(",","",$cantidad_3);
	}

	if($valor_4=='' or $cantidad_1==''){
		$valor_4 = 0;
		$cantidad_4 = 0;
	}else{
		$valor_4 = str_replace(",","",$valor_4);
		$cantidad_4 = str_replace(",","",$cantidad_4);
	}

	if($valor_5=='' or $cantidad_1==''){
		$valor_5 = 0;
		$cantidad_5 = 0;
	}else{
		$valor_5 = str_replace(",","",$valor_5);
		$cantidad_5 = str_replace(",","",$cantidad_5);
	}

	$total1 = $valor_1*$cantidad_1;
	$total2 = $valor_2*$cantidad_2;
	$total3 = $valor_3*$cantidad_3;
	$total4 = $valor_4*$cantidad_4;
	$total5 = $valor_5*$cantidad_5;

	$total_final = $total1+$total2+$total3+$total4+$total5+$precio;

	$suma_chaturbate = 0;
	$suma_stripchat = 0;

	/**********************************/

	if($quien=='Modelo'){
		$sql1 = "SELECT * FROM modelos WHERE documento_numero = '".$documento1."' and estatus = 'Activa'";
		$proceso1 = mysqli_query($conexion2,$sql1);
	}else if($quien=='Nomina'){
		$sql1 = "SELECT * FROM nomina WHERE documento_numero = '".$documento1."' and estatus = 'Aceptado'";
		$proceso1 = mysqli_query($conexion2,$sql1);
	}
	$contador1 = mysqli_num_rows($proceso1);
	if($contador1 >= 1){
		while($row = mysqli_fetch_array($proceso1)) {
			$busqueda_id = $row["id"];
			if($quien=='Modelo'){
				$nombre = $row["nombre1"]." ".$row["nombre2"]." ".$row["apellido1"]." ".$row["apellido2"];
				$sql2 = "SELECT * FROM modelos_cuentas WHERE id_modelos = ".$busqueda_id;
				$proceso2 = mysqli_query($conexion2,$sql2);
				$contador2 = mysqli_num_rows($proceso2);
				if($contador2 >= 1){
					while($row2 = mysqli_fetch_array($proceso2)) {
						if($row2["id_paginas"]==1){
							$modelo_usuario_chaturbate = $row2["usuario"];
							$sql3 = "SELECT * FROM chaturbate WHERE nickname = '".$modelo_usuario_chaturbate."' and fecha BETWEEN '".$inicio."' AND '".$fin."'";
							$proceso3 = mysqli_query($conexion2,$sql3);
							while($row3 = mysqli_fetch_array($proceso3)) {
								$pesos_chaturbate = ($row3["tokens"]*0.05)*$trm;
								$suma_chaturbate = $suma_chaturbate+$pesos_chaturbate;
							}
						}else if($row2["id_paginas"]==5){
							$modelo_usuario_stripchat = $row2["usuario"];
							$sql4 = "SELECT * FROM stripchat WHERE nickname = '".$modelo_usuario_stripchat."' and fecha BETWEEN '".$inicio."' AND '".$fin."'";
							$proceso4 = mysqli_query($conexion2,$sql4);
							while($row4 = mysqli_fetch_array($proceso4)) {
								$pesos_stripchat = $row4["dolares"]*$trm;
								$suma_stripchat = $suma_stripchat+$pesos_stripchat;
							}
						}
					}

					$suma_paginas_final = $suma_chaturbate+$suma_stripchat;

					if($suma_paginas_final>=$total_final){
						$datos = [
							"nombre" => $nombre,
							"contador1" => $contador1,
							"estatus" => "ok",
						];
						echo json_encode($datos);
						exit;
					}else{
						$datos = [
							"nombre" => $nombre,
							"contador1" => $contador1,
							"estatus" => "Sin Saldo",
						];
						echo json_encode($datos);
						exit;
					}

				}else{
					$datos = [
						"nombre" => $nombre,
						"contador1" => $contador1,
						"estatus" => "Sin cuenta",
					];
					echo json_encode($datos);
					exit;
				}
			}else if($quien=="Nomina"){
				$nombre = $row["nombre"]." ".$row["apellido"];
				$sql2 = "SELECT * FROM usuarios WHERE usuario = 'Buffet'";
				$proceso2 = mysqli_query($conexion2,$sql2);
				while($row2 = mysqli_fetch_array($proceso2)) {
					$responsable = $row2["id"];
				}
				$datos = [
					"nombre" => $nombre,
					"contador1" => $contador1,
					"estatus" => "ok",
				];
				echo json_encode($datos);
				exit;
			}
		}
	}else{
		$datos = [
			"contador1" => $contador1,
			"estatus" => "error",
		];
		echo json_encode($datos);
		exit;
	}
}

if($condicion=='comprar1'){
	$documento1 = $_POST["documento"];
	$quien = $_POST["quien"];
	$condicion2 = $_POST["condicion2"];
	$modal_condicion1 = $_POST["modal_condicion1"];
	$tipo = $modal_condicion1;
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

	if($modal_condicion1=='Desayuno'){
		$precio = 6000;
	}else if($modal_condicion1=='Almuerzo'){
		$precio = 9000;
	}else{
		$precio = 0;
	}

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

	if($quien=='Modelo'){
		$sql1 = "SELECT * FROM modelos WHERE documento_numero = '".$documento1."' LIMIT 1";
		$proceso1 = mysqli_query($conexion2,$sql1);
		while($row1 = mysqli_fetch_array($proceso1)) {
			$id_modelo = $row1["id"];
		}
		$sql2 = "SELECT * FROM usuarios WHERE usuario = 'Buffet'";
		$proceso2 = mysqli_query($conexion2,$sql2);
		while($row2 = mysqli_fetch_array($proceso2)) {
			$responsable = $row2["id"];
		}
		$sql3 = "INSERT INTO descuento (id_modelo,concepto,valor,fecha_desde,fecha_hasta,responsable,estado,fecha_inicio) VALUES ('$id_modelo','Buffet','$total_todo','$fecha_creacion','$fecha_creacion','$responsable','Activo','$fecha_creacion')";
		$proceso3 = mysqli_query($conexion2,$sql3);
		if (!$proceso3) {
			$datos = [
				"estatus" => "error",
				"sql3" => $sql3,
			];
			echo json_encode($datos);
			exit;
		}else{
			require('../resources/fpdf/fpdf.php');
			class PDF extends FPDF{
				function Header(){}
				function Footer(){}
			}

			$pdf = new FPDF($orientation='P',$unit='mm', array(45,400));
			$pdf->AliasNbPages();
			$pdf->AddPage();

			$pdf->SetFont('Helvetica','',12);
			$pdf->Cell(25,5,utf8_decode("Buffet Camaleón"),0,1,'C');

			if($modal_condicion1!='Otros'){
				$pdf->Cell(25,5,"-----------------------------------",0,1,'C');
				$pdf->Cell(25,5,$modal_condicion1,0,1,'C');
				$pdf->SetFont('Helvetica','',10);
				$pdf->Cell(25,5,"Precio: ".$precio,0,1,'C');
				$pdf->Cell(25,5,"-----------------------------------",0,1,'C');
				if($valor1>=1 or $valor2>=1 or $valor3>=1 or $valor4>=1 or $valor5>=1){
					$pdf->Cell(25,5,"Adicionales Agregados",0,1,'C');
				}
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
				"sql" => $sql3,
			];
			echo json_encode($datos);
		}
	}else if($quien=='Nomina'){
		$sql1 = "SELECT * FROM nomina WHERE documento_numero = '".$documento1."' LIMIT 1";
		$proceso1 = mysqli_query($conexion2,$sql1);
		while($row1 = mysqli_fetch_array($proceso1)) {
			$id_nomina = $row1["id"];
		}
		$sql2 = "SELECT * FROM usuarios WHERE usuario = 'Buffet'";
		$proceso2 = mysqli_query($conexion2,$sql2);
		while($row2 = mysqli_fetch_array($proceso2)) {
			$responsable = $row2["id"];
		}
		$sql3 = "INSERT INTO n_descuentos (id_nomina,concepto,valor,fecha_asignada,descuento,responsable,fecha_inicio) VALUES ('$id_nomina','Buffet','$total_todo','$fecha_creacion','Buffet','$responsable','$fecha_creacion')";
		$proceso3 = mysqli_query($conexion2,$sql3);
		if (!$proceso3) {
			$datos = [
				"estatus" => "error",
				"sql3" => $sql3,
			];
			echo json_encode($datos);
			exit;
		}else{
			require('../resources/fpdf/fpdf.php');
			class PDF extends FPDF{
				function Header(){}
				function Footer(){}
			}

			$pdf = new FPDF($orientation='P',$unit='mm', array(45,400));
			$pdf->AliasNbPages();
			$pdf->AddPage();

			$pdf->SetFont('Helvetica','',12);
			$pdf->Cell(25,5,utf8_decode("Buffet Camaleón"),0,1,'C');

			if($modal_condicion1!='Otros'){
				$pdf->Cell(25,5,"-----------------------------------",0,1,'C');
				$pdf->Cell(25,5,$modal_condicion1,0,1,'C');
				$pdf->SetFont('Helvetica','',10);
				$pdf->Cell(25,5,"Precio: ".$precio,0,1,'C');
				$pdf->Cell(25,5,"-----------------------------------",0,1,'C');
				if($valor1>=1 or $valor2>=1 or $valor3>=1 or $valor4>=1 or $valor5>=1){
					$pdf->Cell(25,5,"Adicionales Agregados",0,1,'C');
				}
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
				"sql" => $sql3,
			];
			echo json_encode($datos);
		}
	}
}
