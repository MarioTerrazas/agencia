<?php
// Archivo: controllers/gastos/delete.php
include('../../app/config.php');

// Recogemos el ID del gasto desde el parámetro POST
$gasto_id = $_POST['gasto_id'];

try {
    // Preparamos la sentencia SQL para eliminar el gasto
    $sql = "DELETE FROM gastos WHERE gasto_id = :gasto_id";
    $sentencia = $pdo->prepare($sql);
    $sentencia->bindParam(':gasto_id', $gasto_id);

    // Ejecutamos la consulta
    $sentencia->execute();

    // Iniciamos la sesión y configuramos los mensajes de éxito
    session_start();
    $_SESSION['mensaje'] = "Gasto eliminado correctamente";
    $_SESSION['icono'] = "success";

    // Redireccionamos a la lista de gastos
    header('Location:'.$URL.'view/gastos/index.php');
    exit();

} catch (Exception $e) {
    // Si hay un error, configuramos los mensajes de error
    session_start();
    $_SESSION['mensaje'] = "Error al eliminar el gasto: " . $e->getMessage();
    $_SESSION['icono'] = "error";

    // Redireccionamos a la lista de gastos
    header('Location:'.$URL.'view/gastos/index.php');
    exit();
}
?>
