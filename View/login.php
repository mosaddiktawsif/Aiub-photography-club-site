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
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="container">
        <div class="card panel-center">
            <h2>Admin Login</h2>

            <?php if(isset($_GET['error'])) { echo '<div class="alert-error">Invalid Username or Password</div>'; } ?>

            <form action="../Controller/AdminController.php" method="POST">
                <div class="form-row">
                    <input type="text" name="username" placeholder="Username" required>
                </div>
                <div class="form-row">
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <div class="form-row">
                    <button class="btn" type="submit" name="login">Login</button>
                </div>
            </form>

            <p class="small">Don't have an account? <a href="signup.php">Sign Up here</a></p>
        </div>
    </div>
</body>
</html>
