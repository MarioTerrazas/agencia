<?php
include('../../app/config.php');

// Recoger los datos enviados desde el formulario
$liquidacion_id = $_POST['liquidacion_id'];
$gasto_id = $_POST['gasto_id'];
$monto = $_POST['monto'];
$descripcion = $_POST['descripcion'];

try {
    // Preparar la consulta SQL para insertar el nuevo gasto en tiene_gastos
    $sql = "INSERT INTO tiene_gastos (liquidacion_id, gasto_id, monto, descripcion) 
            VALUES (:liquidacion_id, :gasto_id, :monto, :descripcion)";
    $sentencia = $pdo->prepare($sql);

    // Asignar los valores a los parámetros
    $sentencia->bindParam(':liquidacion_id', $liquidacion_id);
    $sentencia->bindParam(':gasto_id', $gasto_id);
    $sentencia->bindParam(':monto', $monto);
    $sentencia->bindParam(':descripcion', $descripcion);

    // Ejecutar la consulta
    $sentencia->execute();

    // Obtener el nombre del gasto agregado
    $sqlGastoNombre = "SELECT nombre_gasto FROM gastos WHERE gasto_id = :gasto_id";
    $sentenciaGastoNombre = $pdo->prepare($sqlGastoNombre);
    $sentenciaGastoNombre->bindParam(':gasto_id', $gasto_id);
    $sentenciaGastoNombre->execute();
    $nombre_gasto = $sentenciaGastoNombre->fetchColumn();

    // Devolver la respuesta en formato JSON
    echo json_encode([
        'success' => true,
        'nombre_gasto' => $nombre_gasto,
        'monto' => $monto
    ]);

} catch (Exception $e) {
    // Enviar error en caso de fallo
    echo json_encode([
        'success' => false,
        'message' => 'Error al agregar el gasto: ' . $e->getMessage()
    ]);
}
?>
