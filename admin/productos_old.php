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
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/logo1.png" alt="Admin" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
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
        <div class="col-12 mt-3" id="div_productos">
          <div class="row">
            <div class="col-12 text-right mt-3">
              <input type="submit" class="btn btn-success" value="Crear Producto" data-toggle="modal" data-target="#exampleModal1">
            </div>
            <div class="col-12" style="margin-top: 5rem;">
              <table id="example" class="table row-border hover table-bordered" style="font-size: 12px;">
                <thead>
                  <tr>
                  <th class="text-center">Nombre</th>
                  <th class="text-center">Descripción</th>
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
                  $producto_descripcion     = $row2['descripcion'];
                  $producto_precio      = $row2['precio'];
                  $producto_categoria     = $row2['categoria'];
                  $producto_estatus     = $row2['estatus'];
                  $producto_responsable   = $row2['responsable'];
                  $producto_fecha_inicio    = $row2['fecha_inicio'];

                  if($producto_responsable==''){
                    $responsable_nombre = 'Desconocido';
                  }else{
                    $sql3 = "SELECT * FROM usuarios WHERE id = ".$producto_responsable;
                    $resultado3 = mysqli_query( $conexion,$sql3);
                    while($row3 = mysqli_fetch_array($resultado3)) {
                      $responsable_nombre = $row3['nombre']." ".$row3['apellido'];
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
                          <td class="text-center" style="text-transform: capitalize;">'.$producto_nombre.'</td>
                          <td class="text-center">'.$producto_descripcion.'</td>
                          <td class="text-center">'.$producto_precio.'</td>
                          <td class="text-center">'.$categoria_nombre.'</td>
                          <td class="text-center">'.$producto_estatus.'</td>
                          <td class="text-center">'.$responsable_nombre.'</td>
                          <td class="text-center">'.$producto_fecha_inicio.'</td>
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

</body>
</html>

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

</script>
