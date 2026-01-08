<?php
function getConnection(){
    $con = mysqli_connect('localhost', 'root', '', 'webtech_project');
    if(!$con){ die("Connection Error"); }
    return $con;
}
?>