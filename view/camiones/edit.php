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
            <h1 class="m-0">Editar datos del Camión</h1>
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
            <div class="card card-success">
                <div class="card-header">
                <h3 class="card-title">Datos del Camión</h3>
                <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
                </div>

                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="../../controllers/camiones/edit.php" method="post">
                                <input type="text" name="camion_id" value="<?php echo $camion_id_get; ?>" hidden>
                                
                                <!-- Placa del Camión -->
                                <div class="form-group">
                                  <label for="placa">Placa</label>
                                  <input type="text" class="form-control" name="placa" value="<?php echo $placa; ?>" required>
                                </div>

                                <!-- Modelo del Camión -->
                                <div class="form-group">
                                  <label for="modelo">Modelo</label>
                                  <input type="text" class="form-control" name="modelo" value="<?php echo $modelo; ?>" required>
                                </div>

                                <!-- Capacidad del Camión -->
                                <div class="form-group">
                                  <label for="capacidad">Capacidad (en garrafas)</label>
                                  <input type="number" class="form-control" name="capacidad" value="<?php echo $capacidad; ?>" required>
                                </div>

                                <div class="form-group">
                                    <a href="index.php" class="btn btn-secondary">Cancelar</a>
                                    <button type="submit" class="btn btn-success">Editar Camión</button>
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
