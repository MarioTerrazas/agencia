<?php
include('../../app/config.php');

// Recoger el ID del rol desde el parámetro GET
$id_rol = $_GET['id'];

try {
    // Preparamos la sentencia SQL para eliminar el rol
    $sql = "DELETE FROM rol WHERE id_rol = :id_rol";
    $sentencia = $pdo->prepare($sql);
    $sentencia->bindParam(':id_rol', $id_rol);
    
    // Ejecutamos la consulta
    $sentencia->execute();

    // Mensaje de éxito
    session_start();
    $_SESSION['mensaje'] = "Rol eliminado correctamente";
    $_SESSION['icono'] = "success";

    // Redirigimos a la lista de roles
    header('Location:'.$URL.'view/roles/index.php');
    exit();
    
} catch (Exception $e) {
    // Si hay un error, mostrar un mensaje
    session_start();
    $_SESSION['mensaje'] = "Error al eliminar el rol: " . $e->getMessage();
    $_SESSION['icono'] = "error";

    // Redirigir de vuelta a la lista
    header('Location:'.$URL.'view/roles/index.php');
    exit();
}
?>
