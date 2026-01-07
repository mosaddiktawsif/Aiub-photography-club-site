<?php
require_once __DIR__ . '/../Models/db.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Notices - AIUB Photography Club</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <h1>Notices</h1>
    <a href="../index.php">Home</a>
    <div>
        <?php
        $res = $conn->query("SELECT id, title, message, created_at FROM notices ORDER BY created_at DESC");
        if ($res && $res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                echo '<div>';
                echo '<h3>' . htmlspecialchars($row['title']) . '</h3>';
                echo '<p>' . nl2br(htmlspecialchars($row['message'])) . '</p>';
                echo '<small>Posted: ' . htmlspecialchars($row['created_at']) . '</small>';
                echo '</div>';
            }
        } else {
            echo '<p>No notices yet.</p>';
        }
        ?>
    </div>
</body>
</html>