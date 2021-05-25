<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Camaleon Sistem</title>
  </head>
<style>
.bloque {
	padding-left: 1rem;
	padding-right: 1rem;
	border-radius: 2rem;
	height: 200px;
	border: 1px solid black;
	box-shadow: 4px 2px 2px 0px rgb(0 0 0 / 30%);
}
</style>
<body>

<div class="container" style="margin-top: 1rem;">
	<div class="row">
		<div class="col-12 text-center">
			<img src="img/logos/logos1.png" style="width: 250px;">
		</div>
		<div class="col-12 text-center" style="font-size: 40px; font-weight: bold;">
			BIENVENIDO POR FAVOR ELEGIR UNA OPCIÓN
		</div>
		<div class="col-6 text-center mt-3">
			<button class="btn btn-success" style="font-size: 40px;" data-toggle="modal" data-target="#exampleModal1" onclick="desayunos1();">DESAYUNOS</button>
		</div>
		<div class="col-6 text-center mt-3">
			<button class="btn btn-primary" style="font-size: 40px;" data-toggle="modal" data-target="#exampleModal1" onclick="almuerzos1();">ALMUERZOS</button>
		</div>
	</div>
</div>

</body>
</html>

<!-- Modal DESAYUNOS -->
	<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Asignar <span id="modal_titulo1"></span></h5>
					<input type="hidden" id="modal_condicion1" name="modal_condicion1" value="0">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
					   	<div class="col-6 text-center mt-3">
							<button class="btn btn-success" id="efectivo" value="0" onclick="efectivo1(value);">Efectivo</button>
						</div>
						<div class="col-6 text-center mt-3">
							<button class="btn btn-primary" id="app" value="0" onclick="app1(value);">APP</button>
						</div>

						<div id="div_efectivo" class="col-12 text-center">
							//
						</div>

						<!--
					   	<div class="col-12 text-center">
					   		<div class="bloque"></div>
					   	</div>
					    <div class="col-12 form-group form-check">
						    <label for="nombre">Nombre</label>
						    <input type="text" name="nombre" id="nombre" class="form-control" autocomplete="off" required>
					    </div>
						-->
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			    </div>
		    </form>
	  	</div>
	</div>
<!-- FIN DESAYUNOS -->

<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<script type="text/javascript">
	$(document).ready(function() {
		$('#myModal').on('shown.bs.modal', function () {
	  		$('#myInput').trigger('focus')
		});

	});

	function efectivo1(value){
		console.log(value);
		if(value==1){
			$('#efectivo').val(0);
			$('#div_efectivo').val();
		}else{
			$('#efectivo').val(1);
		}
	}

	function desayunos1(){
		$('#modal_titulo1').html("Desayuno");
		$('#modal_condicion1').val("Desayuno");
	}

	function almuerzos1(){
		$('#modal_titulo1').html("Almuerzo");
		$('#modal_condicion1').val("Almuerzo");
	}
</script>