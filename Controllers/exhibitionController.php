<?php
require_once('../Models/exhibitionModel.php');
session_start();

if(isset($_POST['create'])){
    $title = $_POST['title'];
    $type = $_POST['type'];
    $deadline = $_POST['deadline'];

    if($title == "" || $type == "" || $deadline == ""){
        header('location: ../Views/createExhibition.php?err=null');
    } else {
        $status = createExhibition($title, $type, $deadline);
        if($status){
            header('location: ../Views/createExhibition.php?msg=success');
        } else {
            echo "DB Error";
        }
    }
}
?>