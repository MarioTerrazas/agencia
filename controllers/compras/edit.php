<?php
include('../../app/config.php');

// Recoger los datos enviados desde el formulario
$compra_id = $_POST['compra_id'];
$fecha = $_POST['fecha'];
$proveedor = $_POST['proveedor'];
$usuario_id = $_POST['usuario_id'];

try {
    // Preparamos la sentencia SQL para actualizar la compra
    $sql = "UPDATE compras 
            SET fecha = :fecha, proveedor = :proveedor, usuario_id = :usuario_id
            WHERE compra_id = :compra_id";
    $sentencia = $pdo->prepare($sql);

    // Asignamos los valores a los parámetros
    $sentencia->bindParam(':fecha', $fecha);
    $sentencia->bindParam(':proveedor', $proveedor);
    $sentencia->bindParam(':usuario_id', $usuario_id);
    $sentencia->bindParam(':compra_id', $compra_id);

    // Ejecutamos la consulta
    $sentencia->execute();

    // Mensaje de éxito
    session_start();
    $_SESSION['mensaje'] = "Compra actualizada correctamente";
    $_SESSION['icono'] = "success";

    // Redireccionamos a la lista de compras
    header('Location:'.$URL.'view/compras/index.php');
    exit();
    
} catch (Exception $e) {
    // Si hay un error, mostrar un mensaje
    session_start();
    $_SESSION['mensaje'] = "Error al actualizar la compra: " . $e->getMessage();
    $_SESSION['icono'] = "error";

    // Redirigir de vuelta a la página de edición
    header('Location:'.$URL.'view/compras/edit.php?id='.$compra_id);
    exit();
}
?>
