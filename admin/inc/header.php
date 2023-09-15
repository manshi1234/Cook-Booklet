<?php
include('core/db-connect.php');
if(!isset($_SESSION['logged_in'])){
    header('Location:'.HOME_URL.'admin/login.php');
    exit;
}
?>

<!DOCTYPE html>
<!-- Coding by CodingNepal | www.codingnepalweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Dashboard</title>

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="assets/css/admin.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- jquery  -->
    <script src="assets/plugins/jquery/jquery-3.2.1.slim.min.js"></script>
    <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
   </head>
<body>
<section class="sidebar">
    <div class="logo-details">
        <img src="assets/images/logo.png">
        <!-- <span class="logo_name">CookBooklet</span> -->
    </div>
    <ul class="nav-links">
        <li>
            <a href="dashboard.php" class="<?php echo is_active(['dashboard.php'])?'active':'';?>">
                <i class='bx bx-grid-alt' ></i>
                <span class="links_name">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="category.php" class="<?php echo is_active(['category.php','category-form.php'])?'active':'';?>">
                <i class='bx bxs-category-alt'></i>
                <span class="links_name">Category</span>
            </a>
        </li>
        <li>
            <a href="recipe.php" class="<?php echo is_active(['recipe.php'])?'active':'';?>">
                <i class='bx bxs-food-menu'></i>
                <span class="links_name">Recipes</span>
            </a>
        </li>
        <?php if(isset($_SESSION['type']) && $_SESSION['type']=='admin'):?>
        <li>
            <a href="user.php" class="<?php echo is_active(['user.php'])?'active':'';?>">
                <i class='bx bxs-user' ></i>
                <span class="links_name">Users</span>
            </a>
        </li>
        <?php endif;?>
       
        <li class="log_out">
            <a href="actions/logout.php">
                <i class='bx bx-log-out'></i>
                <span class="links_name">Log out</span>
            </a>
        </li>
    </ul>
</section>


  <section class="home-section">
    <nav>
        <div class="admin_name">
            <a href="/"> <i class='bx bx-globe'></i>Visit Recipe Site</a>
        </div>
        <div class="profile-details">
            <img src="assets/images/admin.png" alt="">
            <span class="admin_name"><?php echo isset($_SESSION['full_name'])?$_SESSION['full_name']:''?></span>
        </div>
    </nav>