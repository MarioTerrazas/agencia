<?php
include('../../app/config.php');
include('../../layout/session.php');
include('../../layout/encabezado.php');

// Recoger el ID de la compra desde el parámetro GET
$compra_id = $_GET['id'];

// Consulta para obtener los datos de la compra
$sqlCompra = "SELECT * FROM compras WHERE compra_id = :compra_id";
$queryCompra = $pdo->prepare($sqlCompra);
$queryCompra->bindParam(':compra_id', $compra_id);
$queryCompra->execute();
$compra = $queryCompra->fetch(PDO::FETCH_ASSOC);

// Consulta para obtener los detalles de la compra junto con la descripción del producto
$sqlDetalles = "SELECT dc.*, p.descripcion AS producto
                FROM detalle_compras dc
                LEFT JOIN productos p ON dc.producto_id = p.producto_id
                WHERE dc.compra_id = :compra_id";
$queryDetalles = $pdo->prepare($sqlDetalles);
$queryDetalles->bindParam(':compra_id', $compra_id);
$queryDetalles->execute();
$detalles = $queryDetalles->fetchAll(PDO::FETCH_ASSOC);
// Consulta para obtener la lista de productos
$sqlProductos = "SELECT producto_id, descripcion FROM productos";
$queryProductos = $pdo->prepare($sqlProductos);
$queryProductos->execute();
$productos = $queryProductos->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Detalles de la Compra</h1>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Información de la Compra</h3>
            </div>
            <div class="card-body">
              <p><strong>ID Compra:</strong> <?php echo $compra['compra_id']; ?></p>
              <p><strong>Fecha:</strong> <?php echo $compra['fecha']; ?></p>
              <p><strong>Usuario ID:</strong> <?php echo $compra['usuario_id']; ?></p>
              <p><strong>Proveedor:</strong> <?php echo $compra['proveedor']; ?></p>
            </div>
          </div>
        </div>
      </div>

      <!-- Detalle de la Compra -->
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Detalles de la Compra</h3>
              <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#modalAgregarDetalle">
                Agregar Detalle
              </button>
            </div>
            <div class="card-body">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Subtotal</th>
                  </tr>
                </thead>
                <tbody id="detalles-list">
                  <?php 
                    $total = 0;
                    foreach ($detalles as $detalle) {
                      $subtotal = $detalle['cantidad'] * $detalle['precio'];
                      $total += $subtotal;
                  ?>
                    <tr>
                      <td><?php echo $detalle['producto']; ?></td>
                      <td><?php echo $detalle['cantidad']; ?></td>
                      <td><?php echo number_format($detalle['precio'], 2); ?></td>
                      <td><?php echo number_format($subtotal, 2); ?></td>
                    </tr>
                  <?php } ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th colspan="3" class="text-right">Total:</th>
                    <th id="total-compra"><?php echo number_format($total, 2); ?></th>
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

<!-- Modal para agregar detalle -->
<div class="modal fade" id="modalAgregarDetalle" tabindex="-1" role="dialog" aria-labelledby="modalAgregarDetalleLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalAgregarDetalleLabel">Agregar Detalle</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="formAgregarDetalle" action="../../controllers/compras/agregar_detalle.php" method="POST">
        <div class="modal-body">
          <input type="hidden" name="compra_id" value="<?php echo $compra_id; ?>">
          <div class="form-group">
            <label for="producto_id">Producto</label>
            <select name="producto_id" id="producto_id" class="form-control" required>
              <?php foreach ($productos as $producto) { ?>
                <option value="<?php echo $producto['producto_id']; ?>"><?php echo $producto['descripcion']; ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label for="cantidad">Cantidad</label>
            <input type="number" name="cantidad" id="cantidad" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="precio">Precio</label>
            <input type="number" step="0.01" name="precio" id="precio" class="form-control" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Guardar Detalle</button>
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
  // Manejar el envío del formulario del modal de detalles
  $('#formAgregarDetalle').on('submit', function(e) {
    e.preventDefault();
    const formData = $(this).serialize();

    $.post('../../controllers/compras/agregar_detalle.php', formData, function(response) {
      if (response.success) {
        // Actualizar la tabla de detalles
        $('#detalles-list').append(`
          <tr>
            <td>${response.detalle.descripcion}</td>
            <td>${response.detalle.cantidad}</td>
            <td>${response.detalle.precio}</td>
            <td>${(response.detalle.cantidad * response.detalle.precio).toFixed(2)}</td>
          </tr>
        `);

        // Actualizar el total
        let total = parseFloat($('#total-compra').text().replace(/,/g, ''));
        total += response.detalle.cantidad * response.detalle.precio;
        $('#total-compra').text(total.toFixed(2));

        // Limpiar el formulario y cerrar el modal
        $('#formAgregarDetalle')[0].reset();
        $('#modalAgregarDetalle').modal('hide');
      } else {
        alert('Error al agregar el detalle');
      }
    }, 'json');
  });
});
</script>
