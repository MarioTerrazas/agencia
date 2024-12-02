<?php

// Recoger el ID de la compra desde el parámetro GET
$compra_id_get = $_GET['id'];

// Preparamos la consulta para obtener los datos de la compra
$sql = "SELECT * FROM compras WHERE compra_id = :compra_id";
$sentencia = $pdo->prepare($sql);
$sentencia->bindParam(':compra_id', $compra_id_get);
$sentencia->execute();

// Obtenemos los datos de la compra
$compra = $sentencia->fetch(PDO::FETCH_ASSOC);

// Asignamos los valores de los campos a las variables
$fecha = $compra['fecha'];
$proveedor = $compra['proveedor'];
$usuario_id = $compra['usuario_id'];
?>


