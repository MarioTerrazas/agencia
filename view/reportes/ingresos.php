<?php
include('../../app/config.php');
include('../../layout/session.php');
include('../../layout/encabezado.php');

// Inicializar variables
$fechaInicio = $_POST['fecha_inicio'] ?? '';
$fechaFinal = $_POST['fecha_final'] ?? '';
$ingresos = [];

// Consultar ingresos si se envió el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sqlIngresos = "SELECT p.descripcion AS producto, dl.subtotal, l.fecha 
                    FROM detalle_liquidacion dl
                    LEFT JOIN productos p ON dl.producto_id = p.producto_id
                    LEFT JOIN liquidaciones l ON dl.liquidacion_id = l.liquidacion_id
                    WHERE l.fecha BETWEEN :fechaInicio AND :fechaFinal";
    $queryIngresos = $pdo->prepare($sqlIngresos);
    $queryIngresos->bindParam(':fechaInicio', $fechaInicio);
    $queryIngresos->bindParam(':fechaFinal', $fechaFinal);
    $queryIngresos->execute();
    $ingresos = $queryIngresos->fetchAll(PDO::FETCH_ASSOC);
}
?>

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1>Reporte de Ingresos</h1>
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

      <?php if (!empty($ingresos)) { ?>
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Resultados del Reporte</h3>
        </div>
        <div class="card-body">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Producto</th>
                <th>Subtotal</th>
                <th>Fecha de Liquidación</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($ingresos as $ingreso) { ?>
              <tr>
                <td><?php echo $ingreso['producto']; ?></td>
                <td><?php echo number_format($ingreso['subtotal'], 2); ?></td>
                <td><?php echo $ingreso['fecha']; ?></td>
              </tr>
              <?php } ?>
            </tbody>
            <tfoot>
              <tr>
                <th>Total</th>
                <th colspan="2">
                  <?php
                  $total = array_sum(array_column($ingresos, 'subtotal'));
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
