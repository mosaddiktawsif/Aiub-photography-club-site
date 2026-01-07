<?php
// Shared navigation bar for all pages
// Determine if user is logged in
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$isAdmin = !empty($_SESSION['admin_logged_in']);
$adminUsername = $_SESSION['admin_username'] ?? 'Admin';

// Detect current directory to adjust paths
$currentDir = basename(dirname($_SERVER['PHP_SELF']));
$isInView = ($currentDir === 'View' || $currentDir === 'view');
$basePath = $isInView ? '../' : '';
?>
<nav class="navbar">
    <div class="nav-container">
        <a href="<?php echo $basePath; ?>index.php" class="nav-brand">AIUB Photography Club</a>
        <div class="nav-links">
            <a href="<?php echo $basePath; ?>index.php">HOME</a>
            <a href="<?php echo $basePath; ?>view/blog_list.php">BLOG</a>
            <a href="<?php echo $basePath; ?>view/notice_list.php">NOTICE BOARD</a>
            <a href="<?php echo $basePath; ?>view/gallery.php">GALLERY</a>
            <a href="<?php echo $basePath; ?>view/results.php">RESULTS</a>
            <?php if ($isAdmin): ?>
                <span class="nav-user">👤 <?php echo htmlspecialchars($adminUsername); ?></span>
                <a href="<?php echo $basePath; ?>view/dashboard.php" class="nav-admin">DASHBOARD</a>
                <a href="<?php echo $basePath; ?>Controller/Logout.php" class="nav-logout">LOGOUT</a>
            <?php else: ?>
                <a href="<?php echo $basePath; ?>view/login.php" class="nav-login">ADMIN LOGIN</a>
            <?php endif; ?>
        </div>
    </div>
</nav>
