<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
  <link rel="stylesheet" href="plugins/dropzone1/dist/dropzone.css">
  <link rel="stylesheet" type="text/css" href="../resources/lightbox/src/css/lightbox.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/logo1.png" alt="Admin" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button">
          <i class="fas fa-bars" style="color:black;font-size: 25px;"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index2.php" class="brand-link">
      <img src="dist/img/logo1.png" alt="Admin" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin</span>
    </a>

    <?php
    $ubicacion = 'sedes';
    include('slider1.php');
    ?>

    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Sedes</h1>
            </div>
          </div>
        </div>
      </div>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="col-12" id="div_productos">
          <div class="row">
            <div class="col-12 text-right">
              <input type="button" class="btn btn-success" value="Crear Sede" data-toggle="modal" data-target="#exampleModal1">
            </div>
            <div class="col-12">
              <table id="example" class="table row-border hover table-bordered" style="font-size: 12px;">
                <thead>
                  <tr>
                  <th class="text-center">ID Sede</th>
                  <th class="text-center">Nombre</th>
                  <th class="text-center">Responsable</th>
                  <th class="text-center">Fecha Inicio</th>
                  <th class="text-center">Opciones</th>
                </tr>
              </thead>
              <tbody id="resultados">
                <?php
                include('../script/conexion.php');
                $consulta2 = "SELECT * FROM t_sedes";
                $resultado2 = mysqli_query($conexion,$consulta2);
                while($row2 = mysqli_fetch_array($resultado2)) {
                  $id = $row2['id'];
                  $nombre = $row2['nombre'];
                  $responsable = $row2['responsable'];
                  $fecha_inicio = $row2['fecha_inicio'];

                  $sql3 = "SELECT * FROM t_usuarios WHERE id = ".$responsable;
                  $resultado3 = mysqli_query($conexion,$sql3);
                  while($row3 = mysqli_fetch_array($resultado3)) {
                      $responsable_nombre = $row3['nombre']." ";
                  }

                  echo '
                    <tr id="tr_sedes_'.$id.'">
                      <td class="text-center">'.$id.'</td>
                      <td class="text-center">'.$nombre.'</td>
                      <td class="text-center" style="text-transform: capitalize;">'.$responsable_nombre.'</td>
                      <td class="text-center" style="text-transform: capitalize;">'.$fecha_inicio.'</td>
                  ';

                  echo '
                    <td class="text-center">
                        <i class="fas fa-edit" style="color:#0095ff; cursor:pointer;" title="" data-toggle="modal" data-target="#exampleModal2" onclick="editar1('.$id.');"></i>
                  ';

                  if($id==1 or $id==2 or $id==3 or $id==4){
                  echo '
                        <i class="fas fa-trash-alt ml-3" style="color:gray; cursor:pointer;" disabled></i>
                      </td>
                    </tr>
                  ';  
                  }else{
                  echo '
                        <i class="fas fa-trash-alt ml-3" style="color:red; cursor:pointer;" data-toggle="popover-hover" onclick="eliminar1('.$id.');"></i>
                      </td>
                    </tr>
                  ';
                  }
                } ?>
              </tbody>
            </table>
          </div>
      </div>
    </div>
  </div>
</section>
</div>

<?php
include('footer.php');
?>

</div>

<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="plugins/chart.js/Chart.min.js"></script>
<script src="plugins/sparklines/sparkline.js"></script>
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="dist/js/adminlte.js"></script>
<script src="../js/jquery.dataTables.min.js"></script>
<script src="../js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="plugins/dropzone1/dist/dropzone.js"></script>
<script src="../resources/lightbox/src/js/lightbox.js"></script>
</body>
</html>

<!-- Modal Crear 1 -->
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><strong>Agregar Sede</strong></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="#" id="formulario_consultar_registro1">
          <div class="row">
            <div class="col-12 form-group form-check">
              <label for="add_nombre1">Nombre</label>
              <input type="text" id="add_nombre1" name="add_nombre1" class="form-control" autocomplete="off" required>
            </div>
            <div class="col-12 form-group form-check">
              <label for="add_direccion1">Dirección</label>
              <textarea id="add_direccion1" name="add_direccion1" class="form-control" autocomplete="off" required></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-success" id="submit_guardar1">Guardar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- FIN Crear 1 -->

