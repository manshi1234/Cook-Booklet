<?php
include('../modules/db-connect.php');
if (isset($_GET['id'])) {
    $id = isset($_GET['id']) ? $_GET['id'] : 0;

    $result = get_data("select * from recipes where id=$id",$connection);
    if(count($result)>0){
        $old_image = $result[0]['image'];
        $file = "../uploads/$old_image";
        if(file_exists($file))
            unlink($file);
    }

    $ret = delete('DELETE FROM recipes where id = '.$id,$connection);
    if ($ret) {
     
        $_SESSION['success'] = true;
        $_SESSION['message'] = "Successfully Deleted !!!";
    } else {
        $_SESSION['success'] = false;
        $_SESSION['message'] = "Something went wrong !!!";
    }

    header('Location:'.HOME_URL.'admin/recipe.php');
    exit;
}