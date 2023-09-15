<?php include 'includes/header.php';?>

     <!-- home-banner -->
     <section class="home-banner">
        <img class="banner-img" src="/assets/images/banner1.jpg">
            <div class="home-banner-search">
                <div class="banner-content">
                    <h1>All Recipes</h1>
                </div>
            </div>
    </section>
    <!-- home-banner -->

    <section class="all-recipes">
        <div class="container">
            <div id="exTab2" class="container">	    
                <ul class="nav nav-tabs">
                <?php 
                    $categories = get_data('select * from category',$connection);
                ?>
                <?php foreach($categories as $k=>$category):?>
                    <li>
                        <a href="#<?php echo $k;?>" class="<?php echo $k==0?'active':'';?>" data-toggle="tab">
                            <span><?php echo $category['name'];?></span>
                        </a>
                    </li>
                <?php endforeach;?>
                </ul>

                <div class="tab-content ">

                <?php foreach($categories as $k=>$category):
                        $category_id = $category['id'];
                    ?>
                
                    <div class="tab-pane <?php echo $k==0?'active':'';?>" id="<?php echo $k;?>">
                        <div class="all-recipes-box-wrapper">
                            <?php
                            $categoryName = 'breakfast';
                            $sql = "SELECT recipes.* FROM recipes
                                    INNER JOIN category ON recipes.category_id = category.id
                                    WHERE category.id = $category_id";
                            $recipes = get_data($sql, $connection);
                            foreach ($recipes as $recipe) {
                            ?>
                                <div class="all-recipes-box">
                                    <img src="admin/uploads/<?php echo $recipe['image']; ?>">
                                    <div class="all-recipes-content">
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
                                        <div class="all-recipe-read-more">
                                            <a href="single-page.php?id=<?php echo $recipe['id'];?>">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                <?php endforeach;?>

                </div>
            </div>
        </div>
    </section>

    <?php include 'includes/footer.php';?>