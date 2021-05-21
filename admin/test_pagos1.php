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
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

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
      $ubicacion = 'test_pagos1';
      include('slider1.php');
      ?>

    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Test de Pagos</h1>
            </div>
          </div>
        </div>
      </div>

    <section>
      <div class="row">
        <div class="col-12 ml-3 mb-3" style="font-size: 25px; font-weight: bold;">
          Notas de Versión
        </div>

        <?php
          $merchantId = '508029';
          $ApiKey = '4Vj8eK4rloUd272L48hsrarnUA';
          $referenceCode = 'TestPayUjuanmaldonado12';
          $accountId = '512321';
          $description = 'Test PAYU';
          $amount = '3';
          $tax = '0';
          $taxReturnBase = '0';
          $currency = 'COP';
          $signature = 'ba9ffa71559580175585e45ce70b6c37';
          $test = '1';
          $buyerEmail = 'test@test.com';
          //$cadena = 'mDFZzrgaQwgwj7faOqvw7B6U8n~920566~TestPayU~20000~COP';
          $cadena =  $ApiKey."~".$merchantId."~".$referenceCode."~".$amount."~".$currency;
          $md5 = md5($cadena);
        ?>

        <div class="col-12 ml-3" style="font-size: 18px;">
          <form method="post" action="https://sandbox.checkout.payulatam.com/ppp-web-gateway-payu/" target="_blank">
            <div class="row">
              <div class="col-6">
                <input name="merchantId" class="form-control" type="text"  value="<?php echo $merchantId; ?>"   >
              </div>
              <div class="col-6">
                <input name="accountId" class="form-control" type="text"  value="<?php echo $accountId; ?>" >
              </div>
              <div class="col-6">
                <input name="description" class="form-control" type="text"  value="<?php echo $description; ?>"  >
              </div>
              <div class="col-6">
                <input name="referenceCode" class="form-control" type="text"  value="<?php echo $referenceCode; ?>" >
              </div>
              <div class="col-6">
                <input name="amount" class="form-control" type="text"  value="<?php echo $amount; ?>"   >
              </div>
              <div class="col-6">
                <input name="tax" class="form-control" type="text"  value="<?php echo $tax; ?>"  >
              </div>
              <div class="col-6">
                <input name="taxReturnBase" class="form-control" type="text"  value="<?php echo $taxReturnBase; ?>" >
              </div>
              <div class="col-6">
                <input name="currency" class="form-control" type="text"  value="<?php echo $currency; ?>" >
              </div>
              <div class="col-6">
                <input name="signature" class="form-control" type="text"  value="<?php echo $md5; ?>"  >
              </div>
              <div class="col-6">
                <input name="test" class="form-control" type="text"  value="1" >
              </div>
              <div class="col-6">
                <input name="tx_value" class="form-control" class="form-control" type="text"  value="3" >
              </div>
              <div class="col-6">
                <input name="buyerEmail" class="form-control" type="text"  value="juanmaldonado.co@gmail.com" >
              </div>
              <div class="col-6">
                <input name="responseUrl" class="form-control" type="text"  value="http://www.test.com/response" >
              </div>
              <div class="col-6">
                <input name="confirmationUrl" class="form-control" type="text"  value="http://www.test.com/confirmation" >
              </div>
              <div class="col-12">
              </div>
              <div class="col-12 text-center mt-3">
                <input name="Submit" class="btn btn-success" type="submit"  value="Enviar" >
              </div>
            </div>
          </form>
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
<script src="dist/js/demo.js"></script>
</body>
</html>
