<?php
    // Start session to manage user sessions
    session_start();

    // Include database connection file
    require("connection.php");

    // Fetch the username from session
    $userprofile = $_SESSION["username"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChatBox</title>
    <link rel="stylesheet" href="css/style.css">
    <!-- Additional CSS style -->
    <style>
        body {
            background-color: darkgrey;
        }
    </style>
</head>
<body>
    <!-- Main container -->
    <div id="main_home">
        <!-- User information section -->
        <div id="userinfo">
            <!-- Display welcome message with the username -->
            <p>Welcome, <?php echo htmlspecialchars($userprofile); ?></p>
            <!-- Logout link -->
            <a href="logout.php">Logout</a>
        </div>

        <!-- Messages screen section -->
        <div id="msgscreen">
            <!-- Display messages in a table -->
            <table border='1'>
                <tr>
                    <th>id</th>
                    <th>message</th>
                    <th>username</th>
                    <th>date</th>
                </tr>
                <?php
                    // Fetch messages from the database
                    $query = "SELECT * FROM messages ORDER BY mid DESC";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['mid'] . "</td>";
                        echo "<td>" . $row['content'] . "</td>";
                        echo "<td>" . $row['username'] . "</td>";
                        echo "<td>" . $row['date'] . "</td>";
                        echo "</tr>";
                    }
                ?>
            </table>
        </div>

        <!-- Message input box -->
        <div id="msgbox">
            <!-- Form to submit a new message -->
            <form method="post" action="send.php">
                <!-- Textarea for typing the message -->
                <textarea name="message" rows="5" cols="20" placeholder="Type your message here"></textarea>
                <br>
                <!-- Submit button -->
                <button type="submit">SEND</button>
            </form>
        </div>

        <!-- Buttons section -->
        <div id="btns">
            <!-- Link to home page -->
            <a href="index.php">Home</a>
        </div>
    </div>

    <!-- Footer section -->
    <div id="footer">
        <!-- Copyright notice -->
        All rights reserved 2023-2025
    </div>
</body>
</html>
