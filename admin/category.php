<?php include 'inc/header.php';?>


    <div class="home-content">
        <div class="home-content-title">
            <h2>Category</h2>
            <a href="category-form.php">Add New</a>
        </div>
        <div class="category-table">
                <?php show_notification();?>


            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Recipe Count</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                <?php 
                    $categories = get_data('select * from category order by id desc',$connection);
                    foreach($categories as $k=>$category):
                ?>
                    <tr>
                        <td><?php echo $k+1;?></td>
                        <td><?php echo $category['name'];?></td>
                        <td><?php echo $category['status']==1?'Show':'Hide';?></td>
                        <td><?php
                            $recipes = get_data('select * from recipes where category_id = '.$category['id'],$connection);
                            echo count($recipes);
                        ?></td>
                        <td>
                            <div class="recipe-action">
                                <a href="category-form.php?id=<?php echo $category['id'];?>" class="recipe-edit-btn">
                                    <i class="bx bx-edit"></i>
                                </a>
                                <a href="actions/category-delete.php?id=<?php echo $category['id'];?>" class="recipe-delete-btn">
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
                        <th>Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
</div>
    
<?php include 'inc/footer.php';?>

