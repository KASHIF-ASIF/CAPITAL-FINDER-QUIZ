<?php
session_start();

// Destroy the session to log out the user
session_destroy();

// Redirect to the index page
header('Location: index.php');
exit();
?>
