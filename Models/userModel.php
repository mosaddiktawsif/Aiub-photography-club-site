<?php
require_once('db.php');

function getAllUsers(){
    $con = getConnection();
    $result = mysqli_query($con, "SELECT * FROM users");
    $users = [];
    while($row = mysqli_fetch_assoc($result)){ $users[] = $row; }
    return $users;
}

function updateUserStatus($id, $status){
    $con = getConnection();
    mysqli_query($con, "UPDATE users SET status='{$status}' WHERE id={$id}");
}
?>