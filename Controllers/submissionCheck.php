<?php
    require_once('../Models/submissionModel.php');
    session_start();

    if(isset($_POST['approve'])){
        $id = $_POST['id'];
        $status = approveSubmission($id);
        if($status){
            header('location: ../Views/submissionList.php');
        }else{
            echo "Failed to approve submission";
        }
    }

    if(isset($_POST['reject'])){
        $id = $_POST['id'];
        $status = rejectSubmission($id);
        if($status){
            header('location: ../Views/submissionList.php');
        }else{
            echo "Failed to reject submission";
        }
    }
?>