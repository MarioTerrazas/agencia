<?php
include('../../app/config.php');
include('../../layout/session.php');
include('../../layout/encabezado.php');
include('../../controllers/roles/show.php');
?>

<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Datos del Rol</h3>
            </div>
            <form action="" method="post">
              <div class="card-body">
                <div class="form-group">
                  <label for="rol">Rol:</label>
                  <input type="text" class="form-control" name="rol" value="<?php echo $rol; ?>" disabled>
                </div>
                <div class="form-group">
                  <label for="fyh_creacion">Fecha de Creación:</label>
                  <input type="text" class="form-control" name="fyh_creacion" value="<?php echo $fyh_creacion; ?>" disabled>
                </div>
                <div class="form-group">
                  <label for="fyh_actualizacion">Fecha de Actualización:</label>
                  <input type="text" class="form-control" name="fyh_actualizacion" value="<?php echo $fyh_actualizacion; ?>" disabled>
                </div>
              </div>
              <div class="card-footer">
                <a href="index.php" class="btn btn-secondary">Regresar</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<?php
include('../../layout/final.php');
?>
