<?php
include('connect.php');

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $checkQuery = "SELECT * FROM users WHERE username = '$username'";
    $checkResult = $conn->query($checkQuery);

    if ($checkResult->num_rows > 0) {
        echo '<script type="text/javascript">
            setTimeout(function() {
                alert("Username already exists! Please choose a different username.");
            }, 1500);
        </script>';
        $_SESSION['error'] = 'Username already exists';
        header("Location: ../user_management.php");
        exit;
    } else {
        $sql = "INSERT INTO users (Username, Password) VALUES ('$username', '$password')";
        if ($conn->query($sql) === TRUE) {
            echo '<script type="text/javascript">
                setTimeout(function() {
                alert("User added successfully!");
                window.location = "../user_management.php";
                }, 1500);
            </script>';
        } else {
            $_SESSION['error'] = 'Something Went Wrong';
            header("Location: ../user_management.php");
            exit;
        }
    }
} else {
    $_SESSION['error'] = 'Invalid input';
    echo '<script type="text/javascript">
        alert("Invalid input! Please check your data.");
        window.history.back();
    </script>';
    header("Location: ../user_management.php");
    exit;
}
?>
