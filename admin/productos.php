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
</head>
<body class="hold-transition sidebar-mini layout-fixed">

<style type="text/css">
.tr_señalada{
  background-color: #83f7034d;
  /*transition: opacity 500 ease-in-out;*/
  transition-property: all;
  transition-duration: 3s;
}
</style>

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
    $ubicacion = 'productos';
    include('slider1.php');
    ?>

    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Productos</h1>
            </div>
          </div>
        </div>
      </div>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="col-12" id="div_productos">
          <div class="row">

            <div class="col-12">
              <form action="index.php" method="post" enctype="multipart/form-data">
              <div class="fallback">
                  <input name="file" type="file" multiple />
              </div>
              <div id="actions" class="row">
                  <div class="col-lg-7">
                      <!-- The fileinput-button span is used to style the file input field as button -->
                      <span class="btn btn-success fileinput-button">
                          <i class="glyphicon glyphicon-plus"></i>
                          <span>Add files...</span>
                      </span>
                      <button type="submit" class="btn btn-primary start" style="display: none;">
                          <i class="glyphicon glyphicon-upload"></i>
                          <span>Start upload</span>
                      </button>
                      <button type="reset" class="btn btn-warning cancel" style="display: none;">
                          <i class="glyphicon glyphicon-ban-circle"></i>
                          <span>Cancel upload</span>
                      </button>
                  </div>
           
                  <div class="col-lg-5">
                      <!-- The global file processing state -->
                      <span class="fileupload-process">
                          <div id="total-progress" class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                              <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
                          </div>
                      </span>
                  </div>
              </div>
           
              <div class="table table-striped files" id="previews">
                  <div id="template" class="file-row row">
                      <!-- This is used as the file preview template -->
                      <div class="col-xs-12 col-lg-3">
                          <span class="preview" style="width:160px;height:160px;">
                              <img data-dz-thumbnail />
                          </span>
                          <br/>
                          <button class="btn btn-primary start" style="display:none;">
                              <i class="glyphicon glyphicon-upload"></i>
                              <span>Empezar</span>
                          </button>
                          <button data-dz-remove class="btn btn-warning cancel">
                              <i class="icon-ban-circle fa fa-ban-circle"></i> 
                              <span>Cancelar</span>
                          </button>
                          <button data-dz-remove class="btn btn-danger delete">
                              <i class="icon-trash fa fa-trash"></i> 
                              <span>Eliminar</span>
                          </button>
                      </div>
                      <div class="col-xs-12 col-lg-9">
                          <p class="name" data-dz-name></p>
                          <p class="size" data-dz-size></p>
                          <div>
                              <strong class="error text-danger" data-dz-errormessage></strong>
                          </div>
                          <div>
                              <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
           
              <div class="dropzone-here">Drop files here to upload.</div>
