<?php
include('../modules/db-connect.php');
if (isset($_POST)) {

    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    if(empty($username) || empty($password)){
        $_SESSION['success'] = false;
        $_SESSION['message'] = "Fields are required !!!";
        header('Location:'.HOME_URL.'admin/login.php');
        exit;
    }

    $sql = "select * from users where username = '$username'";
    
    $ret = get_data($sql, $connection, true);
    if ($ret) {
        $hashed_password = $ret[0]['password'];
        if (password_verify($password, $hashed_password)) {

            $_SESSION['logged_in'] = true;
            $_SESSION['full_name'] = $ret[0]['full_name'];
            $_SESSION['type']      = $ret[0]['type'];
            
            $_SESSION['success'] = true;
            $_SESSION['message'] = "Success !!!";
            header('Location:'.HOME_URL.'admin/dashboard.php');
            exit;
        }else{
            $_SESSION['success'] = false;
            $_SESSION['message'] = "Password does not match !!!";
            header('Location:'.HOME_URL.'admin/login.php');
            exit;
    
        }


    } else {
        $_SESSION['success'] = false;
        $_SESSION['message'] = "User does not exists !!!";
        header('Location:'.HOME_URL.'admin/login.php');
        exit;

    }
}