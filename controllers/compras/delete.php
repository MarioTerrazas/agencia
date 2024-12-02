<?php
// Archivo: controllers/compras/delete.php
include('../../app/config.php');

// Recogemos el ID de la compra desde el parámetro POST
$compra_id = $_POST['compra_id'];

try {
    // Preparamos la sentencia SQL para eliminar la compra
    $sql = "DELETE FROM Compras WHERE compra_id = :compra_id";
    $sentencia = $pdo->prepare($sql);
    $sentencia->bindParam(':compra_id', $compra_id);

    // Ejecutamos la consulta
    $sentencia->execute();

    // Iniciamos la sesión y configuramos los mensajes de éxito
    session_start();
    $_SESSION['mensaje'] = "Compra eliminada correctamente";
    $_SESSION['icono'] = "success";

    // Redireccionamos a la lista de compras
    header('Location:'.$URL.'view/compras/index.php');
    exit();

} catch (Exception $e) {
    // Si hay un error, configuramos los mensajes de error
    session_start();
    $_SESSION['mensaje'] = "Error al eliminar la compra: " . $e->getMessage();
    $_SESSION['icono'] = "error";

    // Redireccionamos a la lista de compras
    header('Location:'.$URL.'view/compras/index.php');
    exit();
}
?>
