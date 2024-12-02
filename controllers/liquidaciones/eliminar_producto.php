<?php
include('../../app/config.php');

// Verifica si se ha proporcionado el ID del producto en la liquidación
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    try {
        // Eliminar el producto de la liquidación
        $sql = "DELETE FROM detalle_liquidacion WHERE id_detalle = :id";
        $sentencia = $pdo->prepare($sql);
        $sentencia->bindParam(':id', $id);
        $sentencia->execute();

        echo json_encode(['success' => true, 'message' => 'Producto eliminado correctamente']);
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => 'Error al eliminar el producto: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'ID de producto no proporcionado']);
}
?>
