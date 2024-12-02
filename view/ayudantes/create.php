<?php
include('../../app/config.php');
include('../../layout/session.php');
include('../../layout/encabezado.php');
?>

<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Crear Ayudante</h3>
            </div>
            <form action="../../controllers/ayudantes/create.php" method="POST">
              <div class="card-body">
                <div class="form-group">
                  <label for="nombre">Nombre:</label>
                  <input type="text" class="form-control" name="nombre" placeholder="Ingrese el nombre" required>
                </div>
                <div class="form-group">
                  <label for="telefono">Teléfono:</label>
                  <input type="text" class="form-control" name="telefono" placeholder="Ingrese el teléfono">
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Crear Ayudante</button>
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
