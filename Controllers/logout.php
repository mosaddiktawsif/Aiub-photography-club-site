<?php

    session_start();
    setcookie('status', 'true', time()-30, '/');
    header('location: ../Views/login.php');


?>