<?php
require_once __DIR__ . '/../Models/db.php';
session_start();
$admin = !empty($_SESSION['admin_logged_in']);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Gallery - AIUB Photography Club</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="container">
        <div class="h-wrap">
            <h1>Gallery</h1>
            <a class="home-link" href="../index.php">Home</a>
        </div>

        <div class="grid">
            <?php
            $res = $conn->query("SELECT id, description, image_path FROM gallery ORDER BY id DESC");
            if ($res && $res->num_rows > 0) {
                while ($row = $res->fetch_assoc()) {
                    $img = $row['image_path'] ?? '';
                    if ($img && strpos($img, '/') !== 0 && strpos($img, 'http') !== 0) {
                        $imgOut = '../' . ltrim($img, '/');
                    } else {
                        $imgOut = $img;
                    }
                    echo '<div class="gallery-card">';
                    echo '<img src="' . htmlspecialchars($imgOut) . '" alt="' . htmlspecialchars($row['description']) . '">';
                    echo '<div class="gallery-caption">' . htmlspecialchars($row['description']) . '</div>';
                    if ($admin) {
                        echo '<div style="padding:8px;"><form method="POST" action="../Controller/AdminController.php" onsubmit="return confirm(\'Delete this photo?\');">';
                        echo '<input type="hidden" name="id" value="' . intval($row['id']) . '">';
                        echo '<button class="btn secondary" type="submit" name="delete_photo">Delete</button>';
                        echo '</form></div>';
                    }
                    echo '</div>';
                }
            } else {
                echo '<p>No photos uploaded yet.</p>';
            }
            ?>
        </div>
    </div>
</body>
</html>