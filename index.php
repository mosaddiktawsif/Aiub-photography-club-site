<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AIUB Photography Club</title>
    <link rel="stylesheet" href="assets/style.css"> 
</head>
<body>

<nav class="navbar">
    <div class="nav-brand">AIUB Photography Club</div>
    <div class="nav-links">
        <?php if(isset($_SESSION['user_id'])): ?>
            <span>User #<?php echo $_SESSION['user_id']; ?></span>
            <a href="views/submission_form.php">Submit Photo</a>
            <a href="views/photo_story_form.php">Photo Story</a>
            <a href="views/history.php">My History</a>
        <?php else: ?>
            <a href="#">Login</a>
        <?php endif; ?>
    </div>
</nav>

<div class="container" style="text-align: center; margin-top: 80px;">
    
    <h1 style="font-size: 2.5rem; margin-bottom: 10px;">Welcome to AIUB Photography Club</h1>
    <p style="font-size: 1.2rem; color: #666; max-width: 600px; margin: 0 auto 30px auto;">
        Join the community where art meets lens. Share your perspective, participate in exhibitions, and tell your story through light and shadow.
    </p>

    <div style="margin-bottom: 50px;">
        <a href="views/submission_form.php" class="btn btn-green" style="padding: 15px 30px; font-size: 1.1rem;">Submit Your Best Shot</a>
        <br><br>
        <a href="views/history.php" class="btn" style="background-color: #7f8c8d;">View Gallery / History</a>
    </div>

    <div style="border-top: 1px solid #eee; padding-top: 30px; margin-top: 50px;">
        <h3 style="color: #2c3e50; font-size: 1.1rem;">The official platform for showcasing your creativity.</h3>
        <p style="margin-top: 30px; font-size: 0.85rem; color: #999;">
            © 2026 AIUB Photography Club. All rights reserved.
        </p>
    </div>

</div>

</body>
</html>