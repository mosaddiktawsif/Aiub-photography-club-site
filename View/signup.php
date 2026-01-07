<!DOCTYPE html>
<html>
<head>
    <title>Sign Up - AIUB Photography Club</title>
    <style>
        body { font-family: sans-serif; display: flex; justify-content: center; align-items: center; height: 100vh; background-color: #f4f4f4; }
        form { background: white; padding: 30px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        input { display: block; width: 100%; margin: 10px 0; padding: 10px; }
        button { width: 100%; padding: 10px; background: #333; color: white; border: none; cursor: pointer; }
    </style>
</head>
<body>
    <form action="../controller/AdminController.php" method="POST">
        <h2>Admin Sign Up</h2>
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="register_user">Sign Up</button>
        <p>Already have an account? <a href="login.php">Login here</a></p>
    </form>
</body>
</html>