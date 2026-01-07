<!DOCTYPE html>
<html>
<head>
    <title>Login - AIUB Photography Club</title>
    <style>
        body { font-family: sans-serif; display: flex; justify-content: center; align-items: center; height: 100vh; background-color: #f4f4f4; }
        form { background: white; padding: 30px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        input { display: block; width: 100%; margin: 10px 0; padding: 10px; }
        button { width: 100%; padding: 10px; background: #333; color: white; border: none; cursor: pointer; }
        .error { color: red; font-size: 0.9em; }
    </style>
</head>
<body>
    <form action="../controller/AdminController.php" method="POST">
        <h2>Admin Login</h2>
        
        <?php if(isset($_GET['error'])) { echo '<p class="error">Invalid Username or Password</p>'; } ?>
        
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="login">Login</button>
        <p>Don't have an account? <a href="signup.php">Sign Up here</a></p>
    </form>
</body>
</html>