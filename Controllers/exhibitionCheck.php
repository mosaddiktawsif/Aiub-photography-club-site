<?php
    require_once('../Models/exhibitionModel.php');
    session_start();

    if(isset($_POST['submit']))
    
    {

        $title = $_POST['title'];
        $type = $_POST['type'];
        $deadline = $_POST['deadline'];
        $created_by = $_SESSION['user_id'];
        
























?>