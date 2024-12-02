<?php
include('../../app/config.php');

$id_usuario = $_POST['id_usuario'];

        $sql ="DELETE FROM usuario WHERE id_usuario=:id_usuario";
        $sentencia = $pdo->prepare($sql);
    
        $sentencia->bindParam('id_usuario', $id_usuario);
    
        $sentencia->execute();
    
        session_start();
    
        $_SESSION['mensaje'] = "Usuario Eliminado correctamente";
        $_SESSION['icono'] = "success";
        header('Location:'.$URL.'view/usuarios');
   

?>