<?php
include('../../app/config.php');
include('../../layout/session.php');
include('../../layout/encabezado.php');
include '../../controllers/ayudantes/lista_ayudantes.php'; // Importa el controlador que realiza la consulta
?>

<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Lista de Ayudantes</h3>
              <div class="card-tools">
                <a href="create.php" class="btn btn-primary">Agregar Ayudante Nuevo</a>
              </div>
            </div>
            <div class="card-body">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($ayudantes as $ayudante) { ?>
                    <tr>
                      <td><?php echo $ayudante['ayudante_id']; ?></td>
                      <td><?php echo $ayudante['nombre']; ?></td>
                      <td><?php echo $ayudante['telefono']; ?></td>
                      <td>
                        <a href="show.php?id=<?php echo $ayudante['ayudante_id']; ?>" class="btn btn-info">Ver</a>
                        <a href="edit.php?id=<?php echo $ayudante['ayudante_id']; ?>" class="btn btn-warning">Editar</a>
                        <a href="delete.php?id=<?php echo $ayudante['ayudante_id']; ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este ayudante?');">
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
