<?php
include('../modules/db-connect.php');
if (isset($_POST['user_submit'])) {
    $id = isset($_POST['id']) ? $_POST['id'] : '';
    $action_type = isset($_POST['action_type']) ? $_POST['action_type'] : '';
    $name = isset($_POST['full_name']) ? $_POST['full_name'] : '';
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $type = 'user';
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    if($action_type=='add'){
        $sql = "INSERT INTO users (full_name, username, password, type) VALUES ('$name', '$username', '$hashed_password', '$type')";
    }
    if($action_type=='edit'){
        if(empty($password)){
            $sql = "UPDATE users SET full_name='$name', username='$username', type='$type' WHERE id=$id";
  
        }else{
            $sql = "UPDATE users SET full_name='$name', username='$username', password='$hashed_password', type='$type' WHERE id=$id";
  
        }
    }
    $ret = insert_update_data($sql, $connection, true);
    if ($ret) {
        $_SESSION['success'] = true;
        if($action_type=='edit')
        $_SESSION['message'] = "Successfully Updated !!!";

        if($action_type=='add')
        $_SESSION['message'] = "Successfully Added !!!";
    } else {
        $_SESSION['success'] = false;
        $_SESSION['message'] = "Something went wrong !!!";
    }

    header('Location:'.HOME_URL.'admin/user.php');
    exit;
}

