<?php
include('../../app/config.php');
include('../../layout/session.php');
include('../../layout/encabezado.php');
include '../../controllers/productos/lista_productos.php'; // Importa el controlador que realiza la consulta

?>
  <div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Lista de Productos</h3>
              <div class="card-tools">
                <a href="create.php" class="btn btn-primary">Crear Producto Nuevo</a>
              </div>
            </div>
            <div class="card-body">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Tipo</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($productos as $producto) { ?>
                    <tr>
                      <td><?php echo $producto['producto_id']; ?></td>
                      <td><?php echo $producto['tipo']; ?></td>
                      <td><?php echo $producto['descripcion']; ?></td>
                      <td><?php echo $producto['precio']; ?></td>
                      <td>
                        <a href="show.php?id=<?php echo $producto['producto_id']; ?>" class="btn btn-info">Ver</a>
                        <a href="edit.php?id=<?php echo $producto['producto_id']; ?>" class="btn btn-warning">Editar</a>
                        <a href="delete.php?id=<?php echo $producto['producto_id']; ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este producto?');">
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