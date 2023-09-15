<?php include 'inc/header.php';?>


<?php if(!isset($_SESSION['type'])){
    die('Unauthorized Access');
}?>
    <div class="home-content">
        <div class="home-content-title">
            <h2>Users</h2>
            <a href="user-form.php">Add New</a>
        </div>
        <div class="category-table">
            <?php show_notification();?>

            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Full Name</th>
                        <th>Username</th>
                        <th>Type</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                <?php 
                    $users = get_data('select * from users order by id desc',$connection);
                    foreach($users as $k=>$user):
                ?>
                    <tr>
                        <td><?php echo $k+1;?></td>
                        <td><?php echo $user['full_name'];?></td>
                        <td><?php echo $user['username'];?></td>
                        <td><?php echo $user['type'];?></td>
                        <td>
                            <div class="recipe-action">
                                <a href="user-form.php?id=<?php echo $user['id'];?>" class="recipe-edit-btn">
                                    <i class="bx bx-edit"></i>
                                </a>
                                <a href="actions/user-delete.php?id=<?php echo $user['id'];?>" class="recipe-delete-btn">
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
                        <th>Full Name</th>
                        <th>Username</th>
                        <th>Type</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
</div>
    
<?php include 'inc/footer.php';?>

