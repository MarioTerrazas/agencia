<?php
include('../../app/config.php');

// Verifica si se ha proporcionado el ID del gasto
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    try {
        // Eliminar el gasto de la liquidación
        $sql = "DELETE FROM tiene_gastos WHERE id_tiene_gastos = :id";
        $sentencia = $pdo->prepare($sql);
        $sentencia->bindParam(':id', $id);
        $sentencia->execute();

        echo json_encode(['success' => true, 'message' => 'Gasto eliminado correctamente']);
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => 'Error al eliminar el gasto: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'ID de gasto no proporcionado']);
}
?>
