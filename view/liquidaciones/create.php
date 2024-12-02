<?php
include('../../app/config.php');
include('../../layout/session.php');
include('../../layout/encabezado.php');

// Consulta para obtener camiones
$sqlCamiones = "SELECT camion_id, placa FROM camiones";
$queryCamiones = $pdo->prepare($sqlCamiones);
$queryCamiones->execute();
$camiones = $queryCamiones->fetchAll(PDO::FETCH_ASSOC);

// Consulta para obtener choferes
$sqlChoferes = "SELECT chofer_id, nombre FROM choferes";
$queryChoferes = $pdo->prepare($sqlChoferes);
$queryChoferes->execute();
$choferes = $queryChoferes->fetchAll(PDO::FETCH_ASSOC);

// Consulta para obtener ayudantes
$sqlAyudantes = "SELECT ayudante_id, nombre FROM ayudantes";
$queryAyudantes = $pdo->prepare($sqlAyudantes);
$queryAyudantes->execute();
$ayudantes = $queryAyudantes->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Crear Liquidación</h3>
            </div>
            <form action="../../controllers/liquidaciones/create.php" method="POST">
              <div class="card-body">
                <!-- Tipo de Liquidación -->
                <div class="form-group">
                  <label for="tipo">Tipo de Liquidación:</label>
                  <select class="form-control" name="tipo" required>
                    <option value="agencia">Agencia</option>
                    <option value="camion">Camión</option>
                  </select>
                </div>
                
                <!-- Fecha de Liquidación -->
                <div class="form-group">
                  <label for="fecha">Fecha:</label>
                  <input type="datetime-local" class="form-control" name="fecha" value="<?php echo date('Y-m-d\TH:i'); ?>" required>
                </div>

                <!-- Camión -->
                <div class="form-group">
                  <label for="camion_id">Camión:</label>
                  <select class="form-control" name="camion_id">
                    <option value="">Seleccione un camión</option>
                    <?php foreach ($camiones as $camion) { ?>
                      <option value="<?php echo $camion['camion_id']; ?>">
                        <?php echo $camion['placa']; ?>
                      </option>
                    <?php } ?>
                  </select>
                </div>

                <!-- Chofer -->
                <div class="form-group">
                  <label for="chofer_id">Chofer:</label>
                  <select class="form-control" name="chofer_id">
                    <option value="">Seleccione un chofer</option>
                    <?php foreach ($choferes as $chofer) { ?>
                      <option value="<?php echo $chofer['chofer_id']; ?>">
                        <?php echo $chofer['nombre']; ?>
                      </option>
                    <?php } ?>
                  </select>
                </div>

                <!-- Ayudante -->
                <div class="form-group">
                  <label for="ayudante_id">Ayudante:</label>
                  <select class="form-control" name="ayudante_id">
                    <option value="">Seleccione un ayudante</option>
                    <?php foreach ($ayudantes as $ayudante) { ?>
                      <option value="<?php echo $ayudante['ayudante_id']; ?>">
                        <?php echo $ayudante['nombre']; ?>
                      </option>
                    <?php } ?>
                  </select>
                </div>
                
                <!-- Estado (oculto) -->
                <input type="hidden" name="estado" value="incompleto">
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Crear Liquidación</button>
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
