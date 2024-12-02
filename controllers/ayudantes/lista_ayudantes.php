<?php

// Preparamos la consulta para obtener la lista de ayudantes
$sql = "SELECT * FROM ayudantes";
$query = $pdo->prepare($sql);
$query->execute();

// Obtenemos los ayudantes como un array
$ayudantes = $query->fetchAll(PDO::FETCH_ASSOC);
?>
