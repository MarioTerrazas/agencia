<?php
include('../../app/config.php');

// Recoger los datos enviados desde el formulario
$nombre = $_POST['nombre'];
$licencia = $_POST['licencia'];
$telefono = $_POST['telefono'];

try {
    // Preparar la consulta SQL para insertar el nuevo chofer
    $sql = "INSERT INTO choferes (nombre, licencia, telefono) 
            VALUES (:nombre, :licencia, :telefono)";
    
    // Preparamos la consulta
    $sentencia = $pdo->prepare($sql);

    // Asignar los valores a los parámetros
    $sentencia->bindParam(':nombre', $nombre);
    $sentencia->bindParam(':licencia', $licencia);
    $sentencia->bindParam(':telefono', $telefono);

    // Ejecutar la consulta
    $sentencia->execute();

    // Mensaje de éxito
    session_start();
    $_SESSION['mensaje'] = "Chofer creado correctamente";
    $_SESSION['icono'] = "success";

    // Redireccionar a la lista de choferes
    header('Location:'.$URL.'view/choferes/index.php');
    exit();

} catch (Exception $e) {
    // Si hay un error, mostrar un mensaje
    session_start();
    $_SESSION['mensaje'] = "Error al crear el chofer: " . $e->getMessage();
    $_SESSION['icono'] = "error";

    // Redirigir de vuelta al formulario
    header('Location:'.$URL.'view/choferes/create.php');
    exit();
}
?>
