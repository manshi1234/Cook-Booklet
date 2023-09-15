<?php 
include('../core/db-connect.php');

$_SESSION['success'] = true;
$_SESSION['message'] = "Successfully logout !!!";
unset($_SESSION['logged_in']);
unset($_SESSION['full_name']);
unset($_SESSION['type']);
header('Location:'.HOME_URL.'admin/login.php');
exit;