</form>
            </div>

            <div class="col-12 text-right">
              <input type="button" class="btn btn-success" value="Crear Producto" data-toggle="modal" data-target="#exampleModal1">
              <input type="button" class="btn btn-primary" value="Importar Productos" data-toggle="modal" data-target="#exampleModal3">
            </div>
            <div class="col-12">
              <table id="example" class="table row-border hover table-bordered" style="font-size: 12px;">
                <thead>
                  <tr>
                  <th class="text-center">ID</th>
                  <th class="text-center">Nombre</th>
                  <th class="text-center">Marca</th>
                  <th class="text-center">Modelo</th>
                  <th class="text-center">Precio</th>
                  <th class="text-center">Categoría</th>
                  <th class="text-center">Estatus</th>
                  <th class="text-center">Responsable</th>
                  <th class="text-center">Fecha</th>
                  <th class="text-center">Opciones</th>
                </tr>
              </thead>
              <tbody id="resultados">
                <?php
                include('../script/conexion.php');
                $consulta2 = "SELECT * FROM t_productos";
                $resultado2 = mysqli_query($conexion,$consulta2);
                while($row2 = mysqli_fetch_array($resultado2)) {
                  $producto_id        = $row2['id'];
                  $producto_nombre      = $row2['nombre'];
                  $producto_marca      = $row2['marca'];
                  $producto_modelo      = $row2['modelo'];
                  $producto_descripcion     = $row2['descripcion'];
                  $producto_precio      = $row2['precio'];
                  $producto_categoria     = $row2['categoria'];
                  $producto_estatus     = $row2['estatus'];
                  $producto_responsable   = $row2['responsable'];
                  $producto_fecha_inicio    = $row2['fecha_inicio'];

                  if($producto_responsable==''){
                    $responsable_nombre = 'Desconocido';
                  }else{
                    $sql3 = "SELECT * FROM t_usuarios WHERE id = ".$producto_responsable;
                    $resultado3 = mysqli_query( $conexion,$sql3);
                    while($row3 = mysqli_fetch_array($resultado3)) {
                      $responsable_nombre = $row3['nombre'];
                    }
                  }

                  if($producto_categoria==0 or $producto_categoria==''){
                    $categoria_nombre = 'Desconocido';
                  }else{
                    $sql4 = "SELECT * FROM t_categorias WHERE id = ".$producto_categoria;
                    $resultado4 = mysqli_query( $conexion,$sql4);
                    while($row4 = mysqli_fetch_array($resultado4)) {
                      $categoria_nombre = $row4['nombre'];
                    }
                  }

                  echo '
                    <tr id="tr_productos_'.$producto_id.'">
                          <td class="text-center" id="td_id_'.$producto_id.'">'.$producto_id.'</td>
                          <td class="text-center" id="td_nombre_'.$producto_id.'" style="text-transform: capitalize;">'.$producto_nombre.'</td>
                          <td class="text-center" id="td_marca_'.$producto_id.'">'.$producto_marca.'</td>
                          <td class="text-center" id="td_modelo_'.$producto_id.'">'.$producto_modelo.'</td>
                          <td class="text-center" id="td_precio_'.$producto_id.'">'.$producto_precio.'</td>
                          <td class="text-center" id="td_categoria_'.$producto_id.'">'.$categoria_nombre.'</td>
                          <td class="text-center" id="td_estatus_'.$producto_id.'">'.$producto_estatus.'</td>
                          <td class="text-center" id="td_responsable_'.$producto_id.'">'.$responsable_nombre.'</td>
                          <td class="text-center" id="td_fecha_'.$producto_id.'">'.$producto_fecha_inicio.'</td>
                          <td class="text-center">
                            <i class="fas fa-edit" style="color:#0095ff; cursor:pointer;" title="" data-toggle="modal" data-target="#exampleModal2" onclick="editar1('.$producto_id.');"></i>
                        <i class="fas fa-trash-alt ml-3" style="color:red; cursor:pointer;" data-toggle="popover-hover" onclick="eliminar1('.$producto_id.');"></i>
                      </td>
                    </tr>
                  ';
                }
                ?>
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
            <div class="col-6 form-group form-check">
              <label for="add_nombre1">Nombre</label>
              <input type="text" id="add_nombre1" name="add_nombre1" class="form-control" required>
            </div>
            <div class="col-6 form-group form-check">
              <label for="add_precio1">Precio</label>
              <input type="number" id="add_precio1" name="add_precio1" class="form-control" required>
            </div>
            <div class="col-6 form-group form-check">
              <label for="add_modelo1">Modelo</label>
              <input type="text" id="add_modelo1" name="add_modelo1" class="form-control" required>
            </div>
            <div class="col-6 form-group form-check">
              <label for="add_marca1">Marca</label>
              <input type="text" id="add_marca1" name="add_marca1" class="form-control" required>
            </div>
            <div class="col-12 form-group form-check">
              <label for="add_caracteristica1">Caracteristica 1</label>
              <textarea class="form-control" id="add_caracteristica1" name="add_caracteristica1" required></textarea>
            </div>
            <div class="col-6 form-group form-check">
              <label for="add_caracteristica2">Caracteristica 2</label>
              <textarea class="form-control" id="add_caracteristica2" name="add_caracteristica2"></textarea>
            </div>
            <div class="col-6 form-group form-check">
              <label for="add_caracteristica3">Caracteristica 3</label>
              <textarea class="form-control" id="add_caracteristica3" name="add_caracteristica3"></textarea>
            </div>
            <div class="col-6 form-group form-check">
              <label for="add_caracteristica4">Caracteristica 4</label>
              <textarea class="form-control" id="add_caracteristica4" name="add_caracteristica4"></textarea>
            </div>
            <div class="col-6 form-group form-check">
              <label for="add_caracteristica5">Caracteristica 5</label>
              <textarea class="form-control" id="add_caracteristica5" name="add_caracteristica5"></textarea>
            </div>
            <div class="col-6 form-group form-check">
              <label for="add_categoria1">Categoría</label>
              <select id="add_categoria1" name="add_categoria1" class="form-control" required>
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
              <label for="add_estatus1">Estatus</label>
              <select id="add_estatus1" name="add_estatus1" class="form-control" required>
                <option value="">Seleccione</option>
                <option value="Activo">Activo</option>
                <option value="Inactivo">Inactivo</option>
                <option value="Proceso">Proceso</option>
              </select>
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
    <div class="modal-dialog modal-lg">
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
              <!--
              <div class="col-12 form-group form-check">
                <label for="edit_descripcion1">Descripción</label>
                <textarea class="form-control" id="edit_descripcion1" name="edit_descripcion1" required></textarea>
              </div>
              -->
              <div class="col-6 form-group form-check">
                <label for="edit_modelo1">Modelo</label>
                <input type="text" id="edit_modelo1" name="edit_modelo1" class="form-control" required>
              </div>
              <div class="col-6 form-group form-check">
                <label for="edit_caracteristica1">Característica 1</label>
                <textarea class="form-control" id="edit_caracteristica1" name="edit_caracteristica1" required></textarea>
              </div>
              <div class="col-6 form-group form-check">
                <label for="edit_caracteristica2">Característica 2</label>
                <textarea class="form-control" id="edit_caracteristica2" name="edit_caracteristica2"></textarea>
              </div>
              <div class="col-6 form-group form-check">
                <label for="edit_caracteristica3">Característica 3</label>
                <textarea class="form-control" id="edit_caracteristica3" name="edit_caracteristica3"></textarea>
              </div>
              <div class="col-6 form-group form-check">
                <label for="edit_caracteristica4">Característica 4</label>
                <textarea class="form-control" id="edit_caracteristica4" name="edit_caracteristica4"></textarea>
              </div>
              <div class="col-6 form-group form-check">
                <label for="edit_caracteristica5">Característica 5</label>
                <textarea class="form-control" id="edit_caracteristica5" name="edit_caracteristica5"></textarea>
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
                    <option value="Activo">Activo</option>
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

  $("#formulario_consultar_registro1").on("submit", function(e){
    e.preventDefault();
    var nombre            = $('#add_nombre1').val();
    var precio            = $('#add_precio1').val();
    var modelo            = $('#add_modelo1').val();
    var marca             = $('#add_marca1').val();
    var caracteristica1   = $('#add_caracteristica1').val();
    var caracteristica2   = $('#add_caracteristica2').val();
    var caracteristica3   = $('#add_caracteristica3').val();
    var caracteristica4   = $('#add_caracteristica4').val();
    var caracteristica5   = $('#add_caracteristica5').val();
    var categoria         = $('#add_categoria1').val();
    var estatus           = $('#add_estatus1').val();

    $.ajax({
      url: '../script/crud_productos1.php',
      type: 'POST',
      data: {
        "nombre": nombre,
        "precio": precio,
        "modelo": modelo,
        "marca": marca,
        "caracteristica1": caracteristica1,
        "caracteristica2": caracteristica2,
        "caracteristica3": caracteristica3,
        "caracteristica4": caracteristica4,
        "caracteristica5": caracteristica5,
        "categoria": categoria,
        "estatus": estatus,
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
          window.location.href = "productos.php";
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
        $('#edit_modelo1').val(response['modelo']);
        //$('#edit_descripcion1').val(response['descripcion']);
        $('#edit_caracteristica1').val(response['caracteristica1']);
        $('#edit_caracteristica2').val(response['caracteristica2']);
        $('#edit_caracteristica3').val(response['caracteristica3']);
        $('#edit_caracteristica4').val(response['caracteristica4']);
        $('#edit_caracteristica5').val(response['caracteristica5']);
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
    var id                = $('#edit_id1').val();
    var nombre            = $('#edit_nombre1').val();
    var precio            = $('#edit_precio1').val();
    var caracteristica1   = $('#edit_caracteristica1').val();
    var caracteristica2   = $('#edit_caracteristica2').val();
    var caracteristica3   = $('#edit_caracteristica3').val();
    var caracteristica4   = $('#edit_caracteristica4').val();
    var caracteristica5   = $('#edit_caracteristica5').val();
    var categoria         = $('#edit_categoria1').val();
    var estatus           = $('#edit_estatus1').val();

    $.ajax({
          url: '../script/crud_productos1.php',
          type: 'POST',
          dataType: "JSON",
          data: {
            "id": id,
            "nombre": nombre,
            "precio": precio,
            "caracteristica1": caracteristica1,
            "caracteristica2": caracteristica2,
            "caracteristica3": caracteristica3,
            "caracteristica4": caracteristica4,
            "caracteristica5": caracteristica5,
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

            $('#tr_productos_'+id).addClass('tr_señalada');
            $('#td_nombre_'+id).val(response['nombre']);
            $('#td_modelo_'+id).val(response['modelo']);
            $('#td_precio_'+id).val(response['precio']);
            $('#td_categoria_'+id).val(response['categoria']);
            $('#td_estatus_'+id).val(response['estatus']);
            //$('#td_responsable_1').val(response['responsable']);
            //$('#td_fecha_1').val(response['fecha']);


            setTimeout(function() {
              $('#tr_productos_'+id).removeClass('tr_señalada');
              //window.location.href = "productos.php";
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
            window.location.href = "productos.php";
          },3500);
        },

        error: function(respuesta) {
          console.log("error..."+respuesta);
        }
      });
      }
    })
  }

    // Get the template HTML and remove it from the doument
    var previewNode = document.querySelector("#template");
    previewNode.id = "";
    var previewTemplate = previewNode.parentNode.innerHTML;
    previewNode.parentNode.removeChild(previewNode);
     
    var myDropzone = new Dropzone(document.body, {
        url: "../script/upload1.php",
        paramName: "file",
        acceptedFiles: 'image/*',
        maxFilesize: 2,
        maxFiles: 3,
        thumbnailWidth: 160,
        thumbnailHeight: 160,
        thumbnailMethod: 'contain',
        parallelUploads: 20,
        previewTemplate: previewTemplate,
        autoQueue: true,
        previewsContainer: "#previews",
        clickable: ".fileinput-button"
    });
     
    myDropzone.on("addedfile", function(file) {
        $('.dropzone-here').hide();
        // Hookup the start button
        file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file); };
    });
     
    // Update the total progress bar
    myDropzone.on("totaluploadprogress", function(progress) {
        document.querySelector("#total-progress .progress-bar").style.width = progress + "%";
    });
     
    myDropzone.on("sending", function(file) {
        // Show the total progress bar when upload starts
        document.querySelector("#total-progress").style.opacity = "1";
        // And disable the start button
        file.previewElement.querySelector(".start").setAttribute("disabled", "disabled");
    });
     
    // Hide the total progress bar when nothing's uploading anymore
    myDropzone.on("queuecomplete", function(progress) {
        //document.querySelector("#total-progress").style.opacity = "0";
    });
     
    // Setup the buttons for all transfers
    // The "add files" button doesn't need to be setup because the config
    // `clickable` has already been specified.
    document.querySelector("#actions .start").onclick = function() {
        myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED));
    };
     
    $('#previews').sortable({
        items:'.file-row',
        cursor: 'move',
        opacity: 0.5,
        containment: "parent",
        distance: 20,
        tolerance: 'pointer',
        update: function(e, ui){
            //actions when sorting
        }
    });

    $("#formulario_archivo1").on("submit", function(e){
    e.preventDefault();
        var fd = new FormData();
        var files = $('#importar_archivo1')[0].files[0];
        fd.append('file',files);
        fd.append('condicion','productos');

        $.ajax({
            url: '../script/crud_archivos.php',
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
                //window.location.href = "index.php";
            },2000);
              }
            },

            error: function(response){
              $('#submit_importar1').removeAttr('disabled');
              console.log(response['responseText']);
            }
        });
    });

</script>
