<?php
include('../../app/config.php');
include('../../layout/session.php');
include('../../layout/encabezado.php');
include('../../controllers/productos/show.php');
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">Editar datos del Producto</h1>
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
                <h3 class="card-title">Datos del Producto</h3>
                <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
                </div>

                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="../../controllers/productos/edit.php" method="post">
                                <input type="text" name="producto_id" value="<?php echo $producto_id_get; ?>" hidden>
                                
                                <!-- Tipo del Producto -->
                                <div class="form-group">
                                  <label for="tipo">Tipo de Producto</label>
                                  <select name="tipo" class="form-control" required>
                                    <option value="llena" <?php if ($tipo == 'llena') echo 'selected'; ?>>Llena</option>
                                    <option value="vacía" <?php if ($tipo == 'vacía') echo 'selected'; ?>>Vacía</option>
                                  </select>
                                </div>
                                
                                <!-- Descripción del Producto -->
                                <div class="form-group">
                                    <label for="descripcion">Descripción</label>
                                    <input type="text" class="form-control" name="descripcion" value="<?php echo $descripcion; ?>" required>
                                </div>

                                <!-- Precio del Producto -->
                                <div class="form-group">
                                    <label for="precio">Precio</label>
                                    <input type="number" step="0.01" class="form-control" name="precio" value="<?php echo $precio; ?>" required>
                                </div>

                                <div class="form-group">
                                    <a href="index.php" class="btn btn-secondary">Cancelar</a>
                                    <button type="submit" class="btn btn-success">Editar Producto</button>
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