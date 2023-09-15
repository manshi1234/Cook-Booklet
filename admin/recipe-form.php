<?php include 'inc/header.php';?>


    <div class="home-content">
        <p style="padding:30px"> 
            <?php
                $id = isset($_GET['id'])?$_GET['id']:0;
                if(!is_numeric($id)){
                    die('Unauthentic data.');
                }
                if($id>0){
                    $recipe = get_data("select * from recipes where id=$id",$connection);
                    if(!$recipe){
                        die('No Data Found');
                    }
                }
                 $categories = get_data("SELECT id, name FROM category",$connection);

            ?>
        </p>
        <div class="home-content-title">
            <h2>Recipe Form</h2>
        </div>

        <div class="recipe-form-box">
            <form action="actions/recipe-insert-update.php" method="post" enctype="multipart/form-data">
            <input type="hidden" value="<?php echo $id>0?'edit':'add';?>" name="action_type">
            <input type="hidden" value="<?php echo $id;?>" name="id">
            <input type="hidden" value="<?php echo $recipe[0]['image'];?>" name="old_image">


                <h1><?php echo $id>0?'Edit':'Add';?> Recipe</h1>
                <div class="input-box">
                    <label>Category <span style="color:red; text-decoration:none;">*</span></label>
                    <select name="category_id" required>
                        <?php
                        foreach ($categories as $category) {
                            $selected = ($category['id'] == $recipe[0]['category_id']) ? 'selected' : '';
                            echo '<option value="' . $category['id'] . '" ' . $selected . '>' . $category['name'] . '</option>';
                        }
                        ?>
                    </select>
                </div>

                <div class="input-box">
                    <?php if($id>0):?>
                    <img src="uploads/<?php echo $recipe[0]['image'];?>" width="150">
                    <?php endif;?>
                    <label for="image">Image  <?php echo $id>0?'':'<span style="color:red; text-decoration:none;">*</span>';?></label>
                    <input type="file" id="image" name="image" <?php echo $id>0?'':'required';?>>
                </div>
                <div class="input-box">
                    <label>Title <span style="color:red; text-decoration:none;">*</span></label>
                    <input type="text" placeholder="" name="title" value="<?php echo $recipe[0]['title'];?>" required>
                </div>
                <div class="input-box">
                    <label>Short Desc (500 char)</label>
                    <textarea name="short_desc" id="short_desc" rows="10"><?php echo $recipe[0]['short_desc'];?></textarea>
                </div>
                <div class="input-box">
                    <label for="ingredients">Ingredients</label>
                    <textarea name="ingredients" id="ingredients" rows="10"><?php echo $recipe[0]['ingredients'];?></textarea>
                </div>
                <div class="input-box">
                    <label for="preparation">Preparation Steps</label>
                    <textarea name="preparation" id="preparation" rows="10"><?php echo $recipe[0]['preparation'];?></textarea>
                </div>

                <div class="input-box">
                    <label>Rating <span style="color:red;">*</span></label>
                    <select name="rating">
                        <option <?php echo $recipe[0]['rating']=='1'?'selected':'';?>>1</option>
                        <option <?php echo $recipe[0]['rating']=='2'?'selected':'';?>>2</option>
                        <option <?php echo $recipe[0]['rating']=='3'?'selected':'';?>>3</option>
                        <option <?php echo $recipe[0]['rating']=='4'?'selected':'';?>>4</option>
                        <option <?php echo $recipe[0]['rating']=='5'?'selected':'';?>>5</option>
                    </select>
                </div>
                <div class="input-box featured-input">
                    <label>Featured</label>
                    <input type="checkbox" <?php echo $recipe[0]['featured'] == '1' ? 'checked' : ''; ?> name="featured">
                </div>
                <div class="input-box add-btn">
                    <input type="submit" value="<?php echo $id>0?'Update':'Add';?> Recipe" name="recipe_submit">
                </div>
            </form>
        </div>
       
    </div>

<?php include 'inc/footer.php';?>
