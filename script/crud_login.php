<?php
include('conexion.php');
$condicion = $_POST['condicion'];
$fecha_inicio = date('Y-m-d');
//$responsable = $_SESSION['id'];

if($condicion=='consultar'){
	$id = $_POST['id'];

	$sql1 = "SELECT * FROM t_productos WHERE id = ".$id;
	$consulta1 = mysqli_query($conexion,$sql1);
	while($row1 = mysqli_fetch_array($consulta1)) {
		$id = $row1['id'];
		$nombre = $row1['nombre'];
		$precio = $row1['precio'];
		$modelo = $row1['modelo'];
		$descripcion = $row1['descripcion'];
		$caracteristica1 = $row1['caracteristica1'];
		$caracteristica2 = $row1['caracteristica2'];
		$caracteristica3 = $row1['caracteristica3'];
		$caracteristica4 = $row1['caracteristica4'];
		$caracteristica5 = $row1['caracteristica5'];
		$categoria = $row1['categoria'];
		$estatus = $row1['estatus'];
	}
	
	$datos = [
		"id" => $id,
		"nombre" => $nombre,
		"precio" => $precio,
		"modelo" => $modelo,
		"descripcion" => $descripcion,
		"caracteristica1" => $caracteristica1,
		"caracteristica2" => $caracteristica2,
		"caracteristica3" => $caracteristica3,
		"caracteristica4" => $caracteristica4,
		"caracteristica5" => $caracteristica5,
		"categoria" => $categoria,
		"estatus" => $estatus,
	];

	echo json_encode($datos);
}

if($condicion=='login1'){
	$usuario = $_POST['user'];
	$password = md5($_POST["password"]);

	$sql1 = "SELECT * FROM usuarios WHERE usuario = '".$usuario."' and clave = '".$password."' LIMIT 1";
	$proceso1 = mysqli_query($conexion,$sql1);
	$fila1 = mysqli_num_rows($proceso1);

	if($fila1>=1){
		while($row = mysqli_fetch_array($proceso1)) {
			$usuario_id=$row['id'];
			$nombre=$row['nombre'];
			$apellido=$row['apellido'];
			$usuario=$row['usuario'];
			$clave=$row['clave'];
			$fecha_creacion=$row['fecha_creacion'];

			session_start();
			$_SESSION["id"] = $usuario_id;
			$_SESSION["nombre"] = $nombre;
			$_SESSION["apellido"] = $apellido;
			$_SESSION["usuario"] = $usuario;
			$_SESSION["clave"] = $clave;
			$_SESSION["fecha_creacion"] = $fecha_creacion;
		}

		$datos = [
			"sql1" => $sql1,
			"estatus" => 'ok',
		];

		echo json_encode($datos);
	}else{
		$datos = [
			"sql1" => $sql1,
			"estatus" => 'error',
		];

		echo json_encode($datos);
	}
}

?>