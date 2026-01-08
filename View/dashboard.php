<?php
session_start();
require_once __DIR__ . '/../Models/validation.php';
ensure_csrf_token();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
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
        <div class="admin-header">
            <h1>Admin Dashboard</h1>
            <div class="header-actions">
                <a class="home-link" href="../index.php">Site Home</a>
                <a class="btn warn" href="../Controller/Logout.php">Logout</a>
            </div>
        </div>

        <?php if (isset($_GET['success'])): ?>
            <div class="alert-success">
                <?php
                $msg = '';
                switch ($_GET['success']) {
                    case 'notice': $msg = 'Notice posted successfully.'; break;
                    case 'blog': $msg = 'Blog published successfully.'; break;
                    case 'gallery': $msg = 'Photo uploaded successfully.'; break;
                    case 'result': $msg = 'Result published successfully.'; break;
                    default: $msg = 'Action completed successfully.'; break;
                }
                echo htmlspecialchars($msg);
                ?>
                &nbsp;&nbsp;<a class="home-link" href="../index.php">Home</a>
            </div>
        <?php endif; ?>

        <div class="card">
            <h2>Post a Notice</h2>
            <form id="noticeForm" action="../Controller/AdminController.php" method="POST">
                <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token']); ?>">
                <div class="form-row"><input type="text" name="title" placeholder="Notice Title" required></div>
                <div class="form-row"><textarea name="message" placeholder="Notice Details" required></textarea></div>
                <div class="form-row"><button class="btn" type="submit" name="add_notice">Post Notice</button></div>
            </form>
        </div>

        <!-- Dashboard trimmed for Notice feature branch: only notice form remains -->

    </div>
</body>
</html>

<script src="../assets/js/validation.js"></script>
