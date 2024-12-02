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
              <h3 class="card-title">Crear Producto</h3>
            </div>
            <form action="../../controllers/productos/create.php" method="POST">
              <div class="card-body">
                <div class="form-group">
                  <label for="tipo">Tipo:</label>
                  <select class="form-control" name="tipo" required>
                    <option value="llena">Llena</option>
                    <option value="vacía">Vacía</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="descripcion">Descripción:</label>
                  <input type="text" class="form-control" name="descripcion" placeholder="Ingrese la descripción" required>
                </div>
                <div class="form-group">
                  <label for="precio">Precio:</label>
                  <input type="number" step="0.01" class="form-control" name="precio" placeholder="Ingrese el precio" required>
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Crear Producto</button>
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