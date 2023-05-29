<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$adminRole = false;
$userRole = $_SESSION['userRole'];
if ($userRole == 'admin'){
  $adminRole = true;
}
?>