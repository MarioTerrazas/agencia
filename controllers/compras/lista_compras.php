<?php

// Preparamos la consulta para obtener la lista de compras
$sql = "SELECT * FROM compras";
$query = $pdo->prepare($sql);
$query->execute();

// Obtenemos las compras como un array
$compras = $query->fetchAll(PDO::FETCH_ASSOC);
?>
