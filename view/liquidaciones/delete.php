<?php
include('../../app/config.php');
include('../../layout/session.php');
include('../../layout/encabezado.php');
include('../../controllers/liquidaciones/show.php'); 
?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Eliminar Liquidación</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title">¿Estás seguro de eliminar la liquidación?</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="../../controllers/liquidaciones/delete.php" method="post">
                                        <input type="hidden" name="liquidacion_id" value="<?php echo $liquidacion_id_get; ?>">
                                        <div class="form-group">
                                            <label for="tipo">Tipo de Liquidación</label>
                                            <input type="text" class="form-control" name="tipo" value="<?php echo $tipo; ?>" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="fecha">Fecha</label>
                                            <input type="text" class="form-control" name="fecha" value="<?php echo $fecha; ?>" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="estado">Estado</label>
                                            <input type="text" class="form-control" name="estado" value="<?php echo $estado; ?>" disabled>
                                        </div>
                                        <div class="form-group">
                                            <a href="index.php" class="btn btn-secondary">Cancelar</a>
                                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Eliminar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
  
<?php 
include('../../layout/final.php');
?>
