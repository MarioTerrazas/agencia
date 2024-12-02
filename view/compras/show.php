<?php
include('../../app/config.php');
include('../../layout/session.php');
include('../../layout/encabezado.php');
include('../../controllers/compras/show.php'); // Cambia el controlador a 'compras/show.php' si está en uso.
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">Detalles de la Compra</h1>
          </div>
        </div>
      </div>
    </div>
 
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-8">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Información de la Compra</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                </div>
              </div>

              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <form action="" method="post">
                      <!-- Campo Fecha -->
                      <div class="form-group">
                        <label for="">Fecha</label>
                        <input type="text" class="form-control" name="fecha" value="<?php echo $fecha; ?>" disabled>
                      </div>

                      <!-- Campo Proveedor -->
                      <div class="form-group">
                        <label for="">Proveedor</label>
                        <input type="text" class="form-control" name="proveedor" value="<?= $proveedor; ?>" disabled>
                      </div>

                      <!-- Campo Usuario ID -->
                      <div class="form-group">
                        <label for="">Usuario ID</label>
                        <input type="text" class="form-control" name="usuario_id" value="<?php echo $usuario_id ?>" disabled>
                      </div>

                      <div class="form-group">
                        <a href="index.php" class="btn btn-secondary">Regresar</a>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
<?php 
include('../../layout/final.php');
?>
