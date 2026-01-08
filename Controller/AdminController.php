<?php
session_start();
require_once __DIR__ . '/../Models/db.php';
require_once __DIR__ . '/../Models/validation.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $token = $_POST['csrf_token'] ?? '';
    if (!verify_csrf_token($token)) {
        header("Location: ../View/login.php?error=csrf");
        exit;
    }
}

if (isset($_POST['register_user'])) {
    $user = sanitize($_POST['username'] ?? '');
    $pass = $_POST['password'] ?? '';
    if (!is_valid_username($user) || !is_valid_password($pass)) {
        header("Location: ../View/signup.php?error=invalid");
        exit;
    }
    $check = $conn->prepare("SELECT id FROM users WHERE username = ?");
    $check->bind_param("s", $user);
    $check->execute();
    $checkRes = $check->get_result();
    if ($checkRes && $checkRes->num_rows > 0) {
        header("Location: ../View/signup.php?error=exists");
        exit;
    }
    $hash = password_hash($pass, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $user, $hash);
    if ($stmt->execute()) {
        header("Location: ../View/signup.php?success=1");
        exit;
    }
}

if (isset($_POST['login'])) {
    $user = sanitize($_POST['username'] ?? '');
    $pass = $_POST['password'] ?? '';
    $q = $conn->prepare("SELECT id, password FROM users WHERE username = ? LIMIT 1");
    $q->bind_param("s", $user);
    $q->execute();
    $res = $q->get_result();
    if ($res && $row = $res->fetch_assoc()) {
        $stored = $row['password'];
        $ok = false;
        if (password_needs_rehash($stored, PASSWORD_DEFAULT) || strpos($stored, '$2') === 0 || strpos($stored, '$argon2') === 0) {
            $ok = password_verify($pass, $stored);
        } else {
            if (hash_equals($stored, (string)$pass)) $ok = true;
        }
        if ($ok) {
            if (!(strpos($stored, '$2') === 0 || strpos($stored, '$argon2') === 0)) {
                $newHash = password_hash($pass, PASSWORD_DEFAULT);
                $up = $conn->prepare("UPDATE users SET password = ? WHERE id = ?");
                if ($up) { $up->bind_param("si", $newHash, $row['id']); $up->execute(); }
            }
            $_SESSION['admin_logged_in'] = true;
            header("Location: ../View/dashboard.php");
            exit;
        }
    }
    header("Location: ../View/login.php?error=invalid");
    exit;
}

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: ../View/login.php");
    exit;
}

if (isset($_POST['add_notice'])) {
    $title = sanitize($_POST['title'] ?? '');
    $message = sanitize($_POST['message'] ?? '');
    if (!is_valid_title($title) || !is_valid_content($message)) {
        header("Location: ../View/dashboard.php?error=invalid_input");
        exit;
    }
    $stmt = $conn->prepare("INSERT INTO notices (title, message) VALUES (?, ?)");
    $stmt->bind_param("ss", $title, $message);
    if ($stmt->execute()) {
        header("Location: ../View/dashboard.php?success=notice");
        exit;
    }
}

if (isset($_POST['delete_notice'])) {
    $id = intval($_POST['id'] ?? 0);
    $stmt = $conn->prepare("DELETE FROM notices WHERE id = ?");
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        header("Location: ../View/notice_list.php?deleted=1");
        exit;
    }
}

header("Location: ../View/dashboard.php");
exit;
?>