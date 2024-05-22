<?php
// Start the session to manage user sessions
session_start();

// Include database connection file
require("connection.php");

// Initialize variable to store user profile
$userprofile = "";

// Check if the login form is submitted
if(isset($_POST['login'])) {
    // Retrieve username and password from the login form
    $username = $_POST['username'];
    $password = $_POST['password'];
  
    // Query to check if username and password match in the database
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    // Check if there is a matching row in the database
    $rows = mysqli_num_rows($result);
    if($rows == 1) {
        // If user is found, set session variable and redirect to home page
        $_SESSION["username"] = $username;
        // Store the username in userprofile variable
        $userprofile = $_SESSION["username"];
        // Redirect to home page with login success message
        header('location:home.php?login=done');
    } else {
        // If user is not found, redirect back to login page with error message
        header('location:index.php?login=failed');    
    } 
}
?>
