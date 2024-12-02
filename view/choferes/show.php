<?php
include('../../app/config.php');
include('../../layout/session.php');
include('../../layout/encabezado.php');
include('../../controllers/choferes/show.php');
?>

<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Datos del Chofer</h3>
            </div>
            <form action="" method="post">
              <div class="card-body">
                <div class="form-group">
                  <label for="nombre">Nombre:</label>
                  <input type="text" class="form-control" name="nombre" value="<?php echo $nombre; ?>" disabled>
                </div>
                <div class="form-group">
                  <label for="licencia">Licencia:</label>
                  <input type="text" class="form-control" name="licencia" value="<?php echo $licencia; ?>" disabled>
                </div>
                <div class="form-group">
                  <label for="telefono">Teléfono:</label>
                  <input type="text" class="form-control" name="telefono" value="<?php echo $telefono; ?>" disabled>
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
