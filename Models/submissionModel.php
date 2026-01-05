<?php
require_once('db.php');

function getAllSubmissions(){
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




?>