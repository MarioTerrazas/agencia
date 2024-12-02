<?php 

include('../../app/config.php');

$email = $_POST['email'];
$u_password = $_POST['u_password'];

$contador = 0;
$sql = "SELECT * FROM usuario WHERE email = :email";

$query = $pdo->prepare($sql);
$query->bindParam(':email', $email);
$query->execute();

$usuarios = $query->fetchAll(PDO::FETCH_ASSOC);

foreach ($usuarios as $usuario) {
    $contador = $contador + 1;
    $email_bd = $usuario['email'];
    $u_password_bd = $usuario['u_password'];
    $nombre_bd = $usuario['nombre'];
    $imagen_bd = $usuario['imagen']; // Obtener la imagen del usuario
}

if (($contador > 0) && (password_verify($u_password, $u_password_bd))) {
    session_start();
    $_SESSION['email_session'] = $email;
    $_SESSION['nombre_session'] = $nombre_bd;
    $_SESSION['imagen_session'] = $imagen_bd; // Registrar la imagen en la sesión
    $_SESSION['mensaje'] = "Bienvenido";
    $_SESSION['icono'] = "success";
    header('Location:' . $URL . 'index.php');
} else {
    session_start();
    $_SESSION['mensaje'] = "Error: Datos incorrectos";
    $_SESSION['icono'] = "error";
    header('Location:' . $URL . 'login');
}

?>
