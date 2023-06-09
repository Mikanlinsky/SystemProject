<?php require('./php/session_check.php'); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Add/Remove Users</title>
    <link rel="stylesheet" href="./css/user_management.css">
</head>
<body>
<div class="container">
        <h2>Add User</h2>
        <form method="POST" action="./php/save_user.php">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <button type="submit" name="addUser">Add User</button>
            </div>
        </form>

        <hr>

        <h2>Remove User</h2>
        <form method="POST" action="./php/remove_user.php">
            <div class="form-group">
                <label for="removeUsername">Username:</label>
                <!--Bawal parehas yung id sa name kasi taena ng mysql ayaw magremove ng user GRRRR (removeUsername_R yung pantanggal ng user)-->
                <!--Pang client side lang yung "ID", yung "NAME" yung umaabot ng server-->
                <input type="text" id="removeUsername" name="removeUsername_R" required>
            </div>
            <div class="form-group">
                <button type="submit" name="removeUsername">Remove User</button>
            </div>
        </form>
        
        <hr>

        <h2>User List</h2>
        <?php require('./php/user_list.php'); ?>

        <hr>

        <div class="form-group">
            <button onclick="goBack()">Back</button>
        </div>
    </div>

    <script>
        function goBack() {
            window.location.href = "home.php";
        }
    </script>
</body>
</html>
