<?php
include('../../app/config.php');

// Recoger el dato enviado desde el formulario
$nombre_gasto = $_POST['nombre_gasto'];

try {
    // Preparar la consulta SQL para insertar el nuevo gasto
    $sql = "INSERT INTO gastos (nombre_gasto) VALUES (:nombre_gasto)";
    
    // Preparamos la consulta
    $sentencia = $pdo->prepare($sql);

    // Asignar el valor al parámetro
    $sentencia->bindParam(':nombre_gasto', $nombre_gasto);

    // Ejecutar la consulta
    $sentencia->execute();

    // Mensaje de éxito
    session_start();
    $_SESSION['mensaje'] = "Gasto registrado correctamente";
    $_SESSION['icono'] = "success";

    // Redireccionar a la lista de gastos
    header('Location:'.$URL.'view/gastos/index.php');
    exit();

} catch (Exception $e) {
    // Si hay un error, mostrar un mensaje
    session_start();
    $_SESSION['mensaje'] = "Error al registrar el gasto: " . $e->getMessage();
    $_SESSION['icono'] = "error";

    // Redirigir de vuelta al formulario
    header('Location:'.$URL.'view/gastos/create.php');
    exit();
}
?>
