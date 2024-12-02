<?php

// Recogemos el ID del rol desde el parámetro GET
$id_rol_get = $_GET['id'];

// Preparamos la consulta para obtener los datos del rol
$sql = "SELECT * FROM rol WHERE id_rol = :id_rol";
$sentencia = $pdo->prepare($sql);
$sentencia->bindParam(':id_rol', $id_rol_get);
$sentencia->execute();

// Obtenemos los datos del rol
$rol_data = $sentencia->fetch(PDO::FETCH_ASSOC);

// Asignamos los valores a las variables
$rol = $rol_data['rol'];
$fyh_creacion = $rol_data['fyh_creacion'];
$fyh_actualizacion = $rol_data['fyh_actualizacion'];
?>
