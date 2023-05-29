<?php
$adminRole = false;
$userRole = $_SESSION['userRole'];
if ($userRole == 'admin'){
  $adminRole = true;
}
?>