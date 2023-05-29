<?php
    include ('connect.php');
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    extract($_POST);
    $sql = "DELETE FROM users WHERE username = '$removeUsername_R'";
    if ($conn->query($sql) === TRUE) {
        echo 'User removed successfully.';
        echo '<script type="text/javascript">setTimeout(function(){window.location="../user_management.php";}, 1500);</script>';
    } else {
        $_SESSION['error'] = 'Something went wrong.';
        header("Location: ../user_management.php");
        exit;
    }
?>