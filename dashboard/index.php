<!DOCTYPE html>
<html>
<head>
    <title>Product Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        
        h1 {
            text-align: center;
        }
        
        table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 20px;
        }
        
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        
        th {
            background-color: #f2f2f2;
        }
        
        select {
            padding: 5px;
            border-radius: 5px;
        }
        
        #salesButton {
            position: fixed;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            padding: 10px;
            background-color: #f2f2f2;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            z-index: 9999;
        }

        #addSaleButton {
            margin-bottom: 10px;
        }
        
        #salesForm input[type="text"],
        #salesForm select {
            padding: 5px;
            border-radius: 5px;
        }
        
        #salesForm input[type="submit"],
        #salesForm input[type="button"] {
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Inventory</h1>

    <table id="inventoryTable">
        <tr>
            <th>Product ID</th>
            <th>Product Name</th>
            <th>Product Description</th>
            <th>Category ID</th>
            <th>Product Stock</th>
        </tr>
        <tr>
            <td>1</td>
            <td>Product A</td>
            <td>Product A Description</td>
            <td>1</td>
            <td>
                <span>50</span>
                <select id="productStockThreshold" onchange="checkStockThreshold(this)">
                    <option value="#">Select</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <!-- Add more options as needed -->
                </select>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>Product B</td>
            <td>Product B Description</td>
            <td>2</td>
            <td>
                <span>15</span>
                <select id="productStockThreshold" onchange="checkStockThreshold(this)">
                    <option value="#">Select</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <!-- Add more options as needed -->
                </select>
            </td>
        </tr>
        <!-- Add more rows as needed -->
    </table>

    <button id="salesButton" onclick="toggleSalesTable()">Sales Records</button>

    <table id="salesTable" style="display: none;">
        <tr>
            <th>Sale ID</th>
            <th>Date of Sale</th>
            <th>Price of Sale</th>
            <th>Action</th>
        </tr>
        <tr>
            <td>1</td>
            <td>2023-05-25</td>
            <td>$50</td>
            <td><button onclick="removeSale(this)">Remove</button></td>
        </tr>
        <tr>
            <td>2</td>
            <td>2023-05-24</td>
            <td>$80</td>
            <td><button onclick="removeSale(this)">Remove</button></td>
        </tr>
        <!-- Add more rows as needed -->
    </table>

    <form id="salesForm" style="display: none;">
        <h2>Add Sale</h2>
        <label for="saleId">Sale ID:</label>
        <input type="text" id="saleId" required><br>
        <label for="saleDate">Date of Sale:</label>
        <input type="text" id="saleDate" required><br>
        <label for="salePrice">Price of Sale:</label>
        <input type="text" id="salePrice" required><br>
        <input type="submit" value="Add" onclick="addSale()">
        <input type="button" value="Cancel" onclick="toggleSalesForm()">
    </form>

    <script>
        function checkStockThreshold(selectElement) {
            var spanElement = selectElement.previousElementSibling;
            var currentStock = parseInt(spanElement.textContent);
            var threshold = parseInt(selectElement.value);
            
            if (currentStock <= threshold) {
                // Perform actions when stock reaches threshold
                alert("Stock reached threshold for product: " + spanElement.parentElement.parentElement.cells[1].textContent);
            }
        }

        function toggleSalesTable() {
            var salesTable = document.getElementById("salesTable");
            var salesForm = document.getElementById("salesForm");

            if (salesTable.style.display === "none") {
                salesTable.style.display = "table";
                salesForm.style.display = "block";
            } else {
                salesTable.style.display = "none";
                salesForm.style.display = "none";
            }
        }

        function toggleSalesForm() {
            var salesForm = document.getElementById("salesForm");

            if (salesForm.style.display === "none") {
                salesForm.style.display = "block";
            } else {
                salesForm.style.display = "none";
            }
        }

        function addSale() {
            var saleIdInput = document.getElementById("saleId");
            var saleDateInput = document.getElementById("saleDate");
            var salePriceInput = document.getElementById("salePrice");

            var salesTable = document.getElementById("salesTable");
            var newRow = salesTable.insertRow(salesTable.rows.length);
            newRow.innerHTML = "<td>" + saleIdInput.value + "</td>" +
                               "<td>" + saleDateInput.value + "</td>" +
                               "<td>" + salePriceInput.value + "</td>" +
                               "<td><button onclick='removeSale(this)'>Remove</button></td>";

            saleIdInput.value = "";
            saleDateInput.value = "";
            salePriceInput.value = "";

            toggleSalesForm();
        }

        function removeSale(button) {
            var row = button.parentNode.parentNode;
            row.parentNode.removeChild(row);
        }
    </script>
</body>
</html>
