<?php
    include('connect.php');
    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo '<table>';
        echo '<tr><th>Product ID</th><th>Product Name</th><th>Product Description</th><th>Category ID</th><th>Product Stock</th></tr>';

        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['product_id'] . '</td>';
            echo '<td>' . $row['product_name'] . '</td>';
            echo '<td>' . $row['product_description'] . '</td>';
            echo '<td>' . $row['category_id'] . '</td>';
            echo '<td>' . $row['product_stock'] . '</td>';
            echo '</tr>';
        }

        echo '</table>';
    } else {
        echo 'No products found.';
    }

    $conn->close();
?>