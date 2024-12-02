<?php
// Archivo: controllers/liquidaciones/delete.php
include('../../app/config.php');

// Recogemos el ID de la liquidación desde el parámetro POST
$liquidacion_id = $_POST['liquidacion_id'];

try {
    // Preparamos la sentencia SQL para eliminar la liquidación
    $sql = "DELETE FROM liquidaciones WHERE liquidacion_id = :liquidacion_id";
    $sentencia = $pdo->prepare($sql);
    $sentencia->bindParam(':liquidacion_id', $liquidacion_id);

    // Ejecutamos la consulta
    $sentencia->execute();

    // Iniciamos la sesión y configuramos los mensajes de éxito
    session_start();
    $_SESSION['mensaje'] = "Liquidación eliminada correctamente";
    $_SESSION['icono'] = "success";

    // Redireccionamos a la lista de liquidaciones
    header('Location:'.$URL.'view/liquidaciones/index.php');
    exit();

} catch (Exception $e) {
    // Si hay un error, configuramos los mensajes de error
    session_start();
    $_SESSION['mensaje'] = "Error al eliminar la liquidación: " . $e->getMessage();
    $_SESSION['icono'] = "error";

    // Redireccionamos a la lista de liquidaciones
    header('Location:'.$URL.'view/liquidaciones/index.php');
    exit();
}
?>

