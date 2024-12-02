<?php
include('../../app/config.php');

// Recoger los datos enviados desde el formulario
$chofer_id = $_POST['chofer_id'];
$nombre = $_POST['nombre'];
$licencia = $_POST['licencia'];
$telefono = $_POST['telefono'];

try {
    // Preparamos la sentencia SQL para actualizar el chofer
    $sql = "UPDATE choferes 
            SET nombre = :nombre, licencia = :licencia, telefono = :telefono
            WHERE chofer_id = :chofer_id";
    $sentencia = $pdo->prepare($sql);

    // Asignamos los valores a los parámetros
    $sentencia->bindParam(':nombre', $nombre);
    $sentencia->bindParam(':licencia', $licencia);
    $sentencia->bindParam(':telefono', $telefono);
    $sentencia->bindParam(':chofer_id', $chofer_id);

    // Ejecutamos la consulta
    $sentencia->execute();

    // Mensaje de éxito
    session_start();
    $_SESSION['mensaje'] = "Chofer actualizado correctamente";
    $_SESSION['icono'] = "success";

    // Redirigimos a la lista de choferes
    header('Location:'.$URL.'view/choferes/index.php');
    exit();
    
} catch (Exception $e) {
    // Si hay un error, mostrar un mensaje
    session_start();
    $_SESSION['mensaje'] = "Error al actualizar el chofer: " . $e->getMessage();
    $_SESSION['icono'] = "error";

    // Redirigir de vuelta a la página de edición
    header('Location:'.$URL.'view/choferes/edit.php?id='.$chofer_id);
    exit();
}
?>
