<?php

// Connect to the database
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'dbase1';


$conn = mysqli_connect($host, $user, $password, $database);
if (!$conn) {
  die('Could not connect to the database: ' . mysqli_connect_error());
}

?>