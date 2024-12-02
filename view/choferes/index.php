<?php
include('../../app/config.php');
include('../../layout/session.php');
include('../../layout/encabezado.php');
include '../../controllers/choferes/lista_choferes.php'; // Importa el controlador que realiza la consulta
?>

<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Lista de Choferes</h3>
              <div class="card-tools">
                <a href="create.php" class="btn btn-primary">Agregar Chofer Nuevo</a>
              </div>
            </div>
            <div class="card-body">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Licencia</th>
                    <th>Teléfono</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($choferes as $chofer) { ?>
                    <tr>
                      <td><?php echo $chofer['chofer_id']; ?></td>
                      <td><?php echo $chofer['nombre']; ?></td>
                      <td><?php echo $chofer['licencia']; ?></td>
                      <td><?php echo $chofer['telefono']; ?></td>
                      <td>
                        <a href="show.php?id=<?php echo $chofer['chofer_id']; ?>" class="btn btn-info">Ver</a>
                        <a href="edit.php?id=<?php echo $chofer['chofer_id']; ?>" class="btn btn-warning">Editar</a>
                        <a href="delete.php?id=<?php echo $chofer['chofer_id']; ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este chofer?');">
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
