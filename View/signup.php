<?php
session_start();
if (!empty($_SESSION['admin_logged_in'])) {
    header("Location: dashboard.php");
    exit;
}
$showSuccess = isset($_GET['success']);
$showExistsError = (isset($_GET['error']) && $_GET['error'] === 'exists');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Sign Up - AIUB Photography Club</title>
 <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php if ($showSuccess): ?>
        <script>
            alert('Sign up successful. You can now log in.');
        </script>
    <?php elseif ($showExistsError): ?>
        <script>
            alert('Username already exists. Please choose another username.');
        </script>
    <?php endif; ?>

    <form action="../Controller/AdminController.php" method="POST">
        <h2>Admin Sign Up</h2>
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="register_user">Sign Up</button>
        <p style="margin-top:10px;">Already have an account? <a href="login.php">Login here</a></p>
    </form>
</body>
</html>