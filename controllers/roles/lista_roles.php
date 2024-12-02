<?php

// Preparamos la consulta para obtener la lista de roles
$sql = "SELECT * FROM rol";
$query = $pdo->prepare($sql);
$query->execute();

// Obtenemos los roles como un array
$roles = $query->fetchAll(PDO::FETCH_ASSOC);
?>
