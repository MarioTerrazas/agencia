<?php

// Consulta para obtener la lista de liquidaciones junto con los nombres de camión, chofer y ayudante
$sql = "SELECT liquidaciones.liquidacion_id, liquidaciones.tipo, liquidaciones.fecha, liquidaciones.estado,
               camiones.placa AS camion_nombre, 
               choferes.nombre AS chofer_nombre, 
               ayudantes.nombre AS ayudante_nombre
        FROM liquidaciones
        LEFT JOIN camiones ON liquidaciones.camion_id = camiones.camion_id
        LEFT JOIN choferes ON liquidaciones.chofer_id = choferes.chofer_id
        LEFT JOIN ayudantes ON liquidaciones.ayudante_id = ayudantes.ayudante_id";

$query = $pdo->prepare($sql);
$query->execute();

// Obtenemos las liquidaciones como un array
$liquidaciones = $query->fetchAll(PDO::FETCH_ASSOC);
?>
