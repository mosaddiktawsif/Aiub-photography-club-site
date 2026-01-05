<?php
    session_start();

    if(!isset($_COOKIE['status']))
        
    {
        header('location: login.php');
        exit();
    }

    if($_SESSION['role'] != 'admin')
        
    {
        header('location: home.php');
        exit();
    }
?>