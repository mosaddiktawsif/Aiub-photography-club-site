<?php
require_once('db.php');

function getPendingSubmissions(){
    $con = getConnection();
    $result = mysqli_query($con, "SELECT * FROM submissions WHERE status='pending'");
    $data = [];
    while($row = mysqli_fetch_assoc($result)){ $data[] = $row; }
    return $data;
}

function updateStatus($id, $status){
    $con = getConnection();
    mysqli_query($con, "UPDATE submissions SET status='{$status}' WHERE id={$id}");
}
?>