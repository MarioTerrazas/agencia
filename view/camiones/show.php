<?php
include('../../app/config.php');
include('../../layout/session.php');
include('../../layout/encabezado.php');
include('../../controllers/camiones/show.php');
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">Datos del Camión</h1>
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
                <h3 class="card-title">Detalles del Camión</h3>
                <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
                </div>

                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="" method="post">
                                <!-- Campo Placa -->
                                <div class="form-group">
                                    <label for="">Placa</label>
                                    <input type="text" class="form-control" name="placa" value="<?php echo $placa; ?>" disabled>
                                </div>

                                <!-- Campo Modelo -->
                                <div class="form-group">
                                    <label for="">Modelo</label>
                                    <input type="text" class="form-control" name="modelo" value="<?= $modelo; ?>" disabled>
                                </div>

                                <!-- Campo Capacidad -->
                                <div class="form-group">
                                    <label for="">Capacidad (en garrafas)</label>
                                    <input type="text" class="form-control" name="capacidad" value="<?php echo $capacidad ?>" disabled>
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
