<?php
include('../../app/config.php');

// Recoger los datos enviados desde el formulario
$liquidacion_id = $_POST['liquidacion_id'];
$producto_id = $_POST['producto_id'];
$cantidad_inicial = $_POST['cantidad_inicial'];
$cantidad_final = $_POST['cantidad_final'];

try {

    // Consultar el producto y calcular el subtotal
    $sqlProducto = "SELECT descripcion, precio FROM productos WHERE producto_id = :producto_id";
    $queryProducto = $pdo->prepare($sqlProducto);
    $queryProducto->bindParam(':producto_id', $producto_id);
    $queryProducto->execute();
    $producto = $queryProducto->fetch(PDO::FETCH_ASSOC);

    // Calcular cantidad vendida y subtotal
    $cantidad_vendida = $cantidad_inicial - $cantidad_final;
    $subtotal = $cantidad_vendida * $producto['precio'];

    // Insertar el producto en detalle_liquidacion
    $sql = "INSERT INTO detalle_liquidacion (liquidacion_id, producto_id, cantidad_inicial, cantidad_final, subtotal) 
            VALUES (:liquidacion_id, :producto_id, :cantidad_inicial, :cantidad_final, :subtotal)";
    $sentencia = $pdo->prepare($sql);

    // Vincular los parámetros
    $sentencia->bindParam(':liquidacion_id', $liquidacion_id);
    $sentencia->bindParam(':producto_id', $producto_id);
    $sentencia->bindParam(':cantidad_inicial', $cantidad_inicial);
    $sentencia->bindParam(':cantidad_final', $cantidad_final);
    $sentencia->bindParam(':subtotal', $subtotal);

    // Ejecutar la consulta
    $sentencia->execute();

    // Respuesta en JSON
    echo json_encode([
        'success' => true,
        'descripcion' => $producto['descripcion'],
        'cantidad_inicial' => $cantidad_inicial,
        'cantidad_final' => $cantidad_final,
        'cantidad_vendida' => $cantidad_vendida,
        'precio' => number_format($producto['precio'], 2),
        'subtotal' => number_format($subtotal, 2)
    ]);

} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'message' => 'Error al agregar el producto: ' . $e->getMessage()
    ]);
}
?>
