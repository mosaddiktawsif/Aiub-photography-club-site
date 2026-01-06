<?php
    require_once('../Controllers/adminCheck.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home</title>
</head>
<body>
    <div class = "admin_dashboard">
        <h2>Admin Dashboard</h2>
        <h3>Welcome Sir
            <?php echo $_SESSION['username']; ?>
        </h3>
    </div>
    
</body>
</html>