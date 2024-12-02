<?php

// Recogemos el ID del ayudante desde el parámetro GET
$ayudante_id_get = $_GET['id'];

// Preparamos la consulta para obtener los datos del ayudante
$sql = "SELECT * FROM ayudantes WHERE ayudante_id = :ayudante_id";
$sentencia = $pdo->prepare($sql);
$sentencia->bindParam(':ayudante_id', $ayudante_id_get);
$sentencia->execute();

// Obtenemos los datos del ayudante
$ayudante = $sentencia->fetch(PDO::FETCH_ASSOC);

// Asignamos los valores a las variables
$nombre = $ayudante['nombre'];
$telefono = $ayudante['telefono'];
?>
