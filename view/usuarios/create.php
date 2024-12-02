<?php
include('../../app/config.php');
include('../../layout/session.php');
include('../../layout/encabezado.php');

include('../../controllers/roles/lista_roles.php');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1 class="m-0">Nuevo Usuario</h1>
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
              <h3 class="card-title">Llenar datos del Usuario</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
              </div>

            </div>

            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                <form action="../../controllers/usuarios/create.php" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-8">
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="">Nombre</label>
                    <input type="text" class="form-control" name="nombre" required>
                </div>

                <!-- Rol -->
                <div class="form-group col-md-6">
                    <label for="">Rol</label>
                    <select name="rol" class="form-control">
                        <?php foreach ($roles as $rol) { ?>
                            <option value="<?= $rol['id_rol'] ?>"><?= $rol['rol'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <!-- Fin Rol -->

                <div class="form-group col-md-6">
                    <label for="">Email</label>
                    <input type="email" class="form-control" name="email" required>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="">Contraseña</label>
                    <input type="password" class="form-control" name="contraseña" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="">Repetir Contraseña</label>
                    <input type="password" class="form-control" name="contraseña2" required>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="">Imagen</label>
                <input type="file" class="form-control" name="imagen" accept="image/*">
            </div>
        </div>
    </div>

    <div class="form-group">
        <a href="index.php" class="btn btn-secondary">Cancelar</a>
        <button type="submit" class="btn btn-primary">Registrar</button>
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