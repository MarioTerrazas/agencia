<?php

// Preparamos la consulta para obtener la lista de gastos
$sql = "SELECT * FROM gastos";
$query = $pdo->prepare($sql);
$query->execute();

// Obtenemos los gastos como un array
$gastos = $query->fetchAll(PDO::FETCH_ASSOC);
?>
