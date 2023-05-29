<?php
    include('connect.php');
    $sql = "SELECT s.sale_id, p.Product_Name, s.quantity_sold FROM sales_of_product s
            INNER JOIN products p ON s.product_id = p.Product_ID";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo '<table>';
        echo '<tr><th>Sale ID</th><th>Product Name</th><th>Quantity Sold</th></tr>';

        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['sale_id'] . '</td>';
            echo '<td>' . $row['Product_Name'] . '</td>';
            echo '<td>' . $row['quantity_sold'] . '</td>';
            echo '</tr>';
        }

        echo '</table>';
    } else {
        echo 'No sales found.';
    }

    $conn->close();
?>
