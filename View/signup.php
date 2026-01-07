<?php
session_start();
if (!empty($_SESSION['admin_logged_in'])) {
    header("Location: dashboard.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Sign Up - AIUB Photography Club</title>
    <style>
        /* ... keep existing styles ... */
    </style>
</head>
<body>
    <form action="../Controller/AdminController.php" method="POST">
        <h2>Admin Sign Up</h2>
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="register_user">Sign Up</button>
        <p>Already have an account? <a href="login.php">Login here</a></p>
    </form>
</body>
</html>