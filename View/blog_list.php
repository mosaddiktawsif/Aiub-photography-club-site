<?php
require_once __DIR__ . '/../Models/db.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Blogs - AIUB Photography Club</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <h1>Blogs</h1>
    <a href="index.php">Home</a>
    <div>
        <?php
        $res = $conn->query("SELECT id, title, content, created_at FROM blogs ORDER BY created_at DESC");
        if ($res && $res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                echo '<article>';
                echo '<h2>' . htmlspecialchars($row['title']) . '</h2>';
                echo '<div>' . nl2br(htmlspecialchars($row['content'])) . '</div>';
                echo '<small>Posted: ' . htmlspecialchars($row['created_at']) . '</small>';
                echo '</article>';
            }
        } else {
            echo '<p>No blogs yet.</p>';
        }
        ?>
    </div>
</body>
</html>