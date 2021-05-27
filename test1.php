<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Camaleon Sistem</title>
  </head>
<body>

<div class="container">
  <div class="row">
  	<input type="hidden" name="hidden_value1" id="hidden_value1" value="1">
    <table border="1" class="table" id="tabla_incrementable1">
      <thead class="thead-dark">
        <tr>
			<th class="text-center">Ingredientes</th>
			<th class="text-center">Opciones</th>
			<th class="text-center">Agregar</th>
		</tr>
		</thead>
		<tbody id="tbody">
			<tr id="tr_1">
	      		<td>
	      			<input type="text" id="input_1" name="input_1" class="form-control">
	      		</td>
	      		<td class="text-center">
	      			<button class="btn btn-danger" onclick="eliminarFila(1);">Eliminar</button>
	      		</td>
	      		<td class="text-center">
	      			<button class="btn btn-success" onclick="agregarFila();">Agregar</button>
	      		</td>
      		</tr>
		</tbody>
    </table>
  </div>
</div>

</body>
</html>

<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<script type="text/javascript">

function agregarFila(){
	var contador = Number($('#hidden_value1').val());
	var contador2 = contador+1;
	var html = '<tr id="tr_'+contador2+'"><td><input type="text" id="input_'+contador2+'" name="input_'+contador2+'" class="form-control"></td><td class="text-center"><button  class="btn btn-danger" onclick="eliminarFila('+contador2+');">Eliminar</button></td><td class="text-center"><button class="btn btn-success" onclick="agregarFila();">Agregar</button></td></tr>';
	$('#tbody').append(html);
	$('#hidden_value1').val(contador2);
}

function eliminarFila(fila){
	$('#')
}

</script>