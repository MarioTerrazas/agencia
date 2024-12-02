<?php
include('../../app/config.php');

// Recoger los datos enviados desde el formulario
$placa = $_POST['placa'];
$modelo = $_POST['modelo'];
$capacidad = $_POST['capacidad'];
$fecha_hora = date('Y-m-d H:i:s'); // Fecha y hora actual

try {
    // Preparar la consulta SQL para insertar el nuevo camión
    $sql = "INSERT INTO camiones (placa, modelo, capacidad) 
            VALUES (:placa, :modelo, :capacidad)";
    
    // Preparamos la consulta
    $sentencia = $pdo->prepare($sql);

    // Asignar los valores a los parámetros
    $sentencia->bindParam(':placa', $placa);
    $sentencia->bindParam(':modelo', $modelo);
    $sentencia->bindParam(':capacidad', $capacidad);

    // Ejecutar la consulta
    $sentencia->execute();

    // Mensaje de éxito
    session_start();
    $_SESSION['mensaje'] = "Camión creado correctamente";
    $_SESSION['icono'] = "success";

    // Redireccionar a la lista de camiones
    header('Location:'.$URL.'view/camiones/index.php');
    exit();

} catch (Exception $e) {
    // Si hay un error, mostrar un mensaje
    session_start();
    $_SESSION['mensaje'] = "Error al crear el camión: " . $e->getMessage();
    $_SESSION['icono'] = "error";

    // Redirigir de vuelta al formulario
    header('Location:'.$URL.'view/camiones/create.php');
    exit();
}
?>
