<?php
require_once('db.php');
function validateLogin($user, $pass){
    $con = getConnection();
    $sql = "SELECT * FROM users WHERE username='$user' AND password='$pass'";
    $result = mysqli_query($con, $sql);
    return (mysqli_num_rows($result) > 0);
}
?>