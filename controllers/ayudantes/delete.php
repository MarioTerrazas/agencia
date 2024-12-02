<?php
include('../../app/config.php');

// Recoger el ID del ayudante desde el parámetro GET
$ayudante_id = $_GET['id'];

try {
    // Preparamos la sentencia SQL para eliminar el ayudante
    $sql = "DELETE FROM ayudantes WHERE ayudante_id = :ayudante_id";
    $sentencia = $pdo->prepare($sql);
    $sentencia->bindParam(':ayudante_id', $ayudante_id);
    
    // Ejecutamos la consulta
    $sentencia->execute();

    // Mensaje de éxito
    session_start();
    $_SESSION['mensaje'] = "Ayudante eliminado correctamente";
    $_SESSION['icono'] = "success";

    // Redirigimos a la lista de ayudantes
    header('Location:'.$URL.'view/ayudantes/index.php');
    exit();
    
} catch (Exception $e) {
    // Si hay un error, mostrar un mensaje
    session_start();
    $_SESSION['mensaje'] = "Error al eliminar el ayudante: " . $e->getMessage();
    $_SESSION['icono'] = "error";

    // Redirigir de vuelta a la lista
    header('Location:'.$URL.'view/ayudantes/index.php');
    exit();
}
?>
