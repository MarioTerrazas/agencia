<?php
include('../../app/config.php');

// Recoger los datos enviados desde el formulario
$tipo = $_POST['tipo'];
$camion_id = $_POST['camion_id'];
$chofer_id = $_POST['chofer_id'];
$ayudante_id = $_POST['ayudante_id'];
$fecha = $_POST['fecha'];
$estado = 'incompleto'; // Estado fijo como "incompleto"

// Comprobar si algún campo opcional está vacío y asignar `NULL`
$camion_id = !empty($camion_id) ? $camion_id : null;
$chofer_id = !empty($chofer_id) ? $chofer_id : null;
$ayudante_id = !empty($ayudante_id) ? $ayudante_id : null;

try {
    // Preparar la consulta SQL para insertar la nueva liquidación
    $sql = "INSERT INTO liquidaciones (tipo, camion_id, chofer_id, ayudante_id, fecha, estado) 
            VALUES (:tipo, :camion_id, :chofer_id, :ayudante_id, :fecha, :estado)";
    
    // Preparamos la consulta
    $sentencia = $pdo->prepare($sql);

    // Asignar los valores a los parámetros
    $sentencia->bindParam(':tipo', $tipo);
    $sentencia->bindParam(':camion_id', $camion_id);
    $sentencia->bindParam(':chofer_id', $chofer_id);
    $sentencia->bindParam(':ayudante_id', $ayudante_id);
    $sentencia->bindParam(':fecha', $fecha);
    $sentencia->bindParam(':estado', $estado);

    // Ejecutar la consulta
    $sentencia->execute();

    // Mensaje de éxito
    session_start();
    $_SESSION['mensaje'] = "Liquidación creada correctamente";
    $_SESSION['icono'] = "success";

    // Redireccionar a la lista de liquidaciones
    header('Location:'.$URL.'view/liquidaciones/index.php');
    exit();

} catch (Exception $e) {
    // Si hay un error, mostrar un mensaje
    session_start();
    $_SESSION['mensaje'] = "Error al crear la liquidación: " . $e->getMessage();
    $_SESSION['icono'] = "error";

    // Redirigir de vuelta al formulario
    header('Location:'.$URL.'view/liquidaciones/create.php');
    exit();
}
?>

