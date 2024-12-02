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
              <h3 class="card-title">Editar Rol</h3>
            </div>
            <form action="../../controllers/roles/edit.php" method="POST">
              <div class="card-body">
                <input type="hidden" name="id_rol" value="<?php echo $id_rol_get; ?>">
                <div class="form-group">
                  <label for="rol">Rol:</label>
                  <input type="text" class="form-control" name="rol" value="<?php echo $rol; ?>" required>
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Actualizar Rol</button>
                <a href="index.php" class="btn btn-secondary">Cancelar</a>
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
