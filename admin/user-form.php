<?php include 'inc/header.php';?>


<?php if(isset($_SESSION['type']) && $_SESSION['type']=='user'){
    die('Unauthorized Access');
}?>
    <div class="home-content">
        <p style="padding:30px"> 
            <?php
                $id = isset($_GET['id'])?$_GET['id']:0;
                if(!is_numeric($id)){
                    die('Unauthentic data.');
                }
                if($id>0){
                    $user = get_data("select * from users where id=$id",$connection);
                    if(!$user){
                        die('No Data Found');
                    }
                }
            ?>
        </p>
        <div class="home-content-title">
            <h2>User Form</h2>
        </div>

        <div class="user-form-box">
    
            <form action="actions/user-insert-update.php" method="post">
                <input type="hidden" value="<?php echo $id>0?'edit':'add';?>" name="action_type">
                <input type="hidden" value="<?php echo $id;?>" name="id">
           
                <h1><?php echo $id>0?'Edit':'Add';?> User</h1>
                <div class="input-box">
                    <label>Full Name <span style="color:red; text-decoration:none;">*</span></label>
                    <input type="text" placeholder="" name="full_name" value="<?php echo $user[0]['full_name'];?>" required>
                </div>
                <div class="input-box">
                    <label>Username <span style="color:red; text-decoration:none;">*</span></label>
                    <input type="text" placeholder="" name="username" value="<?php echo $user[0]['username'];?>" required>
                </div>
                <div class="input-box">
                    <label>Password <?php echo $id>0?'':'<span style="color:red; text-decoration:none;">*</span>';?></label>
                    <?php if ($id > 0): ?>
                        <span>Leave password field empty if you do not want to change the existing password.</span>
                    <?php endif; ?>
                    <input type="password" placeholder="" name="password" value="" <?php echo $id>0?'':'required';?>>
                </div>
                <div class="input-box">
                    <label>Type</label>
                    <select name="type">
                        <option <?php echo $user[0]['type']=='user'?'selected':'';?>>User</option>
                    </select>
                </div>
                <div class="input-box add-btn">
                    <input type="submit" value="<?php echo $id>0?'Update':'Add';?> User" name="user_submit">
                </div>
            </form>
        </div>
       
    </div>

<?php include 'inc/footer.php';?>
