<?php
include('../../app/config.php');
include('../../layout/session.php');
include('../../layout/encabezado.php');
include('../../controllers/liquidaciones/show.php'); // Incluye el controlador que obtiene los datos de la liquidación
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">Detalles de la Liquidación</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
 
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-8">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Detalles de la Liquidación</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                </div>
              </div>

              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <form action="" method="post">
                      <!-- Tipo de Liquidación -->
                      <div class="form-group">
                        <label for="tipo">Tipo</label>
                        <input type="text" class="form-control" name="tipo" value="<?php echo $tipo; ?>" disabled>
                      </div>

                      <!-- Fecha de la Liquidación -->
                      <div class="form-group">
                        <label for="fecha">Fecha</label>
                        <input type="text" class="form-control" name="fecha" value="<?php echo $fecha; ?>" disabled>
                      </div>

                      <!-- Estado de la Liquidación -->
                      <div class="form-group">
                        <label for="estado">Estado</label>
                        <input type="text" class="form-control" name="estado" value="<?php echo $estado; ?>" disabled>
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
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
<?php 
include('../../layout/final.php');
?>
