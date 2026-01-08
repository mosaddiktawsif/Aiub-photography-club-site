<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user_id'])) {
    $_SESSION['user_id'] = 1; 
    $_SESSION['role'] = 'Member';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AIUB Photography Club</title>
    <link rel="stylesheet" href="../assets/style.css">
    <script src="../assets/validation.js" defer></script>
</head>
<body>

<nav class="navbar">
    <div class="nav-brand">AIUB Photography Club</div>
    <div class="nav-links">
        <span>User #<?php echo $_SESSION['user_id']; ?></span>
        <a href="submission_form.php">Submit Photo</a>
        <a href="photo_story_form.php">Photo Story</a>
        <a href="history.php">My History</a>
        <a href="../index.php" style="color: #e74c3c;">Home</a>
    </div>
</nav>




<div style="padding-top: 20px;">


