<?php
include('../../app/config.php');
include('../../layout/session.php');
include('../../layout/encabezado.php');
include('../../controllers/compras/show.php');
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">Editar datos de la Compra</h1>
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
                <h3 class="card-title">Datos de la Compra</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>

              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <form action="../../controllers/compras/edit.php" method="post">
                      <input type="text" name="compra_id" value="<?php echo $compra_id; ?>" hidden>
                      
                      <!-- Fecha de la Compra -->
                      <div class="form-group">
                        <label for="fecha">Fecha</label>
                        <input type="date" class="form-control" name="fecha" value="<?php echo $fecha; ?>" required>
                      </div>

                      <!-- Proveedor -->
                      <div class="form-group">
                        <label for="proveedor">Proveedor</label>
                        <input type="text" class="form-control" name="proveedor" value="<?php echo $proveedor; ?>" required>
                      </div>

                      <!-- Usuario ID -->
                      <div class="form-group">
                        <label for="usuario_id">ID de Usuario</label>
                        <input type="number" class="form-control" name="usuario_id" value="<?php echo $usuario_id; ?>" required>
                      </div>

                      <div class="form-group">
                        <a href="index.php" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-success">Editar Compra</button>
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
