<?php
session_start();
require_once __DIR__ . '/../Models/db.php';

// --- NEW CODE: SIGN UP LOGIC ---
if (isset($_POST['register_user'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // PHP Validation: Check if user exists
    $check = $conn->query("SELECT * FROM users WHERE username = '$user'");
    if ($check->num_rows > 0) {
        die("Username already exists. <a href='../View/signup.php'>Try again</a>");
    }

    // Insert new user
    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $user, $pass);
    
    if ($stmt->execute()) {
        // Redirect to login page after success
        header("Location: ../View/login.php?signup=success");
        exit;
    } else {
        echo "Error: " . $conn->error;
    }
}

// --- EXISTING LOGIN LOGIC (Keep this as it was) ---
if (isset($_POST['login'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // Prepared statement to avoid SQL injection
    $stmt = $conn->prepare("SELECT id FROM users WHERE username = ? AND password = ?");
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }
    $stmt->bind_param("ss", $user, $pass);
    if (!$stmt->execute()) {
        die("Execute failed: " . $stmt->error);
    }
    $res = $stmt->get_result();
    if ($res === false) {
        die("Get result failed: " . $conn->error);
    }

    if ($res->num_rows > 0) {
        $_SESSION['admin_logged_in'] = true;
        header("Location: ../View/dashboard.php");
        exit;
    } else {
        header("Location: ../View/login.php?error=invalid");
        exit;
    }
}

// ... (Rest of your Add Blog/Notice logic stays here) ...
?>