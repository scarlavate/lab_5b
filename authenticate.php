<?php

session_start();

include 'Database.php';
include 'User.php';

if (isset($_POST['submit']) && ($_SERVER['REQUEST_METHOD'] == 'POST')) {
    // Create database connection
    $database = new Database();
    $db = $database->getConnection();

    // Sanitize inputs using mysqli_real_escape_string
    $matric = $db->real_escape_string($_POST['matric']);
    $password = $db->real_escape_string($_POST['password']);

    // Validate inputs
    if (!empty($matric) && !empty($password)) {
        $user = new User($db);
        $userData = $user->getUserMatric($matric);

        // Check if user exists and verify password
        if ($userData && password_verify($password, $userData['password'])) {
            //echo 'Login Successful';
            $_SESSION['name'] = $userData['name'];
            header('Location:read.php');
        } else {
            echo "<script>
            alert('Matric or Password is incorrect');
            window.location.href = 'login.php';
          </script>";
        }
    } else {
        echo 'Please fill in all required fields.';
    }
}