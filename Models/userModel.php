<?php
require_once('db.php');

function login($user)
{
    $con = getConnection();
    $sql = "select * from users where username='{$user['username']}' and password='{$user['password']}'";
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result) == 1){
        $row = mysqli_fetch_assoc($result);
        return $row;
    }else{
        return false;
    }
}

function getUserById($id)
{
    $con = getConnection();
    $sql = "select * from users where id='{$id}'";
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result) == 1){
        return mysqli_fetch_assoc($result);
    }else{
        return false;
    }
}

function getAllUsers()
{
    $con = getConnection();
    $sql = "select * from users";
    $result = mysqli_query($con, $sql);
    $users = [];
    while($row = mysqli_fetch_assoc($result)){
        array_push($users, $row);
    }
    return $users;
}

function addUser($user)
{
    $con = getConnection();
    $sql = "insert into users values(null, '{$user['username']}','{$user['password']}', '{$user['email']}', 'user')";
    if(mysqli_query($con, $sql)){
        return true;
    }else{
        return false;
    }
}

function deleteUser($id)
{
    $con = getConnection();
    $sql = "delete from users where id='{$id}'";
    if(mysqli_query($con, $sql)){
        return true;
    }else{
        return false;
    }
}

function updateUser($user)
{
    $con = getConnection();
    $sql = "update users set username='{$user['username']}', email='{$user['email']}', role='{$user['role']}' where id='{$user['id']}'";
    if(mysqli_query($con, $sql)){
        return true;
    }else{
        return false;
    }
}

function blockUser($id)
{
    $con = getConnection();
    $sql = "update users set role='blocked' where id='{$id}'";
    if(mysqli_query($con, $sql)){
        return true;
    }else{
        return false;
    }
}

?>