<?php
include_once('db_connection.php');

// Assuming you have a form submission logic here to check user credentials
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $user_id = $_POST['user_id'];
    $password = $_POST['password'];

    // Validate and sanitize the input if needed

    // Check if the user credentials are valid
    $sql = "SELECT * FROM users WHERE id = '$user_id' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // User found, set session and redirect to user dashboard or another page
        session_start();
        $_SESSION['user_id'] = $user_id;
        header('Location: user_dashboard.php');
        exit();
    } else {
        // Invalid credentials, display an error message or redirect to login page
        $error_message = "Invalid credentials. Please try again.";
    }
}
?>

<!-- Your original HTML code with correct action attribute -->


<!-- HTML form for user login -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link rel="stylesheet" href="user_login_styles.css">
</head>
<body>

<div class="login-container">
    <h1>User Login</h1>
    <form method="post" action="">
        <label for="user_id">User ID:</label>
        <input type="text" id="user_id" name="user_id" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <?php if (isset($error_message)): ?>
            <p style="color: red;"><?php echo $error_message; ?></p>
        <?php endif; ?>

        <button type="submit" name="login">Log In</button>
    </form>
</div>

</body>
</html>
