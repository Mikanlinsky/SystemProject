<?php

include ('connect.php');

// Create a new user
function addUser($username, $password) {
    // Establish database connection
    global $servername, $username, $password, $dbname;
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $password);

    // Execute the statement
    if ($stmt->execute()) {
        echo "User added successfully.";
    } else {
        echo "Error adding user: " . $conn->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}

// Remove an existing user
function removeUser($username) {
    // Establish database connection
    global $servername, $username, $password, $dbname;
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare the SQL statement
    $stmt = $conn->prepare("DELETE FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);

    // Execute the statement
    if ($stmt->execute()) {
        echo "User removed successfully.";
    } else {
        echo "Error removing user: " . $conn->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}

?>