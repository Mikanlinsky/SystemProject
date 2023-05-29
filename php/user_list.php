<?php
include("connect.php");

// Query the database to retrieve user information
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<table>';
    echo '<tr><th>Username</th><th>Password</th></tr>';

    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo '<tr><td>' . $row['username'] . '</td><td class="password-cell" style="display: none;">' . $row['password'] . '</td></tr>';
    }

    echo '</table>';
} else {
    echo 'No users found.';
}

// Close the database connection
$conn->close();
?>

<script>
    function togglePasswords() {
        var passwordCells = document.getElementsByClassName("password-cell");
        var toggleButton = document.getElementById("togglePasswordBtn");

        for (var i = 0; i < passwordCells.length; i++) {
            if (passwordCells[i].style.display === "none") {
                passwordCells[i].style.display = "table-cell";
                toggleButton.innerHTML = "Hide Passwords";
            } else {
                passwordCells[i].style.display = "none";
                toggleButton.innerHTML = "Show Passwords";
            }
        }
    }
</script>

<button id="togglePasswordBtn" onclick="togglePasswords()">Show Passwords</button>
