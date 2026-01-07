<?php
    require_once('../Models/userModel.php');
    session_start();

    if(isset($_POST['update']))
        {
        $id = $_POST['id'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $role = $_POST['role'];

        if($username == "" || $email == "" || $role == ""){
            echo "All fields are required";
        }else{
            $user = [
                'id'=> $id,
                'username'=> $username, 
                'email'=> $email, 
                'role'=> $role
            ];
            
            $status = updateUser($user);
            
            if($status){
                header('location: ../Views/userList.php');
            }else{
                echo "Failed to update user";
            }
        }
    }

    if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        $status = deleteUser($id);
        if($status){
            header('location: ../Views/userList.php');
        }else{
            echo "Failed to delete user";
        }
    }

    if(isset($_GET['block'])){
        $id = $_GET['block'];
        $status = blockUser($id);
        if($status){
            header('location: ../Views/userList.php');
        }else{
            echo "Failed to block user";
        }
    }
?>