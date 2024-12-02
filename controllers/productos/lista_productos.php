<?php
// No se necesita incluir la conexión si ya está cargada en otro lugar.

// Realizamos la consulta utilizando PDO
$sql_p = "SELECT producto_id, tipo, descripcion, precio FROM Productos";
$query_p = $pdo->prepare($sql_p);
$query_p->execute();

// Obtenemos los resultados como un arreglo asociativo
$productos = $query_p->fetchAll(PDO::FETCH_ASSOC);
?>