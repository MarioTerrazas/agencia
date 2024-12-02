<?php

define('SERVIDOR','localhost');
define('USUARIO','root');
define('PASSWORD','');
define('BD','agencia');

$servidor = "mysql:dbname=".BD. "; host=".SERVIDOR;

try {
    $pdo = new PDO($servidor, USUARIO, PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
    //echo "Buena Coneccion";
} catch (PDOException $e) {
    //print_r($e);
    echo "Error en la coneccion";
}

$URL = "http://localhost/agencia/";

date_default_timezone_set('America/La_Paz');
$fecha_hora = date('Y-m-d H-i-s');
?>