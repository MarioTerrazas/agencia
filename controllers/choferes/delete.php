<?php
include('../../app/config.php');

// Recoger el ID del chofer desde el parámetro GET
$chofer_id = $_GET['id'];

try {
    // Preparamos la sentencia SQL para eliminar el chofer
    $sql = "DELETE FROM choferes WHERE chofer_id = :chofer_id";
    $sentencia = $pdo->prepare($sql);
    $sentencia->bindParam(':chofer_id', $chofer_id);
    
    // Ejecutamos la consulta
    $sentencia->execute();

    // Mensaje de éxito
    session_start();
    $_SESSION['mensaje'] = "Chofer eliminado correctamente";
    $_SESSION['icono'] = "success";

    // Redirigimos a la lista de choferes
    header('Location:'.$URL.'view/choferes/index.php');
    exit();
    
} catch (Exception $e) {
    // Si hay un error, mostrar un mensaje
    session_start();
    $_SESSION['mensaje'] = "Error al eliminar el chofer: " . $e->getMessage();
    $_SESSION['icono'] = "error";

    // Redirigir de vuelta a la lista
    header('Location:'.$URL.'view/choferes/index.php');
    exit();
}
?>
