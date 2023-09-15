<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Recipe Book</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <!-- libraries css -->
    <link rel='stylesheet' type='text/css' media='screen' href='assets/plugins/bootstrap/bootstrap.min.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <!-- custom css -->
    <link rel='stylesheet' type='text/css' media='screen' href='assets/css/login.css'>

</head>
<body>


   
<section class="login-form">
    <div class="container">
        <?php 
         if(isset($_SESSION['success']) && $_SESSION['success']==true){
            echo '<p class="success-msg">'.$_SESSION['message'].'</p>';
            unset($_SESSION['success']);
            unset($_SESSION['message']);
        }
          
        if(isset($_SESSION['success']) && $_SESSION['success']==false){
            echo '<p class="error-msg">'.$_SESSION['message'].'</p>';
            unset($_SESSION['success']);
            unset($_SESSION['message']);
        }
        ?>
        <form class="login-form-box" action="actions/login-post.php" method="post">
            <img src="../assets/images/recipe-logo.png">
            <h1>Login</h1>
            <div class="input-box">
                <input type="text" placeholder="Username" name="username">
            </div>
            <div class="input-box">
                <input type="password" placeholder="Password" name="password">
            </div>
            <div class="input-box submit-btn">
                <input type="submit" value="Sign in">
            </div>
        </form>
    </div>
</section>




   




    

</body>
</html>



	