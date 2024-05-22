<?php
// Include the database connection file
require("Connection.php");

// Default timezone setting
date_default_timezone_set('Asia/Kolkata');

// Retrieve data from the form
$username = "cp"; // Hardcoded username for now, you may want to get this dynamically
$date = date('d-m-y');
$msg = $_POST['message'];

// SQL query to insert the message into the database
$query = "INSERT INTO messages (content, username, date) VALUES ('$msg', '$username', '$date')";

// Execute the query
$result = mysqli_query($conn, $query);

// Check if the query was successful
if ($result) {
    // If successful, redirect to home page with success message
    header("location:home.php?send=success");
} else {
    // If failed, redirect to home page with error message
    header("location:home.php?send=failed");
}

// Close the database connection
mysqli_close($conn);
?>
