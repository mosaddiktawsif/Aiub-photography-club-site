<?php
require_once __DIR__ . '/../Models/db.php';
session_start();
require_once __DIR__ . '/../Models/validation.php';
ensure_csrf_token();
$admin = !empty($_SESSION['admin_logged_in']);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Blogs - AIUB Photography Club</title>
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
        <div class="h-wrap">
            <h1>Blogs</h1>
            <a class="home-link" href="../index.php">Home</a>
        </div>

        <div>
            <?php
            $res = $conn->query("SELECT id, title, content, created_at FROM blogs ORDER BY created_at DESC");
            if ($res && $res->num_rows > 0) {
                while ($row = $res->fetch_assoc()) {
                    echo '<article class="list-card">';
                    echo '<div style="display:flex;justify-content:space-between;align-items:flex-start">';
                    echo '<div>';
                    echo '<h2>' . htmlspecialchars($row['title']) . '</h2>';
                    echo '<div>' . nl2br(htmlspecialchars($row['content'])) . '</div>';
                    echo '<small class="small">Posted: ' . htmlspecialchars($row['created_at']) . '</small>';
                    echo '</div>';
                    if ($admin) {
                        echo '<div>';
                        echo '<form method="POST" action="../Controller/AdminController.php" onsubmit="return confirm(\'Delete this blog?\');">';
                        echo '<input type="hidden" name="csrf_token" value="' . htmlspecialchars($_SESSION['csrf_token']) . '">';
                        echo '<input type="hidden" name="id" value="' . intval($row['id']) . '">';
                        echo '<button class="btn secondary" type="submit" name="delete_blog">Delete</button>';
                        echo '</form>';
                        echo '</div>';
                    }
                    echo '</div>';
                    echo '</article>';
                }
            } else {
                echo '<p>No blogs yet.</p>';
            }
            ?>
        </div>
    </div>
</body>
</html>