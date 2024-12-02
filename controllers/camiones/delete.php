<?php
// Archivo: controllers/productos/delete.php
include('../../app/config.php');

// Recogemos el ID del producto desde el parámetro POST
$producto_id = $_POST['producto_id'];

try {
    // Preparamos la sentencia SQL para eliminar el producto
    $sql = "DELETE FROM Productos WHERE producto_id = :producto_id";
    $sentencia = $pdo->prepare($sql);
    $sentencia->bindParam(':producto_id', $producto_id);

    // Ejecutamos la consulta
    $sentencia->execute();

    // Iniciamos la sesión y configuramos los mensajes de éxito
    session_start();
    $_SESSION['mensaje'] = "Producto eliminado correctamente";
    $_SESSION['icono'] = "success";

    // Redireccionamos a la lista de productos
    header('Location:'.$URL.'view/productos/index.php');
    exit();

} catch (Exception $e) {
    // Si hay un error, configuramos los mensajes de error
    session_start();
    $_SESSION['mensaje'] = "Error al eliminar el producto: " . $e->getMessage();
    $_SESSION['icono'] = "error";

    // Redireccionamos a la lista de productos
    header('Location:'.$URL.'view/productos/index.php');
    exit();
}
?>
