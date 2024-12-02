<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Agencia</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../public/templeates/AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../public/templeates/AdminLTE-3.2.0/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../public/templeates/AdminLTE-3.2.0/dist/css/adminlte.min.css">
  <!-- Libreria de Sweetalert -->
  <script src="../public/templeates/sweetalert/sweetalert2@11.js"></script>
</head>
<body class="hold-transition login-page">

<?php
session_start();
if (isset($_SESSION['mensaje']) && isset($_SESSION['icono'])) {
  $mensaje = $_SESSION['mensaje'];
  $icono = $_SESSION['icono'];
?>
<script>
  Swal.fire({
    position: "top-end",
    icon: "<?php echo $icono; ?>",
    title: "<?php echo $mensaje; ?>",
    showConfirmButton: false,
    timer: 1500
  });
</script>
<?php
unset($_SESSION['mensaje']);
unset($_SESSION['icono']);
}
?>
<div class="login-box">

  <div class="row">
    <div class="col-md-12">
      <img src="../public/images/imagen-logo.jpg" alt="" width="100%">
    </div>
  </div>

  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="../public/templeates/AdminLTE-3.2.0/index2.html" class="h2">Ingreso Usuario</a>
    </div>
    <div class="card-body">

      <form action="../controllers/login/ingreso.php" method="post">
        <div class="input-group mb-3">
          <input name="email" type="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input name="u_password" type="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <hr>
        <div class="row">
          
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!-- /.social-auth-links -->

    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../public/templeates/AdminLTE-3.2.0/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../public/templeates/AdminLTE-3.2.0/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../public/templeates/AdminLTE-3.2.0/dist/js/adminlte.min.js"></script>
</body>
</html>