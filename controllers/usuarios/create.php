<?php
include('../../app/config.php');

// Recoger los datos enviados desde el formulario
$nombre = $_POST['nombre'];
$id_rol = $_POST['rol'];
$email = $_POST['email'];
$contraseña = $_POST['contraseña'];
$contraseña2 = $_POST['contraseña2'];
$fecha_hora = date('Y-m-d H:i:s');

// Manejar la imagen
$carpetaPerfil = '../../view/usuarios/perfil/';

// Verificar si la carpeta existe, si no, crearla
if (!file_exists($carpetaPerfil)) {
    mkdir($carpetaPerfil, 0777, true);
}

$imagenNombre = $_FILES['imagen']['name'];
$imagenRutaTemporal = $_FILES['imagen']['tmp_name'];
$rutaImagen = $carpetaPerfil . $imagenNombre;

// Subir la imagen si se ha seleccionado
if (!empty($imagenNombre)) {
    move_uploaded_file($imagenRutaTemporal, $rutaImagen);
}

if ($contraseña === $contraseña2) {
    $contraseña = password_hash($contraseña2, PASSWORD_DEFAULT);

    // Insertar datos en la base de datos
    $sql = "INSERT INTO usuario (nombre, id_rol, email, u_password, imagen, fyh_creacion) 
            VALUES (:nombre, :id_rol, :email, :u_password, :imagen, :fyh_creacion)";
    $sentencia = $pdo->prepare($sql);

    $sentencia->bindParam(':nombre', $nombre);
    $sentencia->bindParam(':id_rol', $id_rol);
    $sentencia->bindParam(':email', $email);
    $sentencia->bindParam(':u_password', $contraseña);
    $sentencia->bindParam(':imagen', $imagenNombre);
    $sentencia->bindParam(':fyh_creacion', $fecha_hora);

    $sentencia->execute();

    session_start();
    $_SESSION['mensaje'] = "Usuario registrado correctamente";
    $_SESSION['icono'] = "success";
    header('Location:' . $URL . 'view/usuarios');
} else {
    session_start();
    $_SESSION['mensaje'] = "Las contraseñas no coinciden";
    $_SESSION['icono'] = "error";
    header('Location:' . $URL . 'view/usuarios/create.php');
}
?>