<!-- Modal Modificar 1 -->
  <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modificar Producto</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
          <form action="#" id="formulario_consultar_registro2">
            <div class="row">
              <input type="hidden" id="edit_id1" name="edit_id1" value="">
              <div class="col-12 form-group form-check">
                <label for="edit_nombre1">Nombre</label>
                <input type="text" id="edit_nombre1" name="edit_nombre1" class="form-control" required>
              </div>
              <div class="col-12 form-group form-check">
                <label for="edit_direccion1">Dirección</label>
                <textarea class="form-control" id="edit_direccion1" name="edit_direccion1" required></textarea>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-success" id="submit_editar1">Guardar</button>
            </div>
          </form>
        </div>
      </div>
  </div>
</div>
<!-- FIN Modificar 1 -->

<!-- Modal Importar 1 -->
  <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Importar Productos</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
          <form action="#" id="formulario_archivo1">
            <div class="row">
              <div class="col-12 form-group form-check">
                <label for="importar_archivo1">Archivo</label>
                <input type="file" class="form-control" name="importar_archivo1" id="importar_archivo1" required>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-success" id="submit_importar1">Guardar</button>
            </div>
          </form>
        </div>
      </div>
  </div>
</div>
<!-- FIN Importar 1 -->

<!-- Modal Detalles 1 -->
  <div class="modal fade" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Importar Productos</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
          <form action="#" id="formulario_detalles1">
            <div class="row" id="detalles_respuesta1"></div>
            <div class="row" id="detalles_respuesta_colores1"></div>
            <div class="row" id="detalles_respuesta_tamanios1"></div>
            <div class="row" id="detalles_respuesta_sabores1"></div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-success" id="submit_detalles1">Guardar</button>
            </div>
          </form>
        </div>
      </div>
  </div>
</div>
<!-- FIN Detalles 1 -->

