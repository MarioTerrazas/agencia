<?php
include('../../app/config.php');
include('../../layout/session.php');
include('../../layout/encabezado.php');
include '../../controllers/roles/lista_roles.php'; // Importa el controlador que realiza la consulta
?>

<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Lista de Roles</h3>
              <div class="card-tools">
                <a href="create.php" class="btn btn-primary">Agregar Rol Nuevo</a>
              </div>
            </div>
            <div class="card-body">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Rol</th>
                    <th>Fecha de Creación</th>
                    <th>Fecha de Actualización</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($roles as $rol) { ?>
                    <tr>
                      <td><?php echo $rol['id_rol']; ?></td>
                      <td><?php echo $rol['rol']; ?></td>
                      <td><?php echo $rol['fyh_creacion']; ?></td>
                      <td><?php echo $rol['fyh_actualizacion']; ?></td>
                      <td>
                        <a href="show.php?id=<?php echo $rol['id_rol']; ?>" class="btn btn-info">Ver</a>
                        <a href="edit.php?id=<?php echo $rol['id_rol']; ?>" class="btn btn-warning">Editar</a>
                        <a href="delete.php?id=<?php echo $rol['id_rol']; ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este rol?');">
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
