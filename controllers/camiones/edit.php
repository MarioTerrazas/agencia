<?php
include('../../app/config.php');

// Recoger los datos enviados desde el formulario
$camion_id = $_POST['camion_id'];
$placa = $_POST['placa'];
$modelo = $_POST['modelo'];
$capacidad = $_POST['capacidad'];

try {
    // Preparamos la sentencia SQL para actualizar el camión
    $sql = "UPDATE camiones 
            SET placa = :placa, modelo = :modelo, capacidad = :capacidad
            WHERE camion_id = :camion_id";
    $sentencia = $pdo->prepare($sql);

    // Asignamos los valores a los parámetros
    $sentencia->bindParam(':placa', $placa);
    $sentencia->bindParam(':modelo', $modelo);
    $sentencia->bindParam(':capacidad', $capacidad);
    $sentencia->bindParam(':camion_id', $camion_id);

    // Ejecutamos la consulta
    $sentencia->execute();

    // Mensaje de éxito
    session_start();
    $_SESSION['mensaje'] = "Camión actualizado correctamente";
    $_SESSION['icono'] = "success";

    // Redireccionamos a la lista de camiones
    header('Location:'.$URL.'view/camiones/index.php');
    exit();
    
} catch (Exception $e) {
    // Si hay un error, mostrar un mensaje
    session_start();
    $_SESSION['mensaje'] = "Error al actualizar el camión: " . $e->getMessage();
    $_SESSION['icono'] = "error";

    // Redirigir de vuelta a la página de edición
    header('Location:'.$URL.'view/camiones/edit.php?id='.$camion_id);
    exit();
}
?>