<script type="text/javascript">
  $(document).ready(function() {
    var table = $('#example').DataTable( {
      "lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],

      "language": {
        "lengthMenu": "Mostrar _MENU_ Registros por página",
        "zeroRecords": "No se ha encontrado resultados",
        "info": "Ubicado en la página <strong>_PAGE_</strong> de <strong>_PAGES_</strong>",
        "infoEmpty": "Sin registros actualmente",
        "infoFiltered": "(Filtrado de <strong>_MAX_</strong> total registros)",
        "paginate": {
          "first":      "Primero",
          "last":       "Última",
          "next":       "Siguiente",
          "previous":   "Anterior"
        },
      "search": "Buscar",
      },

    "paging": true
    } );
  } );


  $('#myModal').on('shown.bs.modal', function () {
    $('#myInput').trigger('focus')
  });

  /************LLAMAR LIBRERIAS************/
  lightbox.option({
    'resizeDuration': 200,
    'wrapAround': true
  })
  /***************************************/

  $("#formulario_consultar_registro1").on("submit", function(e){
    e.preventDefault();
    var nombre        = $('#add_nombre1').val();
    var direccion     = $('#add_direccion1').val();

    $.ajax({
      url: '../script/crud_sedes.php',
      type: 'POST',
      dataType: "JSON",
      data: {
        "nombre": nombre,
        "direccion": direccion,
        "condicion": 'guardar',
      },

      beforeSend: function (){
        $('#submit_guardar1').attr('disabled','true');
      },

      success: function(response){
        console.log(response);
        $('#submit_guardar1').removeAttr('disabled','false');
        Swal.fire({
          title: 'Agregado',
          text: "Proceso Exitoso",
          icon: 'success',
          position: 'center',
          showConfirmButton: false,
          timer: 3000
        });
        setTimeout(function() {
          //window.location.href = "sedes1.php";
        },2000);
      },

      error: function(response){
        $('#submit_guardar1').removeAttr('disabled','false');
        console.log(response['responseText']);
      }
    });
  });

  function editar1(id){
    $.ajax({
      url: '../script/crud_sedes.php',
      type: 'POST',
      dataType: "JSON",
      data: {
        "id": id,
        "condicion": 'consultar',
      },

      success: function(response){
        console.log(response);
        $('#edit_id1').val(response['id']);
        $('#edit_nombre1').val(response['nombre']);
        $('#edit_direccion1').val(response['direccion']);
      },

      error: function(response){
        console.log(response['responseText']);
      }
    });
  }

  $("#formulario_consultar_registro2").on("submit", function(e){
    e.preventDefault();
    var id          = $('#edit_id1').val();
    var nombre      = $('#edit_nombre1').val();
    var direccion   = $('#edit_direccion1').val();

    $.ajax({
          url: '../script/crud_sedes.php',
          type: 'POST',
          dataType: "JSON",
          data: {
            "id": id,
            "nombre": nombre,
            "direccion": direccion,
            "condicion": 'editar',
          },

          beforeSend: function (){
              $('#submit_editar1').attr('disabled','true');
          },

          success: function(response){
            console.log(response);
            $('#submit_editar1').removeAttr('disabled','false');
            Swal.fire({
              title: 'Modificado',
              text: "Proceso Exitoso",
              icon: 'success',
              position: 'center',
              showConfirmButton: false,
              timer: 3000
            });
            setTimeout(function() {
              //window.location.href = "sedes1.php";
            },2000);
          },

          error: function(response){
            $('#submit_editar1').removeAttr('disabled','false');
            console.log(response['responseText']);
          }
      });
    });

  function eliminar1(id){
    Swal.fire({
      title: 'Estas seguro?',
      text: "Esta acción no podra revertirse",
      icon: 'warning',
      showConfirmButton: true,
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si, Eliminar registro!',
      cancelButtonText: 'Cancelar'
    }).then((result) => {
      if (result.value) {
        $.ajax({
        type: 'POST',
        url: '../script/crud_sedes.php',
        data: {
          "id": id,
          "condicion": 'eliminar',
        },
        dataType: "JSON",
        success: function(respuesta) {
          Swal.fire({
            title: 'Registro Eliminado!',
            text: 'Redirigiendo...',
            icon: 'success',
            showConfirmButton: false
          });setTimeout(function() {
            window.location.href = "sedes1.php";
          },3500);
        },

        error: function(respuesta) {
          console.log("error..."+respuesta);
        }
      });
      }
    })
  }

    $("#formulario_archivo1").on("submit", function(e){
    e.preventDefault();
        var fd = new FormData();
        var files = $('#importar_archivo1')[0].files[0];
        fd.append('file',files);
        fd.append('condicion','productos');

        $.ajax({
            url: '../script/crud_archivos1.php',
            type: 'POST',
            data: fd,
            dataType: "JSON",
            contentType: false,
            processData: false,

            beforeSend: function (){
              $('#submit_importar1').attr('disabled','true');
            },

            success: function(response){
              console.log(response);
              $('#submit_importar1').removeAttr('disabled');
              if(response['estatus']=='error'){
                Swal.fire({
                  title: 'Formato Invalido',
                  text: "Formato Validos -> xls xml xlam xlsx",
                  icon: 'error',
                  position: 'center',
                  showConfirmButton: false,
                  timer: 3000
                });
                return false;
              }else{
                Swal.fire({
                  title: 'Guardado exitosamente!',
                  text: "Limpiando Cache...",
                  icon: 'success',
                  position: 'center',
                  showConfirmButton: true,
                  timer: 2000
                });
                setTimeout(function() {
                window.location.href = "index.php";
            },2000);
              }
            },

            error: function(response){
              $('#submit_importar1').removeAttr('disabled');
              console.log(response['responseText']);
            }
        });
    });

    function buscarProducto1(value){
      var cantidad = value.length;
      
      if(cantidad == 0){
        return false;
      }

      $.ajax({
        type: 'POST',
        url: '../script/crud_productos1.php',
              dataType: "JSON",
        data: {
          "value": value,
          "cantidad": cantidad,
          "condicion": "consultar2",
        },

        success: function(respuesta) {
          console.log(respuesta);

            if(respuesta['pase']==1){
              $('#listaProductos').html(respuesta['html']);
              $('#submit_guardar1').attr('disabled','true');
              $('#add_div1').hide('slow');
            }

            if(respuesta['pase']==2){
              $('#add_nombre1').val(respuesta['nombre']);
              $('#add_marca1').val(respuesta['marca']);
              $('#add_modelo1').val(respuesta['modelo']);
              $('#add_precio1').val(respuesta['precio']);
              $('#add_categoria1').val(respuesta['categoria']);
              $('#submit_guardar1').removeAttr('disabled');
              $('#add_div1').show('slow');
            }

            if(respuesta['pase']==0){
              $('#add_nombre1').val('');
              $('#add_marca1').val('');
              $('#add_modelo1').val('');
              $('#add_precio1').val('');
              $('#add_categoria1').val('');
              $('#submit_guardar1').attr('disabled','true');
              $('#add_div1').hide('slow');
            }
        },

        error: function(respuesta) {
          console.log(respuesta['responseText']);
        }
      });
    }

    function agregar1(value){
      console.log(value);
      if(value=='Color'){
        $('#add_div_color1').show('slow');
        $('#add_div_tamaño1').hide('slow');
        $('#add_div_sabores1').hide('slow');
      }
      if(value=='Tamaño'){
        $('#add_div_tamaño1').show('slow');
        $('#add_div_color1').hide('slow');
        $('#add_div_sabores1').hide('slow');
      }
      if(value=='Sabor'){
        $('#add_div_sabores1').show('slow');
        $('#add_div_tamaño1').hide('slow');
        $('#add_div_color1').hide('slow');
      }
      if(value==''){
        $('#add_div_sabores1').hide('slow');
        $('#add_div_tamaño1').hide('slow');
        $('#add_div_color1').hide('slow');
      }
    }

    function detalles1(id){
      $.ajax({
        type: 'POST',
        url: '../script/crud_productos1.php',
              dataType: "JSON",
        data: {
          "id": id,
          "condicion": "consultar3",
        },

        success: function(respuesta) {
          //console.log(respuesta);
          $('#detalles_respuesta1').html(respuesta["html1"]);
          $('#detalles_respuesta_colores1').html(respuesta["html_colores"]);
          $('#detalles_respuesta_tamanios1').html(respuesta["html_tamanios"]);
          $('#detalles_respuesta_sabores1').html(respuesta["html_sabores"]);
        },

        error: function(respuesta) {
          console.log(respuesta['responseText']);
        }
      });
    }

    function editar_inventario1 (id,value){
      if(value=='colores'){
        var cantidad = $('#update_cantidad_colores_'+id).val();
      }else if(value=='tamanios'){
        var cantidad = $('#update_cantidad_tamanios_'+id).val();
      }else if(value=='sabores'){
        var cantidad = $('#update_cantidad_sabores_'+id).val();
      }
      $.ajax({
        type: 'POST',
        url: '../script/crud_productos1.php',
              dataType: "JSON",
        data: {
          "id": id,
          "value": value,
          "cantidad": cantidad,
          "condicion": "guardar_cantidad1",
        },

        success: function(respuesta) {
          console.log(respuesta);
          $('#detalles_respuesta1').html(respuesta["html1"]);
          $('#detalles_respuesta_colores1').html(respuesta["html_colores"]);
          $('#detalles_respuesta_tamanios1').html(respuesta["html_tamanios"]);
          $('#detalles_respuesta_sabores1').html(respuesta["html_sabores"]);
        },

        error: function(respuesta) {
          console.log(respuesta['responseText']);
        }
      });
    }


</script>
