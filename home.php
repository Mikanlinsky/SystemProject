<!DOCTYPE html>
<html>
<head>
    <title>System Dashboard</title>
</head>
<body>
    <h1>System Dashboard</h1>
    
    <form method="post" action="./php/logout.php">
        <input type="submit" value="Logout" class="logout-btn">
    </form>
    
    <?php require('./php/session_check.php'); ?>
    <?php require('./php/admin.php'); ?>

    <?php if ($adminRole): ?>
      <form method="post" action="user_management.php">
          <input type="submit" value="User Management" class="create-user-btn">
      </form>
    <?php endif; ?>

</body>
</html>