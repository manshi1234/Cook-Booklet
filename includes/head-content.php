

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Recipe Book</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="icon" type="image" href="../assets/images/recipe-logo.png">

    <!-- libraries css -->
    <link rel='stylesheet' type='text/css' media='screen' href='assets/plugins/bootstrap/bootstrap.min.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='assets/plugins/owl-carousel/assets/owl.carousel.min.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='assets/plugins/owl-carousel/assets/owl.theme.default.css'>

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <!-- custom css -->
    <link rel='stylesheet' type='text/css' media='screen' href='assets/css/style.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='assets/css/responsive.css'>


    

</head>
<body>

    <!-- header -->
    <section class="header">
        <div class="container">
            <div class="header-nav">
                <nav class="navbar navbar-expand-lg">
                    <a class="navbar-brand" href="../index.php">
                        <img src="assets/images/recipe-logo.png">
                    </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                            <i class="fa fa-bars"></i>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                            <div class="navbar-nav">
                                <a class="nav-item nav-link <?php echo ($_SERVER['PHP_SELF'] == '/index.php') ? 'active' : ''; ?>" href="index.php">Home <span class="sr-only">(current)</span></a>
                                <a class="nav-item nav-link <?php echo ($_SERVER['PHP_SELF'] == '/about.php') ? 'active' : ''; ?>" href="../about.php">About</a>
                                <a class="nav-item nav-link <?php echo ($_SERVER['PHP_SELF'] == '/list.php') ? 'active' : ''; ?>" href="../list.php">All Recipes</a>
                                <a class="nav-item nav-link <?php echo ($_SERVER['PHP_SELF'] == '/admin/login.php') ? 'active' : ''; ?>" href="../admin/login.php">Login</a>
                            </div>
                        </div>
                </nav>
            </div>
        </div>
    </section>
    <!-- header -->