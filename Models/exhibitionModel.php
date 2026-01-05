<?php
require_once('db.php');

function getAllExhibitions(){
    $con = getConnection();
    $sql = "select * from exhibitions order by created_at desc";
    $result = mysqli_query($con, $sql);
    $exhibitions = [];
    while($row = mysqli_fetch_assoc($result)){
        array_push($exhibitions, $row);
    }
    return $exhibitions;
}


















?>