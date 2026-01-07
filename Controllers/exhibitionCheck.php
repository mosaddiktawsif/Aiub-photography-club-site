<?php
    require_once('../Models/exhibitionModel.php');
    session_start();

    if(isset($_POST['submit']))
    
    {

        $title = $_POST['title'];
        $type = $_POST['type'];
        $deadline = $_POST['deadline'];
        $created_by = $_SESSION['user_id'];


    if($title == "" || $type == "" || $deadline == "")
        {
            echo "All fields are required";
        }
        else{

            $exhibition = [
                'title'=> $title, 
                'type'=> $type, 
                'deadline'=> $deadline,
                'created_by'=> $created_by
            ];

            $status = addExhibition($exhibition);
            
            if($status)
                {
                header('location: ../Views/exhibitionList.php');
                }
            else  {
                echo "Failed to create exhibition";
            }
        }
    }
    else  {
        header('location: ../Views/exhibition.php');
    }
?>






















?>