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
    <title>Login - AIUB Photography Club</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <form action="../Controller/AdminController.php" method="POST">
        <h2>Admin Login</h2>

        <?php if(isset($_GET['error'])) { echo '<p class="error">Invalid Username or Password</p>'; } ?>

        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="login">Login</button>
        <p>Don't have an account? <a href="signup.php">Sign Up here</a></p>
    </form>
</body>
</html>