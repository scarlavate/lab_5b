<?php

include 'Database.php';
include 'User.php';

echo "<script>alert('Successfully Registered'); window.location.href='read.php';</script>";

// Create an instance of the Database class and get the connection
$database = new Database();
$db = $database->getConnection();

// Create an instance of the User class
$user = new User($db);

// Register the user using POST data
$user->createUser($_POST['matric'], $_POST['name'], $_POST['password'], $_POST['role']);

// Close the connection
$db->close();
?>