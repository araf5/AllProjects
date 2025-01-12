<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    echo "User not logged in.";
    exit();
}

// Fetch the current user's email from the session
$currentUserEmail = $_SESSION['email'];
echo $currentUserEmail;
?>
