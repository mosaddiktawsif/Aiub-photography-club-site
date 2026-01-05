<?php
require_once('db.php');

function getAllSubmissions()
{
    $con = getConnection();
    $sql = "select s.*, e.title as exhibition_title, u.username 
            from submissions s 
            join exhibitions e on s.exhibition_id = e.id 
            join users u on s.user_id = u.id 
            order by s.submitted_at desc";
    $result = mysqli_query($con, $sql);
    $submissions = [];
    while($row = mysqli_fetch_assoc($result)){
        array_push($submissions, $row);
    }
    return $submissions;
}

function getSubmissionById($id)
{
    $con = getConnection();
    $sql = "select s.*, e.title as exhibition_title, u.username 
            from submissions s 
            join exhibitions e on s.exhibition_id = e.id 
            join users u on s.user_id = u.id 
            where s.id='{$id}'";
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result) == 1){
        return mysqli_fetch_assoc($result);
    }else{
        return false;
    }
}

function approveSubmission($id)
{
    $con = getConnection();
    $sql = "update submissions set status='approved' where id='{$id}'";
    if(mysqli_query($con, $sql)){
        return true;
    }else{
        return false;
    }
}

function rejectSubmission($id)
{
    $con = getConnection();
    $sql = "update submissions set status='rejected' where id='{$id}'";
    if(mysqli_query($con, $sql)){
        return true;
    }else{
        return false;
    }
}




?>