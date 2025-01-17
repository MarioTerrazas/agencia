<?php
include('../../app/config.php');
include('../../layout/session.php');
include('../../layout/encabezado.php');
include('../../controllers/usuarios/show.php');
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">Datos del Usuario</h1>
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
                <h3 class="card-title">Datos del Usuario</h3>
                <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
                </div>

                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="">Nombre</label>
                                    <input type="text" class="form-control" name="nombre" value="<?php echo $nombre; ?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="">Rol</label>
                                    <input type="text" class="form-control" name="rol" value="<?= $rol; ?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" class="form-control" name="email" value="<?php echo $email ?>" disabled>
                                </div>

                                <div class="form-group">
                                    <label for="">Imagen</label>
                                    <input type="file" class="form-control" name="imagen">
                                </div>
                                <div class="form-group">
                                    <a href="index.php" class="btn btn-secondary">Cancelar</a>
                    
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
