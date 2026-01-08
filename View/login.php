<?php
session_start();
require_once __DIR__ . '/../Models/validation.php';
ensure_csrf_token();
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
    <nav>
        <a class="brand" href="../index.php">AIUB Photography Club</a>
        <a href="blog_list.php">BLOG</a>
        <a href="notice_list.php">NOTICE BOARD</a>
        <a href="gallery.php">GALLERY</a>
        <a href="results.php">RESULTS</a>
        <a href="login.php" class="nav-right">ADMIN LOGIN</a>
    </nav>

    <div class="container">
        <div class="card panel-center">
            <h2>Admin Login</h2>

            <?php if(isset($_GET['error'])) { echo '<div class="alert-error">Invalid Username or Password</div>'; } ?>

            <form id="loginForm" action="../Controller/AdminController.php" method="POST">
                <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token']); ?>">
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

<script src="../assets/js/validation.js"></script>
