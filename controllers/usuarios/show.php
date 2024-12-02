<?php

$id_usuario_get = $_GET['id'];


$sql_u ="SELECT id_usuario, nombre, email, u_password, imagen, tu.id_rol, rol
        FROM usuario AS tu INNER JOIN rol AS tr
        ON tu.id_rol = tr.id_rol 
        WHERE id_usuario = $id_usuario_get";

$query_u = $pdo->prepare($sql_u);
$query_u->execute();

$usuarios = $query_u->fetchAll(PDO::FETCH_ASSOC);

foreach ($usuarios as $usuario) {
    $nombre = $usuario['nombre'];
    $email = $usuario['email'];
    $rol_u = $usuario['rol'];
}
?>