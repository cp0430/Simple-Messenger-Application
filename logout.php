<?php
// Start session
session_start();

// Unset the username session variable to logout the user
unset($_SESSION["username"]);

// Redirect to the index.php page after logout
header("location:index.php");
?>
