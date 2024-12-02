<?php
include('../../app/config.php');

// Recoger los datos enviados desde el formulario
$fecha = $_POST['fecha'];
$proveedor = $_POST['proveedor'];
$usuario_id = $_POST['usuario_id'];
$fecha_hora = date('Y-m-d H:i:s'); // Fecha y hora actual

try {
    // Preparar la consulta SQL para insertar la nueva compra
    $sql = "INSERT INTO compras (fecha, proveedor, usuario_id) 
            VALUES (:fecha, :proveedor, :usuario_id)";
    
    // Preparamos la consulta
    $sentencia = $pdo->prepare($sql);

    // Asignar los valores a los parámetros
    $sentencia->bindParam(':fecha', $fecha);
    $sentencia->bindParam(':proveedor', $proveedor);
    $sentencia->bindParam(':usuario_id', $usuario_id);

    // Ejecutar la consulta
    $sentencia->execute();

    // Mensaje de éxito
    session_start();
    $_SESSION['mensaje'] = "Compra creada correctamente";
    $_SESSION['icono'] = "success";

    // Redireccionar a la lista de compras
    header('Location:'.$URL.'view/compras/index.php');
    exit();

} catch (Exception $e) {
    // Si hay un error, mostrar un mensaje
    session_start();
    $_SESSION['mensaje'] = "Error al crear la compra: " . $e->getMessage();
    $_SESSION['icono'] = "error";

    // Redirigir de vuelta al formulario
    header('Location:'.$URL.'view/compras/create.php');
    exit();
}
?>
