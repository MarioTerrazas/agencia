<?php
include('../../app/config.php');

// Recoger los datos enviados desde el formulario
$nombre = $_POST['nombre'];
$id_rol = $_POST['rol'];
$email = $_POST['email'];
$contraseña = $_POST['contraseña'];
$contraseña2 = $_POST['contraseña2'];
$id_usuario = $_POST['id_usuario'];
$fecha_hora = date('Y-m-d H:i:s');

// Manejar la imagen
$carpetaPerfil = '../../view/usuarios/perfil/';

// Verificar si la carpeta existe, si no, crearla
if (!file_exists($carpetaPerfil)) {
    if (!mkdir($carpetaPerfil, 0777, true)) {
        die("Error al crear la carpeta de perfil.");
    }
}

$imagenNombre = $_FILES['imagen']['name'];
$imagenRutaTemporal = $_FILES['imagen']['tmp_name'];
$rutaImagen = $carpetaPerfil . $imagenNombre;

// Subir la imagen si se ha seleccionado
if (!empty($imagenNombre)) {
    if (!move_uploaded_file($imagenRutaTemporal, $rutaImagen)) {
        die("Error al mover la imagen a la carpeta destino.");
    }
}

try {
    // Si no se cambia la contraseña
    if (empty($contraseña)) {
        $sql = "UPDATE usuario 
                SET nombre = :nombre, id_rol = :id_rol, email = :email, imagen = :imagen, fyh_actualizacion = :fyh_actualizacion 
                WHERE id_usuario = :id_usuario";
        $sentencia = $pdo->prepare($sql);
        $sentencia->bindParam(':imagen', $imagenNombre);
    } else { // Si se cambia la contraseña
        if ($contraseña === $contraseña2) {
            $contraseña = password_hash($contraseña2, PASSWORD_DEFAULT);
            $sql = "UPDATE usuario 
                    SET nombre = :nombre, id_rol = :id_rol, email = :email, u_password = :u_password, imagen = :imagen, fyh_actualizacion = :fyh_actualizacion 
                    WHERE id_usuario = :id_usuario";
            $sentencia = $pdo->prepare($sql);
            $sentencia->bindParam(':u_password', $contraseña);
            $sentencia->bindParam(':imagen', $imagenNombre);
        } else {
            session_start();
            $_SESSION['mensaje'] = "Las contraseñas no coinciden.";
            $_SESSION['icono'] = "error";
            header('Location: ' . $URL . 'view/usuarios/edit.php?id=' . $id_usuario);
            exit();
        }
    }

    // Parámetros comunes
    $sentencia->bindParam(':nombre', $nombre);
    $sentencia->bindParam(':id_rol', $id_rol);
    $sentencia->bindParam(':email', $email);
    $sentencia->bindParam(':fyh_actualizacion', $fecha_hora);
    $sentencia->bindParam(':id_usuario', $id_usuario);

    // Ejecutar consulta
    $sentencia->execute();

    session_start();
    $_SESSION['mensaje'] = "Usuario modificado correctamente.";
    $_SESSION['icono'] = "success";
    header('Location: ' . $URL . 'view/usuarios');
} catch (Exception $e) {
    session_start();
    $_SESSION['mensaje'] = "Error al modificar el usuario: " . $e->getMessage();
    $_SESSION['icono'] = "error";
    header('Location: ' . $URL . 'view/usuarios/edit.php?id=' . $id_usuario);
}
?>
