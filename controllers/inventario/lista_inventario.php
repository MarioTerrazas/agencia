<?php

// Consulta para obtener los datos del inventario con el nombre del producto
$sql = "SELECT i.inventario_id, p.descripcion AS producto_nombre, i.cantidad
        FROM inventario i
        LEFT JOIN productos p ON i.producto_id = p.producto_id";
$query = $pdo->prepare($sql);
$query->execute();

// Obtenemos los resultados como un array
$inventario = $query->fetchAll(PDO::FETCH_ASSOC);
?>
