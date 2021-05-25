<?php
session_start();
include("conexion.php");
$fecha_creacion = date("Y-m-d");
$responsable = $_SESSION["id"];
$condicion = $_POST["condicion"];

if($condicion=='editar'){
	$id = $_POST["id"];
	$nombre = $_POST["nombre"];
	$precio = $_POST["precio"];
	$dia = $_POST["dia"];

	$sql1 = "UPDATE semanal SET nombre = '".$nombre."' and precio = '".$precio."'  WHERE id = ".$id;
	$proceso1 = mysqli_query($conexion,$sql1);
	if (!$proceso1) {
		$datos = [
			"estatus" => "error",
			"sql" => $sql1,
		];
		echo json_encode($datos);
	}else{
		$datos = [
			"estatus" => "ok",
			"sql" => $sql1,
		];
		echo json_encode($datos);
	}
}
