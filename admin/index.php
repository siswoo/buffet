<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
<?php
    session_start();
    session_destroy();
?>
</head>
<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      CAMALEON BUFFET
    </div>
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Logueate</p>
        <form method="POST" id="formulario1">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="User" name="user" id="user" autocomplete="off" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" name="password" id="password" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <button type="submit" class="btn btn-primary" name="login">Loguearse</button>
              <button type="submit" class="btn btn-info float-right">
                <a href="../index.php" style="color: white;">Buffet</a>
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>

</body>
</html>

<script src="../js/jquery-3.5.1.min.js"></script>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<script type="text/javascript">
  $("#formulario1").on("submit", function(e){
    e.preventDefault();

    var user = $('#user').val();
    var password = $('#password').val();

    $.ajax({
    type: 'POST',
    url: '../script/crud_login.php',
    dataType: "JSON",
    data: {
      "condicion": 'login1',
      "user": user,
      "password": password,
    },

    success: function(respuesta) {
      console.log(respuesta);

      if(respuesta['estatus']=='error'){
        Swal.fire({
          position: 'center',
          icon: 'error',
          title: 'Usuario incorrecto...!',
          showConfirmButton: true,
          timer: 3000
        })
        return false;
      }

      if(respuesta['estatus']=='ok'){
        window.location.href = "index2.php";
      }
    },

    error: function(respuesta) {
      console.log(respuesta['responseText']);
    }
  });
});

</script>