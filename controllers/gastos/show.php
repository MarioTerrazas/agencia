<?php

$gasto_id_get = $_GET['id'];
$sql = "SELECT * FROM gastos WHERE gasto_id = :gasto_id";
$sentencia = $pdo->prepare($sql);
$sentencia->bindParam(':gasto_id', $gasto_id_get);
$sentencia->execute();
$gasto = $sentencia->fetch(PDO::FETCH_ASSOC);

if ($gasto) {
    $gasto_id = $gasto['gasto_id'];
    $nombre_gasto = $gasto['nombre_gasto'];
} else {
    // Redirigir o mostrar un mensaje de error si no se encuentra el gasto
    header("Location: ../../view/gastos/index.php?error=not_found");
    exit();
}
?>




