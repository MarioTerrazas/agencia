<?php

session_start();
if (isset($_SESSION['email_session']) && isset($_SESSION['nombre_session'])) {
 $email_session = $_SESSION['email_session'];
 $nombre_session = $_SESSION['nombre_session'];
} else {
  header('Location:'.$URL.'login');
}
?>
