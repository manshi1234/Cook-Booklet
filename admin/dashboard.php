<?php include 'inc/header.php';?>
<?php

$category = get_data('select * from category',$connection);
$recipes = get_data('select * from recipes',$connection);
$users = get_data('select * from users',$connection);
?>

    <div class="home-content">
        <div class="home-content-title">
            <h2>Dashboard</h2>

            <?php show_notification();?>
        </div>
        <div class="overview-boxes">

            <div class="box">
                <div class="right-side">
                    <a href="category.php">
                        <div class="box-topic">Total Categories</div>
                        <div class="number"><?php echo count($category);?></div>
                    </a>
                </div>
                <i class='bx bxs-category-alt cart'></i>
            </div>
            <div class="box">
                <div class="right-side">
                    <a href="recipe.php">
                        <div class="box-topic">Total Recipes</div>
                        <div class="number"><?php echo count($recipes);?></div>
                    </a>
                </div>
                <i class='bx bxs-food-menu cart two'></i>
            </div>
            <div class="box">
                <div class="right-side">

                <a href="user.php">
                    <div class="box-topic">Total Users</div>
                    <div class="number"><?php echo count($users);?></div>
                </a>
                </div>
                <i class='bx bxs-user cart three'></i>
            </div>
        
        </div>
    </div>
    <?php include 'inc/footer.php';?>