<?php
require_once __DIR__ . '/../Models/db.php';
session_start();
$admin = !empty($_SESSION['admin_logged_in']);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Notices - AIUB Photography Club</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="container">
        <div class="h-wrap">
            <h1>Notices</h1>
            <a class="home-link" href="../index.php">Home</a>
        </div>

        <div>
            <?php
            $res = $conn->query("SELECT id, title, message, created_at FROM notices ORDER BY created_at DESC");
            if ($res && $res->num_rows > 0) {
                while ($row = $res->fetch_assoc()) {
                    echo '<div class="list-card">';
                    echo '<div style="display:flex;justify-content:space-between;align-items:flex-start">';
                    echo '<div><h3>' . htmlspecialchars($row['title']) . '</h3>';
                    echo '<p>' . nl2br(htmlspecialchars($row['message'])) . '</p>';
                    echo '<small class="small">Posted: ' . htmlspecialchars($row['created_at']) . '</small></div>';
                    if ($admin) {
                        echo '<div>';
                        echo '<form method="POST" action="../Controller/AdminController.php" onsubmit="return confirm(\'Delete this notice?\');">';
                        echo '<input type="hidden" name="id" value="' . intval($row['id']) . '">';
                        echo '<button class="btn secondary" type="submit" name="delete_notice">Delete</button>';
                        echo '</form>';
                        echo '</div>';
                    }
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '<p>No notices yet.</p>';
            }
            ?>
        </div>
    </div>
</body>
</html>