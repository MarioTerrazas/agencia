<?php
include('../../app/config.php');
include('../../layout/session.php');
include('../../layout/encabezado.php');

// Consulta para obtener la lista de usuarios
$sqlUsuarios = "SELECT id_usuario, nombre FROM usuario";
$queryUsuarios = $pdo->prepare($sqlUsuarios);
$queryUsuarios->execute();
$usuarios = $queryUsuarios->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Crear Compra</h3>
            </div>
            <form action="../../controllers/compras/create.php" method="POST">
              <div class="card-body">
                <!-- Fecha -->
                <div class="form-group">
                  <label for="fecha">Fecha:</label>
                  <input type="date" class="form-control" name="fecha" required>
                </div>
                <!-- Proveedor -->
                <div class="form-group">
                  <label for="proveedor">Proveedor:</label>
                  <input type="text" class="form-control" name="proveedor" placeholder="Ingrese el nombre del proveedor" required>
                </div>
                <!-- Usuario -->
                <div class="form-group">
                  <label for="usuario_id">Usuario:</label>
                  <select name="usuario_id" class="form-control" required>
                    <option value="">Seleccione un usuario</option>
                    <?php foreach ($usuarios as $usuario) { ?>
                      <option value="<?php echo $usuario['id_usuario']; ?>">
                        <?php echo $usuario['nombre']; ?>
                      </option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Crear Compra</button>
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
