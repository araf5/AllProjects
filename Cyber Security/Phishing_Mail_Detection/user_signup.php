<?php
include_once('db_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['signup'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate and sanitize the input if needed

    // Insert user data into the users table
    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
    mysqli_query($conn, $sql);
}
?>

<!-- Your original HTML code with correct action attribute -->


<!-- HTML form for user signup -->


<!-- HTML form for user registration -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Signup</title>
    <link rel="stylesheet" href="user_signup_styles.css">
</head>
<body>

<div class="signup-container">
    <h1>User Signup</h1>
    <form method="post" action="">
        <label for="id">ID:</label>
        <input type="text" id="id" name="id" required>

        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit" name="signup">Sign Up</button>
    </form>
</div>

</body>
</html>
