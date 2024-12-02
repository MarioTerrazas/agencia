<?php
include('../../app/config.php');
include('../../layout/session.php');
include('../../layout/encabezado.php');
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">Listado de Usuarios</h1>
          </div><!-- /.col -->

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
 
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">

      <div class="row">
        <div class="col-md-10">
            <div class="card card-primary">
                <div class="card-header">
                <h3 class="card-title">Lista de Usuarios</h3>
                <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
                </div>

                </div>

                <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nro</th>
                    <th>Nombre</th>
                    <th>Rol</th>
                    <th>Email</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                  
                    <?php
                        include('../../controllers/usuarios/lista_usuarios.php');
                        $contador = 0;
                        foreach ($usuarios as $usuario) {
                            $contador = $contador + 1;
                            $nombre = $usuario['nombre'];
                            $email = $usuario['email'];
                            $id_usuario = $usuario['id_usuario'];
                            $rol = $usuario['rol'];
                            $imagen = $usuario['imagen'];
                            $rutaImagen = "../../view/usuarios/perfil/" . $imagen;
                        ?>
                        <tr>
                            <td><?php echo $contador; ?></td>
                            <td><?php echo $nombre; ?></td>
                            <td><?php echo $rol; ?></td>
                            <td><?php echo $email; ?></td>
                            <td class="text-center">
                                <?php if (!empty($imagen) && file_exists($rutaImagen)) { ?>
                                    <img src="<?php echo $rutaImagen; ?>" alt="Imagen de <?php echo $nombre; ?>" style="width: 50px; height: 50px; object-fit: cover; border-radius: 50%;">
                                <?php } else { ?>
                                    <span>No disponible</span>
                                <?php } ?>
                            </td>
                            <td class="text-center">
                            <div class="btn-group">
                                <a href="show.php?id=<?php echo $id_usuario; ?>" type="button" class="btn btn-info"> <i class="fa fa-eye"></i> Ver</a>
                                <a href="edit.php?id=<?php echo $id_usuario; ?>" type="button" class="btn btn-success"> <i class="fa fa-pencil-alt"></i> Editar</a>
                                <a href="delete.php?id=<?php echo $id_usuario; ?>" type="button" class="btn btn-danger"> <i class="fa fa-trash"></i> Borrar</a>
                            </div>
                            </td>
                        </tr>
                        <?php
                        }
                    ?>
                    

                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Nro</th>
                    <th>Nombre</th>
                    <th>Rol</th>
                    <th>Email</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                  </tr>
                  </tfoot>
                </table>
                </div>

            </div>
        </div>
      </div>

      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
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