<?php include 'includes/header.php';
      $searchkey = isset($_GET['key'])?$_GET['key']:'';
      $sql = "SELECT recipes.* FROM recipes
      INNER JOIN category ON recipes.category_id = category.id
      WHERE recipes.title like '%$searchkey%'";
    $recipes = get_data($sql, $connection);

    $recipe_count = count($recipes);

?>

     <section class="home-banner">
        <img class="banner-img" src="/assets/images/banner1.jpg">
            <div class="home-banner-search">
                <div class="banner-content">
                    <h1>Search Results</h1>
                </div>
            </div>
    </section>


    <section class="all-recipes">
        <div class="container">

            <h2 class="search-heading">Search keyword : "<?php echo $searchkey;?>"</h2>
            <p><?php echo $recipe_count;?> results found.</p>
            <div class="all-recipes-box-wrapper">
                <?php
              
                if($recipe_count==0){
                    ?>
                    <div class="no-result-found">
                        <p>No data found </p>
                    </div>
                    <?php
                }else{
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
                }
                ?>
            </div>
        </div>
    </section>

    <?php include 'includes/footer.php';?>