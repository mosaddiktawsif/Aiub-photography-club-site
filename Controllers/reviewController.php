<?php
require_once('../Models/reviewModel.php');
session_start();

if(isset($_POST['action'])){
    $id = $_POST['id'];
    $status = ($_POST['action'] == 'Approve') ? 'approved' : 'rejected';
    updateStatus($id, $status);
    header('location: ../Views/reviewList.php');
}
?>