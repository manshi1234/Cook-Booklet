<?php 
   include('admin/modules/db-connect.php');
   $id = isset($_GET['id'])?$_GET['id']:0;
   if(!is_numeric($id)){
       header('Location: list.php');
       exit;
   }
   if($id>0){
       $recipe = get_data("select * from recipes where id=$id",$connection);
       if(!$recipe){
        header('Location: list.php');
        exit;
       }
   }

   $recipe = $recipe[0];
?>

<?php 
    include('includes/head-content.php');
?>

    <section class="banner">
            <div class="banner-image">
                <img src="assets/images/banner1.jpg">
                <h1></h1>
            </div>
    </section>

    <section class="singel-page">
        <div class="container">
            <div class="single-recipe-wrapper">
                <div class="single-recipe-left">
                    <img src="admin/uploads/<?php echo $recipe['image'];?>">
                </div>
                <div class="single-recipe-right">
                    <h2><?php echo $recipe['title'];?></h2>
                    <p><?php echo $recipe['short_desc'];?></p>
                    <div class="ingredients-steps">
                        <h2>Ingredients</h2>
                        <pre><?php echo $recipe['ingredients'];?></pre>
                    </div>
                </div>
            </div>

            <div class="preparation-steps">
                    <h2>Preparation</h2>
                    <pre><?php echo $recipe['preparation'];?></pre>
                </div>
        </div>
    </section>

    <?php include 'includes/footer.php';?>