<?php
require_once('db.php');

function getAllExhibitions()
{
    $con = getConnection();
    $sql = "select * from exhibitions order by created_at desc";
    $result = mysqli_query($con, $sql);
    $exhibitions = [];
    while($row = mysqli_fetch_assoc($result)){
        array_push($exhibitions, $row);
    }
    return $exhibitions;
}

function getExhibitionById($id)
{
    $con = getConnection();
    $sql = "select * from exhibitions where id='{$id}'";
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result) == 1){
        return mysqli_fetch_assoc($result);
    }else{
        return false;
    }
}

function addExhibition($exhibition)
{
    $con = getConnection();
    $sql = "insert into exhibitions values(null, '{$exhibition['title']}', '{$exhibition['type']}', '{$exhibition['deadline']}', '{$exhibition['created_by']}', 'active', NOW())";
    if(mysqli_query($con, $sql)){
        return true;
    }else{
        return false;
    }
}

function deleteExhibition($id)
{
    $con = getConnection();
    $sql = "delete from exhibitions where id='{$id}'";
    if(mysqli_query($con, $sql)){
        return true;
    }else{
        return false;
    }
}

?>
















?>