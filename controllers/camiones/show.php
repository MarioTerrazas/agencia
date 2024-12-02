<?php

// Recoger el ID del camión desde el parámetro GET
$camion_id_get = $_GET['id'];

// Preparamos la consulta para obtener los datos del camión
$sql = "SELECT * FROM camiones WHERE camion_id = :camion_id";
$sentencia = $pdo->prepare($sql);
$sentencia->bindParam(':camion_id', $camion_id_get);
$sentencia->execute();

// Obtenemos los datos del camión
$camion = $sentencia->fetch(PDO::FETCH_ASSOC);

// Asignamos los valores a las variables
$placa = $camion['placa'];
$modelo = $camion['modelo'];
$capacidad = $camion['capacidad'];
?>

