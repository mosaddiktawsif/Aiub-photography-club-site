<?php
    session_start();
    session_destroy();
   
    setcookie('status', 'true', time()-30, '/'); 
    header('location: ../Views/login.php');
?>