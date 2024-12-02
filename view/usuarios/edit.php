<?php
include('../../app/config.php');
include('../../layout/session.php');
include('../../layout/encabezado.php');
include('../../controllers/usuarios/show.php');

include('../../controllers/roles/lista_roles.php');
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">Editar datos del Usuario</h1>
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
                <h3 class="card-title">Datos del Usuario</h3>
                <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
                </div>

                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="../../controllers/usuarios/edit.php" method="post" enctype="multipart/form-data">
                                <input type="text" name="id_usuario" value="<?php echo $id_usuario_get; ?>" hidden>
                                <div class="form-group">
                                    <label for="">Nombre</label>
                                    <input type="text" class="form-control" name="nombre" value="<?php echo $nombre; ?>" required>
                                </div>

                                <!-- Rol -->
                                <div class="form-group">
                                  <label for="">Rol</label>
                                  <select name="rol" id="" class="form-control">
                                    <?php
                                      foreach ($roles as $rol) {
                                        $id_rol = $rol['id_rol'];
                                        $rol = $rol['rol'];
                                    ?>
                                      <option value="<?= $id_rol ?>" 
                                      <?php if ($rol == $rol_u) { ?> selected = "selected" <?php } ?>
                                      ><?= $rol ?></option>
                                    <?php    
                                      }
                                    ?>
                                    
                                  </select>
                                </div>
                                <!-- Fin Rol -->

                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" class="form-control" name="email" value="<?php echo $email ?>" required>
                                </div>

                                <div class="form-group">
                                    <label for="">Contraseña</label>
                                    <input type="text" class="form-control" name="contraseña">
                                </div>
                                <div class="form-group">
                                    <label for="">Repetir Contraseña</label>
                                    <input type="text" class="form-control" name="contraseña2">
                                </div>

                                <div class="form-group">
                                    <label for="">Imagen</label>
                                    <input type="file" class="form-control" name="imagen">
                                </div>
                                <div class="form-group">
                                    <a href="index.php" class="btn btn-secondary">Cancelar</a>
                                    <button type="submit" class="btn btn-success">Editar</button>
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