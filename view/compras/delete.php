<?php
include('../../app/config.php');
include('../../layout/session.php');
include('../../layout/encabezado.php');
include('../../controllers/compras/show.php'); // Importa el controlador que muestra la compra

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Eliminar Compra</h1>
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
                            <h3 class="card-title">¿Estás seguro de eliminar esta compra?</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="../../controllers/compras/delete.php" method="post">
                                        <input type="hidden" name="compra_id" value="<?php echo $compra_id_get; ?>">
                                        <div class="form-group">
                                            <label for="fecha">Fecha</label>
                                            <input type="text" class="form-control" name="fecha" value="<?php echo $fecha; ?>" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="usuario_id">Usuario ID</label>
                                            <input type="text" class="form-control" name="usuario_id" value="<?php echo $usuario_id; ?>" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="proveedor">Proveedor</label>
                                            <input type="text" class="form-control" name="proveedor" value="<?php echo $proveedor; ?>" disabled>
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
