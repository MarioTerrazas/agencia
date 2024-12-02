<?php
include('../../app/config.php');

// Recoger los datos enviados desde el formulario
$rol = $_POST['rol'];
$fecha_hora = date('Y-m-d H:i:s'); // Fecha y hora actual

try {
    // Preparamos la consulta SQL para insertar el nuevo rol
    $sql = "INSERT INTO rol (rol, fyh_creacion, fyh_actualizacion) 
            VALUES (:rol, :fyh_creacion, :fyh_actualizacion)";
    
    // Preparamos la consulta
    $sentencia = $pdo->prepare($sql);

    // Asignar los valores a los parámetros
    $sentencia->bindParam(':rol', $rol);
    $sentencia->bindParam(':fyh_creacion', $fecha_hora);
    $sentencia->bindParam(':fyh_actualizacion', $fecha_hora);

    // Ejecutar la consulta
    $sentencia->execute();

    // Mensaje de éxito
    session_start();
    $_SESSION['mensaje'] = "Rol creado correctamente";
    $_SESSION['icono'] = "success";

    // Redireccionar a la lista de roles
    header('Location:'.$URL.'view/roles/index.php');
    exit();

} catch (Exception $e) {
    // Si hay un error, mostrar un mensaje
    session_start();
    $_SESSION['mensaje'] = "Error al crear el rol: " . $e->getMessage();
    $_SESSION['icono'] = "error";

    // Redirigir de vuelta al formulario
    header('Location:'.$URL.'view/roles/create.php');
    exit();
}
?>
