
<?php


// Preparamos la consulta para obtener la lista de camiones
$sql = "SELECT * FROM camiones";
$query = $pdo->prepare($sql);
$query->execute();

// Obtenemos los camiones como un array
$camiones = $query->fetchAll(PDO::FETCH_ASSOC);
?>
