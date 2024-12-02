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
            <h1 class="m-0">Editar datos del Gasto</h1>
          </div>
        </div>
      </div>
    </div>
    <!-- /.content-header -->
 
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-8">
              <div class="card card-success">
                  <div class="card-header">
                    <h3 class="card-title">Datos del Gasto</h3>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    </div>
                  </div>

                  <div class="card-body">
                      <div class="row">
                          <div class="col-md-12">
                              <form action="../../controllers/gastos/edit.php" method="post">
                                  <input type="hidden" name="gasto_id" value="<?php echo $gasto_id; ?>">
                                  
                                  <!-- Nombre del Gasto -->
                                  <div class="form-group">
                                    <label for="nombre_gasto">Nombre del Gasto</label>
                                    <input type="text" class="form-control" name="nombre_gasto" value="<?php echo $nombre_gasto; ?>" required>
                                  </div>

                                  <div class="form-group">
                                      <a href="index.php" class="btn btn-secondary">Cancelar</a>
                                      <button type="submit" class="btn btn-success">Editar Gasto</button>
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
  <!-- /.content-wrapper -->
  
<?php 
include('../../layout/final.php');
?> 
