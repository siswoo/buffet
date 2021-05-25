<?php
session_start();
if(@$_SESSION["id"]=='' or $_SESSION["id"]==null or $_SESSION["id"]==0){ ?>
  <script type="text/javascript">
    window.location.href = "index.php";
  </script>
  <?php exit; }
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

<style type="text/css">

</style>

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
    $ubicacion = 'menu';
    include('slider1.php');
    ?>

    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Menú Semanal</h1>
            </div>
          </div>
        </div>
      </div>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12" data-toggle="modal" data-target="#exampleModal1">
              
          </div>
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

<!-- Modal Modificar -->
  <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modificar Menú</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
          <form action="#" id="modal_formulario_modificar">
            <div class="row">
              <input type="hidden" id="edit_id1" name="edit_id1" value="">
              <div class="col-12 form-group form-check">
                <label for="edit_nombre1">Nombre del Menú</label>
                <input type="text" id="edit_nombre1" name="edit_nombre1" autocomplete="off" class="form-control" required>
              </div>
              <div class="col-6 form-group form-check">
                <label for="edit_precio1">Precio</label>
                <input type="text" id="edit_precio1" name="edit_precio1" autocomplete="off" class="form-control" required>
              </div>
              <div class="col-6 form-group form-check">
                <label for="edit_dia1">Día Mostrado</label>
                <input type="text" id="edit_dia1" name="edit_dia1" autocomplete="off" class="form-control" value="Lunes" readonly required>
              </div>
              <div class="col-12 form-group form-check">
                <label for="edit_imagen1">Imagen</label>
                <input type="file" id="edit_imagen1" name="edit_imagen1" class="form-control" required>
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
<!-- FIN Modificar -->

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

  $("#modal_formulario_modificar").on("submit", function(e){
    e.preventDefault();
    var f = $(this);
    var fd = new FormData();
    var files = $('#edit_imagen1')[0].files[0];
    fd.append('imagen',files);
    fd.append('id',$('#edit_id1').val());
    fd.append('nombre',$('#edit_nombre1').val());
    fd.append('precio',$('#edit_precio1').val());
    fd.append('dia',$('#edit_dia1').val());
    fd.append('condicion',"editar");

    $.ajax({
      url: '../script/crud_semanal.php',
      type: 'POST',
      dataType: "JSON",
      data: fd,
      contentType: false,
      processData: false,

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
      },

      error: function(response){
        $('#submit_editar1').removeAttr('disabled','false');
        console.log(response['responseText']);
      },

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
</script>
