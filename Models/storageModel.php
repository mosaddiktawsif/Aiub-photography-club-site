<?php
require_once('db.php');

function saveUploadRecord($path){
    $con = getConnection();
    
    $sql = "INSERT INTO submissions (user_id, photo_path, status) VALUES (1, '{$path}', 'pending')";
    mysqli_query($con, $sql);
}
?>