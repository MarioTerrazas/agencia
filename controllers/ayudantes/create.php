<?php
include('../../app/config.php');

// Recoger los datos enviados desde el formulario
$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];
$fecha_hora = date('Y-m-d H:i:s'); // Fecha y hora actual

try {
    // Preparar la consulta SQL para insertar el nuevo ayudante
    $sql = "INSERT INTO ayudantes (nombre, telefono) 
            VALUES (:nombre, :telefono)";
    
    // Preparamos la consulta
    $sentencia = $pdo->prepare($sql);

    // Asignar los valores a los parámetros
    $sentencia->bindParam(':nombre', $nombre);
    $sentencia->bindParam(':telefono', $telefono);

    // Ejecutar la consulta
    $sentencia->execute();

    // Mensaje de éxito
    session_start();
    $_SESSION['mensaje'] = "Ayudante creado correctamente";
    $_SESSION['icono'] = "success";

    // Redireccionar a la lista de ayudantes
    header('Location:'.$URL.'view/ayudantes/index.php');
    exit();

} catch (Exception $e) {
    // Si hay un error, mostrar un mensaje
    session_start();
    $_SESSION['mensaje'] = "Error al crear el ayudante: " . $e->getMessage();
    $_SESSION['icono'] = "error";

    // Redirigir de vuelta al formulario
    header('Location:'.$URL.'view/ayudantes/create.php');
    exit();
}
?>
