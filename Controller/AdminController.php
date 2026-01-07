<?php
session_start();
require_once __DIR__ . '/../Models/db.php';

// --- REGISTER (signup) ---
if (isset($_POST['register_user'])) {
    $user = $_POST['username'] ?? '';
    $pass = $_POST['password'] ?? '';

    // Check if user exists
    $check = $conn->prepare("SELECT id FROM users WHERE username = ?");
    $check->bind_param("s", $user);
    $check->execute();
    $checkRes = $check->get_result();
    if ($checkRes && $checkRes->num_rows > 0) {
        header("Location: ../View/signup.php?error=exists");
        exit;
    }

    // Insert new user
    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    if (!$stmt) { die("Prepare failed: " . $conn->error); }
    $stmt->bind_param("ss", $user, $pass);

    if ($stmt->execute()) {
        // Auto-login user after signup
        $_SESSION['admin_logged_in'] = true;
        header("Location: ../View/dashboard.php");
        exit;
    } else {
        die("Error: " . $conn->error);
    }
}

// --- LOGIN ---
if (isset($_POST['login'])) {
    $user = $_POST['username'] ?? '';
    $pass = $_POST['password'] ?? '';

    $stmt = $conn->prepare("SELECT id FROM users WHERE username = ? AND password = ?");
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }
    $stmt->bind_param("ss", $user, $pass);
    if (!$stmt->execute()) {
        die("Execute failed: " . $stmt->error);
    }
    $res = $stmt->get_result();
    if ($res && $res->num_rows > 0) {
        $_SESSION['admin_logged_in'] = true;
        header("Location: ../View/dashboard.php");
        exit;
    } else {
        header("Location: ../View/login.php?error=invalid");
        exit;
    }
}

// From here on, actions require an authenticated admin
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: ../View/login.php");
    exit;
}

// --- ADD NOTICE ---
if (isset($_POST['add_notice'])) {
    $title = $_POST['title'] ?? '';
    $message = $_POST['message'] ?? '';

    $stmt = $conn->prepare("INSERT INTO notices (title, message) VALUES (?, ?)");
    if (!$stmt) { die("Prepare failed: " . $conn->error); }
    $stmt->bind_param("ss", $title, $message);

    if ($stmt->execute()) {
        header("Location: ../View/dashboard.php?success=notice");
        exit;
    } else {
        die("Insert failed: " . $stmt->error);
    }
}

// --- ADD BLOG ---
if (isset($_POST['add_blog'])) {
    $title = $_POST['title'] ?? '';
    $content = $_POST['content'] ?? '';

    $stmt = $conn->prepare("INSERT INTO blogs (title, content) VALUES (?, ?)");
    if (!$stmt) { die("Prepare failed: " . $conn->error); }
    $stmt->bind_param("ss", $title, $content);

    if ($stmt->execute()) {
        header("Location: ../View/dashboard.php?success=blog");
        exit;
    } else {
        die("Insert failed: " . $stmt->error);
    }
}

// --- UPLOAD PHOTO ---
if (isset($_POST['upload_photo'])) {
    if (!isset($_FILES['image']) || $_FILES['image']['error'] !== UPLOAD_ERR_OK) {
        die("No file uploaded or upload error.");
    }

    $description = $_POST['description'] ?? '';

    $uploadDir = __DIR__ . '/../assets/uploads';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    $originalName = basename($_FILES['image']['name']);
    $ext = pathinfo($originalName, PATHINFO_EXTENSION);
    $safeName = uniqid('img_', true) . '.' . $ext;
    $targetPath = $uploadDir . '/' . $safeName;
    $webPath = 'assets/uploads/' . $safeName; // relative path used in DB / frontend

    if (!move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)) {
        die("Failed to move uploaded file.");
    }

    $stmt = $conn->prepare("INSERT INTO gallery (description, image_path) VALUES (?, ?)");
    if (!$stmt) { die("Prepare failed: " . $conn->error); }
    $stmt->bind_param("ss", $description, $webPath);

    if ($stmt->execute()) {
        header("Location: ../View/dashboard.php?success=gallery");
        exit;
    } else {
        die("Insert failed: " . $stmt->error);
    }
}

// --- PUBLISH RESULT ---
if (isset($_POST['publish_result'])) {
    $name = $_POST['name'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $qty = intval($_POST['qty'] ?? 0);

    $stmt = $conn->prepare("INSERT INTO results (participant_name, contact_number, selected_photo_qty) VALUES (?, ?, ?)");
    if (!$stmt) { die("Prepare failed: " . $conn->error); }
    $stmt->bind_param("ssi", $name, $phone, $qty);

    if ($stmt->execute()) {
        header("Location: ../View/dashboard.php?success=result");
        exit;
    } else {
        die("Insert failed: " . $stmt->error);
    }
}

// Default redirect
header("Location: ../View/dashboard.php");
exit;
?>