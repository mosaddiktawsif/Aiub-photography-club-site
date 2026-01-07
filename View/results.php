<?php
require_once __DIR__ . '/../Models/db.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Results - AIUB Photography Club</title>
    <link rel="stylesheet" href="../assets/css/style.css">
  
</head>
<body>
    <h1>Results</h1>
    <a href="../index.php">Home</a>
    <?php
    $res = $conn->query("SELECT id, participant_name, contact_number, selected_photo_qty, id FROM results ORDER BY id DESC");
    if ($res && $res->num_rows > 0) {
        echo '<table>';
        echo '<tr><th>#</th><th>Name</th><th>Contact</th><th>Selected Photos</th></tr>';
        $i = 1;
        while ($row = $res->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $i++ . '</td>';
            echo '<td>' . htmlspecialchars($row['participant_name']) . '</td>';
            echo '<td>' . htmlspecialchars($row['contact_number']) . '</td>';
            echo '<td>' . intval($row['selected_photo_qty']) . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo '<p>No results published yet.</p>';
    }
    ?>
</body>
</html>