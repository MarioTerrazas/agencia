<?php
include('../../app/config.php');
include('../../layout/session.php');
include('../../layout/encabezado.php');
include('../../controllers/gastos/show.php'); // Incluye el controlador que obtiene los datos del gasto
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">Detalles del Gasto</h1>
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
                <h3 class="card-title">Datos del Gasto</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>

              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <form action="" method="post">
                      <!-- Tipo de Gasto -->
                      <div class="form-group">
                        <label for="tipo">Tipo de Gasto</label>
                        <input type="text" class="form-control" name="tipo" value="<?php echo $tipo; ?>" disabled>
                      </div>

                      <!-- Monto del Gasto -->
                      <div class="form-group">
                        <label for="monto">Monto</label>
                        <input type="text" class="form-control" name="monto" value="<?= $monto; ?>" disabled>
                      </div>

                      <!-- Descripción del Gasto -->
                      <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <input type="text" class="form-control" name="descripcion" value="<?php echo $descripcion ?>" disabled>
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
