<?php
include('../../app/config.php');

// Recoger los datos enviados desde el formulario
$gasto_id = $_POST['gasto_id'];
$nombre_gasto = $_POST['nombre_gasto'];

try {
    // Preparamos la sentencia SQL para actualizar el gasto
    $sql = "UPDATE gastos 
            SET nombre_gasto = :nombre_gasto
            WHERE gasto_id = :gasto_id";
    $sentencia = $pdo->prepare($sql);

    // Asignamos los valores a los parámetros
    $sentencia->bindParam(':nombre_gasto', $nombre_gasto);
    $sentencia->bindParam(':gasto_id', $gasto_id);

    // Ejecutamos la consulta
    $sentencia->execute();

    // Mensaje de éxito
    session_start();
    $_SESSION['mensaje'] = "Gasto actualizado correctamente";
    $_SESSION['icono'] = "success";

    // Redireccionamos a la lista de gastos
    header('Location:'.$URL.'view/gastos/index.php');
    exit();
    
} catch (Exception $e) {
    // Si hay un error, mostrar un mensaje
    session_start();
    $_SESSION['mensaje'] = "Error al actualizar el gasto: " . $e->getMessage();
    $_SESSION['icono'] = "error";

    // Redirigir de vuelta a la página de edición
    header('Location:'.$URL.'view/gastos/edit.php?id='.$gasto_id);
    exit();
}
?>
