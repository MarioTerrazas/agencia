<?php
include('../../app/config.php');

// Recoger los datos enviados desde el formulario
$liquidacion_id = $_POST['liquidacion_id'];
$tipo = $_POST['tipo'];
$camion_id = $_POST['camion_id'];
$chofer_id = $_POST['chofer_id'];
$ayudante_id = $_POST['ayudante_id'];
$fecha = $_POST['fecha'];
$estado = 'incompleto'; // Siempre guardar como incompleto

try {
    // Preparamos la sentencia SQL para actualizar la liquidación
    $sql = "UPDATE liquidaciones 
            SET tipo = :tipo, camion_id = :camion_id, chofer_id = :chofer_id, ayudante_id = :ayudante_id, fecha = :fecha, estado = :estado
            WHERE liquidacion_id = :liquidacion_id";
    $sentencia = $pdo->prepare($sql);

    // Asignamos los valores a los parámetros
    $sentencia->bindParam(':tipo', $tipo);
    $sentencia->bindParam(':camion_id', $camion_id);
    $sentencia->bindParam(':chofer_id', $chofer_id);
    $sentencia->bindParam(':ayudante_id', $ayudante_id);
    $sentencia->bindParam(':fecha', $fecha);
    $sentencia->bindParam(':estado', $estado);
    $sentencia->bindParam(':liquidacion_id', $liquidacion_id);

    // Ejecutamos la consulta
    $sentencia->execute();

    // Mensaje de éxito
    session_start();
    $_SESSION['mensaje'] = "Liquidación actualizada correctamente";
    $_SESSION['icono'] = "success";

    // Redireccionamos a la lista de liquidaciones
    header('Location:'.$URL.'view/liquidaciones/index.php');
    exit();
    
} catch (Exception $e) {
    // Si hay un error, mostrar un mensaje
    session_start();
    $_SESSION['mensaje'] = "Error al actualizar la liquidación: " . $e->getMessage();
    $_SESSION['icono'] = "error";

    // Redirigir de vuelta a la página de edición
    header('Location:'.$URL.'view/liquidaciones/edit.php?id='.$liquidacion_id);
    exit();
}
?>
