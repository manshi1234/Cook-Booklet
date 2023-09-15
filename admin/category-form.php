<?php include 'inc/header.php';?>

   
    <div class="home-content">
        <p style="padding:30px"> 
            <?php
                $id = isset($_GET['id'])?$_GET['id']:0;
                if(!is_numeric($id)){
                    die('Unauthentic data.');
                }
                if($id>0){
                    $category = get_data("select * from category where id=$id",$connection);
                    if(!$category){
                        die('No Data Found');
                    }
                }
            ?>
        </p>
        <div class="home-content-title">
            <h2>Category Form</h2>
        </div>

        <div class="category-form-box">
       
            <form action="actions/category-insert-update.php" method="post">
                <input type="hidden" value="<?php echo $id>0?'edit':'add';?>" name="action_type">
                <input type="hidden" value="<?php echo $id;?>" name="id">
                <h1><?php echo $id>0?'Edit':'Add';?> Category</h1>
                <div class="input-box">
                    <label>Name <span style="color:red; text-decoration:none;">*</span></label>
                    <input type="text" placeholder="" name="name" value="<?php echo $category[0]['name'];?>" required>
                </div>
                <div class="input-box">
                    <label>Status <span style="color:red; text-decoration:none;">*</span></label>
                    <select name="status" required>
                        <option value="1" <?php echo $category[0]['status']=='1'?'selected':'';?>>Show</option>
                        <option value="0" <?php echo $category[0]['status']=='0'?'selected':'';?>>Hide</option>
                    </select>
                </div>
                <div class="input-box add-btn">
                    <input type="submit" value="<?php echo $id>0?'Update':'Add';?> Category" name="category_submit">
                </div>
            </form>
        </div>
    </div>
       

<?php include 'inc/footer.php';?>
