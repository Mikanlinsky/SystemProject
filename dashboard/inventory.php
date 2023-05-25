<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Inventory Management System</title>
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

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #f7f7f7;
        }

        .action-links a {
            margin-right: 5px;
            color: #333;
        }

        .logout-link {
            text-align: right;
            margin-bottom: 30px;
        }

        .logout-link a {
            color: #333;
            text-decoration: none;
        }
        
    </style>
</head>

<body>
    <div class="container">
        <?php
        session_start();

        if (!isset($_SESSION['username'])) {
            $_SESSION['msg'] = "You must log in first";
            header('location: login.php');
        }
        if (isset($_GET['logout'])) {
            session_destroy();
            unset($_SESSION['username']);
            header("location: login.php");
        }
        ?>

        <h1>Inventory Management System</h1>

        <div class="logout-link">
            <a href="index.php?logout='1'">Log Out</a>
        </div>

        <button class="Sales Record-button" onclick="redirectToNewDisplay()">Sales Record</button>
        <button onclick="redirectToNewDisplay_2()">Add Product</button>

        <?php
        $conn = new mysqli("localhost", "root", "", "inventorymanagement");
        $sql = "SELECT * FROM product";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $productStock = $row["Product Stock"];
                $threshold = 15; // Set the threshold value here

                if ($productStock <= $threshold) {
                    echo '<div class="add-stock-message">Product "' . $row["Product_Name"] . '" stock is low. Please add stocks.</div>';
                }
            }
        }
        ?>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Category ID</th>
                    <th>Product Stock</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $count = 0;
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $count++;
                        ?>
                        <tr>
                            <td><?php echo $count ?></td>
                            <td><?php echo $row["product_name"] ?></td>
                            <td><?php echo $row["description"] ?></td>
                            <td><?php echo $row["Category ID"] ?></td>
                            <td class="action-links">
                                <a href="edit.php?id=<?php echo $row["product_id"] ?>">Edit</a>
                                <a href="delete.php?id=<?php echo $row["product_id"] ?>">Delete</a>
                            </td>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
    <script>
        function redirectToNewDisplay() {
            // Redirect to the desired page or URL
            window.location.href = "salesrecord.php";

        }
        function redirectToNewDisplay_2() {
            // Redirect to the desired page or URL
            window.location.href = "add.php";

        }
    </script>
</body>

</html>