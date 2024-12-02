<?php
include('../../app/config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $liquidacion_id = $_POST['liquidacion_id'];

    try {
        // Cambiar el estado de la liquidación a "completado"
        $sql = "UPDATE liquidaciones SET estado = 'completado' WHERE liquidacion_id = :liquidacion_id";
        $query = $pdo->prepare($sql);
        $query->bindParam(':liquidacion_id', $liquidacion_id);
        $query->execute();

        echo json_encode(['success' => true]);
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    }
}
?>

