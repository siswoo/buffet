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
		<div class="col-4 text-center mt-3">
			<button class="btn btn-success" style="font-size: 40px;" data-toggle="modal" data-target="#exampleModal1" onclick="desayunos1();">DESAYUNOS</button>
		</div>
		<div class="col-4 text-center mt-3">
			<button class="btn btn-primary" style="font-size: 40px;" data-toggle="modal" data-target="#exampleModal1" onclick="almuerzos1();">ALMUERZOS</button>
		</div>
		<div class="col-4 text-center mt-3">
			<button class="btn btn-info" style="font-size: 40px;" data-toggle="modal" data-target="#exampleModal1" onclick="otros1();">OTROS</button>
		</div>
		<div class="col-12 text-center mt-3">
			<button class="btn btn-danger" style="font-size: 40px;" onclick="printJS('buffet/ticket.pdf')">REIMPRIMIR</button>
		</div>
	</div>
</div>

</body>
</html>

<!-- Modal GENERAL -->
	<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Asignar <span id="modal_titulo1"></span></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="#" id="formulario1" method="POST">
						<input type="hidden" id="modal_condicion1" name="modal_condicion1" value="0">
						<div class="row">
							<div class="col-12 text-center" style="font-weight:bold; font-size: 20px;">ADICIONALES</div>
							<div id="div_adicionales" class="col-12 text-center">
								<div class="row">
									<div class="col-6 text-center" style="font-weight: bold;">Concepto</div>
									<div class="col-2 text-center" style="font-weight: bold;">Cant.</div>
									<div class="col-4 text-center" style="font-weight: bold;">Valor</div>
									<?php
									for ($i=1;$i<=5;$i++){ ?>
										<div class="col-6 mt-2">
											<input type="text" id="concepto_<?php echo $i; ?>" name="concepto_<?php echo $i; ?>" class="form-control" onkeyup="concepto1(this.id,value,<?php echo $i; ?>);">
										</div>
										<div class="col-2 mt-2">
											<input type="text" id="cantidad_<?php echo $i; ?>" name="cantidad_<?php echo $i; ?>" class="form-control cantidad" max="10" min="0">
										</div>
										<div class="col-4 mt-2">
											<input type="text" id="valor_<?php echo $i; ?>" name="valor_<?php echo $i; ?>" class="form-control number" min="500">
										</div>
									<?php } ?>
								</div>
							</div>

							<div class="col-12" style="/*display: none;*/">
								<div class="row">
								  <div class="col-6 text-center mt-3">
										<button type="button" class="btn btn-success" id="efectivo" value="0" onclick="efectivo1(value);">Efectivo</button>
									</div>
									<div class="col-6 text-center mt-3">
										<button type="button" class="btn btn-primary" id="app" value="0" onclick="app1(value);">APP</button>
									</div>
								</div>
							</div>
						</div>
					</form>

					<!-- APARTADO DE APP -->
					<div class="row mt-3" id="div_app1" style="display:none;">
						<div class="col-12 form-group form-check">
							<label for="quien">Elegir a Quien</label>
							<select name="quien1" id="quien1" class="form-control" onchange="quien1(value);" required>
								<option value="">Seleccione</option>
								<option value="Modelo">Modelo</option>
								<option value="Nomina">Nomina</option>
							</select>
						</div>
					</div>

					<div class="row mt-3" id="div_quien1" style="display:none;">
						<div class="col-6">
							<label for="documento1">Documento de Identidad</label>
							<input type="search" id="documento1" name="documento1" list="busquedaGlobal1" onkeyup="buscarGlobal1(value);" class="form-control" autocomplete="off" required>
					    	<datalist id="busquedaGlobal1">
					    		<option></option>
					    	</datalist>
						</div>
						<div class="col-6 form-group form-check">
							<label>Nombre del Cliente</label>
							<input type="text" readonly="readonly" id="read_nombre1" name="read_nombre1" class="form-control" value="">
						</div>
						<div class="col-12 text-center form-group form-check">
							<input type="hidden" id="hidden_documento1" name="hidden_documento1" value="">
							<input type="hidden" id="hidden_quien1" name="hidden_quien1" value="">

							<input type="hidden" id="hidden_cantidad_1" name="hidden_cantidad_1" value="">
							<input type="hidden" id="hidden_cantidad_2" name="hidden_cantidad_2" value="">
							<input type="hidden" id="hidden_cantidad_3" name="hidden_cantidad_3" value="">
							<input type="hidden" id="hidden_cantidad_4" name="hidden_cantidad_4" value="">
							<input type="hidden" id="hidden_cantidad_5" name="hidden_cantidad_5" value="">
							<input type="hidden" id="hidden_valor_1" name="hidden_valor_1" value="">
							<input type="hidden" id="hidden_valor_2" name="hidden_valor_2" value="">
							<input type="hidden" id="hidden_valor_3" name="hidden_valor_3" value="">
							<input type="hidden" id="hidden_valor_4" name="hidden_valor_4" value="">
							<input type="hidden" id="hidden_valor_5" name="hidden_valor_5" value="">
							

							<button type="button" class="btn btn-primary" onclick="buscar1();">Buscar</button>
							<button type="button" id="comprar1" class="btn btn-success" style="display:none;" onclick="comprar1();">Comprar</button>
						</div>
					</div>
					<!-- *************** -->


				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			  </div>
		    </form>
	  	</div>
	  </div>
	</div>
