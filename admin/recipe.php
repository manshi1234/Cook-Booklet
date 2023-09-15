<?php include 'inc/header.php';?>


    <div class="home-content">
        <div class="home-content-title">
            <h2>Recipes</h2>
            <a href="recipe-form.php">Add New</a>
        </div>
        <div class="category-table">
            <?php show_notification();?>
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category ID</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Rating</th>
                        <th>Featured</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                <?php 
                    $recipes = get_data('select recipes.*,category.name from recipes join category on category.id=recipes.category_id order by recipes.id desc',$connection);
                    foreach($recipes as $k=>$recipe):
                ?>
                    <tr>
                        <td><?php echo $k+1;?></td>
                        <td><?php echo $recipe['name'];?></td>
                        <td>
                            <div class="recipe-img">
                                <img width="100" src="uploads/<?php echo $recipe['image'];?>">
                            </div>
                        </td>
                        <td><?php echo $recipe['title'];?></td>
                        <td><?php echo $recipe['rating'];?></td>
                        <td><?php echo $recipe['featured']==1?'Yes':'No';?></td>
                        <td>
                        <div class="recipe-action">
                                <a href="recipe-form.php?id=<?php echo $recipe['id'];?>" class="recipe-edit-btn">
                                    <i class="bx bx-edit"></i>
                                </a>
                                <a href="actions/recipe-delete.php?id=<?php echo $recipe['id'];?>" class="recipe-delete-btn">
                                    <i class="bx bx-trash"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Category ID</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Rating</th>
                        <th>Featured</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
   

    <?php include 'inc/footer.php';?>


