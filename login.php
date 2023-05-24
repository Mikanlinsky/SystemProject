<!DOCTYPE html>
<html>
<head>
  <title>Login Form</title>
  <link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
  <div class="container">
    <h1>Login Form</h1>
    <form method="post" action="login.php">
      <label for="username">Username:</label>
      <input type="text" id="username" name="username"><br><br>
      <label for="password">Password:</label>
      <input type="password" id="password" name="password"><br><br>
      <input type="submit" value="Login">
    </form>
    <?php
      include("connection.php");

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
            session_start(); // Start the session
            $_SESSION['login_user'] = $username;
            header('Location: home.php');
            exit(); // Terminate the script after redirecting
          }
          else {
            // If the login fails, display an error message
            $error = 'Wrong password';
            echo '<div class="error-message">' . $error . '</div>';
            echo '<script>setTimeout(function() { window.location.href = "login.php"; }, 10000);</script>';
            exit();
          }
        } 
        else {
          // If the login fails, display an error message
          $error = 'Username not found';
          echo '<div class="error-message">' . $error . '</div>';
          echo '<script>setTimeout(function() { window.location.href = "login.php"; }, 10000);</script>';
          exit();
        }
      }
    ?>
  </body>
</html>





