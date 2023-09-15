<?php
include('../modules/db-connect.php');
if (isset($_POST['recipe_submit'])) {
    $id = isset($_POST['id']) ? $_POST['id'] : '';
    $action_type = isset($_POST['action_type']) ? $_POST['action_type'] : '';
    $category_id = isset($_POST['category_id']) ? $_POST['category_id'] : '';
    $title = isset($_POST['title']) ? $_POST['title'] : '';
    $shortdesc = isset($_POST['short_desc']) ? $_POST['short_desc'] : '';
    $ingredients = isset($_POST['ingredients']) ? $_POST['ingredients'] : '';
    $preparation_step = isset($_POST['preparation']) ? $_POST['preparation'] : '';
    $rating = isset($_POST['rating']) ? $_POST['rating'] : '';
    $featured = isset($_POST['featured']) ? 1 : 0;
    $old_image = isset($_POST['old_image']) ? $_POST['old_image'] : '';

    // Assuming you have the database connection established in $connection

    $title = mysqli_real_escape_string($connection, $title);
    $shortdesc = mysqli_real_escape_string($connection, $shortdesc);
    $ingredients = mysqli_real_escape_string($connection, $ingredients);
    $preparation_step = mysqli_real_escape_string($connection, $preparation_step);

    // HTML-encode the variables to prevent XSS attacks
    $title = htmlspecialchars($title, ENT_QUOTES, 'UTF-8');
    $shortdesc = htmlspecialchars($shortdesc, ENT_QUOTES, 'UTF-8');
    $ingredients = htmlspecialchars($ingredients, ENT_QUOTES, 'UTF-8');
    $preparation_step = htmlspecialchars($preparation_step, ENT_QUOTES, 'UTF-8');



    if(isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])){

        if($id>0){
                $file = "../uploads/$old_image";

                if(file_exists($file))
                    unlink($file);
        }

        $image_name = date('Ymdhis');
        $image_ext = strtolower(pathinfo($_FILES["image"]["name"],PATHINFO_EXTENSION));
    
        $image = $image_name .'.'.$image_ext;

        $upload_dir =  '../uploads/'.$image; // uploads/23232339.png
        $file_data = $_FILES['image']['tmp_name']; // file data 
        $upload = move_uploaded_file($file_data, $upload_dir);

    }else{
        $image = $old_image;
    }

    if($action_type=='add'){
        $sql = "INSERT INTO recipes (category_id, image, title, short_desc, ingredients, preparation,  rating, featured) VALUES ($category_id, '$image', '$title', '$shortdesc', '$ingredients', '$preparation_step', '$rating', $featured)";
    }
    if($action_type=='edit'){
        $sql = "UPDATE recipes SET category_id='$category_id', image='$image', title='$title', short_desc='$shortdesc', ingredients='$ingredients', preparation='$preparation_step', rating='$rating', featured='$featured' WHERE id=$id";
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

    header('Location:'.HOME_URL.'admin/recipe.php');
    exit;
}

