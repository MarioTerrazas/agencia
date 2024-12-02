<?php
include('../../app/config.php');

$producto_id = $_POST['producto_id'];
$tipo = $_POST['tipo'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];

// Comprobar si los datos del producto están completos
if ($tipo && $descripcion && $precio) {       
    // Preparamos la sentencia SQL para actualizar el producto
    $sql ="UPDATE Productos 
            SET tipo=:tipo, descripcion=:descripcion, precio=:precio
            WHERE producto_id=:producto_id";
    
    $sentencia = $pdo->prepare($sql);

    // Asignamos los valores a los parámetros
    $sentencia->bindParam('tipo', $tipo);
    $sentencia->bindParam('descripcion', $descripcion);
    $sentencia->bindParam('precio', $precio);
    $sentencia->bindParam('producto_id', $producto_id);

    // Ejecutamos la consulta
    $sentencia->execute();

    // Iniciamos la sesión y configuramos los mensajes de éxito
    session_start();
    $_SESSION['mensaje'] = "Producto modificado correctamente";
    $_SESSION['icono'] = "success";

    // Redireccionamos a la lista de productos
    header('Location:'.$URL.'view/productos/index.php');
    exit();
} else {
    // Si falta algún dato, redirigimos a la página de edición con un mensaje de error
    session_start();
    $_SESSION['mensaje'] = "Todos los campos son obligatorios";
    $_SESSION['icono'] = "error";

    // Redirigir de vuelta a la página de edición del producto
    header('Location:'.$URL.'view/productos/edit.php?id='.$producto_id);
    exit();
}
?>
