<?php

    include 'Database.php';
    include 'User.php';

    $database = new Database();
    $db = $database->getConnection();

    $user = new User($db);

    $user ->  deleteUser($_GET['matric']);

?>

echo "<script>alert('Data has been deleted successfully'); window.location.href='read.php';</script>";
