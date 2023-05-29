<?php
    include ('connect.php');
    session_start();

    extract($_POST);
        $sql = "INSERT INTO users (Username, Password) VALUES ('$username', '$password')";
        if ($conn->query($sql) === TRUE) {
            echo '<script type="text/javascript">setTimeout(function(){window.location="../user_management.html";}, 1500);</script>';
        } else {
            $_SESSION['error'] = 'Something Went Wrong';
            header("Location: ../user_management.html");
            exit();
        }
?>