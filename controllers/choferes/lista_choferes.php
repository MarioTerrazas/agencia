<?php

// Preparamos la consulta para obtener la lista de choferes
$sql = "SELECT * FROM choferes";
$query = $pdo->prepare($sql);
$query->execute();

// Obtenemos los choferes como un array
$choferes = $query->fetchAll(PDO::FETCH_ASSOC);
?>

