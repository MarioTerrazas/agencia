<?php

// Recogemos el ID del producto desde el parámetro GET
$producto_id_get = $_GET['id'];

// Preparamos la consulta para obtener los datos del producto
$sql = "SELECT * FROM Productos WHERE producto_id = :producto_id";
$sentencia = $pdo->prepare($sql);
$sentencia->bindParam(':producto_id', $producto_id_get);
$sentencia->execute();

// Obtenemos los datos del producto
$producto = $sentencia->fetch(PDO::FETCH_ASSOC);

// Asignamos los valores a las variables
$tipo = $producto['tipo'];
$descripcion = $producto['descripcion'];
$precio = $producto['precio'];
?>
