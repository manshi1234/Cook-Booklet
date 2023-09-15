<?php include 'includes/header.php';?>


    <!-- home-banner -->
    <section class="home-banner">
        <img class="banner-img" src="/assets/images/banner2.jpg">
            <div class="home-banner-search">
                <div class="banner-content">
                    <h1>Welcome to CookBooklet</h1>
                    <p>Create your own recipes.</p>
                </div>
                <div class="search-bar">
                    <form id="search" action="search.php" method="get">
                        <input type="text" name="key" placeholder="Search for the Recipes">
                        <a href="javascript:void(0)"  onclick="document.getElementById('search').submit();">
                            <i class="fa fa-search"></i>
                        </a>
                    </form>
                </div>
            </div>
    </section>
    <!-- home-banner -->

    <!-- featured -->
    <section class="featured-recipes">
        <div class="container">
            <div class="featured-recipes-heading">
                <h1>Featured Recipes</h1>
            </div>

            <div class="owl-carousel featured-slide owl-theme">
                <?php
                $sql = "SELECT * FROM recipes WHERE featured = 1 ORDER BY id DESC";
                $featuredRecipes = get_data($sql, $connection);

                foreach ($featuredRecipes as $recipe) {
                ?>
                    <div class="featured-recipes-box">
                        <img src="admin/uploads/<?php echo $recipe['image']; ?>">
                        <div class="featured-recipes-content">
                            <h2><?php echo $recipe['title']; ?></h2>
                            <p><?php echo substr($recipe['short_desc'],0,100).'..'; ?></p>
                            <div class="rating">
                                <ul>
                                    <?php
                                    $rating = $recipe['rating'];
                                    for ($i = 1; $i <= 5; $i++) {
                                        $class = ($i <= $rating) ? 'fa-star' : 'fa-star-o';
                                    ?>
                                        <li>
                                            <a href="">
                                                <i class="fa <?php echo $class; ?>"></i>
                                            </a>
                                        </li>
                                    <?php
                                    }
                                    ?>
                                </ul>
                            </div>
                            <div class="featured-recipe-read-more">
                                <a href="single-page.php?id=<?php echo $recipe['id'];?>">Read More</a>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>

            <div class="featured-slider-btn">
                <a class="featured-slider-left-btn" href="javascript:void(0);">
                    <i class="fa fa-long-arrow-left"></i>
                </a>
                <a class="featured-slider-right-btn" href="javascript:void(0);">
                    <i class="fa fa-long-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>
    <!-- featured -->

    <?php 
        $categories = get_data('select * from category order by id desc',$connection);
    ?>

    <?php foreach($categories as $k=>$category):
            $category_id = $category['id'];
        ?>
    <section class="cat-recipe <?php echo $k%2==0?'even':'odd';?>">
        <div class="container">
            <div class="cat-recipe-heading">
                <h1><?php echo $category['name'];?></h1>
            </div>
            <div class="cat-recipe-box-wrapper">
                <?php
                $categoryName = 'breakfast';
                $sql = "SELECT recipes.* FROM recipes
                        INNER JOIN category ON recipes.category_id = category.id
                        WHERE category.id = $category_id ORDER BY recipes.id DESC
                        LIMIT 4 ";
                $recipes = get_data($sql, $connection);
                foreach ($recipes as $recipe) {
                ?>
                    <div class="cat-recipe-box">
                        <img src="admin/uploads/<?php echo $recipe['image']; ?>">
                        <div class="cat-recipe-content">
                            <h2><?php echo $recipe['title']; ?></h2>
                            <p><?php echo substr($recipe['short_desc'],0,100).'...'; ?></p>

                            <div class="rating">
                                <ul>
                                    <?php
                                    $rating = $recipe['rating'];
                                    for ($i = 1; $i <= 5; $i++) {
                                        $class = ($i <= $rating) ? 'fa-star' : 'fa-star-o';
                                    ?>
                                        <li>
                                            <a href="">
                                                <i class="fa <?php echo $class; ?>"></i>
                                            </a>
                                        </li>
                                    <?php
                                    }
                                    ?>
                                </ul>
                            </div>
                            <div class="breakfast-recipe-read-more">
                                <a href="single-page.php?id=<?php echo $recipe['id'];?>">Read More</a>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>

            <div class="view-all-btn">
                <a href="list.php">View All Recipes</a>
            </div>
        </div>
    </section>
    <?php endforeach;?>
	<?php include 'includes/footer.php';?>