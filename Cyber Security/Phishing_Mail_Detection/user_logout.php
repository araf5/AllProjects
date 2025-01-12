<?php
session_start();

// Unset and destroy the user session
session_unset();
session_destroy();

// Redirect to the main index page
header('Location: main_index.html');
exit();
?>