<!-- FIN GENERAL -->

<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/print.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<script type="text/javascript">
	$(document).ready(function() {
		$('#myModal').on('shown.bs.modal', function () {
	  		$('#myInput').trigger('focus')
		});
	});

	function efectivo1(value){
		var condicion2 = "efectivo";
		var precio = $('#hidden_precio1').val();
		var modal_condicion1 = $('#modal_condicion1').val();
		var concepto1 = $('#concepto_1').val();
		var cantidad1 = $('#cantidad_1').val();
		var valor1 = $('#valor_1').val();

		var concepto2 = $('#concepto_2').val();
		var cantidad2 = $('#cantidad_2').val();
		var valor2 = $('#valor_2').val();

		var concepto3 = $('#concepto_3').val();
		var cantidad3 = $('#cantidad_3').val();
		var valor3 = $('#valor_3').val();

		var concepto4 = $('#concepto_4').val();
		var cantidad4 = $('#cantidad_4').val();
		var valor4 = $('#valor_4').val();

		var concepto5 = $('#concepto_5').val();
		var cantidad5 = $('#cantidad_5').val();
		var valor5 = $('#valor_5').val();

		if(concepto1!='' && valor1<500){
			Swal.fire({
				title: 'Error en el concepto "'+concepto1+'"',
				text: "El valor minimo debe ser 500 pesos",
				icon: 'error',
				showConfirmButton: true,
				confirmButtonColor: '#3085d6',
			});
			return false;
		}

		if(concepto2!='' && valor2<500){
			Swal.fire({
				title: 'Error en el concepto "'+concepto2+'"',
				text: "El valor minimo debe ser 500 pesos",
				icon: 'error',
				showConfirmButton: true,
				confirmButtonColor: '#3085d6',
			});
			return false;
		}

		if(concepto3!='' && valor3<500){
			Swal.fire({
				title: 'Error en el concepto "'+concepto3+'"',
				text: "El valor minimo debe ser 500 pesos",
				icon: 'error',
				showConfirmButton: true,
				confirmButtonColor: '#3085d6',
			});
			return false;
		}


		if(concepto4!='' && valor4<500){
			Swal.fire({
				title: 'Error en el concepto "'+concepto4+'"',
				text: "El valor minimo debe ser 500 pesos",
				icon: 'error',
				showConfirmButton: true,
				confirmButtonColor: '#3085d6',
			});
			return false;
		}

		if(concepto5!='' && valor5<500){
			Swal.fire({
				title: 'Error en el concepto "'+concepto5+'"',
				text: "El valor minimo debe ser 500 pesos",
				icon: 'error',
				showConfirmButton: true,
				confirmButtonColor: '#3085d6',
			});
			return false;
		}

		Swal.fire({
			title: 'Estas seguro?',
			text: "Luego no podrás revertir esta acción",
			icon: 'warning',
			showConfirmButton: true,
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Si, Efectuar el registro!',
			cancelButtonText: 'Cancelar'
		}).then((result) => {
			if (result.value) {
				$.ajax({
					type: 'POST',
					url: 'script/crud_general.php',
					dataType: "JSON",
					data: {
						"condicion2": condicion2,
						"modal_condicion1": modal_condicion1,
						"precio": precio,
						"concepto1": concepto1,
						"cantidad1": cantidad1,
						"valor1": valor1,
						"concepto2": concepto2,
						"cantidad2": cantidad2,
						"valor2": valor2,
						"concepto3": concepto3,
						"cantidad3": cantidad3,
						"valor3": valor3,
						"concepto4": concepto4,
						"cantidad4": cantidad4,
						"valor4": valor4,
						"concepto5": concepto5,
						"cantidad5": cantidad5,
						"valor5": valor5,
						"condicion": "registrar1",
					},
					success: function(respuesta) {
						console.log(respuesta);
						if(respuesta["estatus"]=='ok'){
							printJS('buffet/ticket.pdf');
							$('#concepto_1').val("");
							$('#cantidad_1').val("");
							$('#valor_1').val("");
							$('#concepto_2').val("");
							$('#cantidad_2').val("");
							$('#valor_2').val("");
							$('#concepto_3').val("");
							$('#cantidad_3').val("");
							$('#valor_3').val("");
							$('#concepto_4').val("");
							$('#cantidad_4').val("");
							$('#valor_4').val("");
							$('#concepto_5').val("");
							$('#cantidad_5').val("");
							$('#valor_5').val("");
							$('#hidden_cantidad_1').val("");
							$('#hidden_valor_1').val("");
							$('#hidden_cantidad_2').val("");
							$('#hidden_valor_2').val("");
							$('#hidden_cantidad_3').val("");
							$('#hidden_valor_3').val("");
							$('#hidden_cantidad_4').val("");
							$('#hidden_valor_4').val("");
							$('#hidden_cantidad_5').val("");
							$('#hidden_valor_5').val("");
							$('#div_app1').hide("slow");
							$('#div_quien1').hide("slow");

						}
					},

					error: function(respuesta) {
						console.log(respuesta["responseText"]);
					}
				});
			}
		})
	}

	function desayunos1(){
		$('#modal_titulo1').html("Desayuno");
		$('#modal_condicion1').val("Desayuno");
	}

	function almuerzos1(){
		$('#modal_titulo1').html("Almuerzo");
		$('#modal_condicion1').val("Almuerzo");
	}

	function otros1(){
		$('#modal_titulo1').html("Otros");
		$('#modal_condicion1').val("Otros");
	}

	$('.cantidad').on({
		"focus": function (event) {
        $(event.target).select();
    },
    "keyup": function (event) {
        $(event.target).val(function (index, value ) {
            //console.log(value);
            if(value<=10 && value>=1){
            	return value;
            }else if(value<0){
            	return 1;
            }else if(value==0){
            	return 1;
            }else{
            	return 10;
            }
        });
    }
	});

	function concepto1(id,value,i){
		var cantidad = $('#cantidad_'+i).val();
		var valor = $('#valor_'+i).val();
		
		if(value!=''){
			if(cantidad==0){
				$('#cantidad_'+i).val(1);
			}

			if(valor=='' || valor<1){
				$('#valor_'+i).val(500);
			}
		}else{
			$('#cantidad_'+i).val("");
			$('#valor_'+i).val("");
		}
	}

	$(".number").on({
    "focus": function (event) {
        $(event.target).select();
    },
    "keyup": function (event) {
        $(event.target).val(function (index, value ) {

        		if(value<0){
            	return 1;
            }

            return value.replace(/\D/g, "")
						//.replace(/([0-9])([0-9]{2})$/, '$1.$2')
						.replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
        });
    }
	});

	function app1(){
		$('#div_app1').show("slow");
	}

	function quien1(value){
		if(value!=""){
			$('#div_quien1').show("slow");
		}else{
			$('#div_quien1').hide("slow");
		}
		$('#documento1').val("");
		$('#read_nombre1').val("");
		$('#comprar1').hide("slow");
	}

	function buscarGlobal1(value){
		var cantidad = value.length;
		var documento1 = $('#documento1').val();
		var quien1 = $('#quien1').val();
		if(cantidad<=3){
			$('#busquedaGlobal1').html('ok');
			$('#read_nombre1').val();
			return false;
		}
		$.ajax({
			type: 'POST',
			url: 'script/crud_general.php',
			dataType: "JSON",
			data: {
				"value": value,
				"documento1": documento1,
				"quien1": quien1,
				"condicion": "busquedaGlobal1",
			},

			beforeSend: function(){
				$('#read_nombre1').val("");
				$('#hidden_documento1').val("");
				$('#hidden_quien1').val("");
				$('#hidden_cantidad_1').val("");
				$('#hidden_cantidad_2').val("");
				$('#hidden_cantidad_3').val("");
				$('#hidden_cantidad_4').val("");
				$('#hidden_cantidad_5').val("");
				$('#hidden_valor_1').val("");
				$('#hidden_valor_2').val("");
				$('#hidden_valor_3').val("");
				$('#hidden_valor_4').val("");
				$('#hidden_valor_5').val("");
				$('#comprar1').hide("slow");
			},

			success: function(respuesta) {
				console.log(respuesta);
				if(respuesta["contador1"]>=1){
					$('#busquedaGlobal1').html(respuesta['html']);
				}
			},

			error: function(respuesta) {
				console.log(respuesta['responseText']);
				$('#read_nombre1').val("");
				$('#hidden_documento1').val("");
				$('#hidden_quien1').val("");
				$('#hidden_cantidad_1').val("");
				$('#hidden_cantidad_2').val("");
				$('#hidden_cantidad_3').val("");
				$('#hidden_cantidad_4').val("");
				$('#hidden_cantidad_5').val("");
				$('#hidden_valor_1').val("");
				$('#hidden_valor_2').val("");
				$('#hidden_valor_3').val("");
				$('#hidden_valor_4').val("");
				$('#hidden_valor_5').val("");
				$('#comprar1').hide("slow");
			}
		});
	}

	function buscar1(){
		var documento = $('#documento1').val();
		var quien = $('#quien1').val();
		var modal_condicion1 = $('#modal_condicion1').val();
		/*************VALORES************/
		var cantidad_1 = $('#cantidad_1').val();
		var cantidad_2 = $('#cantidad_2').val();
		var cantidad_3 = $('#cantidad_3').val();
		var cantidad_4 = $('#cantidad_4').val();
		var cantidad_5 = $('#cantidad_5').val();
		var valor_1 = $('#valor_1').val();
		var valor_2 = $('#valor_2').val();
		var valor_3 = $('#valor_3').val();
		var valor_4 = $('#valor_4').val();
		var valor_5 = $('#valor_5').val();
		/********************************/
		$.ajax({
			type: 'POST',
			url: 'script/crud_general.php',
			dataType: "JSON",
			data: {
				"documento1": documento,
				"modal_condicion1": modal_condicion1,
				"quien": quien,
				"cantidad_1": cantidad_1,
				"cantidad_2": cantidad_2,
				"cantidad_3": cantidad_3,
				"cantidad_4": cantidad_4,
				"cantidad_5": cantidad_5,
				"valor_1": valor_1,
				"valor_2": valor_2,
				"valor_3": valor_3,
				"valor_4": valor_4,
				"valor_5": valor_5,
				"condicion": "busquedaGlobal2",
			},

			beforeSend: function(){
				$('#respuesta1').html("Buscando...");
				$('#hidden_documento1').val("");
				$('#hidden_cantidad_1').val("");
				$('#hidden_cantidad_2').val("");
				$('#hidden_cantidad_3').val("");
				$('#hidden_cantidad_4').val("");
				$('#hidden_cantidad_5').val("");
				$('#hidden_valor_1').val("");
				$('#hidden_valor_2').val("");
				$('#hidden_valor_3').val("");
				$('#hidden_valor_4').val("");
				$('#hidden_valor_5').val("");
			},

			success: function(respuesta) {
				console.log(respuesta);
				if(respuesta["contador1"]>=1){
					$('#read_nombre1').val(respuesta['nombre']);
					$('#hidden_documento1').val(documento);
					$('#hidden_quien1').val(quien);
					$('#hidden_cantidad_1').val(cantidad_1);
					$('#hidden_cantidad_2').val(cantidad_2);
					$('#hidden_cantidad_3').val(cantidad_3);
					$('#hidden_cantidad_4').val(cantidad_4);
					$('#hidden_cantidad_5').val(cantidad_5);
					$('#hidden_valor_1').val(valor_1);
					$('#hidden_valor_2').val(valor_2);
					$('#hidden_valor_3').val(valor_3);
					$('#hidden_valor_4').val(valor_4);
					$('#hidden_valor_5').val(valor_5);
					if(respuesta["estatus"]=='ok'){
						$('#comprar1').show("slow");
					}else if(respuesta["estatus"]=='Sin Saldo'){
						$('#hidden_documento1').val("");
						$('#hidden_quien1').val("");
						$('#hidden_cantidad_1').val("");
						$('#hidden_cantidad_2').val("");
						$('#hidden_cantidad_3').val("");
						$('#hidden_cantidad_4').val("");
						$('#hidden_cantidad_5').val("");
						$('#hidden_valor_1').val("");
						$('#hidden_valor_2').val("");
						$('#hidden_valor_3').val("");
						$('#hidden_valor_4').val("");
						$('#hidden_valor_5').val("");
						$('#comprar1').hide("slow");
						Swal.fire({
		 					title: 'Error',
		 					text: "Saldo Insuficiente!",
		 					icon: 'error',
		 					position: 'center',
		 					showConfirmButton: false,
		 					timer: 3000
						});
					}else if(respuesta["estatus"]=='Sin Cuenta'){
						$('#hidden_documento1').val("");
						$('#hidden_quien1').val("");
						$('#hidden_cantidad_1').val("");
						$('#hidden_cantidad_2').val("");
						$('#hidden_cantidad_3').val("");
						$('#hidden_cantidad_4').val("");
						$('#hidden_cantidad_5').val("");
						$('#hidden_valor_1').val("");
						$('#hidden_valor_2').val("");
						$('#hidden_valor_3').val("");
						$('#hidden_valor_4').val("");
						$('#hidden_valor_5').val("");
						$('#comprar1').hide("slow");
						Swal.fire({
		 					title: 'Error',
		 					text: "No tiene cuenta de Chaturbate o Stripchat!",
		 					icon: 'error',
		 					position: 'center',
		 					showConfirmButton: false,
		 					timer: 3000
						});
					}
				}else{
					$('#read_nombre1').val("");
					$('#hidden_documento1').val("");
					$('#hidden_quien1').val("");
					$('#hidden_cantidad_1').val("");
					$('#hidden_cantidad_2').val("");
					$('#hidden_cantidad_3').val("");
					$('#hidden_cantidad_4').val("");
					$('#hidden_cantidad_5').val("");
					$('#hidden_valor_1').val("");
					$('#hidden_valor_2').val("");
					$('#hidden_valor_3').val("");
					$('#hidden_valor_4').val("");
					$('#hidden_valor_5').val("");
					$('#comprar1').hide("slow");
				}
			},

			error: function(respuesta) {
				console.log(respuesta['responseText']);
			}
		});
	}

	function comprar1(){
		var condicion2 = "App";
		var documento = $('#hidden_documento1').val();
		var quien = $('#hidden_quien1').val();
		var modal_condicion1 = $('#modal_condicion1').val();
		var concepto1 = $('#concepto_1').val();
		var cantidad1 = $('#hidden_cantidad_1').val();
		var valor1 = $('#hidden_valor_1').val();

		var concepto2 = $('#concepto_2').val();
		var cantidad2 = $('#hidden_cantidad_2').val();
		var valor2 = $('#hidden_valor_2').val();

		var concepto3 = $('#concepto_3').val();
		var cantidad3 = $('#hidden_cantidad_3').val();
		var valor3 = $('#hidden_valor_3').val();

		var concepto4 = $('#concepto_4').val();
		var cantidad4 = $('#hidden_cantidad_4').val();
		var valor4 = $('#hidden_valor_4').val();

		var concepto5 = $('#concepto_5').val();
		var cantidad5 = $('#hidden_cantidad_5').val();
		var valor5 = $('#hidden_valor_5').val();

		if(concepto1!='' && valor1<500){
			Swal.fire({
				title: 'Error en el concepto "'+concepto1+'"',
				text: "El valor minimo debe ser 500 pesos",
				icon: 'error',
				showConfirmButton: true,
				confirmButtonColor: '#3085d6',
			});
			return false;
		}

		if(concepto2!='' && valor2<500){
			Swal.fire({
				title: 'Error en el concepto "'+concepto2+'"',
				text: "El valor minimo debe ser 500 pesos",
				icon: 'error',
				showConfirmButton: true,
				confirmButtonColor: '#3085d6',
			});
			return false;
		}

		if(concepto3!='' && valor3<500){
			Swal.fire({
				title: 'Error en el concepto "'+concepto3+'"',
				text: "El valor minimo debe ser 500 pesos",
				icon: 'error',
				showConfirmButton: true,
				confirmButtonColor: '#3085d6',
			});
			return false;
		}


		if(concepto4!='' && valor4<500){
			Swal.fire({
				title: 'Error en el concepto "'+concepto4+'"',
				text: "El valor minimo debe ser 500 pesos",
				icon: 'error',
				showConfirmButton: true,
				confirmButtonColor: '#3085d6',
			});
			return false;
		}

		if(concepto5!='' && valor5<500){
			Swal.fire({
				title: 'Error en el concepto "'+concepto5+'"',
				text: "El valor minimo debe ser 500 pesos",
				icon: 'error',
				showConfirmButton: true,
				confirmButtonColor: '#3085d6',
			});
			return false;
		}

		Swal.fire({
			title: 'Estas seguro?',
			text: "Luego no podrás revertir esta acción",
			icon: 'warning',
			showConfirmButton: true,
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Si, Efectuar el registro!',
			cancelButtonText: 'Cancelar'
		}).then((result) => {
			if (result.value) {
				$.ajax({
					type: 'POST',
					url: 'script/crud_general.php',
					dataType: "JSON",
					data: {
						"documento": documento,
						"quien": quien,
						"condicion2": condicion2,
						"modal_condicion1": modal_condicion1,
						"concepto1": concepto1,
						"cantidad1": cantidad1,
						"valor1": valor1,
						"concepto2": concepto2,
						"cantidad2": cantidad2,
						"valor2": valor2,
						"concepto3": concepto3,
						"cantidad3": cantidad3,
						"valor3": valor3,
						"concepto4": concepto4,
						"cantidad4": cantidad4,
						"valor4": valor4,
						"concepto5": concepto5,
						"cantidad5": cantidad5,
						"valor5": valor5,
						"condicion": "comprar1",
					},
					success: function(respuesta) {
						console.log(respuesta);
						if(respuesta["estatus"]=='ok'){
							printJS('buffet/ticket.pdf');
							$('#concepto_1').val("");
							$('#cantidad_1').val("");
							$('#valor_1').val("");
							$('#concepto_2').val("");
							$('#cantidad_2').val("");
							$('#valor_2').val("");
							$('#concepto_3').val("");
							$('#cantidad_3').val("");
							$('#valor_3').val("");
							$('#concepto_4').val("");
							$('#cantidad_4').val("");
							$('#valor_4').val("");
							$('#concepto_5').val("");
							$('#cantidad_5').val("");
							$('#valor_5').val("");
							$('#hidden_cantidad_1').val("");
							$('#hidden_valor_1').val("");
							$('#hidden_cantidad_2').val("");
							$('#hidden_valor_2').val("");
							$('#hidden_cantidad_3').val("");
							$('#hidden_valor_3').val("");
							$('#hidden_cantidad_4').val("");
							$('#hidden_valor_4').val("");
							$('#hidden_cantidad_5').val("");
							$('#hidden_valor_5').val("");
							$('#div_app1').hide("slow");
							$('#div_quien1').hide("slow");
						}

					},

					error: function(respuesta) {
						console.log(respuesta["responseText"]);
					}
				});
			}
		})
	}



</script>