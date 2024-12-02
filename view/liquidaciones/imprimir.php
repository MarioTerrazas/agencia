<?php
include('../../app/config.php');
include('../../layout/session.php');

// Cargar los datos de la liquidación, productos y gastos
$liquidacion_id = $_GET['id'];

// Consulta para obtener los datos de la liquidación
$sqlLiquidacion = "SELECT l.*, c.placa AS camion_placa, ch.nombre AS chofer_nombre, a.nombre AS ayudante_nombre 
                   FROM liquidaciones l
                   LEFT JOIN camiones c ON l.camion_id = c.camion_id
                   LEFT JOIN choferes ch ON l.chofer_id = ch.chofer_id
                   LEFT JOIN ayudantes a ON l.ayudante_id = a.ayudante_id
                   WHERE l.liquidacion_id = :liquidacion_id";
$queryLiquidacion = $pdo->prepare($sqlLiquidacion);
$queryLiquidacion->bindParam(':liquidacion_id', $liquidacion_id);
$queryLiquidacion->execute();
$liquidacion = $queryLiquidacion->fetch(PDO::FETCH_ASSOC);

// Cargar productos de la liquidación
$sqlProductos = "SELECT dp.*, p.descripcion, p.precio 
                 FROM detalle_liquidacion dp
                 LEFT JOIN productos p ON dp.producto_id = p.producto_id
                 WHERE dp.liquidacion_id = :liquidacion_id";
$queryProductos = $pdo->prepare($sqlProductos);
$queryProductos->bindParam(':liquidacion_id', $liquidacion_id);
$queryProductos->execute();
$productos = $queryProductos->fetchAll(PDO::FETCH_ASSOC);

// Cargar gastos actuales de la liquidación
$sqlGastos = "SELECT tg.*, g.nombre_gasto 
              FROM tiene_gastos tg
              LEFT JOIN gastos g ON tg.gasto_id = g.gasto_id
              WHERE tg.liquidacion_id = :liquidacion_id";
$queryGastos = $pdo->prepare($sqlGastos);
$queryGastos->bindParam(':liquidacion_id', $liquidacion_id);
$queryGastos->execute();
$gastos = $queryGastos->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle de Liquidación</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .content-wrapper {
            padding: 20px;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }

        .col-md-4 {
            width: 33.33%;
            box-sizing: border-box;
            padding: 10px;
        }

        .section-title {
            text-align: center;
            font-weight: bold;
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }

        tfoot th {
            text-align: right;
        }

        @media print {
            .btn {
                display: none !important;
            }

            body {
                margin: 0;
            }

            .content-wrapper {
                padding: 0;
            }

            .row {
                margin-bottom: 0;
            }
        }
    </style>
</head>
<body>
<div class="content-wrapper">
    <!-- Datos de la Liquidación -->
    <section class="content-header">
        <h1 class="section-title">Detalle de Liquidación</h1>
        <div class="row">
            <div class="col-md-4">
                <p><strong>ID Liquidación:</strong> <?php echo $liquidacion['liquidacion_id']; ?></p>
                <p><strong>Tipo:</strong> <?php echo ucfirst($liquidacion['tipo']); ?></p>
                <p><strong>Fecha:</strong> <?php echo $liquidacion['fecha']; ?></p>
            </div>
            <div class="col-md-4">
                <p><strong>Camión:</strong> <?php echo $liquidacion['camion_placa'] ?? 'N/A'; ?></p>
                <p><strong>Chofer:</strong> <?php echo $liquidacion['chofer_nombre'] ?? 'N/A'; ?></p>
                <p><strong>Ayudante:</strong> <?php echo $liquidacion['ayudante_nombre'] ?? 'N/A'; ?></p>
            </div>
            <div class="col-md-4">
                <p><strong>Estado:</strong> <?php echo ucfirst($liquidacion['estado']); ?></p>
            </div>
        </div>
    </section>

    <!-- Detalle de Productos -->
    <section class="content">
        <h2 class="section-title">Productos en Liquidación</h2>
        <table>
            <thead>
            <tr>
                <th>Producto</th>
                <th>Cantidad Inicial</th>
                <th>Cantidad Final</th>
                <th>Cantidad Vendida</th>
                <th>Precio Unitario</th>
                <th>Subtotal</th>
            </tr>
            </thead>
            <tbody>
            <?php 
            $totalProductos = 0;
            foreach ($productos as $producto) { 
                $subtotal = $producto['precio'] * $producto['cantidad_vendida'];
                $totalProductos += $subtotal;
            ?>
            <tr>
                <td><?php echo $producto['descripcion']; ?></td>
                <td><?php echo $producto['cantidad_inicial']; ?></td>
                <td><?php echo $producto['cantidad_final']; ?></td>
                <td><?php echo $producto['cantidad_vendida']; ?></td>
                <td><?php echo number_format($producto['precio'], 2); ?></td>
                <td><?php echo number_format($subtotal, 2); ?></td>
            </tr>
            <?php } ?>
            </tbody>
            <tfoot>
            <tr>
                <th colspan="5">Total Productos:</th>
                <th><?php echo number_format($totalProductos, 2); ?></th>
            </tr>
            </tfoot>
        </table>

        <!-- Detalle de Gastos -->
        <h2 class="section-title">Gastos de la Liquidación</h2>
        <table>
            <thead>
            <tr>
                <th>Tipo de Gasto</th>
                <th>Monto</th>
            </tr>
            </thead>
            <tbody>
            <?php 
            $totalGastos = 0;
            foreach ($gastos as $gasto) { 
                $totalGastos += $gasto['monto'];
            ?>
            <tr>
                <td><?php echo $gasto['nombre_gasto']; ?></td>
                <td><?php echo number_format($gasto['monto'], 2); ?></td>
            </tr>
            <?php } ?>
            </tbody>
            <tfoot>
            <tr>
                <th>Total Gastos:</th>
                <th><?php echo number_format($totalGastos, 2); ?></th>
            </tr>
            </tfoot>
        </table>
    </section>
</div>
</body>
</html>

<script>
        // Ejecutar la impresión cuando la página se cargue completamente
        window.onload = function() {
            window.print();
        };
    </script>