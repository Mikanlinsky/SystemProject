<?php
    include ('connect.php');
    session_start();

    extract($_POST);
    $sql = "DELETE FROM users WHERE username = '$removeUsername_R'";
    if ($conn->query($sql) === TRUE) {
        echo 'User removed successfully.';
        echo '<script type="text/javascript">setTimeout(function(){window.location="../user_management.html";}, 1500);</script>';
    } else {
        $_SESSION['error'] = 'Something went wrong.';
        header("Location: ../user_management.html");
        exit();
    }
?>