<?php
require_once('../Models/userModel.php');
session_start();

if(isset($_GET['action'])){
    $id = $_GET['id'];
    $status = ($_GET['action'] == 'ban') ? 'banned' : 'active';
    updateUserStatus($id, $status);
    header('location: ../Views/userList.php');
}
?>