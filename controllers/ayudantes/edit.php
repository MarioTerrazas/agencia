<?php
include('../../app/config.php');

// Recoger los datos enviados desde el formulario
$ayudante_id = $_POST['ayudante_id'];
$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];

try {
    // Preparamos la sentencia SQL para actualizar el ayudante
    $sql = "UPDATE ayudantes 
            SET nombre = :nombre, telefono = :telefono 
            WHERE ayudante_id = :ayudante_id";
    $sentencia = $pdo->prepare($sql);

    // Asignamos los valores a los parámetros
    $sentencia->bindParam(':nombre', $nombre);
    $sentencia->bindParam(':telefono', $telefono);
    $sentencia->bindParam(':ayudante_id', $ayudante_id);

    // Ejecutamos la consulta
    $sentencia->execute();

    // Mensaje de éxito
    session_start();
    $_SESSION['mensaje'] = "Ayudante actualizado correctamente";
    $_SESSION['icono'] = "success";

    // Redirigimos a la lista de ayudantes
    header('Location:'.$URL.'view/ayudantes/index.php');
    exit();
    
} catch (Exception $e) {
    // Si hay un error, mostrar un mensaje
    session_start();
    $_SESSION['mensaje'] = "Error al actualizar el ayudante: " . $e->getMessage();
    $_SESSION['icono'] = "error";

    // Redirigir de vuelta a la página de edición
    header('Location:'.$URL.'view/ayudantes/edit.php?id='.$ayudante_id);
    exit();
}
?>
