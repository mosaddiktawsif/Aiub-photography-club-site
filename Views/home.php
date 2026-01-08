<?php 
    require_once('../Controllers/sessionCheck.php'); 
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Home</title>
    <link rel="stylesheet" href="../Assets/style.css">
</head>
<body>
    <div class="container">
        <h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1>
        <hr>
        
        <h3>Dashboard Menu</h3>
        <ul>
            <li>Select a feature branch to see options here.</li>
        </ul>

        <hr>
        <a href="../Controllers/logout.php" style="color: red; font-weight: bold;">Logout</a>
    </div>
</body>
</html>