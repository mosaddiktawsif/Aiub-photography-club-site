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
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="container">
        <div class="card panel-center">
            <h2>Admin Sign Up</h2>

            <?php
            if ($showSuccess) {
                echo '<div class="alert-success">Sign up successful. <a href="login.php">Click here to login</a>.</div>';
            } elseif ($showExistsError) {
                echo '<div class="alert-error">Username already exists. Please choose another username.</div>';
            }
            ?>

            <form action="../Controller/AdminController.php" method="POST">
                <div class="form-row">
                    <input type="text" name="username" placeholder="Username" required>
                </div>
                <div class="form-row">
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <div class="form-row">
                    <button class="btn" type="submit" name="register_user">Sign Up</button>
                </div>
            </form>

            <p class="small">Already have an account? <a href="login.php">Login here</a></p>
        </div>
    </div>
</body>
</html>
