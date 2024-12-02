<?php
include('../../app/config.php');
include('../../layout/session.php');
include('../../layout/encabezado.php');

// Inicializar variables
$fechaInicio = $_POST['fecha_inicio'] ?? '';
$fechaFinal = $_POST['fecha_final'] ?? '';
$gastos = [];

// Consultar gastos si se envió el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sqlGastos = "SELECT g.nombre_gasto, tg.monto, l.fecha 
                  FROM tiene_gastos tg
                  LEFT JOIN gastos g ON tg.gasto_id = g.gasto_id
                  LEFT JOIN liquidaciones l ON tg.liquidacion_id = l.liquidacion_id
                  WHERE l.fecha BETWEEN :fechaInicio AND :fechaFinal";
    $queryGastos = $pdo->prepare($sqlGastos);
    $queryGastos->bindParam(':fechaInicio', $fechaInicio);
    $queryGastos->bindParam(':fechaFinal', $fechaFinal);
    $queryGastos->execute();
    $gastos = $queryGastos->fetchAll(PDO::FETCH_ASSOC);
}
?>

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1>Reporte de Gastos</h1>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Filtrar por Fecha</h3>
        </div>
        <div class="card-body">
          <form method="POST" action="">
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="fecha_inicio">Fecha Inicio:</label>
                  <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control" value="<?php echo $fechaInicio; ?>" required>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="fecha_final">Fecha Final:</label>
                  <input type="date" name="fecha_final" id="fecha_final" class="form-control" value="<?php echo $fechaFinal; ?>" required>
                </div>
              </div>
              <div class="col-md-4 align-self-end">
                <button type="submit" class="btn btn-primary">Filtrar</button>
              </div>
            </div>
          </form>
        </div>
      </div>

      <?php if (!empty($gastos)) { ?>
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Resultados del Reporte</h3>
        </div>
        <div class="card-body">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Tipo de Gasto</th>
                <th>Monto</th>
                <th>Fecha de Liquidación</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($gastos as $gasto) { ?>
              <tr>
                <td><?php echo $gasto['nombre_gasto']; ?></td>
                <td><?php echo number_format($gasto['monto'], 2); ?></td>
                <td><?php echo $gasto['fecha']; ?></td>
              </tr>
              <?php } ?>
            </tbody>
            <tfoot>
              <tr>
                <th>Total</th>
                <th colspan="2">
                  <?php
                  $total = array_sum(array_column($gastos, 'monto'));
                  echo number_format($total, 2);
                  ?>
                </th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
      <?php } else if ($_SERVER['REQUEST_METHOD'] === 'POST') { ?>
      <div class="alert alert-warning">
        No se encontraron resultados para las fechas seleccionadas.
      </div>
      <?php } ?>
    </div>
  </section>
</div>

<?php 
include('../../layout/final.php');
?>
