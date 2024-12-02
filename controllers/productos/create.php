<?php
include('../../app/config.php'); // Incluimos la configuración de la base de datos

// Recogemos los datos del formulario
$tipo = $_POST['tipo'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];

try {
    // Preparamos la sentencia SQL para insertar el nuevo producto
    $sql = "INSERT INTO Productos (tipo, descripcion, precio) 
            VALUES (:tipo, :descripcion, :precio)";
    
    // Preparamos la consulta
    $sentencia = $pdo->prepare($sql);

    // Asignamos los valores a los parámetros
    $sentencia->bindParam(':tipo', $tipo);
    $sentencia->bindParam(':descripcion', $descripcion);
    $sentencia->bindParam(':precio', $precio);

    // Ejecutamos la consulta
    $sentencia->execute();

    // Iniciamos la sesión y configuramos los mensajes de éxito
    session_start();
    $_SESSION['mensaje'] = "Producto registrado correctamente";
    $_SESSION['icono'] = "success";

    // Redireccionamos a la lista de productos
    header('Location:'.$URL.'view/productos/index.php');
    exit();

} catch (Exception $e) {
    // Si hay un error, configuramos los mensajes de error y lo mostramos para depuración
    session_start();
    $_SESSION['mensaje'] = "Error al registrar el producto: " . $e->getMessage();
    $_SESSION['icono'] = "error";

    // Redireccionamos a la página de creación de productos
    header('Location:'.$URL.'view/productos/create.php');
    exit();
}
?>
