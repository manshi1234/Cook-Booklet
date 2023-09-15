<?php
define('HOME_URL','http://recipes.test/');
session_start();
$hostname = 'localhost';
$username = 'root';
$password = 'thehelp#';
$database_name = 'recipe_book';

// Create a database connection
$connection = new mysqli($hostname, $username, $password, $database_name);

// Check the connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

include 'crud.php';
include 'helper.php';