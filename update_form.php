<?php

include 'Database.php';
include 'User.php';

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Retrieve the matric value from the GET request
    $matric = $_GET['matric'];

    // Process the update using the matric value
    // For example, you can fetch the user data using the matric value and display it in a form for updating
    // Create an instance of the Database class and get the connection
    $database = new Database();
    $db = $database->getConnection();

    $user = new User($db);
    $userData = $user->getUserMatric($_GET['matric']);

    $db->close();

    // Display the update form with the fetched user data
    // Example:
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Update User</title>
        <link rel="stylesheet" href="update_form.css">
    </head>

    <body>
        <form action="update.php" method="post">
            <label for="matric">Matric:</label>
            <input type="text" name="matric" value="<?php echo $userData['matric']; ?>"><br>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $userData['name']; ?>"><br>
            <label for="role">Access Level:</label>
            <select name="role" id="role" required>
                <option value="">Please select</option>
                <option value="lecturer" <?php if ($userData['role'] == 'lecturer')
                    echo "selected" ?>>Lecturer</option>
                    <option value="student" <?php if ($userData['role'] == 'student')
                    echo "selected" ?>>Student</option>
                </select><br>
                <input type="submit" value="Update">
                <button type="button" onclick="window.location.href='read.php';">Cancel</button>
            </form>
        </body>

        </html>
    <?php
}
?>