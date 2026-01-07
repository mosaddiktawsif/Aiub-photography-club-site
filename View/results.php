<?php
require_once __DIR__ . '/../Models/db.php';
session_start();
$admin = !empty($_SESSION['admin_logged_in']);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Results - AIUB Photography Club</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="container">
        <div class="h-wrap">
            <h1>Results</h1>
            <a class="home-link" href="../index.php">Home</a>
        </div>

        <?php
        $res = $conn->query("SELECT id, participant_name, contact_number, selected_photo_qty FROM results ORDER BY id DESC");
        if ($res && $res->num_rows > 0) {
            echo '<table>';
            echo '<tr><th>#</th><th>Name</th><th>Contact</th><th>Selected Photos</th><th>Action</th></tr>';
            $i = 1;
            while ($row = $res->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $i++ . '</td>';
                echo '<td>' . htmlspecialchars($row['participant_name']) . '</td>';
                echo '<td>' . htmlspecialchars($row['contact_number']) . '</td>';
                echo '<td>' . intval($row['selected_photo_qty']) . '</td>';
                echo '<td>';
                if ($admin) {
                    echo '<form method="POST" action="../Controller/AdminController.php" style="display:inline;" onsubmit="return confirm(\'Delete this result?\');">';
                    echo '<input type="hidden" name="id" value="' . intval($row['id']) . '">';
                    echo '<button class="btn secondary" type="submit" name="delete_result">Delete</button>';
                    echo '</form>';
                }
                echo '</td>';
                echo '</tr>';
            }
            echo '</table>';
        } else {
            echo '<p>No results published yet.</p>';
        }
        ?>
    </div>
</body>
</html>