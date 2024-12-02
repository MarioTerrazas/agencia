<?php
include('../../app/config.php');

// Recoger los datos enviados desde el formulario
$id_rol = $_POST['id_rol'];
$rol = $_POST['rol'];
$fecha_hora = date('Y-m-d H:i:s'); // Fecha y hora actual

try {
    // Preparamos la sentencia SQL para actualizar el rol
    $sql = "UPDATE rol 
            SET rol = :rol, fyh_actualizacion = :fyh_actualizacion 
            WHERE id_rol = :id_rol";
    $sentencia = $pdo->prepare($sql);

    // Asignamos los valores a los parámetros
    $sentencia->bindParam(':rol', $rol);
    $sentencia->bindParam(':fyh_actualizacion', $fecha_hora);
    $sentencia->bindParam(':id_rol', $id_rol);

    // Ejecutamos la consulta
    $sentencia->execute();

    // Mensaje de éxito
    session_start();
    $_SESSION['mensaje'] = "Rol actualizado correctamente";
    $_SESSION['icono'] = "success";

    // Redirigimos a la lista de roles
    header('Location:'.$URL.'views/roles/index.php');
    exit();
    
} catch (Exception $e) {
    // Si hay un error, mostrar un mensaje
    session_start();
    $_SESSION['mensaje'] = "Error al actualizar el rol: " . $e->getMessage();
    $_SESSION['icono'] = "error";

    // Redirigir de vuelta a la página de edición
    header('Location:'.$URL.'views/roles/edit.php?id='.$id_rol);
    exit();
}
?>
