<?php
$sql_u ="SELECT id_usuario, nombre, email, u_password, imagen, tu.id_rol, rol
FROM usuario AS tu INNER JOIN rol AS tr
ON tu.id_rol = tr.id_rol";

$query_u = $pdo->prepare($sql_u);
$query_u->execute();

$usuarios = $query_u->fetchAll(PDO::FETCH_ASSOC);
?>