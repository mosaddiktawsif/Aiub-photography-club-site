<?php   
    require_once (..'/Controllers/sessionCheck.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h1> Welcome
<?php echo $_SESSION['username']; ?>
    </h1>
    <div class = "nav_links">
        <a href="../Controllers/logout.php">logout</a>
    </div>

    <div class = "dashboard_card">
        <h2>User DashBoard</h2>
        <p>Welcome Regular User</p>
    </div>
</body>
</html>