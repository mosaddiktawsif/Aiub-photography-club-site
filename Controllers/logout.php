<?php
    session_start();
    setcookie('status', 'true', time()-30, '/');
    header('location: ../View/login.php');
?>