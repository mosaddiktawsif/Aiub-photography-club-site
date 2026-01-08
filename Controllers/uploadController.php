<?php
require_once('../Models/storageModel.php');
session_start();

if(isset($_POST['upload'])){
    $file = $_FILES['photo'];
    $name = $file['name'];
    $tmp = $file['tmp_name'];
    $size = $file['size'];

    
    if($name == ""){ echo "Null file"; exit; }
    if($size > 2097152){ echo "File too large (PHP)"; exit; } 

   
    $newName = time() . "_" . $name;
    $dest = "../Assets" . $newName;

    if(move_uploaded_file($tmp, $dest)){
        saveUploadRecord($newName);
        header('location: ../Views/uploadPhoto.php?msg=success');
    } else {
        echo "Upload Failed";
    }
}
?>