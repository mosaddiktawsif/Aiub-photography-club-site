<?php
    require_once('../Models/userModel.php');
    session_start();

    if(isset($_POST['submit'])){

        $username = $_POST['username'];
        $password = $_POST['password'];

        if($username == "" || $password == ""){
            echo "null username/password";
        }else{

            $user = ['username'=> $username, 'password'=>$password];
            $status = login($user);
            
            if($status){
                setcookie('status', 'true', time()+5000, '/');
                $_SESSION['username'] = $status['username'];
                $_SESSION['user_id'] = $status['id'];
                $_SESSION['role'] = $status['role'];
                
                if($status['role'] == 'admin'){
                    header('location: ../View/admin_home.php');
                }else{
                    header('location: ../View/home.php');
                }
            }else{
                echo "invalid username/password";
            }
        }
    }else{
        header('location: ../View/login.php');
    }
?>