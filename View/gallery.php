<?php
require_once __DIR__ . '/../Models/db.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Gallery - AIUB Photography Club</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        .grid { display:flex; flex-wrap:wrap; gap:16px; }
        .card { width:200px; border:1px solid #ddd; padding:8px; border-radius:6px; background:#fff; }
        .card img { width:100%; height:140px; object-fit:cover; display:block; margin-bottom:8px; }
        .caption { font-size:0.9rem; color:#333; }
    </style>
</head>
<body>
    <h1>Gallery</h1>
    <a href="../index.php">Home</a>
    <div class="grid">
        <?php
        $res = $conn->query("SELECT id, description, image_path FROM gallery ORDER BY id DESC");
        if ($res && $res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                $img = $row['image_path'] ?? '';
                // If stored path is relative to project root like "assets/uploads/xxx",
                // we need to prefix "../" because this file is in the View folder.
                if ($img && strpos($img, '/') !== 0 && strpos($img, 'http') !== 0) {
                    $imgOut = '../' . ltrim($img, '/');
                } else {
                    $imgOut = $img;
                }
                echo '<div class="card">';
                echo '<img src="' . htmlspecialchars($imgOut) . '" alt="' . htmlspecialchars($row['description']) . '">';
                echo '<div class="caption">' . htmlspecialchars($row['description']) . '</div>';
                echo '</div>';
            }
        } else {
            echo '<p>No photos uploaded yet.</p>';
        }
        ?>
    </div>
</body>
</html>