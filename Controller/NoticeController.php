<?php
require_once __DIR__ . '/../Models/db.php';

$action = $_GET['action'] ?? '';

if ($action === 'fetch_notices') {
    header('Content-Type: application/json; charset=utf-8');

    $sql = "SELECT id, title, message, created_at FROM notices ORDER BY created_at DESC";
    $res = $conn->query($sql);
    $rows = [];
    if ($res) {
        while ($r = $res->fetch_assoc()) {
            $rows[] = $r;
        }
    }

    echo json_encode(['data' => $rows], JSON_UNESCAPED_UNICODE);
    exit;
}

-
http_response_code(400);
echo json_encode(['error' => 'Invalid action']);
?>