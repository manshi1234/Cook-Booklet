<?php
include('../modules/db-connect.php');
if (isset($_GET['id'])) {
    $id = isset($_GET['id']) ? $_GET['id'] : '';
    $ret = delete('DELETE FROM category where id = '.$id,$connection);
    if ($ret) {
        $_SESSION['success'] = true;
        $_SESSION['message'] = "Successfully Deleted !!!";
    } else {
        $_SESSION['success'] = false;
        $_SESSION['message'] = "Recipes Exists for the selected category !!!";
    }

    header('Location:'.HOME_URL.'admin/category.php');
    exit;
}