<?php
include('../../app/config.php');
include('../../layout/session.php');
include('../../layout/encabezado.php');
include '../../controllers/inventario/lista_inventario.php'; // Controlador para obtener la lista de inventario

?>
<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Inventario de Productos</h3>
            </div>
            <div class="card-body">
              <table class="table table-bordered table-striped" id="example1">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($inventario as $item) { ?>
                    <tr>
                      <td><?php echo $item['inventario_id']; ?></td>
                      <td><?php echo $item['producto_nombre']; ?></td>
                      <td><?php echo $item['cantidad']; ?></td>
                      <td>
                        <a href="show.php?id=<?php echo $item['inventario_id']; ?>" class="btn btn-info">Ver</a>
                        <a href="edit.php?id=<?php echo $item['inventario_id']; ?>" class="btn btn-warning">Editar</a>
                        <a href="delete.php?id=<?php echo $item['inventario_id']; ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este registro de inventario?');">
                          <i class="fa fa-trash"></i> Borrar
                        </a>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
  
<?php 
include('../../layout/final.php');
?>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": true, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>
