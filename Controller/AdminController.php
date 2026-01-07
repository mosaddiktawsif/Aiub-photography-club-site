<?php
session_start();
require_once __DIR__ . '/../Models/db.php';


if (isset($_POST['register_user'])) {
    $user = $_POST['username'] ?? '';
    $pass = $_POST['password'] ?? '';


    $check = $conn->prepare("SELECT id FROM users WHERE username = ?");
    if (!$check) { die("Prepare failed: " . $conn->error); }
    $check->bind_param("s", $user);
    $check->execute();
    $checkRes = $check->get_result();
    if ($checkRes && $checkRes->num_rows > 0) {
        header("Location: ../View/signup.php?error=exists");
        exit;
    }

    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    if (!$stmt) { die("Prepare failed: " . $conn->error); }
    $stmt->bind_param("ss", $user, $pass);

    if ($stmt->execute()) {
        header("Location: ../View/signup.php?success=1");
        exit;
    } else {
        die("Error: " . $conn->error);
    }
}


if (isset($_POST['login'])) {
    $user = $_POST['username'] ?? '';
    $pass = $_POST['password'] ?? '';

    $stmt = $conn->prepare("SELECT id FROM users WHERE username = ? AND password = ?");
    if (!$stmt) { die("Prepare failed: " . $conn->error); }
    $stmt->bind_param("ss", $user, $pass);
    if (!$stmt->execute()) { die("Execute failed: " . $stmt->error); }
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


if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: ../View/login.php");
    exit;
}


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
    $webPath = 'assets/uploads/' . $safeName; // stored in DB as relative

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


if (isset($_POST['delete_notice'])) {
    $id = intval($_POST['id'] ?? 0);
    $stmt = $conn->prepare("DELETE FROM notices WHERE id = ?");
    if (!$stmt) { die("Prepare failed: " . $conn->error); }
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        header("Location: ../View/notice_list.php?deleted=1");
        exit;
    } else {
        die("Delete failed: " . $stmt->error);
    }
}


if (isset($_POST['delete_blog'])) {
    $id = intval($_POST['id'] ?? 0);
    $stmt = $conn->prepare("DELETE FROM blogs WHERE id = ?");
    if (!$stmt) { die("Prepare failed: " . $conn->error); }
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        header("Location: ../View/blog_list.php?deleted=1");
        exit;
    } else {
        die("Delete failed: " . $stmt->error);
    }
}


if (isset($_POST['delete_photo'])) {
    $id = intval($_POST['id'] ?? 0);


    $q = $conn->prepare("SELECT image_path FROM gallery WHERE id = ?");
    if ($q) {
        $q->bind_param("i", $id);
        $q->execute();
        $r = $q->get_result();
        if ($r && $row = $r->fetch_assoc()) {
            $img = $row['image_path'];
            if ($img) {
                $filePath = __DIR__ . '/../' . ltrim($img, '/');
                if (file_exists($filePath)) {
                    @unlink($filePath);
                }
            }
        }
    }

    $stmt = $conn->prepare("DELETE FROM gallery WHERE id = ?");
    if (!$stmt) { die("Prepare failed: " . $conn->error); }
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        header("Location: ../View/gallery.php?deleted=1");
        exit;
    } else {
        die("Delete failed: " . $stmt->error);
    }
}


if (isset($_POST['delete_result'])) {
    $id = intval($_POST['id'] ?? 0);
    $stmt = $conn->prepare("DELETE FROM results WHERE id = ?");
    if (!$stmt) { die("Prepare failed: " . $conn->error); }
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        header("Location: ../View/results.php?deleted=1");
        exit;
    } else {
        die("Delete failed: " . $stmt->error);
    }
}


header("Location: ../View/dashboard.php");
exit;
?>