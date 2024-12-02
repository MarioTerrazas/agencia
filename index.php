<?php
include('app/config.php');
include('layout/session.php');
include('layout/encabezado.php');

// Consultas para obtener datos estadísticos
try {
    // Cantidad de choferes
    $sqlChoferes = "SELECT COUNT(*) as total FROM choferes";
    $queryChoferes = $pdo->query($sqlChoferes);
    $totalChoferes = $queryChoferes->fetch(PDO::FETCH_ASSOC)['total'];

    // Cantidad de ayudantes
    $sqlAyudantes = "SELECT COUNT(*) as total FROM ayudantes";
    $queryAyudantes = $pdo->query($sqlAyudantes);
    $totalAyudantes = $queryAyudantes->fetch(PDO::FETCH_ASSOC)['total'];

    // Productos disponibles
    $sqlProductos = "SELECT COUNT(*) as total FROM productos";
    $queryProductos = $pdo->query($sqlProductos);
    $totalProductos = $queryProductos->fetch(PDO::FETCH_ASSOC)['total'];

    // Inventario total
    $sqlInventario = "SELECT SUM(cantidad) as total FROM inventario";
    $queryInventario = $pdo->query($sqlInventario);
    $totalInventario = $queryInventario->fetch(PDO::FETCH_ASSOC)['total'];

    // Opcional: Cantidad de camiones
    $sqlCamiones = "SELECT COUNT(*) as total FROM camiones";
    $queryCamiones = $pdo->query($sqlCamiones);
    $totalCamiones = $queryCamiones->fetch(PDO::FETCH_ASSOC)['total'];

} catch (Exception $e) {
    die("Error al obtener estadísticas: " . $e->getMessage());
}
?>
<div class="content-wrapper">
    <!-- Content Header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Bienvenido a Ag. Gas San Matias</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- Tarjeta de Choferes -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?php echo $totalChoferes; ?></h3>
                            <p>Choferes</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <a href="view/choferes" class="small-box-footer">Ver detalles <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <!-- Tarjeta de Ayudantes -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?php echo $totalAyudantes; ?></h3>
                            <p>Ayudantes</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <a href="view/ayudantes" class="small-box-footer">Ver detalles <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <!-- Tarjeta de Productos -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?php echo $totalProductos; ?></h3>
                            <p>Productos disponibles</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-box"></i>
                        </div>
                        <a href="view/productos" class="small-box-footer">Ver productos <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <!-- Tarjeta de Inventario -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3><?php echo $totalInventario; ?></h3>
                            <p>Inventario total</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-warehouse"></i>
                        </div>
                        <a href="view/inventario" class="small-box-footer">Ver inventario <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <!-- Tarjeta de Camiones (opcional) -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3><?php echo $totalCamiones; ?></h3>
                            <p>Camiones</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-truck"></i>
                        </div>
                        <a href="view/camiones" class="small-box-footer">Ver camiones <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
include('layout/final.php');
?>


 