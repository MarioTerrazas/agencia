<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Agencia de Gas San matias</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo $URL; ?>public/templeates/AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo $URL; ?>public/templeates/AdminLTE-3.2.0/dist/css/adminlte.min.css">
  <!-- Libreria de Sweetalert -->
   <script src="<?php echo $URL; ?>public/templeates/sweetalert/sweetalert2@11.js"></script>
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo $URL; ?>public/templeates/AdminLTE-3.2.0/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo $URL; ?>public/templeates/AdminLTE-3.2.0/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo $URL; ?>public/templeates/AdminLTE-3.2.0/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>
<body class="hold-transition sidebar-mini">

<?php

if (isset($_SESSION['mensaje']) && isset($_SESSION['icono'])) {
  $mensaje = $_SESSION['mensaje'];
  $icono = $_SESSION['icono'];
?>
<script>
  Swal.fire({
    position: "top-end",
    icon: "<?php echo $icono; ?>",
    title: "<?php echo $mensaje." ".$nombre_session; ?>",
    showConfirmButton: false,
    timer: 1500
  });
</script>
<?php
unset($_SESSION['mensaje']);
unset($_SESSION['icono']);
}
?>

<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>

      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Ag. Gas San Matias</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

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
    <a href="<?php echo $URL; ?>" class="brand-link">
      <img src="<?php echo $URL; ?>public/templeates/AdminLTE-3.2.0/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Ag. Gas San Matias</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
      <img src="<?php echo $URL; ?>view/usuarios/perfil/<?php echo !empty($_SESSION['imagen_session']) ? $_SESSION['imagen_session'] : 'default.png'; ?>" 
           class="img-circle elevation-2" 
           alt="User Image">
    </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $nombre_session; ?></a>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <!-- Modulo Usuario -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Usuarios
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $URL ?>view/usuarios" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lista de Usuarios</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $URL ?>view/usuarios/create.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Usuario Nuevo</p>
                </a>
              </li>
            </ul>
          </li>

          <!-- Modulo Rol -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-address-card"></i>
              <p>
                Roles
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $URL ?>view/roles" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lista de Roles</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $URL ?>view/roles/create.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Nuevo Rol</p>
                </a>
              </li>
            </ul>
          </li>
          
          <!-- Modulo Productos -->
<li class="nav-item">
  <a href="#" class="nav-link">
    <i class="nav-icon fas fa-boxes"></i>
    <p>
      Productos
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="<?php echo $URL ?>view/productos" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Lista de Productos</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo $URL ?>view/productos/create.php" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Producto Nuevo</p>
      </a>
    </li>
  </ul>
</li>

<!-- Modulo Camiones -->
<li class="nav-item">
  <a href="#" class="nav-link">
    <i class="nav-icon fas fa-truck"></i>
    <p>
      Camiones
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="<?php echo $URL ?>view/camiones" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Lista de Camiones</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo $URL ?>view/camiones/create.php" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Camión Nuevo</p>
      </a>
    </li>
  </ul>
</li>

<!-- Modulo Choferes -->
<li class="nav-item">
  <a href="#" class="nav-link">
    <i class="nav-icon fas fa-user-tie"></i>
    <p>
      Choferes
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="<?php echo $URL ?>view/choferes" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Lista de Choferes</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo $URL ?>view/choferes/create.php" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Chofer Nuevo</p>
      </a>
    </li>
  </ul>
</li>

<!-- Modulo Ayudantes -->
<li class="nav-item">
  <a href="#" class="nav-link">
    <i class="nav-icon fas fa-users"></i>
    <p>
      Ayudantes
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="<?php echo $URL ?>view/ayudantes" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Lista de Ayudantes</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo $URL ?>view/ayudantes/create.php" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Ayudante Nuevo</p>
      </a>
    </li>
  </ul>
</li>

<!-- Modulo Liquidaciones -->
<li class="nav-item">
  <a href="#" class="nav-link">
    <i class="nav-icon fas fa-file-invoice-dollar"></i>
    <p>
      Liquidaciones
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="<?php echo $URL ?>view/liquidaciones" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Lista de Liquidaciones</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo $URL ?>view/liquidaciones/create.php" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Liquidación Nueva</p>
      </a>
    </li>
  </ul>
</li>

<!-- Modulo Compras -->
<li class="nav-item">
  <a href="#" class="nav-link">
    <i class="nav-icon fas fa-shopping-cart"></i>
    <p>
      Compras
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="<?php echo $URL ?>view/compras" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Lista de Compras</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo $URL ?>view/compras/create.php" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Nueva Compra</p>
      </a>
    </li>
  </ul>
</li>

<!-- Modulo Gastos -->
<li class="nav-item">
  <a href="#" class="nav-link">
    <i class="nav-icon fas fa-money-bill"></i>
    <p>
      Gastos
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="<?php echo $URL ?>view/gastos" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Lista de Gastos</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo $URL ?>view/gastos/create.php" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Gasto Nuevo</p>
      </a>
    </li>
  </ul>
</li>

<!-- Modulo Inventario -->
<li class="nav-item">
  <a href="#" class="nav-link">
    <i class="nav-icon fas fa-warehouse"></i>
    <p>
      Inventario
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="<?php echo $URL ?>view/inventario" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Ver Inventario</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo $URL ?>view/inventario/update.php" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Actualizar Inventario</p>
      </a>
    </li>
  </ul>
</li>

<!-- Modulo Reportes -->
<li class="nav-item">
  <a href="#" class="nav-link">
    <i class="nav-icon fas fa-file-alt"></i>
    <p>
      Reportes
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="<?php echo $URL ?>view/reportes/gastos.php" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Reporte de Gastos</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo $URL ?>view/reportes/ingresos.php" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Reporte de Ingresos</p>
      </a>
    </li>
  </ul>
</li>

          <li class="nav-item">
            <a href="<?php echo $URL; ?>controllers/login/cerrar_session.php" class="nav-link bg-danger">
              <i class="nav-icon fas fa-door-closed"></i>
              <p>
                Cerrar Sesion
                
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>