<?php
include('../../app/config.php');
include('../../layout/session.php');
include('../../layout/encabezado.php');
include '../../controllers/liquidaciones/lista_liquidaciones.php'; // Importa el controlador que realiza la consulta
?>
<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Lista de Liquidaciones</h3>
              <div class="card-tools">
                <a href="create.php" class="btn btn-primary">Agregar Nueva Liquidación</a>
              </div>
            </div>
            <div class="card-body">
              <table class="table table-bordered table-striped" id="example1">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Tipo</th>
                    <th>Camión</th>
                    <th>Chofer</th>
                    <th>Ayudante</th>
                    <th>Fecha</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach($liquidaciones as $liquidacion) { ?>
                  <tr>
                    <td><?php echo $liquidacion['liquidacion_id']; ?></td>
                    <td><?php echo $liquidacion['tipo']; ?></td>
                    <td><?php echo $liquidacion['camion_nombre']; ?></td>
                    <td><?php echo $liquidacion['chofer_nombre']; ?></td>
                    <td><?php echo $liquidacion['ayudante_nombre']; ?></td>
                    <td><?php echo $liquidacion['fecha']; ?></td>
                    <td><?php echo ucfirst($liquidacion['estado']); ?></td>
                    <td>
                      <a href="show.php?id=<?php echo $liquidacion['liquidacion_id']; ?>" class="btn btn-info">Ver</a>
                      <a href="edit.php?id=<?php echo $liquidacion['liquidacion_id']; ?>" class="btn btn-warning">Editar</a>
                      <a href="delete.php?id=<?php echo $liquidacion['liquidacion_id']; ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esta liquidación?');">
                        <i class="fa fa-trash"></i> Borrar
                      </a>
                      <?php if ($liquidacion['estado'] === 'completado') { ?>
                        <!-- Botón de imprimir si la liquidación está completada -->
                        <a href="#" class="btn btn-success" onclick="abrirVentanaImpresion('imprimir.php?id=<?php echo $liquidacion['liquidacion_id']; ?>')">
                        <i class="fa fa-print"></i> Imprimir
                      </a>
                      <?php } else { ?>
                        <!-- Botón para llenar detalle si la liquidación no está completada -->
                        <a href="detalle_liquidacion.php?id=<?php echo $liquidacion['liquidacion_id']; ?>" class="btn btn-secondary">
                          <i class="fa fa-list"></i> Llenar Detalle
                        </a>
                      <?php } ?>
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

  function abrirVentanaImpresion(url) {
    const ancho = 900; // Ancho de la nueva ventana
    const alto = 600; // Alto de la nueva ventana
    const top = (window.innerHeight - alto) / 2; // Posición vertical centrada
    const left = (window.innerWidth - ancho) / 2; // Posición horizontal centrada

    window.open(url, 'Impresión', `width=${ancho},height=${alto},top=${top},left=${left},scrollbars=yes`);
  }
</script>
