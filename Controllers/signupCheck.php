<?php
    require_once('../Models/userModel.php');
    session_start();

    if(isset($_POST['submit']))
        {

        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];

        if($username == "" || $password == "" || $email == "")
        {
            echo "null username/password/email";
        }else{

            $user = ['username'=> $username, 'password'=> $password, 'email'=> $email];
            $status = addUser($user);
            
            if($status){
                header('location: ../Views/login.php');
            }else{
                header('location: ../Views/signup.php');
            }
        }
    }       
    else
    {
        header('location: ../Views/signup.php');
    }
?>