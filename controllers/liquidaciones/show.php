<?php

// Recoger el ID de la liquidación desde el parámetro GET
$liquidacion_id_get = $_GET['id'];

// Preparamos la consulta para obtener los datos de la liquidación
$sql = "SELECT * FROM liquidaciones WHERE liquidacion_id = :liquidacion_id";
$sentencia = $pdo->prepare($sql);
$sentencia->bindParam(':liquidacion_id', $liquidacion_id_get);
$sentencia->execute();

// Obtenemos los datos de la liquidación
$liquidacion = $sentencia->fetch(PDO::FETCH_ASSOC);

// Asignamos los valores a las variables
$tipo = $liquidacion['tipo'];
$camion_id = $liquidacion['camion_id'];
$chofer_id = $liquidacion['chofer_id'];
$ayudante_id = $liquidacion['ayudante_id'];
$fecha = $liquidacion['fecha'];
$estado = $liquidacion['estado'];
?>

