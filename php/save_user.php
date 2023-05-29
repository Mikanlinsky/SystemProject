<?php
    include ('connect.php');
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    extract($_POST);
        $sql = "INSERT INTO users (Username, Password) VALUES ('$username', '$password')";
        if ($conn->query($sql) === TRUE) {
            echo '<script type="text/javascript">setTimeout(function(){window.location="../user_management.php";}, 1500);</script>';
        } else {
            $_SESSION['error'] = 'Something Went Wrong';
            header("Location: ../user_management.php");
            exit;
        }
?>