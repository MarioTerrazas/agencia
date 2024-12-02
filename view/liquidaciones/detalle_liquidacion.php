<?php
include('../../app/config.php');
include('../../layout/session.php');
include('../../layout/encabezado.php');

// Cargar los datos de la liquidación, productos y gastos como antes
$liquidacion_id = $_GET['id'];

// Consulta para obtener los datos de la liquidación
$sqlLiquidacion = "SELECT l.*, c.placa AS camion_placa, ch.nombre AS chofer_nombre, a.nombre AS ayudante_nombre 
                   FROM liquidaciones l
                   LEFT JOIN camiones c ON l.camion_id = c.camion_id
                   LEFT JOIN choferes ch ON l.chofer_id = ch.chofer_id
                   LEFT JOIN ayudantes a ON l.ayudante_id = a.ayudante_id
                   WHERE l.liquidacion_id = :liquidacion_id";
$queryLiquidacion = $pdo->prepare($sqlLiquidacion);
$queryLiquidacion->bindParam(':liquidacion_id', $liquidacion_id);
$queryLiquidacion->execute();
$liquidacion = $queryLiquidacion->fetch(PDO::FETCH_ASSOC);

// Cargar productos de la liquidación
$sqlProductos = "SELECT dp.*, p.descripcion, p.precio 
                 FROM detalle_liquidacion dp
                 LEFT JOIN productos p ON dp.producto_id = p.producto_id
                 WHERE dp.liquidacion_id = :liquidacion_id";
$queryProductos = $pdo->prepare($sqlProductos);
$queryProductos->bindParam(':liquidacion_id', $liquidacion_id);
$queryProductos->execute();
$productos = $queryProductos->fetchAll(PDO::FETCH_ASSOC);

// Cargar gastos actuales de la liquidación
$sqlGastos = "SELECT tg.*, g.nombre_gasto 
              FROM tiene_gastos tg
              LEFT JOIN gastos g ON tg.gasto_id = g.gasto_id
              WHERE tg.liquidacion_id = :liquidacion_id";
$queryGastos = $pdo->prepare($sqlGastos);
$queryGastos->bindParam(':liquidacion_id', $liquidacion_id);
$queryGastos->execute();
$gastos = $queryGastos->fetchAll(PDO::FETCH_ASSOC);

// Consulta para obtener todos los tipos de gastos disponibles
$sqlTiposGastos = "SELECT * FROM gastos";
$queryTiposGastos = $pdo->prepare($sqlTiposGastos);
$queryTiposGastos->execute();
$tiposGastos = $queryTiposGastos->fetchAll(PDO::FETCH_ASSOC);

// Consulta para obtener todos los productos disponibles
$sqlProductosDisponibles = "SELECT producto_id, descripcion FROM productos";
$queryProductosDisponibles = $pdo->prepare($sqlProductosDisponibles);
$queryProductosDisponibles->execute();
$productosDisponibles = $queryProductosDisponibles->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="content-wrapper">
  
