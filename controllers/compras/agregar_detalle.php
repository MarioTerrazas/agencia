<?php
include('../../app/config.php');

// Recogemos los datos enviados desde el formulario
$compra_id = $_POST['compra_id'];
$producto_id = $_POST['producto_id'];
$cantidad = $_POST['cantidad'];
$precio = $_POST['precio'];

try {
    // Consulta para obtener la descripción del producto
    $sqlProducto = "SELECT descripcion FROM productos WHERE producto_id = :producto_id";
    $queryProducto = $pdo->prepare($sqlProducto);
    $queryProducto->bindParam(':producto_id', $producto_id);
    $queryProducto->execute();
    $producto = $queryProducto->fetch(PDO::FETCH_ASSOC);

    // Preparar la consulta SQL para insertar el detalle de la compra
    $sqlDetalle = "INSERT INTO detalle_compras (compra_id, producto_id, cantidad, precio) 
                   VALUES (:compra_id, :producto_id, :cantidad, :precio)";
    $queryDetalle = $pdo->prepare($sqlDetalle);

    // Asignar los valores a los parámetros
    $queryDetalle->bindParam(':compra_id', $compra_id);
    $queryDetalle->bindParam(':producto_id', $producto_id);
    $queryDetalle->bindParam(':cantidad', $cantidad);
    $queryDetalle->bindParam(':precio', $precio);

    // Ejecutar la consulta
    $queryDetalle->execute();

    // Enviar la respuesta como JSON para actualizar la interfaz
    echo json_encode([
        'success' => true,
        'detalle' => [
            'producto_id' => $producto_id,
            'descripcion' => $producto['descripcion'],
            'cantidad' => $cantidad,
            'precio' => number_format($precio, 2),
        ]
    ]);
} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'message' => 'Error al agregar el detalle de compra: ' . $e->getMessage()
    ]);
}
?>
