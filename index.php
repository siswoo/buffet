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
			<button class="btn btn-info" style="font-size: 40px;" data-toggle="modal" data-target="#exampleModal1" onclick="almuerzos1();">OTROS</button>
		</div>
		<div class="col-12 text-center mt-3">
			<button class="btn btn-danger" style="font-size: 40px;" onclick="printJS('buffet/ticket.pdf')">Reimprimir</button>
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
					<form action="#" id="formulario1" method="POST">
					<div class="row">
						<div id="div_adicionales" class="col-12 text-center" style="font-weight:bold; font-size: 20px;">ADICIONALES</div>
						<div id="div_adicionales" class="col-12 text-center">
							<!--<button class="btn btn-primary" id="button">Adicionales</button>-->
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
		var precio = 6000;
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


</script>