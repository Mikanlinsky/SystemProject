<?php
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
    exit();
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the product details from the form
    $productID = isset($_POST['product_id']) ? $_POST['product_id'] : '';
    $productName = isset($_POST['product_name']) ? $_POST['product_name'] : '';
    $productDescription = isset($_POST['description']) ? $_POST['description'] : '';
    $categoryID = isset($_POST['category_id']) ? $_POST['category_id'] : '';

    // Validate the form inputs (add your own validation logic here)
    // Rest of the code...

    // Connect to the database
    $conn = new mysqli("localhost", "root", "", "central_database");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO product (product_id, product_name, product_description, category_id) VALUES (?, ?, ?, ?)");
    if ($stmt) {
        // Bind the parameters
        $stmt->bind_param("ssss", $productID, $productName, $productDescription, $categoryID);

        // Execute the prepared statement
        if ($stmt->execute()) {
            // Product added successfully, redirect to the product table page
            header('location: inventory.php');
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Inventory Management System - Add Product</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f3f3;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .form-group {
            margin-bottom: 15px;
            display: flex;
            align-items: center;
        }

        .form-group label {
            width: 150px;
            text-align: right;
            margin-right: 10px;
        }

        .form-group input {
            width: 300px;
        }

        button[type="submit"] {
            padding: 10px 20px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Add Product</h1>

        <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <div class="form-group">
                <label for="product_id">Product ID:</label>
                <input type="text" id="product_id" name="product_id" required>
            </div>
            <div class="form-group">
                <label for="product_name">Product Name:</label>
                <input type="text" id="product_name" name="product_name" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <input type="text" id="description" name="description" required>
            </div>
            <div class="form-group">
                <label for="category_id">Category ID:</label>
                <input type="text" id="category_id" name="category_id" required>
            </div>
            <div class="button-group">
                <button type="submit">Add Product</button>
                <button class="inventory-button" onclick="redirectToNewDisplay()">Inventory</button>
            </div>
        </form>
    </div>

    <style>
        /* Existing styles... */

        .button-group {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .inventory-button {
            padding: 10px 20px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 4px;
            margin-left: 5px;
            cursor: pointer;
        }
    </style>

    <script>
        function redirectToNewDisplay() {
            // Redirect to the desired page or URL
            window.location.href = "inventory.php";
        }
    </script>
</body>



</html>