<!-- Datos de la Liquidación -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-12">
        <h1>Detalle de Liquidación</h1>
      </div>
    </div>
    
    <div class="card">
      <div class="card-body">
        <div class="row">
          <!-- Primera columna -->
          <div class="col-md-4">
            <p><strong>ID Liquidación:</strong> <?php echo $liquidacion['liquidacion_id']; ?></p>
            <p><strong>Tipo:</strong> <?php echo ucfirst($liquidacion['tipo']); ?></p>
            <p><strong>Fecha:</strong> <?php echo $liquidacion['fecha']; ?></p>
          </div>

          <!-- Segunda columna -->
          <div class="col-md-4">
            <p><strong>Camión:</strong> <?php echo $liquidacion['camion_placa'] ?? 'N/A'; ?></p>
            <p><strong>Chofer:</strong> <?php echo $liquidacion['chofer_nombre'] ?? 'N/A'; ?></p>
            <p><strong>Ayudante:</strong> <?php echo $liquidacion['ayudante_nombre'] ?? 'N/A'; ?></p>
          </div>

          <!-- Tercera columna -->
          <div class="col-md-4">
            <p><strong>Estado:</strong> <span id="estado-actual"><?php echo ucfirst($liquidacion['estado']); ?></span></p>
            <?php if ($liquidacion['estado'] === 'incompleto') { ?>
              <button class="btn btn-success" id="btn-terminar-liquidacion">Terminar</button>
            <?php } else { ?>
              <button class="btn btn-secondary" disabled>Completado</button>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


  <!-- Detalle de Productos y Gastos -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- Productos - 70% de la pantalla -->
        <div class="col-md-8">
          <div class="card">
          <div class="card-header">
              <h3 class="card-title">Productos en Liquidación</h3>
              <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#modalAgregarProducto">
                Agregar Producto
              </button>
            </div>
            <div class="card-body">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Producto</th>
                    <th>Cantidad Inicial</th>
                    <th>Cantidad Final</th>
                    <th>Cantidad Vendida</th>
                    <th>Precio Unitario</th>
                    <th>Subtotal</th>
                  </tr>
                </thead>
                <tbody id="productos-list">
                  
                    <?php 
                      $totalProductos = 0; // Inicializar totalProductos en 0
                      foreach ($productos as $producto) { 
                        $subtotal = $producto['precio'] * $producto['cantidad_vendida'];
                        $totalProductos += $subtotal;
                    ?>
                    <tr data-id="<?php echo $producto['id_detalle']; ?>">
                      <td><?php echo $producto['descripcion']; ?></td>
                      <td><?php echo $producto['cantidad_inicial']; ?></td>
                      <td><?php echo $producto['cantidad_final']; ?></td>
                      <td><?php echo $producto['cantidad_vendida']; ?></td>
                      <td><?php echo number_format($producto['precio'], 2); ?></td>
                      <td><?php echo number_format($producto['precio'] * $producto['cantidad_vendida'], 2); ?></td>
                      <td>
                        <button class="btn btn-danger btn-sm eliminar-producto">Eliminar</button>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th colspan="5" class="text-right">Total Productos:</th>
                    <th id="total-productos"><?php echo number_format($totalProductos, 2); ?></th>
                    <th></th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>

        <!-- Gastos - 30% de la pantalla -->
        <div class="col-md-4">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Gastos de la Liquidación</h3>
              <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#modalAgregarGasto">
                Agregar Gasto
              </button>
            </div>
            <div class="card-body">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Tipo de Gasto</th>
                    <th>Monto</th>
                  </tr>
                </thead>
                <tbody id="gastos-list">
                <?php 
                      $totalGastos = 0; // Inicializar totalGastos en 0
                      foreach ($gastos as $gasto) { 
                        $totalGastos += $gasto['monto'];
                    ?>
                    <tr data-id="<?php echo $gasto['id_tiene_gastos']; ?>">
                      <td><?php echo $gasto['nombre_gasto']; ?></td>
                      <td><?php echo number_format($gasto['monto'], 2); ?></td>
                      <td>
                        <button class="btn btn-danger btn-sm eliminar-gasto">Eliminar</button>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th class="text-right">Total Gastos:</th>
                    <th id="total-gastos"><?php echo number_format($totalGastos, 2); ?></th>
                    <th></th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<!-- Modal para agregar gasto -->
<div class="modal fade" id="modalAgregarGasto" tabindex="-1" role="dialog" aria-labelledby="modalAgregarGastoLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalAgregarGastoLabel">Agregar Gasto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="formAgregarGasto">
        <div class="modal-body">
          <input type="hidden" name="liquidacion_id" value="<?php echo $liquidacion_id; ?>">
          <div class="form-group">
            <label for="gasto_id">Tipo de Gasto</label>
            <select class="form-control" id="gasto_id" name="gasto_id" required>
              <?php foreach ($tiposGastos as $tipoGasto) { ?>
                <option value="<?php echo $tipoGasto['gasto_id']; ?>"><?php echo $tipoGasto['nombre_gasto']; ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label for="monto">Monto</label>
            <input type="number" step="0.01" class="form-control" id="monto" name="monto" required>
          </div>
          <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Guardar Gasto</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal para agregar producto -->
<div class="modal fade" id="modalAgregarProducto" tabindex="-1" role="dialog" aria-labelledby="modalAgregarProductoLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalAgregarProductoLabel">Agregar Producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="formAgregarProducto">
        <div class="modal-body">
          <input type="hidden" name="liquidacion_id" value="<?php echo $liquidacion_id; ?>">
          <div class="form-group">
            <label for="producto_id">Producto</label>
            <select class="form-control" id="producto_id" name="producto_id" required>
              <?php foreach ($productosDisponibles as $producto) { ?>
                <option value="<?php echo $producto['producto_id']; ?>"><?php echo $producto['descripcion']; ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label for="cantidad_inicial">Cantidad Inicial</label>
            <input type="number" class="form-control" id="cantidad_inicial" name="cantidad_inicial" required>
          </div>
          <div class="form-group">
            <label for="cantidad_final">Cantidad Final</label>
            <input type="number" class="form-control" id="cantidad_final" name="cantidad_final" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Guardar Producto</button>
        </div>
      </form>
    </div>
  </div>
</div>


<?php 
include('../../layout/final.php');
?>
<script>
$(document).ready(function() {
  // Manejar el envío del formulario del modal de gastos
  $('#formAgregarGasto').on('submit', function(e) {
    e.preventDefault();
    const formData = $(this).serialize();
    
    $.post('../../controllers/liquidaciones/agregar_gasto.php', formData, function(response) {
      if (response.success) {
        const newRow = `<tr data-id="${response.id}">
          <td>${response.nombre_gasto}</td>
          <td class="monto">${parseFloat(response.monto).toFixed(2)}</td>
          <td><button class="btn btn-danger btn-sm eliminar-gasto">Eliminar</button></td>
        </tr>`;
        $('#gastos-list').append(newRow);
        actualizarTotalGastos(response.monto);
        $('#modalAgregarGasto').modal('hide');
        $('#formAgregarGasto')[0].reset();
      }
    }, 'json');
  });

  // Manejar el envío del formulario del modal de productos
  $('#formAgregarProducto').on('submit', function(e) {
    e.preventDefault();
    const formData = $(this).serialize();
    
    $.post('../../controllers/liquidaciones/agregar_producto.php', formData, function(response) {
      if (response.success) {
        const newRow = `<tr data-id="${response.id}">
          <td>${response.descripcion}</td>
          <td>${response.cantidad_inicial}</td>
          <td>${response.cantidad_final}</td>
          <td>${response.cantidad_vendida}</td>
          <td>${response.precio}</td>
          <td class="subtotal">${response.subtotal}</td>
          <td><button class="btn btn-danger btn-sm eliminar-producto">Eliminar</button></td>
        </tr>`;
        $('#productos-list').append(newRow);
        actualizarTotalProductos(response.subtotal);
        $('#modalAgregarProducto').modal('hide');
        $('#formAgregarProducto')[0].reset();
      }
    }, 'json');
  });

  // Función para actualizar el total de productos
  function actualizarTotalProductos(monto) {
    const totalElement = $('#total-productos');
    let total = parseFloat(totalElement.text().replace(/,/g, ''));
    total += parseFloat(monto);
    totalElement.text(total.toFixed(2));
  }

  // Función para actualizar el total de gastos
  function actualizarTotalGastos(monto) {
    const totalElement = $('#total-gastos');
    let total = parseFloat(totalElement.text().replace(/,/g, ''));
    total += parseFloat(monto);
    totalElement.text(total.toFixed(2));
  }

  // Eliminar producto
  $(document).on('click', '.eliminar-producto', function() {
    const row = $(this).closest('tr');
    const id = row.data('id');
    const subtotal = parseFloat(row.find('.subtotal').text().replace(/,/g, ''));
    
    $.post('../../controllers/liquidaciones/eliminar_producto.php', { id }, function(response) {
      if (response.success) {
        row.remove();
        actualizarTotalProductos(-subtotal);
      } else {
        alert(response.message || 'Error al eliminar el producto');
      }
    }, 'json');
  });

  // Eliminar gasto
  $(document).on('click', '.eliminar-gasto', function() {
    const row = $(this).closest('tr');
    const id = row.data('id');
    const monto = parseFloat(row.find('.monto').text().replace(/,/g, ''));
    
    $.post('../../controllers/liquidaciones/eliminar_gasto.php', { id }, function(response) {
      if (response.success) {
        row.remove();
        actualizarTotalGastos(-monto);
      } else {
        alert(response.message || 'Error al eliminar el gasto');
      }
    }, 'json');
  });

  $('#btn-terminar-liquidacion').on('click', function() {
    const liquidacion_id = <?php echo $liquidacion['liquidacion_id']; ?>;

    if (confirm('¿Estás seguro de que deseas marcar esta liquidación como completada?')) {
      $.post('../../controllers/liquidaciones/terminar_liquidacion.php', { liquidacion_id }, function(response) {
        if (response.success) {
          // Redirigir al índice si se completa con éxito
          alert('La liquidación ha sido marcada como completada.');
          window.location.href = 'index.php'; // Cambiar a la página deseada
        } else {
          alert('Error: ' + response.message);
        }
      }, 'json');
    }
});

});


</script>
