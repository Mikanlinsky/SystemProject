<?php session_start();
if(isset($_SESSION['email'])){
    //email is in session, push through
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add/Remove Users</title>
    <style>
        body {
            background-color: #1e1e1e;
            color: #fff;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            color: #1e1e1e;
            width: 300px;
            margin: 0 auto;
            margin-top: 10%;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            color: #1e1e1e;
            margin-bottom: 10px;
        }

        .form-group label {
            color: #1e1e1e;
            display: block;
            font-weight: bold;
        }

        .form-group input {
            width: 100%;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        .form-group button {
            margin-top: 10px;
            padding: 8px 16px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Add User</h2>
        <form method="POST" action="save_user.php">
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
        <form method="POST" action="remove_user.php">
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

        <div class="form-group">
            <button onclick="goBack()">Back</button>
        </div>

    </div>
</body>
</html>


<!--Back Button -->
<?php
echo '
<script>
function goBack() {
window.history.back();
}
</script>';
?>