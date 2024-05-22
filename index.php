<?php
// Start session to manage user sessions
session_start();

// Require database connection file
require("connection.php");
?>
<html>
<head>
    <title>Easy Messages - Manage Your Team</title>
    <!-- Link to the external stylesheet -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- Main content container -->
    <div id="main">
        <!-- Spacing for better visual presentation -->
        <br><br><br>
        <!-- Heading indicating the purpose of the application -->
        <h4>Streamline team communicator.</h4>
        <!-- Image representing the application -->
        <img src="images/msg_icon.jpg" width="100px" /><br>
        <!-- Display error message if login attempt fails -->
        <span style="color: red;">
            <?php
            // Check if there is a 'login' parameter in the URL
            if (isset($_GET['login'])) {
                // Set error message if login fails
                $msg = "Username or password is incorrect. Please try again!";
                // Display error message
                echo $msg;
            }
            ?>
        </span>
        <!-- Form for user login -->
        <table>
            <form method="post" action="login.php">
                <!-- Input field for username -->
                <input type="text" name="username" placeholder="Username"><br>
                <!-- Input field for password -->
                <input type="password" name="password" placeholder="Password"><br>
                <!-- Button to submit login credentials -->
                <button type="submit" name="login">Login</button>
            </form>
        </table>
    </div>

    <!-- Footer section -->
    <div id="footer">
        <!-- Copyright notice -->
        All rights reserved 2023-2025
    </div>
</body>
</html>
