<?php

$fecha = date('Y-m-d');

$year = date('Y');
$mes = date('m');
$dia = date('d');

if($dia>=01 and $dia <= 15){
	$inicio = '01-'.$mes.'-'.$year;
	$fin = '15-'.$mes.'-'.$year;
}else{
	$inicio = '16-'.$mes.'-'.$year;
	$fin = '31-'.$mes.'-'.$year;
}

echo $fin;

?>