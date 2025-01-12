<?php
// Assuming you have a form submission logic here to send the mail
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['sendMail'])) {
    // Process the mail sending logic

    // Display a success message
    $success_message = "Message has been sent!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compose Mail</title>
    <link rel="stylesheet" href="compose_mail_styles.css">
</head>
<body>

<div class="compose-mail-container">
    <h1>Compose Mail</h1>
    <form method="post" action="user_dashboard.php"> <!-- Update the form action -->
        <!-- Add form fields for sender, receiver, subject, and compose mail content -->
        <label for="from">From:</label>
        <input type="text" id="from" name="from" required>

        <label for="to">To:</label>
        <input type="text" id="to" name="to" required>

        <label for="subject">Subject:</label>
        <input type="text" id="subject" name="subject" required>

        <label for="message">Compose Mail:</label>
        <textarea id="message" name="message" rows="4" required></textarea>

        <button type="submit" name="sendMail">Send Mail</button>
    </form>

    <!-- Display the success message -->
    <?php if (isset($success_message)): ?>
        <div class="success-message"><?php echo $success_message; ?></div>
    <?php endif; ?>
</div>

<script src="dashboard_script.js"></script>
</body>
</html>
