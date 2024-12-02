<?php

// Recogemos el ID del chofer desde el parámetro GET
$chofer_id_get = $_GET['id'];

// Preparamos la consulta para obtener los datos del chofer
$sql = "SELECT * FROM choferes WHERE chofer_id = :chofer_id";
$sentencia = $pdo->prepare($sql);
$sentencia->bindParam(':chofer_id', $chofer_id_get);
$sentencia->execute();

// Obtenemos los datos del chofer
$chofer = $sentencia->fetch(PDO::FETCH_ASSOC);

// Asignamos los valores a las variables
$nombre = $chofer['nombre'];
$licencia = $chofer['licencia'];
$telefono = $chofer['telefono'];
?>


