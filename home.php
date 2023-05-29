<!DOCTYPE html>
<html>
<head>
    <title>System Dashboard</title>
    <link rel="stylesheet" href="./css/home.css">
    <?php require('./php/session_check.php'); ?>
    <?php require('./php/admin.php'); ?>
</head>
<body>
    <div class="top-bar">
        <div class="top-left">
            <?php if ($adminRole): ?>
                <form method="post" action="user_management.php">
                    <input type="submit" value="User Management" class="create-user-btn">
                </form>
            <?php endif; ?>
        </div>
        <div class="top-right">
            <form method="post" action="./php/logout.php">
                <input type="submit" value="Logout" class="logout-btn">
            </form>
        </div>
    </div>

    <h1>System Dashboard</h1>
    <h2>Product Table</h2>
    <?php require('./php/product.php'); ?>

    <h2>Sales Table</h2>
    <?php require('./php/sales.php'); ?>
    
</body>
</html>
