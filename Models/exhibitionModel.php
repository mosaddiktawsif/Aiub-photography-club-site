<?php
require_once('db.php');

function createExhibition($title, $type, $deadline){
    $con = getConnection();
    $sql = "INSERT INTO exhibitions VALUES(NULL, '{$title}', '{$type}', '{$deadline}')";
    return mysqli_query($con, $sql);
}
?>