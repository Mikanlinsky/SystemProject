<?php
include("connect.php");
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header('Location: ../home.php'); // Redirect to the dashboard or any other authorized page
    exit;
}

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the username and password from the form
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Query the database to check if the user exists
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        $tablepass = $row['password'];
        if ($password == $tablepass) {
            // If the login is successful, set session variables and redirect to home.php
            $_SESSION['login_user'] = $username;
            $_SESSION['loggedin'] = true;
            $_SESSION['userRole'] = getUserRole($username);

            header('Location: ../home.php');
            exit(); // Terminate the script after redirecting
        } else {
            // If the login fails, display an error message
            $error = 'Wrong password';
            echo '<div class="error-message">' . $error . '</div>';
            echo '<script>setTimeout(function() { window.location.href = "../login.php"; }, 10000);</script>';
            exit();
        }
    } else {
        // If the login fails, display an error message
        $error = 'Username not found';
        echo '<div class="error-message">' . $error . '</div>';
        echo '<script>setTimeout(function() { window.location.href = "../login.php"; }, 10000);</script>';
        exit();
    }
}

function getUserRole($username)
{
    // Check if the username is 'admin' and assign the 'admin' role
    if ($username === 'admin') {
        return 'admin';
    }
    // For all other users, assign the 'staff' role
    return 'staff';
}
?>
