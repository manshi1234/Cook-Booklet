<?php
include('../modules/db-connect.php');
if (isset($_POST['category_submit'])) {
    $id = isset($_POST['id']) ? $_POST['id'] : '';
    $action_type = isset($_POST['action_type']) ? $_POST['action_type'] : '';
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $status = isset($_POST['status']) ? $_POST['status'] : '';




    if($action_type=='add'){
        $sql = "INSERT INTO category (name, status) VALUES ('$name', '$status')";
    }
    if($action_type=='edit'){
        $sql = "UPDATE category SET name='$name', status='$status' WHERE id=$id";
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

    header('Location:'.HOME_URL.'admin/category.php');
    exit;
}