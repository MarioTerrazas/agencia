<?php
include('../../app/config.php');

session_start();
if (isset($_SESSION['email_session'])) {
  session_destroy();
  header('Location:'.$URL.'login');
}
?>