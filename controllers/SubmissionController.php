<?php
session_start();
require_once '../config/db.php';
require_once '../models/SubmissionModel.php';

if (!isset($_SESSION['user_id'])) {
    die("Access Denied: You must be logged in.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $title = trim($_POST['title']);
    $category = $_POST['category'];
    $exhibition = $_POST['exhibition'];
    $description = trim($_POST['description']);
    $user_id = $_SESSION['user_id'];
    
    $errors = [];

    if (empty($title)) $errors[] = "Title is required.";
    if (empty($category)) $errors[] = "Category is required.";

    
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
        $allowed = ['jpg', 'jpeg', 'png'];
        $filename = $_FILES['photo']['name'];
        $filetype = $_FILES['photo']['type'];
        $filesize = $_FILES['photo']['size'];
        $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

        
        if (!in_array($ext, $allowed)) {
            $errors[] = "Only JPG and PNG allowed.";
        }
        
        if ($filesize > 10 * 1024 * 1024) {
            $errors[] = "File size must be less than 5MB.";
        }

        if (empty($errors)) {
            
            $newFileName = "uid_" . $user_id . "_" . time() . "." . $ext;
            $destination = "../uploads/" . $newFileName;
            
            if (move_uploaded_file($_FILES['photo']['tmp_name'], $destination)) {
                
                $model = new SubmissionModel($conn);
                if ($model->addSubmission($user_id, $title, $category, $exhibition, $description, $newFileName)) {
                    header("Location: ../views/history.php?msg=success");
                    exit();
                } else {
                    $errors[] = "Database error.";
                }
            } else {
                $errors[] = "Failed to upload file.";
            }
        }
    } else {
        $errors[] = "Please select a photo.";
    }

    
    if (!empty($errors)) {
        $errorStr = implode(", ", $errors);
        header("Location: ../views/submission_form.php?error=" . urlencode($errorStr));
        exit();
    }
}
?>