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
    $ubicacion = 'inventario1';
    include('slider1.php');
    ?>

    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Inventario</h1>
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
              <input type="button" class="btn btn-success" value="Crear Producto" data-toggle="modal" data-target="#exampleModal1">
              <input type="button" class="btn btn-primary" value="Importar Productos" data-toggle="modal" data-target="#exampleModal3">
            </div>
            <div class="col-12">
              <table id="example" class="table row-border hover table-bordered" style="font-size: 12px;">
                <thead>
                  <tr>
                  <th class="text-center">ID Producto</th>
                  <th class="text-center">Nombre</th>
                  <th class="text-center">Modelo</th>
                  <th class="text-center">Cantidad</th>
                  <!--
                  <th class="text-center">Sede</th>
                  <th class="text-center">Tamaños</th>
                  <th class="text-center">Sabores</th>
                  <th class="text-center">Colores</th>
                  <th class="text-center">Fecha</th>
                  -->
                  <th class="text-center">Detalles</th>
                  <th class="text-center">Opciones</th>
                </tr>
              </thead>
              <tbody id="resultados">
                <?php
                include('../script/conexion.php');
                $consulta2 = "SELECT * FROM t_inventario GROUP BY id_producto";
                $resultado2 = mysqli_query($conexion,$consulta2);
                while($row2 = mysqli_fetch_array($resultado2)) {
                  $inventario_id            = $row2['id'];
                  $inventario_producto      = $row2['id_producto'];
                  /*
                  $inventario_cantidad      = $row2['cantidad'];
                  $inventario_colores       = $row2['colores'];
                  $inventario_tamanios      = $row2['tamanios'];
                  $inventario_sabores       = $row2['sabores'];
                  $inventario_estatus       = $row2['estatus'];
                  $inventario_sede          = $row2['sede'];
                  $inventario_fecha_inicio  = $row2['fecha_inicio'];
                  */
                  $inventario_responsable   = $row2['responsable'];

                  $html_colores = '';

                  $sql3 = "SELECT * FROM t_inventario WHERE id_producto = ".$inventario_producto." and colores != ''";
                  $resultado3 = mysqli_query($conexion,$sql3);
                  while($row3 = mysqli_fetch_array($resultado3)) {
                      $html_colores .= $row3['colores']." ";
                  }

                  if($inventario_responsable==''){
                    $responsable_nombre = 'Desconocido';
                  }else{
                    $sql4 = "SELECT * FROM t_usuarios WHERE id = ".$inventario_responsable;
                    $resultado4 = mysqli_query( $conexion,$sql4);
                    while($row4 = mysqli_fetch_array($resultado4)) {
                      $responsable_nombre = $row4['nombre'];
                    }
                  }

                  $sql5 = "SELECT * FROM t_productos WHERE id = ".$inventario_producto;
                  $resultado5 = mysqli_query( $conexion,$sql5);
                  while($row5 = mysqli_fetch_array($resultado5)) {
                    $producto_nombre = $row5['nombre'];
                    $producto_modelo = $row5['modelo'];
                  }

                  $sql6 = "SELECT SUM(cantidad) as cantidad FROM t_inventario WHERE id_producto = ".$inventario_producto;
                  $resultado6 = mysqli_query( $conexion,$sql6);
                  while($row6 = mysqli_fetch_array($resultado6)) {
                    $inventario_cantidad = $row6['cantidad'];
                  }

                  echo '
                    <tr id="tr_productos_'.$inventario_producto.'">
                      <td class="text-center">'.$inventario_producto.'</td>
                      <td class="text-center" style="text-transform: capitalize;">'.$producto_nombre.'</td>
                      <td class="text-center" style="text-transform: capitalize;">'.$producto_modelo.'</td>
                      <td class="text-center">'.$inventario_cantidad.'</td>
                  ';  ?>  
                      <td class="text-center">
                        <i class="fa fa-search" aria-hidden="true" style="cursor:pointer; font-size: 20px;" data-toggle="modal" data-target="#exampleModal4" onclick="detalles1(<?php echo $inventario_producto; ?>)"></i>
                      </td>
                  <?php
                  echo '
                      <td class="text-center">
                        <i class="fas fa-edit" style="color:#0095ff; cursor:pointer;" title="" data-toggle="modal" data-target="#exampleModal2" onclick="editar1('.$inventario_producto.');"></i>
                        <i class="fas fa-trash-alt ml-3" style="color:red; cursor:pointer;" data-toggle="popover-hover" onclick="eliminar1('.$inventario_producto.');"></i>
                      </td>
                    </tr>
                  ';
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
        <h5 class="modal-title" id="exampleModalLabel"><strong>Agregar Producto</strong></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="#" id="formulario_consultar_registro1">
          <div class="row">
            <div class="col-12 form-group form-check">
              <label for="add_buscador1">Buscador</label>
              <input type="search" name="add_buscador1" id="add_buscador1" list="listaProductos" class="form-control" onkeyup="buscarProducto1(value);" autocomplete="off" required>
              <datalist id="listaProductos">
                <option></option>
              </datalist>
            </div>
            <div class="col-12 form-group form-check">
              <label for="add_nombre1">Nombre</label>
              <input type="text" id="add_nombre1" name="add_nombre1" class="form-control" readonly required>
            </div>
            <div class="col-6 form-group form-check">
              <label for="add_marca1">Marca</label>
              <input type="text" id="add_marca1" name="add_marca1" class="form-control" readonly required>
            </div>
            <div class="col-6 form-group form-check">
              <label for="add_modelo1">Modelo</label>
              <input type="text" id="add_modelo1" name="add_modelo1" class="form-control" readonly required>
            </div>
            <div class="col-6 form-group form-check">
              <label for="add_categoria1">Categoria</label>
              <input type="text" id="add_categoria1" name="add_categoria1" class="form-control" readonly required>
            </div>
            <div class="col-6 form-group form-check">
              <label for="add_precio1">Precio</label>
              <input type="text" id="add_precio1" name="add_precio1" class="form-control" readonly required>
            </div>

            <div class="col-6 form-group form-check">
              <label for="add_cantidad1">Cantidad</label>
              <input type="number" id="add_cantidad1" name="add_cantidad1" class="form-control" required>
            </div>

            <div class="col-6 form-group form-check">
              <label for="add_sede1">Sede</label>
                <select class="form-control" name="add_sede1" id="add_sede1" required>
                  <option value="">Seleccione</option>
                  <?php
                  $sql6="SELECT * FROM t_sedes";
                  $resultado6 = mysqli_query($conexion,$sql6);
                  while($row6 = mysqli_fetch_array($resultado6)) {?>
                    <option value="<?php echo $row6["id"]; ?>"><?php echo $row6["nombre"]; ?></option>
                  <?php } ?>
                </select>
            </div>

            <div class="col-12 mb-3">
              <label for="add_imagen1">Imagen</label>
              <input type="file" id="add_imagen1" name="add_imagen1" class="form-control">
            </div>

            <div id="add_div1" class="col-12 form-group form-check" style="display: none;">
              <div class="col-12">
                <label for="add_agregar1">Agregar</label>
                <select class="form-control" name="add_agregar1" id="add_agregar1" onchange="agregar1(value);" required>
                  <option value="">Seleccione</option>
                  <option value="Color">Color</option>
                  <option value="Tamaño">Tamaño</option>
                  <option value="Sabor">Sabor</option>
                </select>
              </div>

              <div class="col-12 mt-3 mb-3" id="add_div_color1" style="display: none;">
                <div class="col-12">
                  <label for="add_color_nombre1">Color</label>
                  <input type="text" id="add_color_nombre1" name="add_color_nombre1" class="form-control">
                </div>
              </div>

              <div class="col-12 mt-3 mb-3" id="add_div_tamaño1" style="display: none;">
                <div class="col-12">
                  <label for="add_tamaño_alto1">Alto</label>
                  <input type="text" id="add_tamaño_alto1" name="add_tamaño_alto1" class="form-control">
                </div>
                <div class="col-12">
                  <label for="add_tamaño_ancho1">Ancho</label>
                  <input type="text" id="add_tamaño_ancho1" name="add_tamaño_ancho1" class="form-control">
                </div>
              </div>

              <div class="col-12 mt-3 mb-3" id="add_div_sabores1" style="display: none;">
                <div class="col-12">
                  <label for="add_sabor_nombre1">Sabores</label>
                  <input type="text" id="add_sabor_nombre1" name="add_sabor_nombre1" class="form-control">
                </div>
              </div>
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-success" id="submit_guardar1" disabled>Guardar</button>
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
              <div class="col-6 form-group form-check">
                <label for="edit_nombre1">Nombre</label>
                <input type="text" id="edit_nombre1" name="edit_nombre1" class="form-control" required>
              </div>
              <div class="col-6 form-group form-check">
                <label for="edit_precio1">Precio</label>
                <input type="text" id="edit_precio1" name="edit_precio1" class="form-control" required>
              </div>
              <div class="col-12 form-group form-check">
                <label for="edit_descripcion1">Descripción</label>
                <textarea class="form-control" id="edit_descripcion1" name="edit_descripcion1" required></textarea>
              </div>
              <div class="col-6 form-group form-check">
                <label for="edit_categoria1">Categoría</label>
                <select id="edit_categoria1" name="edit_categoria1" class="form-control" required>
                  <option value="">Seleccione</option>
                    <?php
                    $sql1 = "SELECT * FROM t_categorias";
                    $consulta1 = mysqli_query($conexion,$sql1);
                    while($row1 = mysqli_fetch_array($consulta1)) { ?>
                      <option style="text-transform: capitalize;" value="<?php echo $row1['id']; ?>"><?php echo $row1['nombre']; ?></option>
                    <?php } ?>
                </select>
              </div>
              <div class="col-6 form-group form-check">
                <label for="edit_estatus1">Estatus</label>
                <select id="edit_estatus1" name="edit_estatus1" class="form-control" required>
                  <option value="">Seleccione</option>
                    <option value="Activa">Activa</option>
                    <option value="Inactivo">Inactivo</option>
                    <option value="Proceso">Proceso</option>
                </select>
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
              <!--<button type="submit" class="btn btn-success" id="submit_detalles1">Guardar</button>-->
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
    var id              = $('#add_buscador1').val();
    var cantidad        = $('#add_cantidad1').val();
    var sede            = $('#add_sede1').val();
    var agregar         = $('#add_agregar1').val();

    var fd = new FormData();
    var files = $('#add_imagen1')[0].files[0];
    fd.append('file',files);
    fd.append('id',$('#add_buscador1').val());
    fd.append('cantidad',$('#add_cantidad1').val());
    fd.append('sede',$('#add_sede1').val());
    fd.append('agregar',$('#add_agregar1').val());
    fd.append('condicion','guardar2');

    if(agregar=='Color'){
      fd.append('color_nombre1',$('#add_color_nombre1').val());
      $.ajax({
        url: '../script/crud_productos1.php',
        type: 'POST',
        data: fd,
        contentType: false,
        processData: false,
        dataType: "JSON",

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
            //window.location.href = "inventario1.php";
          },2000);
        },

        error: function(response){
          $('#submit_guardar1').removeAttr('disabled','false');
          console.log(response['responseText']);
        }
      });
    }

    if(agregar=='Tamaño'){
      fd.append('alto',$('#add_tamaño_alto1').val());
      fd.append('ancho',$('#add_tamaño_ancho1').val());
      $.ajax({
        url: '../script/crud_productos1.php',
        type: 'POST',
        data: fd,
        contentType: false,
        processData: false,
        dataType: "JSON",

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
            //window.location.href = "inventario1.php";
          },2000);
        },

        error: function(response){
          $('#submit_guardar1').removeAttr('disabled','false');
          console.log(response['responseText']);
        }
      });
    }

    if(agregar=='Sabor'){
      fd.append('nombre1',$('#add_sabor_nombre1').val());
      $.ajax({
        url: '../script/crud_productos1.php',
        type: 'POST',
        data: fd,
        contentType: false,
        processData: false,
        dataType: "JSON",

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
            //window.location.href = "inventario1.php";
          },2000);
        },

        error: function(response){
          $('#submit_guardar1').removeAttr('disabled','false');
          console.log(response['responseText']);
        }
      });
    }

  });

  function editar1(id){
    $.ajax({
      url: '../script/crud_productos1.php',
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
        $('#edit_precio1').val(response['precio']);
        $('#edit_descripcion1').val(response['descripcion']);
        $('#edit_categoria1').val(response['categoria']);
        $('#edit_estatus1').val(response['estatus']);
      },

      error: function(response){
        console.log(response['responseText']);
      }
    });
  }

  $("#formulario_consultar_registro2").on("submit", function(e){
    e.preventDefault();
    var id            = $('#edit_id1').val();
    var nombre        = $('#edit_nombre1').val();
    var precio        = $('#edit_precio1').val();
    var descripcion   = $('#edit_descripcion1').val();
    var categoria     = $('#edit_categoria1').val();
    var estatus       = $('#edit_estatus1').val();

    $.ajax({
          url: '../script/crud_productos1.php',
          type: 'POST',
          dataType: "JSON",
          data: {
        "id": id,
        "nombre": nombre,
        "precio": precio,
        "descripcion": descripcion,
        "categoria": categoria,
        "estatus": estatus,
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
              window.location.href = "inventario1.php";
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
        url: '../script/crud_productos1.php',
        data: {
          "id": id,
          "condicion": 'eliminar2',
        },
        dataType: "JSON",
        success: function(respuesta) {
          Swal.fire({
            title: 'Registro Eliminado!',
            text: 'Redirigiendo...',
            icon: 'success',
            showConfirmButton: false
          });setTimeout(function() {
            window.location.href = "inventario1.php";
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
        var nombre = $('#update_nombre_colores_'+id).val();
        var cantidad = $('#update_cantidad_colores_'+id).val();
      }else if(value=='tamanios'){
        var nombre = $('#update_nombre_tamanios_'+id).val();
        var cantidad = $('#update_cantidad_tamanios_'+id).val();
      }else if(value=='sabores'){
        var nombre = $('#update_nombre_sabores_'+id).val();
        var cantidad = $('#update_cantidad_sabores_'+id).val();
      }
      $.ajax({
        type: 'POST',
        url: '../script/crud_productos1.php',
              dataType: "JSON",
        data: {
          "id": id,
          "value": value,
          "nombre": nombre,
          "cantidad": cantidad,
          "condicion": "guardar_cantidad1",
        },

        success: function(respuesta) {
          console.log(respuesta); 
          $('#detalles_respuesta1').html(respuesta["html1"]);
          $('#detalles_respuesta_colores1').html(respuesta["html_colores"]);
          $('#detalles_respuesta_tamanios1').html(respuesta["html_tamanios"]);
          $('#detalles_respuesta_sabores1').html(respuesta["html_sabores"]);
          Swal.fire({
            title: 'Guardado exitosamente!',
            text: "Limpiando Cache...",
            icon: 'success',
            position: 'center',
            showConfirmButton: true,
            timer: 2000
          });
        },

        error: function(respuesta) {
          console.log(respuesta['responseText']);
        }
      });
    }


</script>
