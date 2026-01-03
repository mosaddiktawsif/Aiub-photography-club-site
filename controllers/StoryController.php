<?php
session_start();
require_once '../config/db.php';

if (!isset($_SESSION['user_id'])) {
    die("Access Denied");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $title = htmlspecialchars(trim($_POST['title']));
    $desc = htmlspecialchars(trim($_POST['description']));
    $user_id = $_SESSION['user_id'];
    
    
    $fileCount = count($_FILES['photos']['name']);

    if ($fileCount < 3 || $fileCount > 10) {
        header("Location: ../views/photo_story_form.php?error=You must upload between 3 and 10 photos.");
        exit();
    }

    $stmt = $conn->prepare("INSERT INTO photo_stories (user_id, title, description) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $user_id, $title, $desc);
    
    if ($stmt->execute()) {
        $story_id = $stmt->insert_id; 
        
        $uploadedCount = 0;
        $allowed = ['jpg', 'jpeg', 'png'];

        for ($i = 0; $i < $fileCount; $i++) {
            $filename = $_FILES['photos']['name'][$i];
            $tmpName = $_FILES['photos']['tmp_name'][$i];
            $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

            if (in_array($ext, $allowed)) {
                $newFileName = "story_" . $story_id . "_" . $i . "_" . time() . "." . $ext;
                $destination = "../uploads/" . $newFileName;

                if (move_uploaded_file($tmpName, $destination)) {
                    $imgStmt = $conn->prepare("INSERT INTO story_images (story_id, image_path) VALUES (?, ?)");
                    $imgStmt->bind_param("is", $story_id, $newFileName);
                    $imgStmt->execute();
                    $uploadedCount++;
                }
            }
        }

        header("Location: ../views/photo_story_form.php?success=Story created with $uploadedCount photos!");
        exit();
    } else {
        header("Location: ../views/photo_story_form.php?error=Database Error");
        exit();
    }
}
?>