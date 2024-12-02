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
            <h1 class="m-0">Editar datos de la Liquidación</h1>
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
                <h3 class="card-title">Datos de la Liquidación</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                </div>
              </div>

              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <form action="../../controllers/liquidaciones/edit.php" method="post">
                      <input type="text" name="liquidacion_id" value="<?php echo $liquidacion_id_get; ?>" hidden>
                      
                      <!-- Tipo de Liquidación -->
                      <div class="form-group">
                        <label for="tipo">Tipo de Liquidación</label>
                        <select class="form-control" name="tipo" required>
                          <option value="agencia" <?php if ($tipo == 'agencia') echo 'selected'; ?>>Agencia</option>
                          <option value="camion" <?php if ($tipo == 'camion') echo 'selected'; ?>>Camión</option>
                        </select>
                      </div>

                      <!-- Fecha de la Liquidación -->
                      <div class="form-group">
                        <label for="fecha">Fecha</label>
                        <input type="datetime-local" class="form-control" name="fecha" value="<?php echo date('Y-m-d\TH:i', strtotime($fecha)); ?>" required>
                      </div>

                      <!-- Estado de la Liquidación -->
                      <div class="form-group">
                        <label for="estado">Estado</label>
                        <select class="form-control" name="estado" required>
                          <option value="incompleto" <?php if ($estado == 'incompleto') echo 'selected'; ?>>Incompleto</option>
                          <option value="completado" <?php if ($estado == 'completado') echo 'selected'; ?>>Completado</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <a href="index.php" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-success">Editar Liquidación</button>
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
