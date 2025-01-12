<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: user_login.php');
    exit();
}

// Process message submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['sendMessage'])) {
    $sender = $_SESSION['user_id'];
    $to = $_POST['to'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Check if the message contains phishing keywords
    $phishingKeywords = file_get_contents("phishing_keywords.txt");
    $phishingKeywordsArray = explode(',', $phishingKeywords);

    // Invoke the Python script for phishing detection
    $isSuspicious = exec("python phishing_detection.py '$message' '$phishingKeywords'");

    // Notify the recipient if the message is suspicious
    if ($isSuspicious) {
        echo '<div class="warning-message">This message is suspicious. Exercise caution.</div>';
    }

    // Store the message in the inbox (modify this part based on your database structure)
    $inboxFile = "inbox_" . $to . ".txt";
    $inboxContent = file_get_contents($inboxFile);
    $newMessage = "$sender|$subject|$message\n";
    file_put_contents($inboxFile, $inboxContent . $newMessage, FILE_APPEND);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="dashboard_styles.css">

</head>
<body>

<div class="dashboard-container">
    <div class="dashboard-header">
        <h1>Welcome to User Dashboard</h1>
    </div>

    <div class="dashboard-options">
        <div class="dashboard-option" onclick="composeMessage()">Compose Message</div>
        <div class="dashboard-option" onclick="viewInbox()">View Inbox</div>
        <div class="dashboard-option" onclick="logout()">Log-out</div>
    </div>

    <div id="dashboard-content" class="dashboard-content">
        <!-- Placeholder for dynamic content -->
        <!-- You can load content here based on user interaction using JavaScript -->
    </div>
</div>

<script src="dashboard_script.js"></script>
</body>
</html>
