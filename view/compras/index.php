<?php
include('../../app/config.php');
include('../../layout/session.php');
include('../../layout/encabezado.php');
include '../../controllers/compras/lista_compras.php'; // Importa el controlador que realiza la consulta

?>
<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Lista de Compras</h3>
              <div class="card-tools">
                <a href="create.php" class="btn btn-primary">Agregar Compra Nueva</a>
              </div>
            </div>
            <div class="card-body">
              <table class="table table-bordered table-striped" id="example1">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Fecha</th>
                    <th>Usuario ID</th>
                    <th>Proveedor</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($compras as $compra) { ?>
                    <tr>
                      <td><?php echo $compra['compra_id']; ?></td>
                      <td><?php echo $compra['fecha']; ?></td>
                      <td><?php echo $compra['usuario_id']; ?></td>
                      <td><?php echo $compra['proveedor']; ?></td>
                      <td>
                        <a href="show.php?id=<?php echo $compra['compra_id']; ?>" class="btn btn-info">Ver</a>
                        <a href="edit.php?id=<?php echo $compra['compra_id']; ?>" class="btn btn-warning">Editar</a>
                        <a href="delete.php?id=<?php echo $compra['compra_id']; ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esta compra?');">
                          <i class="fa fa-trash"></i> Borrar
                        </a>
                        <a href="detalle_compra.php?id=<?php echo $compra['compra_id']; ?>" class="btn btn-secondary">
                          <i class="fa fa-list"></i> Llenar Detalle
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
