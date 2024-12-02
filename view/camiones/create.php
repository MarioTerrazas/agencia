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
              <h3 class="card-title">Crear Camión</h3>
            </div>
            <form action="../../controllers/camiones/create.php" method="POST">
              <div class="card-body">
                <!-- Placa -->
                <div class="form-group">
                  <label for="placa">Placa:</label>
                  <input type="text" class="form-control" name="placa" placeholder="Ingrese la placa" required>
                </div>
                <!-- Modelo -->
                <div class="form-group">
                  <label for="modelo">Modelo:</label>
                  <input type="text" class="form-control" name="modelo" placeholder="Ingrese el modelo" required>
                </div>
                <!-- Capacidad -->
                <div class="form-group">
                  <label for="capacidad">Capacidad (en garrafas):</label>
                  <input type="number" class="form-control" name="capacidad" placeholder="Ingrese la capacidad" required>
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Crear Camión</button>
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
