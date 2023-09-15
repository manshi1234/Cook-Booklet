<?php
include('../modules/db-connect.php');
if (isset($_GET['id'])) {
    $id = isset($_GET['id']) ? $_GET['id'] : '';
    $ret = delete('DELETE FROM users where id = '.$id,$connection);
    if ($ret) {
        $_SESSION['success'] = true;
        $_SESSION['message'] = "Successfully Deleted !!!";
    } else {
        $_SESSION['success'] = false;
        $_SESSION['message'] = "Something went wrong !!!";
    }

    header('Location:'.HOME_URL.'admin/user.php');
    exit;
}